<?php

namespace Database\Seeders;

use App\Models\Gudang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GudangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gudang::create([
            'nama' => 'Gudang Kediri',
            'negara_id' => 1,
            'provinsi_id' => 2,
            'kota_id' => 1,
            'kecamatan_id' => 1,
            'desa_id' => 1,
            'alamat' => 'Kediri',
            'active' => true,
        ]);
    }
}
