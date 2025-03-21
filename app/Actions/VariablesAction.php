<?php

declare(strict_types=1);

namespace PackageWizard\Installer\Actions;

use PackageWizard\Installer\Replacers\VariableReplacer;
use Spatie\LaravelData\Data;

class VariablesAction extends Action
{
    protected function perform(): void
    {
        $this->config()->variables->each(function (Data $item, int $index) {
            static::verboseWriteln(__('info.index_number', ['name' => 'variation', 'index' => $index]), 4);

            $this->variation($item);
        });
    }

    protected function variation(Data $item): void
    {
        $variable = VariableReplacer::get($item);

        $this->config()->replaces->push($variable);
    }
}
