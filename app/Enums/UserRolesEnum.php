<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class UserRolesEnum extends Enum
{
    public const ADMIN = 0;
    public const CUSTOMER = 1;
    public const MANAGER = 2;
    public const SHIPPER = 3;
}
