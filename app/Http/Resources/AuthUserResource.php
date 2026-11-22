<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;


class AuthUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            "id"=>$this->id,
            "email"=>$this->email,
            "full_name"=>$this->full_name,
            "avatar_path"=>Storage::disk("user_avatar")->path($this->avatar_path),

        ];
    }
}
