<?php

namespace App\Models;

use app\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory, HasUuid;

    protected $fillable = ['file','applicant_email','short_message','is_read','job_id','employer_id'];

    public function job_description()
    {
        return $this->belongsTo(JobOffer::class,'job_id');
    }
}
