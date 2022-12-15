<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ProductCPUEnum extends Enum
{
    public const I5 = 0;
    public const I7 = 1;
    public const R5 = 2;
    public const R7 = 3;
    public const R9 = 4;
    public const I9 = 5;
}
