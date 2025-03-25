<?php

declare(strict_types=1);

namespace PackageWizard\Installer\Data\Questions;

use PackageWizard\Installer\Data\Casts\ArrayWrapCast;
use PackageWizard\Installer\Data\Casts\TranslatableCast;
use PackageWizard\Installer\Enums\PromptEnum;
use PackageWizard\Installer\Enums\TypeEnum;
use Spatie\LaravelData\Attributes\WithCast;

class QuestionAskSelectData extends QuestionData
{
    public TypeEnum $type = TypeEnum::Ask;

    public PromptEnum $prompt = PromptEnum::Select;

    #[WithCast(ArrayWrapCast::class)]
    public array $replace;

    #[WithCast(TranslatableCast::class)]
    public string $question;

    public array $options;

    public int|string|null $default = null;

    public bool|string $required = true;
}
