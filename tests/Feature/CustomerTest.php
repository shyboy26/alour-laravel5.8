<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class CustomerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    

    public function test_customer_sewa()
    {
        //setup
        // $user = factory(User::class)->create();
        // dd($user->email);
        //execute
        $user = factory(User::class)->make(['email'=>'kpredovic@example.org','id_user'=>3,'name'=>"Francesca Ziemann Jr."]);

        $response = $this->actingAs($user)->post('/login',['email'=>$user->email,
        'password'=>$user->password])->assertRedirect('/customer/barang');

        
       
        $insert = $this->post('/api/customer/sewa/tambah', [
            'id_user'=>$user->id_user,
            'id_barang' => 21,
            'tgl_digunakan' => "2020-05-07",
            'tgl_kembali' => "2020-05-15",
            'durasi' => 8,
            'jumlah' => 2,
        ])->assertRedirect('/customer/transaksi');
        
        $this->assertDatabaseHas('transaksi', ['id_user' => $user->id_user,
        'status_transaksi'=>'dipesan']);

        
    
       
    }

    
    // public function test_customer_gagal_sewa()
    // {
    //     //setup
    //     $user = factory(User::class)->make(['']);
    //     $this->actingAs($user);
    //     // $this->visit('/customer/barang');
    //     $response = $this->post('/api/customer/sewa/tambah',['id_user' => $user->id_user,
    //     'id_barang' => 21,
    //     'tgl_digunakan' => "2020-05-07",
    //     'tgl_kembali' => "2020-05-15",
    //     'durasi' => 8,
    //     'jumlah' => 2,
    //     ])->assertRedirect('/customer/transaksi');
    //     $this->assertDatabaseHas('transaksi', ['id_user' => $user->id_user,
    //     'status_transaksi'=>'dipesan']);
    //     $this->get('/logout')->assertRedirect('/');
    //     dd($user);
    // }
}
