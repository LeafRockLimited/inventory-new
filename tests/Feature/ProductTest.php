<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_insert(): void
    {
        $data = [
            "nama" => 'Macbook Air M2',
            "reg" => '112',
            "barcode_path" => 'default.png',
            "image_path" => 'default.png',
            "keterangan" => '',
            "harga_beli" => 17000000,
            "harga_jual" => 18000000,
            "label" => '1'
        ];
        $user = User::factory()->create();
        $response = $this->actingAs($user)->call('POST', '/product/insert', $data);
        $response->assertStatus(200);
    }

    public function test_update(): void{
        $data = [
            "nama" => 'Macbook Air M2',
            "reg" => 'MB-Air M2',
            "barcode_path" => 'default.png',
            "image_path" => 'default.png',
            "keterangan" => '',
            "harga_beli" => 18000000,
        ];

        $user = User::factory()->create();
        $response = $this->actingAs($user)->call('PUT','/product/update/1',$data);
        $response->assertStatus(200);
    }

    public function test_delete() : void{
        $user = User::factory()->create();
        $response = $this->actingAs($user)->call('DELETE','/product/delete/1');
        $response->assertStatus(200);
    }
}
