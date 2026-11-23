<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
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
            "project_name"=>$this->project_name,
            "description"=>$this->description,
            "start_date"=>$this->start_date->format("Y-m-d"),
            "deadline"=>$this->deadline?->format("Y-m-d"),
            "status"=>$this->status,
            "priority"=>$this->priority,
            "project_type"=>$this->project_type,
            "teams"=>TeamResource::collection($this->whenLoaded('teams'))
        ];
    }
}
