<?php

namespace App\Traits;

trait UpdateStatus
{
    public function scopeApprove($query)
    {
        return $query->update(['status' => APPROVED]);
    }

    public function scopeReject($query)
    {
        return $query->update(['status' => REJECTED]);
    }

    public function scopeApply($query)
    {
        return $query->update(['status' => APPLIED]);
    }

    public function scopeAssign($query)
    {
        return $query->update(['status' => ASSIGNED]);
    }

    public function scopeConfirm($query)
    {
        return $query->update(['status' => CONFIRMED]);
    }

    public function scopeCancel($query)
    {
        return $query->update(['status' => CANCELLED]);
    }
}
