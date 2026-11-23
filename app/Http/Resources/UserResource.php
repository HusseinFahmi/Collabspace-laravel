<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=>$this->id,
            "full_name"=>$this->full_name,
            "avatar_path" => $this->avatar_path ? Storage::disk("user_avatar")->url($this->avatar_path) : null,
            "joined_at"=>$this->joined_at->format("Y-m-d"),
            "specialty"=>$this->specialty,
            "about"=>$this->about,
            "phone_number"=>$this->phone_number,
            "availability_status"=>$this->availability_status,
            "job_title"=>$this->job_title,
            "years_of_experience"=>$this->years_of_experience
        ];
    }
}

