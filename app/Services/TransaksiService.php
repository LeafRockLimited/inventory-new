<?php

namespace App\Services;

use App\Interfaces\TransaksiServiceInterface;
use App\Models\DetailTransaksi;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;

class TransaksiService implements TransaksiServiceInterface
{
    static public function create(array $data){
        DB::beginTransaction();
        try {

            $today = date('Y-m-d');
            $tahun = date('Y');
            $bulan = date('m');
            
            $rekapTransaksi = Transaksi::firstOrNew([
                'product_id'=>$data['product_id'],
                'tahun' => $tahun,
                'bulan' => $bulan
            ]);
            $rekapTransaksi->tahun = $tahun;
            $rekapTransaksi->bulan =  $bulan;
            if (isset($data['stok_masuk'])) {
                $rekapTransaksi->total_stok_masuk = $rekapTransaksi->total_stok_masuk + $data['stok_masuk'];
                SkuService::create($data['product_id'], ['masuk' => $data['stok_masuk']]);
                $rekapTransaksi->nominal_keluar = $rekapTransaksi->nominal_keluar + $data['nominal'];
            }
            if (isset($data['stok_keluar'])) {
                $rekapTransaksi->total_stok_keluar = $rekapTransaksi->total_stok_keluar + $data['stok_keluar'];
                SkuService::create($data['product_id'], ['keluar' => $data['stok_keluar']]);
                $rekapTransaksi->nominal_masuk = $rekapTransaksi->nominal_masuk + $data['nominal'];
            }
            $rekapTransaksi->keterangan = $data['keterangan']??null;
            $rekapTransaksi->save();
            
            $createDetailTransaksi = DetailTransaksiService::create($rekapTransaksi,$today,$data);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

    }

}