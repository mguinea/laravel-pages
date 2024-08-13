<?php

namespace Mguinea\Pages;

use Illuminate\Support\Facades\Schema;
use Mguinea\Pages\Models\Page as ModelsPage;
use Mguinea\RouteLoader\Route;
use Mguinea\RouteLoader\RouteCollection;
use Mguinea\RouteLoader\RouteLoaderInterface;

class EloquentRouteLoader implements RouteLoaderInterface
{
    public function __construct(private ModelsPage $pageModel) // TODO resolve interface
    {
    }

    public function load(): RouteCollection
    {
        if (!Schema::hasTable(config('pages.table_names.pages'))) {
            return new RouteCollection([]);
        }

        $routeCollection = new RouteCollection();
        $locales = config('pages.translatable.locales');

        $this->pageModel::all()->each(function (ModelsPage $page) use ($locales, $routeCollection) {
            foreach($locales as $locale) {
                $uri = $page->getTranslation('uri', $locale, false);
                $action = $page->getTranslation('action', $locale);
                $route = new Route($uri, $action, ['GET'], ['web']);

                $routeCollection->add($route);
            }
        });

        return $routeCollection;
    }
}
