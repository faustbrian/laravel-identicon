<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Identicon\Concerns;

use BaseCodeOy\Identicon\Actions\MakeIdenticon;

trait HasIdenticon
{
    public array $identicon = [
        'from' => 'email',
        'to' => 'avatar',
    ];

    public static function bootHasIdenticon(): void
    {
        static::creating(function ($model): void {
            $identicon = MakeIdenticon::execute($model->{$model->identicon['from']});
            $model->{$model->identicon['to']} = $identicon;
        });
    }

    public function generateIdenticon(): void
    {
        $identicon = MakeIdenticon::execute($this->{$this->identicon['from']});
        $this->{$this->identicon['to']} = $identicon;
        $this->save();
    }
}
