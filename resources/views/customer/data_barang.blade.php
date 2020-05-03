<html>
<head>
    <title>Konfirmasi Pesanan</title>
    <style>
    .list-barang{
        display:grid;
        grid-template-columns:33% 33% 33%;
        grid-gap:1em;
    }
    </style>
</head>
<body>
<div>@include('header_customer')</div>
    <center>
        <h4>{{ $judul }}</h4></center><hr>
        
        <div class="row">
            <div class="col-sm-6">
            <!--<button style="margin-bottom: 20px;margin-top: 10px;margin-left: 5%"><a href="list_admin.php" style="color: black;padding: 5px;font-size: 14px;text-align: center;">Tampilkan Semua</a></button>
            -->
            </div>
            <div class="col-sm-6">
            <form action="/admin/data_barang/cari" method="get" style="float: right;margin-bottom: 20px;margin-top: 10px;margin-right: 20px">
                <label>Cari :</label>
                <input type="text" name="cari">
                <input type="submit" value="Cari">
            </form>
            </div>
        </div>
        <center>
        <div class="list-barang">
            @foreach($barang as $b)
            <div><a href="/customer/detail/{{ $b->id_barang }}">
                <img src="{{ $b->gambar }}" height="150"><br>
                <p><b>{{ $b->nama_barang }}</b></p>
                <p>Rp {{ $b->harga }}</p>
            </a></div>
            @endforeach
        </div></center>
<?php
/*

                $tiappage = 5;
                $halaman = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
                $mulai = ($halaman > 1) ? ($halaman*$tiappage)-$tiappage : 0;
                $query = "SELECT * FROM perjalanan INNER JOIN kota_singgah ON perjalanan.id_singgah = kota_singgah.id_singgah INNER JOIN jadwal ON perjalanan.id_tujuan = jadwal.id_tujuan AND perjalanan.id_perusahaan = $id_perusahaan_ AND perjalanan.status_jalan = 'pending' LIMIT $mulai, $tiappage";
                $sql = mysqli_query($db, $query); 
                $row = mysqli_num_rows($sql); 

                $hitung = "SELECT * FROM perjalanan WHERE id_perusahaan = '$id_perusahaan_' AND status_jalan = 'pending'";
                $hasilhitung = mysqli_query($db, $hitung);
                $jumlah = mysqli_num_rows($hasilhitung);

                $pembulatan = ceil($jumlah / $tiappage);
                $no = 1+$mulai;
                
                if($row > 0){
                    while($data = mysqli_fetch_array($sql)){
                        $warnabaris= ($no% 2 == 1) ? "#E0E0E0" : "#F0F0F0";

                        echo "<tr bgcolor='$warnabaris'>";
                        echo "<td>".$no."</td>";
                        echo "<td>".$data['nama_penumpang']."</td>";
                        echo "<td>".$data['nomer_hp']."</td>";
                        echo "<td>".$data['kota_singgah']."</td>";
                        echo "<td>".$data['kota_tujuan']."</td>";
                        echo "<td>".$data['harga']."</td>";
                        echo "<td>".$data['alamat_jemput']."</td>";
                        echo "<td>".$data['kecamatan_berangkat']."</td>";
                        echo "<td>".$data['alamat_tujuan']."</td>";
                        echo "<td>".$data['tanggal_pesan']."</td>";
                        echo "<td>".$data['tanggal_berangkat']."</td>";
                        echo "<td>".$data['waktu_berangkat']."</td>";
                        echo "<td>".$data['kendaraan']."<br>" .$data['plat_nomor']."</td>";
                        echo "<td> 
                        <button style='background-color:#228B22'>
                        <a href='pesanan_konfirmasi_setuju.php?no=".$data['id_jalan']."'><font color='#ffffff'>Setujui</font></a> </button>
                        <button style='background-color:#B22222'> 
                        <a href='pesanan_konfirmasi_tolak.php?no=".$data['id_jalan']."'><font color='#ffffff'>Tolak</font></a> </button> 
                        </td>";
                        echo "</tr>";
                        $no++;
                    }
                }else{
                    echo "<tr><td colspan='20'>Data tidak ada</td></tr>";
                }
                */?>
            </table>
            <div class="" style="text-align: center;margin-top: 40px;margin-bottom: 40px">
              <?php
              /*echo "Halaman Ke - ";
              for ($i=1; $i<=$pembulatan; $i++) {
                echo "<a href='?halaman=".$i."'> <button>$i</button> </a>";
            } */?>
        </div>
    
</body>
</html>