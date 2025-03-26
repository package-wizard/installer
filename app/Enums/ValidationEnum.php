<?php

declare(strict_types=1);

namespace PackageWizard\Installer\Enums;

use ArchTech\Enums\Values;

enum ValidationEnum: string
{
    use Values;

    case ActiveUrl            = 'active_url';
    case Alpha                = 'alpha';
    case AlphaDash            = 'alpha_dash';
    case AlphaNum             = 'alpha_num';
    case Ascii                = 'ascii';
    case Between              = 'between';
    case Contains             = 'contains';
    case Date                 = 'date';
    case DateFormat           = 'date_format';
    case Digits               = 'digits';
    case DigitsBetween        = 'digits_between';
    case DoesntEndWith        = 'doesnt_end_with';
    case DoesntStartWith      = 'doesnt_start_with';
    case Email                = 'email';
    case EndWith              = 'end_with';
    case GreaterThan          = 'gt';
    case GreaterThanOrEqualTo = 'gte';
    case HexColor             = 'hex_color';
    case Ip                   = 'ip';
    case IpV4                 = 'ipv4';
    case IpV6                 = 'ipv6';
    case LessThan             = 'lt';
    case LessThanOrEqualTo    = 'lte';
    case Lowercase            = 'lowercase';
    case Max                  = 'max';
    case Min                  = 'min';
    case Numeric              = 'numeric';
    case Regex                = 'regex';
    case Sometimes            = 'sometimes';
    case StartWith            = 'start_with';
    case Timezone             = 'timezone';
    case Uppercase            = 'uppercase';
    case Url                  = 'url';
}
