<?php

namespace Mguinea\Pages\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Mguinea\Pages\Models\Page;
use Mguinea\Translatable\Models\Translation;

class ShowPageController
{
    public function __invoke(Request $request)
    {
        $uri = $request->path();

        $translation = Translation::where('field', 'uri')
            ->where('content', $uri)
            ->select('locale')
            ->firstOrFail();

        $locale = $translation->locale;

        $page = Page::whereHas('translations', function(Builder $query) use ($uri) {
            $query->where('field', 'uri')->where('content', $uri);
        })->firstOrFail(); // TODO move to model

        app()->setLocale($locale);

        return view($page->getTranslation('template', $locale), [
            'locale' => $locale,
            'page' => $page
        ]);
    }
}
