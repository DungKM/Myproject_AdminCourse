<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class StudentStatusEnum extends Enum
{
    public const DI_HOC = 0;
    public const BO_HOC = 1;
    public const BAO_LUU = 2;

    public static function getArrayView()
    {
        return [
            'Đi học' => self::DI_HOC,
            'Bỏ học' => self::BO_HOC,
            'Bảo lưu' => self::BAO_LUU
        ];
    }
    public static function getKeyByValue($value): string
    {
        return array_search(needle: $value, haystack: self::getArrayView(), strict: true);
    }
}