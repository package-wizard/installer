<?php

declare(strict_types=1);

namespace PackageWizard\Installer\Data\Casts;

use PackageWizard\Installer\Concerns\Data\ChoiceData;
use PackageWizard\Installer\Data\Questions\QuestionAuthorData;
use PackageWizard\Installer\Data\Questions\QuestionLicenseData;
use PackageWizard\Installer\Data\Questions\QuestionSelectData;
use PackageWizard\Installer\Data\Questions\QuestionTextData;
use PackageWizard\Installer\Enums\TypeEnum;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Data;

class QuestionsCast implements Cast
{
    use ChoiceData;

    protected function map(string|TypeEnum $type, array $item): Data
    {
        return match ($this->type($type)) {
            TypeEnum::Author  => QuestionAuthorData::from($item),
            TypeEnum::License => QuestionLicenseData::from($item),
            TypeEnum::Select  => QuestionSelectData::from($item),
            TypeEnum::Text    => QuestionTextData::from($item),
            default           => $this->throw($type)
        };
    }
}
