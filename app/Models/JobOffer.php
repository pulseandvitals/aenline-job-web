<?php

namespace App\Models;

use app\Traits\HasUuid;
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
        'is_available',
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
