<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class OrderStatusEnum extends Enum
{
    public const new = "Mới";
    public const accepted = "Đã xác nhận";
    public const shipping = "Đang giao";
    public const shipped = "Đã giao";
    public const cancel = "Huỷ";
}
