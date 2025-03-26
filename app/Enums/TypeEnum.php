<?php

declare(strict_types=1);

namespace PackageWizard\Installer\Enums;

enum TypeEnum: string
{
    case Author    = 'author';
    case Date      = 'date';
    case License   = 'license';
    case Rename    = 'rename';
    case Select    = 'select';
    case Text      = 'text';
    case Year      = 'year';
    case YearRange = 'yearRange';
}
