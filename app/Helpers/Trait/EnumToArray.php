<?php

namespace App\Helpers\Trait;

trait EnumToArray
{
    /**
     * Mengubah Enum jadi Array yang isinya namanya
     */
    public static function names(): array
    {
        return array_column(self::cases(), 'name');
    }

    /**
     * Mengubah Enum jadi Array yang isinya isinya
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function array(): array
    {
        return array_combine(self::values(), self::names());
    }
}
