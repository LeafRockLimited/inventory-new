<?php

namespace App\Services;

use App\Interfaces\PemasokServiceInterface;
use App\Models\Pemasok;

class PemasokService implements PemasokServiceInterface
{

    static public function create($data) : void{

        try {
            Pemasok::firstOrCreate(
                [
                    'nama' => $data['nama'],
                    'kontak'=> $data['kontak']
                ],[
                    'negara' => $data['negara'],
                    'provinsi' => $data['provinsi'],
                    'kota' => $data['kota'],
                    'alamat' => $data['alamat'],
                    'keterangan' => $data['keterangan']??null,
                ]
            );
        } catch (\Throwable $th) {
            throw $th;
        }

    }

    static public function update(int $id, array $data) : void{

        try {
            Pemasok::find($id)
            ->update($data);
        } catch (\Throwable $th) {
            throw $th;
        }

    }

}