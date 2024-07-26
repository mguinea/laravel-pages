<?php

namespace Mguinea\Pages\CommonMark;

use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\MarkdownConverter;
use Mguinea\Pages\CommonMark\Extensions\CodeRendererExtension;

class PageContentParser
{
    public static function content(string $content): string
    {
        // Define your configuration, if needed
        $config = [];

        // Configure the Environment with all the CommonMark parsers/renderers
        $environment = new Environment($config);
        $environment->addExtension(new CommonMarkCoreExtension());
        $environment->addExtension(new CodeRendererExtension());

        // Instantiate the converter engine and start converting some Markdown!
        $converter = new MarkdownConverter($environment);

        return $converter->convert($content);
    }
}
