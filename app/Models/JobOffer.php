<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobOffer extends Model
{
    use HasFactory, HasUuid;

    protected $fillable = [
        'user_id',
        'company_name',
        'company_logo',
        'company_address',
        'title',
        'description',
        'work_setup',
        'tags',
        'employment_settings',
        'applicant_count',
        'is_available',
    ];

    const INACTIVE = 0;
    const ACTIVE = 1;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
