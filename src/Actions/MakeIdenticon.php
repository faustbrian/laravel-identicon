<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

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
