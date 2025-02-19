<?php

namespace App\Casts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class Json implements CastsAttributes
{
    public function get($model, $key, $value, $attributes): array
    {
        return json_decode($value, true);
    }

    public function set($model, $key, $value, $attributes): ?string
    {
        return $value ? json_encode($value) : null;
    }
}
