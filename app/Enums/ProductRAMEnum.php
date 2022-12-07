<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ProductRAMEnum extends Enum
{
    public const BG8 = 0;
    public const BG61 = 1;
}
