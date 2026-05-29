<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangayConfiguration extends Model
{
    protected $fillable = [
        'key',
        'value',
    ];

    public function scopeByKey($query, string $key)
    {
        return $query->where('key', $key);
    }
}
