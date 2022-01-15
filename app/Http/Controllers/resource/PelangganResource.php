<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PelangganResource extends JsonResource
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
            'no_pelanggan' => $this->no_pelanggan,
            'nama' => $this->nama,
            'telepon' => $this->telepon,
            'no_ktp' => $this->no_ktp,
            'no_kk' => $this->no_kk,
            'gender' => $this->gender,
            'id_kecamatan' => $this->id_kecamatan,
            'id_kelurahan' => $this->id_kelurahan,
            'rw' => $this->rw,
            'rt' => $this->rt,
            'alamat' => $this->alamat,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
