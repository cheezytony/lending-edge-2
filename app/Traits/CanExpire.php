<?php

namespace App\Traits;

trait CanExpire
{
    public function scopeExpired($query)
    {
        $query->where('created_at', '<=', date('Y-m-d', strtotime('-3 month')));
    }

    public function scopeNotExpired($query)
    {
        $query->where('created_at', '>', date('Y-m-d', strtotime('-3 month')));
    }
}
