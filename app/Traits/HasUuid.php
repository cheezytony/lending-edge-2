<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Str;

trait HasUuid
{
    protected static function bootHasUuid()
    {
        static::creating(function ($model) {
            if (! $model->getKey()) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
        if (new self() instanceof Pivot) {
            Pivot::creating(function ($pivot) {
                $pivot->{$model->getKeyName()} = (string) Str::uuid();
            });
        }
    }

    /**
     * Get the value indicating whether the IDs are incrementing.
     *
     * @return bool
     */
    public function getIncrementing()
    {
        return false;
    }

    /**
     * Get the auto-incrementing key type.
     *
     * @return string
     */
    public function getKeyType()
    {
        return 'string';
    }
}
