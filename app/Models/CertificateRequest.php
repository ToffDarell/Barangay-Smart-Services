<?php

namespace App\Models;

use Database\Factories\CertificateRequestFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CertificateRequest extends Model
{
    /** @use HasFactory<CertificateRequestFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'reference_number',
        'type_code',
        'certificate_type',
        'first_name',
        'middle_name',
        'last_name',
        'date_of_birth',
        'civil_status',
        'gender',
        'address',
        'purok',
        'contact_number',
        'purpose',
        'valid_id_path',
        'status',
        'rejection_reason',
        'processed_by',
        'claimed_at',
    ];

    protected function casts(): array
    {
        return [
            'date_of_birth' => 'date',
            'claimed_at'    => 'datetime',
        ];
    }

    public function getFullNameAttribute(): string
    {
        return trim(preg_replace('/\s+/', ' ', "{$this->first_name} {$this->middle_name} {$this->last_name}"));
    }

    public function processedBy()
    {
        return $this->belongsTo(User::class, 'processed_by');
    }
}
