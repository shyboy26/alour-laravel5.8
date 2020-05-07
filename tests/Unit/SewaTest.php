<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SewaTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_sewa()
    {
       
        $response = $this->post('/api/customer/sewa',["nama_barang" => "Barang",
        'harga' => 1000,
        'tgl_digunakan' => 1,
        'tgl_kembali' => 2,
        'durasi_sewa' => 3,
        'stok' => 10,
        'jumlah_barang' => 5,
        ])->assertStatus(200);
    
    }

    public function test_sewagagal()
    {
        $response = $this->post('/api/customer/sewa',['stok' => 3,
        'jumlah' => 5,
        ])->assertStatus(401);
    }
}
