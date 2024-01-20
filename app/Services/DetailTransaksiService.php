<?php

namespace App\Services;

use App\Interfaces\DetailTransaksiServiceInterface;
use App\Models\DetailTransaksi;

class DetailTransaksiService implements DetailTransaksiServiceInterface
{
    static public function create(object $rekap_transaksi, string $date, array $data){
        try {
            $data = [
                'transaksi_id' => $rekap_transaksi->id,
                'product_id' => $rekap_transaksi->product_id,
                'tanggal' => $date,
                'stok_masuk' => $data['stok_masuk']??null,
                'stok_keluar' => $data['stok_keluar']??null,
                'nominal' => $data['nominal'],
                'bukti_tf' => $data['bukti_tf']??null,
                'pembeli' => $data['pembeli']??null,
                'pemasok' => $data['pemasok']??null,
                'keterangan' => $data['keterangan']??null,
            ];

            
            $data = array_filter($data);
            $insertDetail = DetailTransaksi::create($data);
            return $insertDetail;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}