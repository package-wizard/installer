<?php

declare(strict_types=1);

namespace PackageWizard\Installer\Enums;

enum ValidationEnum: string
{
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
    case StartWith            = 'start_with';
    case DoesntStartWith      = 'doesnt_start_with';
    case EndWith              = 'end_with';
    case DoesntEndWith        = 'doesnt_end_with';
    case Email                = 'email';
    case GreaterThan          = 'gt';
    case GreaterThanOrEqualTo = 'gte';
    case LessThan             = 'lt';
    case LessThanOrEqualTo    = 'lte';
    case HexColor             = 'hex_color';
    case Ip                   = 'ip';
    case IpV4                 = 'ipv4';
    case IpV6                 = 'ipv6';
    case Lowercase            = 'lowercase';
    case Uppercase            = 'uppercase';
    case Min                  = 'min';
    case Max                  = 'max';
    case Numeric              = 'numeric';
    case Regex                = 'regex';
    case Timezone             = 'timezone';
    case Url                  = 'url';
}
