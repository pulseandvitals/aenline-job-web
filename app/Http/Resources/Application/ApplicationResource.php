<?php

namespace App\Http\Resources\Application;

use App\Http\Resources\JobOffer\JobOfferResource;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApplicationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'file' => $this->file,
            'applicant_email' => $this->applicant_email ?? 'Not provided.',
            'short_message' => [
                'limit' => Str::limit($this->short_message,50),
                'full_details' => $this->short_message
            ],
            'job_description' => JobOfferResource::make($this->whenLoaded('job_description')),
            'is_read' => $this->is_read,
            'created_at' => !empty($this->created_at)
            ? $this->created_at->diffForHumans()
            : null,
        ];
    }
}
