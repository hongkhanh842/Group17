<?php

use App\Enums\BrandEnum;
use App\Enums\OrderStatusEnum;
use App\Enums\ProductCPUEnum;
use App\Enums\ProductRAMEnum;
use App\Enums\ProductSSDEnum;
use App\Enums\ProductUseEnum;
use App\Enums\UserRolesEnum;

if (!function_exists('getRoleByKey')) {
    function getRoleByKey($key): string
    {
        return strtolower(UserRolesEnum::getKeys((int) $key)[0]);
    }
}
if (!function_exists('getCPUByKey')) {
    function getCPUByKey($key): string
    {
        return str(ProductCPUEnum::getKeys((int) $key)[0]);
    }
}

if (!function_exists('getUseByKey')) {
    function getUseByKey($key): string
    {
        return str(ProductUseEnum::getKeys((int) $key)[0]);
    }
}

if (!function_exists('getBrandByKey')) {
    function getBrandeByKey($key): string
    {
        return str(BrandEnum::getKeys((int) $key)[0]);
    }
}


if (!function_exists('getRamByKey')) {
    function getRamByKey($key): string
    {
        return strrev(ProductRAMEnum::getKeys((int) $key)[0]);
    }
}

if (!function_exists('getSSDByKey')) {
    function getSSDByKey($key): string
    {
        return strrev(ProductSSDEnum::getKeys((int) $key)[0]);
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
        return user() && user()->role === UserRolesEnum::ADMIN;
    }
}

if (!function_exists('isManager')) {
    function isManager(): bool
    {
        return user() && user()->role === UserRolesEnum::MANAGER;
    }

}

if (!function_exists('isShipper')) {
    function isShipper(): bool
    {
        return user() && user()->role === UserRolesEnum::SHIPPER;
    }
}



