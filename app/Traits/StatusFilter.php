<?php

namespace App\Traits;

trait StatusFilter
{
    public function scopeActive($query)
    {
        return $query->where('status', ACTIVE);
    }
    
    public function scopeInactive($query)
    {
        return $query->where('status', INACTIVE);
    }
    
    public function scopeAppliedFilter($query)
    {
        return $query->where('status', APPLIED);
    }
    
    public function scopeAssignedFilter($query)
    {
        return $query->where('status', ASSIGNED);
    }
    
    public function scopeConfirmedFilter($query)
    {
        return $query->where('status', CONFIRMED);
    }
    
    public function scopeCancelledFilter($query)
    {
        return $query->where('status', CANCELLED);
    }
}
