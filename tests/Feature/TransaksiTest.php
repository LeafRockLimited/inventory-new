<?php

namespace Tests\Feature;

use App\Models\product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TransaksiTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    public function test_transaksi_masuk(): void
    {
        $data = [
            'product_id' => product::first()->id,
            'stok_masuk' => 3,
            'nominal' => 13000000,
            'pemasok' => 1
        ];
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)->call('POST',
        '/transaksi/pembelian',$data);
        $response->assertStatus(200);
    }
    
    public function test_transaksi_keluar(): void
    {
        $data = [
            'product_id' => product::first()->id,
            'stok_keluar' => 1,
            'nominal' => 12000000 
        ];
         $user = User::factory()->create();
        
        $response = $this->actingAs($user)->call('POST',
        '/transaksi/penjualan',$data);
        $response->assertStatus(200);
    }

}
