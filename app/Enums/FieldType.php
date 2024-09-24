<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;
use MoonShine\Fields\Checkbox;
use MoonShine\Fields\Number;
use MoonShine\Fields\Select;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Text;

final class FieldType extends Enum
{
   const INPUT = 'input';
   const SELECT = 'select';
   const CHECKBOX = 'checkbox';
   const NUMBER = 'number';
   const DATE = 'date';
   const SWITCHER = 'switcher';
   const RADIO = 'radio';
   const COLOR = 'color';

    public static function getDefault(): string
    {
        return self::INPUT;
    }

    public static function getField(
        string $type,
        string $label,
        string $column,
        array $values = [],
    ): mixed {
        return match ($type) {
            self::INPUT => Text::make(label: $label, column: $column)->hideOnIndex(),
            self::SELECT => Select::make(label: $label, column: $column)->options($values)->nullable()->hideOnIndex(),
            self::CHECKBOX => Checkbox::make(label: $label, column: $column)->hideOnIndex(),
            self::NUMBER => Number::make(label: $label, column: $column)->hideOnIndex(),
            self::SWITCHER => Switcher::make($label, $column)->hideOnIndex(),
        };
    }

    public static function getOptions(): array
    {
        foreach (self::getValues() as $value) {
            $result[$value] = $value;
        }

        return $result;
    }
}
