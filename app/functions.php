<?php

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


