<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ProductSSDEnum extends Enum
{
    public const BG652= 0;
    public const BG215= 1;
    public const BT1= 2;
}
