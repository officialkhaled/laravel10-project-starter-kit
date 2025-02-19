<?php

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;

const SUCCESS = 200;
const FAIL = 500;

const ACTIVE = 1;
const INACTIVE = 0;

const DRAFT = 0;
const APPROVED = 1;
const REJECTED = 2;
const APPLIED = 3;
const ASSIGNED = 4;
const CONFIRMED = 5;
const CANCELLED = 6;

const YES = 1;
const NO = 0;

if (!function_exists('randomQuote')) {
    function randomQuote(): string
    {
        $quotes = [
            "The best way to get started is to quit talking and begin doing. - Walt Disney",
            "The pessimist sees difficulty in every opportunity. The optimist sees opportunity in every difficulty. - Winston Churchill",
            "Don't let yesterday take up too much of today. - Will Rogers",
            "You learn more from failure than from success. Don't let it stop you. Failure builds character. - Elon Musk",
            "It's not whether you get knocked down, it's whether you get up. - Vince Lombardi",
        ];
        return $quotes[array_rand($quotes)];
    }
}

if (!function_exists('generateFaker')) {
    function generateFaker()
    {
        $faker = \Faker\Factory::create();

        return $faker ?? null;
    }
}

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

if (!function_exists('getPercentage')) {
    function getPercentage($first_num, $second_num): float|int
    {
        if ($second_num != 0) {
            return ($first_num * 100) / $second_num;
        }

        return 0;
    }
}

if (!function_exists('getPercentageOf')) {
    function getPercentageOf($percentOf, $percent): float|int
    {
        return ($percentOf * $percent) / 100;
    }
}

if (!function_exists('dateFormatter')) {
    function dateFormatter($date, $format = 'jS M Y')
    {
        if ($date) {
            return Carbon::parse($date)->format($format);
        }
        return $date;
    }
}

if (!function_exists('timeFormatter')) {
    function timeFormatter($time, $format = 'h:i A')
    {
        if ($time) {
            return Carbon::parse($time)->format($format);
        }
        return $time;
    }
}

if (!function_exists('getMonthNameById')) {
    function getMonthNameById($monthId): ?array
    {
        $months = [
            1 => ['en' => 'January', 'bn' => 'জানুয়ারি'],
            2 => ['en' => 'February', 'bn' => 'ফেব্রুয়ারি'],
            3 => ['en' => 'March', 'bn' => 'মার্চ'],
            4 => ['en' => 'April', 'bn' => 'এপ্রিল'],
            5 => ['en' => 'May', 'bn' => 'মে'],
            6 => ['en' => 'June', 'bn' => 'জুন'],
            7 => ['en' => 'July', 'bn' => 'জুলাই'],
            8 => ['en' => 'August', 'bn' => 'আগস্ট'],
            9 => ['en' => 'September', 'bn' => 'সেপ্টেম্বর'],
            10 => ['en' => 'October', 'bn' => 'অক্টোবর'],
            11 => ['en' => 'November', 'bn' => 'নভেম্বর'],
            12 => ['en' => 'December', 'bn' => 'ডিসেম্বর']
        ];

        return $months[$monthId] ?? null;
    }
}

if (!function_exists('formatNumber')) {
    function formatNumber($number): string
    {
        return match (true) {
            $number >= 1000000000 => round($number / 1000000000, 2) . ' B',
            $number >= 1000000 => round($number / 1000000, 2) . ' M',
            $number >= 1000 => round($number / 1000, 2) . ' K',
            default => $number,
        };
    }
}

if (!function_exists('requiredValidation')) {
    function requiredValidation($name): string
    {
        return "The {$name} is required.";
    }
}

if (!function_exists('uniqueValidation')) {
    function uniqueValidation($name): string
    {
        return "The {$name} has already been taken.";
    }
}

if (!function_exists('emailValidation')) {
    function emailValidation($name): string
    {
        return "The {$name} must be a valid email address.";
    }
}
