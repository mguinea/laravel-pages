<?php

namespace Mguinea\Pages\Http\Controllers;

use Illuminate\Http\Request;
use Mguinea\Pages\Models\RouteInterface;

class ShowPageController implements ShowPageControllerInterface
{
    public function __invoke(Request $request)
    {
        $uri = $request->path();
        $routeModel = app()->make(RouteInterface::class);
        $route = $routeModel::where('uri', $uri)
            ->where('verb', 'GET')
            ->firstOrFail();
        $page= $route->page;

        app()->setLocale($page->lang);

        return view($page->view->name, [
            'page' => $page
        ]);
    }
}
