<?php

namespace Mguinea\Pages\Http\Controllers;

class ShowPageController implements ShowPageControllerInterface
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
