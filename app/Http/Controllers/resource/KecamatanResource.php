<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KecamatanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'kecamatan' => $this->kecamatan,
            'kode_pos' => $this->kode_pos,
            'created_at' => $this->created_at,
            'updated_at' => $this->udpated_at,
        ];
    }
}
