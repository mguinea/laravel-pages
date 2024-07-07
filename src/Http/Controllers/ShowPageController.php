<?php

namespace App\Http\Controllers;

class ShowPageController
{
    public function __invoke(Request $request)
    {
        $page = Page::fromMarkdown(pages_path($request->path() . '.md'));

        app()->setLocale($page->lang);

        return view($page->view, [
            'page' => $page
        ]);
    }
}
