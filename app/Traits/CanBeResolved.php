<?php

namespace App\Traits;

trait CanBeResolved
{
    public function scopeResolved($query)
    {
        $query->whereStatus('resolved');
    }

    public function scopeUnresolved($query)
    {
        $query->whereStatus('unresolved');
    }
}
