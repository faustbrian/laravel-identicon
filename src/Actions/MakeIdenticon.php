<?php

declare(strict_types=1);

namespace PreemStudio\Identicon\Actions;

use Identicon\Identicon;

class MakeIdenticon
{
    public static function execute(string $value): string
    {
        $generator = config('laravel-identicon.generator');

        $identicon = new Identicon(new $generator);

        return $identicon->getImageDataUri($value);
    }
}
