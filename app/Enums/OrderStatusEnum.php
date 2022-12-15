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
    public const new = "Chờ xác nhận";
    public const accepted = "Đã xác nhận";
    public const moving = "Đang lấy hàng";
    public const taking = "Đã lấy hàng";
    public const shipped = "Đã giao";
    public const cancel = "Huỷ";
}
