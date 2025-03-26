<?php

declare(strict_types=1);

namespace PackageWizard\Installer\Data\Questions;

use PackageWizard\Installer\Data\Casts\ArrayWrapCast;
use PackageWizard\Installer\Data\Casts\PlaceholderCast;
use PackageWizard\Installer\Data\Casts\ToStringCast;
use PackageWizard\Installer\Data\Casts\TranslatableCast;
use PackageWizard\Installer\Data\Casts\ValidationCast;
use PackageWizard\Installer\Enums\TypeEnum;
use Spatie\LaravelData\Attributes\WithCast;

class QuestionTextData extends QuestionData
{
    public TypeEnum $type = TypeEnum::Text;

    #[WithCast(ArrayWrapCast::class)]
    public array $replace;

    #[WithCast(TranslatableCast::class)]
    public string $question;

    #[WithCast(ToStringCast::class)]
    public string $default = '';

    #[WithCast(PlaceholderCast::class)]
    public string $placeholder = '';

    public bool|string $required = true;

    #[WithCast(ValidationCast::class)]
    public ?array $validation = null;
}
