<?php

namespace Mguinea\Pages\Http\Controllers;

use Carbon\Carbon;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SitemapController
{
    public function __invoke()
    {
        $sitemap = Sitemap::create();

        $sitemap->add(Url::create(config('app.url'))->setLastModificationDate(Carbon::create('2024', '06', '28')));

        $pages = ModelsPage::all();
        $pages->each(function ($page) use ($sitemap) {
            $sitemap->add(Url::create(config('app.url') . '/' . $page->canonical)->setLastModificationDate(Carbon::create(
                $page->updated_at->format('Y'),
                $page->updated_at->format('m'),
                $page->updated_at->format('d')
            )));
        });

        $sitemap->writeToFile(public_path('sitemap.xml'));
    }
}
