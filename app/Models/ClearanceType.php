<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClearanceType extends Model
{
    protected $fillable = [
        'name',
        'code',
        'price',
        'allow_online_request',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'price'               => 'decimal:2',
            'allow_online_request' => 'boolean',
            'is_active'           => 'boolean',
        ];
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
