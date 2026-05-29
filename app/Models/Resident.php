<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resident extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'resident_id',
        'first_name',
        'middle_name',
        'last_name',
        'date_of_birth',
        'gender',
        'civil_status',
        'address',
        'purok',
        'contact_number',
        'is_voter',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'date_of_birth' => 'date',
            'is_voter'      => 'boolean',
        ];
    }

    public function certificateRequests()
    {
        return $this->hasMany(CertificateRequest::class);
    }
}
