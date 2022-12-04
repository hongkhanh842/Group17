<?php

use App\Enums\OrderStatusEnum;
use App\Enums\UserRoleEnum;

if (!function_exists('getRoleByKey')) {
    function getRoleByKey($key): string
    {
        return strtolower(UserRoleEnum::getKeys((int)$key)[0]);
    }
}

if (!function_exists('user')) {
    function user(): ?object
    {
        return auth()->user();
    }
}

if (!function_exists('isAdmin')) {
    function isAdmin(): bool
    {
        return user() && user()->role === UserRoleEnum::ADMIN;
    }
}

if (!function_exists('isManager')) {
    function isManager(): bool
    {
        return user() && user()->role === UserRoleEnum::MANAGER;
    }

}if (!function_exists('isShipper')) {
    function isShipper(): bool
    {
        return user() && user()->role === UserRoleEnum::SHIPPER;
    }
}

if (!function_exists('getStatusByKey')) {
    function getStatusByKey($key): string
    {
        return OrderStatusEnum::getValue($key);
    }
}

if (!function_exists('getStatusByValue')) {
    function getStatusByValue($value): string
    {
        return OrderStatusEnum::getKey($value);
    }
}


