<?php

namespace App\Http\Resources\JobOffer;

use Illuminate\Http\Request;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class JobOfferResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($job_offer): array
    {
        return [
            'id' => $this->id,
            'company_name' => $this->company_name ?? null,
            'company_logo' => $this->company_logo ?? null,
            'company_address' => $this->company_address ?? null,
            'title' => $this->title,
            'description' => $this->description,
            'work_setup' =>  str_replace("_", ' ', ucfirst($this->work_setup)) ,
            'tags' => explode(',', $this->tags),
            'employment_settings' => $this->employment_settings,
            'is_available' => (bool)$this->is_available,
            'applicant_count' => $this->applicant_count,
            'created_by' => UserResource::make($this->whenLoaded('user')),
            'created_at' => !empty($this->created_at)
                ? $this->created_at->diffForHumans()
                : null,
         ];
    }
}
