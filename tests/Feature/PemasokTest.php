<?php

namespace Tests\Feature;

use App\Models\Pemasok;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PemasokTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_create(): void
    {

        $user = User::factory()->create();
        $response = $this->actingAs($user)->call('POST', '/pemasok/create', [
            "nama" => 'Elektronik',
            'negara' => 'Indonesia',
            'provinsi' => 'Jakarta',
            'kota' => 'Jakarta Utara',
            'alamat' => '-',
            'kontak' => '1',
        ]);
        $response = $this->actingAs($user)->call('POST', '/pemasok/create', [
            "nama" => 'Elektronik',
            'negara' => 'Indonesia',
            'provinsi' => 'Jawa Timur',
            'kota' => 'Kediri',
            'alamat' => '-',
            'kontak' => '2',
        ]);

        $response->assertStatus(200);
    }

    public function test_update(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->call('PUT', "/pemasok/update/" . Pemasok::first()->id, [
            'kota' => 'Jakarta Utara'
        ]);

        $response->assertStatus(200);
    }

    public function test_delete(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->call('DELETE', '/pemasok/delete/' . Pemasok::first()->id);
        $response->assertStatus(200);
    }
}
