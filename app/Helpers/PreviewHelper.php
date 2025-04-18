<?php

declare(strict_types=1);

namespace PackageWizard\Installer\Helpers;

use Closure;
use Illuminate\Support\Collection;
use Illuminate\Support\HigherOrderTapProxy;
use PackageWizard\Installer\Data\CopyData;
use PackageWizard\Installer\Data\ReplaceData;
use Spatie\LaravelData\Data;

use function collect;
use function count;
use function Laravel\Prompts\info;
use function ob_end_clean;
use function ob_get_contents;
use function ob_start;
use function PackageWizard\Installer\vendor_path;
use function realpath;
use function tap;
use function Termwind\render;

class PreviewHelper
{
    /**
     * @param  Collection<ReplaceData>  $items
     */
    public static function replaces(Collection $items): void
    {
        static::show(__('info.replaces'), $items, static function (ReplaceData $item) {
            static::twoColumnDetail(
                static::compactReplace($item->replace),
                static::compactValue($item->with)
            );
        });
    }

    /**
     * @param  Collection<CopyData>  $items
     */
    public static function copies(Collection $items): void
    {
        static::show(__('info.copies'), $items, static function (CopyData $item) {
            $source = $item->absolute ? realpath($item->source) : $item->source;

            static::twoColumnDetail(
                static::compactReplace([$source]),
                static::compactValue($item->target)
            );
        });
    }

    protected static function show(string $title, Collection $items, Closure $callback): void
    {
        $items->where('asked', true)
            ->when(
                fn (Collection $items) => $items->isNotEmpty(),
                fn () => info($title)
            )->each(fn (Data $item) => $callback($item));
    }

    protected static function compactReplace(array $values): string
    {
        $count = count($values);

        return collect($values)->map(
            static fn (string $value) => $count > 1 ? '"' . $value . '"' : $value
        )->join(', ', ' and ');
    }

    protected static function compactValue(int|string $value): string
    {
        return (string) $value;
    }

    protected static function twoColumnDetail(string $first, int|string $second): void
    {
        render((string) static::compile('two-column-detail', $first, $second));
    }

    protected static function compile(string $view, mixed $first, int|string $second): false|HigherOrderTapProxy|string
    {
        ob_start();

        include vendor_path("illuminate/console/resources/views/components/$view.php");

        return tap(ob_get_contents(), static fn () => ob_end_clean());
    }
}
