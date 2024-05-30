<?php

namespace Mguinea\LaravelPages\Page;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Contracts\Foundation\Application as FoundationApplication;

class PageResolverController
{
    public function __construct(protected Application $app)
    {
    }

    public function fromUri(string $uri = null): Factory|Application|View|FoundationApplication
    {
        // TODO move to a middleware?

        $pageModel = $this->app->make(PageInterface::class);
        $page = $pageModel::findByUri($uri);
        $this->app->setLocale($page->uri->hreflang);
        return view($page->view->name);
    }
}
