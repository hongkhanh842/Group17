<?php
namespace App\Enums;

use BenSampo\Enum\Enum;

final class UserRoleEnum extends Enum
{
    public const ADMIN = 0;
    public const CUSTOMER = 1;
    public const MANAGER = 2;
    public const SHIPPER = 3;
}
