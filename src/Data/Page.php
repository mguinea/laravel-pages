<?php

namespace Mguinea\Pages\Data;

use DateTime;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;use League\CommonMark\Extension\FrontMatter\FrontMatterExtension;
use League\CommonMark\MarkdownConverter;
use Mguinea\Pages\Models\Page as EloquentPage;

class Page
{
    public function __construct(
        public string $id,
        public string $title,
        public string $description,
        public string $lang,
        public string $location,
        public string $content,
        public string $view,
        public string $robotIndex,
        public string $robotFollow,
        public string $canonical,
        public string $base,
        public array $alternates,
        public DateTime $publishedAt
    ) {
    }

    public static function fromModel(EloquentPage $eloquentPage): self
    {
        // Define your configuration, if needed
        $config = [];

        // Configure the Environment with all the CommonMark parsers/renderers
        $environment = new Environment($config);
        $environment->addExtension(new CommonMarkCoreExtension());

        // Add the extension
        $environment->addExtension(new FrontMatterExtension());

        // Instantiate the converter engine and start converting some Markdown!
        $converter = new MarkdownConverter($environment);

        $content = $converter->convert($eloquentPage->content);

        $alternates = [];
        foreach($eloquentPage->entry->pages()->get() as $ePage) {
            if ($ePage->locale->default === true) {
                $alternates[] = [
                    'href' => url($ePage->route->uri),
                    'hreflang' => 'x-default'
                ];
            }

            $alternates[] = [
                'href' => url($ePage->route->uri),
                'hreflang' => $ePage->locale->getHrefLang()
            ];
        }

        return new self(
            $eloquentPage->id,
            $eloquentPage->title,
            $eloquentPage->description,
            $eloquentPage->locale->language,
            $eloquentPage->locale->location,
            $content,
            $eloquentPage->view->name,
            $eloquentPage->robot_index,
            $eloquentPage->robot_follow,
            $eloquentPage->canonical,
            config('laravel-pages.base_url'),
            $alternates,
            (new DateTime())->setTimestamp($eloquentPage->published_at)
        );
    }
}
