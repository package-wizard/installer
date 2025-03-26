<?php

declare(strict_types=1);

namespace PackageWizard\Installer\Fillers\Questions;

use Closure;
use Illuminate\Support\Str;
use PackageWizard\Installer\Data\Questions\QuestionTextData;
use PackageWizard\Installer\Data\ReplaceData;
use PackageWizard\Installer\Fillers\Filler;
use PackageWizard\Installer\Helpers\ValidationHelper;
use Spatie\LaravelData\Data;

use function Laravel\Prompts\text;

/** @method static make(QuestionTextData|Data $data) */
class TextFiller extends Filler
{
    public function __construct(
        protected QuestionTextData $data
    ) {}

    public function get(): ?ReplaceData
    {
        if (! $answer = $this->cleanup($this->answer())) {
            return null;
        }

        return ReplaceData::from([
            'id'      => $this->data->id,
            'replace' => $this->data->replace,
            'with'    => $answer,
        ]);
    }

    protected function answer(): string
    {
        return text(
            label      : $this->data->question,
            placeholder: $this->data->placeholder,
            default    : $this->data->default,
            required   : $this->data->required,
            validate   : $this->validator(),
            hint       : ! $this->data->required ? __('form.hint.enter') : '',
        );
    }

    protected function cleanup(string $value): string
    {
        return Str::of($value)->squish()->trim()->toString();
    }

    protected function validator(): ?Closure
    {
        if (! $this->data->validation) {
            return null;
        }

        return fn (string $value) => ValidationHelper::validated($value, $this->data->validation);
    }
}
