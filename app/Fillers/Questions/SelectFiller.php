<?php

declare(strict_types=1);

namespace PackageWizard\Installer\Fillers\Questions;

use PackageWizard\Installer\Data\Questions\QuestionSelectData;
use PackageWizard\Installer\Data\ReplaceData;
use PackageWizard\Installer\Fillers\Filler;
use Spatie\LaravelData\Data;

use function Laravel\Prompts\select;

/** @method static make(QuestionSelectData|Data $data) */
class SelectFiller extends Filler
{
    public function __construct(
        protected QuestionSelectData $data
    ) {}

    public function get(): ReplaceData
    {
        return ReplaceData::from([
            'id'      => $this->data->id,
            'replace' => $this->data->replace,
            'with'    => $this->answer(),
        ]);
    }

    protected function answer(): string
    {
        return select(
            label   : $this->data->question,
            options : $this->data->options,
            default : $this->data->default,
            scroll  : 20,
            hint    : ! $this->data->required ? __('form.hint.enter') : '',
            required: $this->data->required
        );
    }
}
