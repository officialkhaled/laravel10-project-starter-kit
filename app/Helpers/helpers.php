<?php

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;

if (!function_exists('currentUser')) {
    function currentUser(): User|Authenticatable|null
    {
        if (Auth::check()) {
            return Auth::user();
        }

        return null;
    }
}

if (!function_exists('userId')) {
    function userId()
    {
        if (Auth::check()) {
            return Auth::user()->id;
        }

        return null;
    }
}

if (!function_exists('userName')) {
    function userName(): string
    {
        if (Auth::check()) {
            return auth()->user()->name;
        }

        return '';
    }
}
