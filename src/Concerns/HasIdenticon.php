<?php

declare(strict_types=1);

namespace BombenProdukt\Identicon\Concerns;

use BombenProdukt\Identicon\Actions\MakeIdenticon;

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
