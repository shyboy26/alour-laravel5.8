<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class addBarangTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    // public function testExample()
    // {
    //     $this->assertTrue(true);
    // }

    public function testaddBarang()
    {
       
        $data = array(
            'id_toko' => 2,
            'id_user' => 4,
            'nama_barang' => 'Barang1',
            'stok' => 1,
            'gambar' => '/barang/3_3',
            'deskripsi' => 'deskripsikan',
            'harga' => 10000
          );

          
        $response = $this->post('/api/admin/barang/tambahBarangTest',['id_toko' => 2,
        'id_user' => 4,
        'nama_barang' => 'Barang1',
        'stok' => 1,
        'gambar' => '/barang/3_3',
        'deskripsi' => 'deskripsikan',
        'harga' => 10000])->assertStatus(200)
        ->assertJson([
        'nama_barang' => 'Barang1',
        'stok' => 1,
        'gambar' => '/barang/3_3',
        'deskripsi' => 'deskripsikan',
        'harga' => 10000]);
        // $json = json_encode($data);
        // $response->assertJson([
        // 'nama_barang' => 'Barang1',
        // 'stok' => 1,
        // 'gambar' => '/barang/3_3',
        // 'deskripsi' => 'deskripsikan',
        // 'harga' => 10000
        // ]);
    
    }

    // public function test_cobaAdd()
    // {
    //     $response = $this->json('POST', '/admin/barang/tambahBarang', ['id_toko' => 3,
    //     'id_user' => 5,
    //     'nama_barang' => 'Barang1',
    //     'stok' => 1,
    //     'gambar' => '/barang/3_3',
    //     'deskripsi' => 'deskripsikan',
    //     'harga' => 10000]);
    //     $response
    //         ->assertStatus(201)
    //         ->assertJson([
    //             'created' => true,
    //         ]);
    // }
}
