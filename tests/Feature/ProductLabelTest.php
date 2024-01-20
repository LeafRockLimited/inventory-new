<?php

namespace Tests\Feature;

use App\Models\ProductLabel;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class ProductLabelTest extends TestCase
{


    public function test_create(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)
        ->call('POST','/produk_label/create',[
            'nama' => 'Elektronik'
        ]);
        $response->assertStatus(200);
    }

    public function test_labeling():void{
        $user = User::factory()->create();
        $response = $this->actingAs($user)
        ->call('PUT','/product/labeling/1',[
            'label_id' => ProductLabel::first()->id
        ]);
        $response->assertStatus(200);
    }

    public function test_fetch_label_with_product():void{
        $user = User::factory()->create();
        $response = $this->actingAs($user)->call('GET','/produk_label/1');
        $response->assertStatus(200);

    }
}
