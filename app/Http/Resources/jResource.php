<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class jResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'title' => '',
            'description' => '',
            'status' => $this->status,
            'priority' => $this->priority,
            'created_at' => '', //$this->created_at,
            'updated_at' => ''
        ];
    }
}
