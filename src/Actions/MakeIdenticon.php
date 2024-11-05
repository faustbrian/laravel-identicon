<?php

declare(strict_types=1);

namespace BaseCodeOy\Identicon\Actions;

use Identicon\Identicon;

final class MakeIdenticon
{
    public static function execute(string $value): string
    {
        $generator = config('identicon.generator');

        $identicon = new Identicon(new $generator());

        return $identicon->getImageDataUri($value);
    }
}
