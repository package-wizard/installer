<?php

declare(strict_types=1);

namespace PackageWizard\Installer\Enums;

/** @deprecated */
enum PromptEnum: string
{
    case Text   = 'text';
    case Select = 'select';
}
