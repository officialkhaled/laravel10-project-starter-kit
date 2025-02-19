<?php

namespace App\Filters;

use Closure;

class Filter
{
    public static function applyFilter($key, $value): Closure
    {
        return function ($query) use ($key, $value) {
            $query->where($key, $value);
        };
    }
    
    public static function applyInFilter($key, $values): Closure
    {
        $values = is_array($values) ? $values : [$values];
        
        return function ($query) use ($key, $values) {
            $query->whereIn($key, $values);
        };
    }
    
    public static function applyNotInFilter($key, $values): Closure
    {
        $values = is_array($values) ? $values : [$values];
        
        return function ($query) use ($key, $values) {
            $query->whereNotIn($key, $values);
        };
    }
    
    public static function applyLikeFilter($column, $search): Closure
    {
        return function ($query) use ($column, $search) {
            $query->where($column, 'LIKE', '%' . $search . '%');
        };
    }
    
    public static function applyBetweenFilter($key, $array): Closure
    {
        return function ($query) use ($key, $array) {
            $query->whereBetween($key, $array);
        };
    }
    
    public static function applyDateFilter($key, $value): Closure
    {
        return function ($query) use ($key, $value) {
            $query->whereDate($key, $value);
        };
    }
    
    public static function applyMonthFilter($key, $value): Closure
    {
        return function ($query) use ($key, $value) {
            $query->whereMonth($key, $value);
        };
    }
    
    public static function applyYearFilter($key, $value): Closure
    {
        return function ($query) use ($key, $value) {
            $query->whereYear($key, $value);
        };
    }
    
    public static function applyHasRelation($relation): Closure
    {
        return function ($query) use ($relation) {
            $query->has($relation);
        };
    }
    
    public static function applyRelation($relation, $key, $value): Closure
    {
        return function ($query) use ($relation, $key, $value) {
            $query->whereRelation($relation, $key, $value);
        };
    }
    
    public static function applyInRelation($relation, $key, $value): Closure
    {
        return function ($query) use ($relation, $key, $value) {
            $query->whereHas($relation, fn($q) => $q->whereIn($key, $value));
        };
    }
}
