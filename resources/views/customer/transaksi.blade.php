<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body style="background-color: #ffffff">
<div>@include('header_customer')</div>
    <div class="row">
        <div class="col-sm-12">
            <center><h4>Data Transaksi Saya</h4></center><hr>
        </div>
        <div class="col-sm-6">
            <button style="margin-bottom: 20px;margin-top: 10px;margin-left: 5%"><a href="/customer/transaksi" style="color: black;padding: 5px;font-size: 14px;text-align: center;">Tampilkan Semua</a></button>
        </div>
        <div class="col-sm-6">
            <form action="/customer/transaksi/cari" method="get" style="float: right;margin-bottom: 20px;margin-top: 10px;margin-right: 20px">
                <label>Cari :</label>
                <input type="text" name="cari">
                <input type="submit" value="Cari">
            </form>
        </div>
    </div>

    <center>
        <div id="1" style="margin-left: 1%;margin-top: 2%">
        <table border='1' cellpadding='10' cellspacing='1'>
        <tr bgcolor='#E9967A' align='center'>
            <td> <b> No </b> </td>
            <td> <b> Toko </b> </td>
            <td> <b> Nama Barang </b> </td>
            <td> <b> Gambar </b> </td>
            <td> <b> Jumlah </b> </td>
            <td> <b> Tgl Transaksi </b> </td>
            <td> <b> Tgl Digunakan </b> </td>
            <td> <b> Tgl Kembali </b> </td>
            <td> <b> Durasi Sewa </b> </td>
            <td> <b> Total </b> </td>
            <td> <b> Status </b> </td>
            <td> <b> Action </b> </td>
        </tr>
        @foreach($transaksi as $t)
        <tr align='center'>
            <td>1</td>
            <td>{{ $t->toko->nama_toko }}</td>
            <td>{{ $t->barang->nama_barang }}</td>
            <td><img src='{{ $t->barang->gambar }}' height='100'></td>
            <td>{{ $t->jumlah_barang }}</td>
            <td>{{ $t->tgl_transaksi }}</td>
            <td>{{ $t->tgl_digunakan }}</td>
            <td>{{ $t->tgl_kembali }}</td>
            <td>{{ $t->durasi_sewa }}</td>
            <td>{{ $t->total_harga }}</td>
            <td>{{ $t->status_transaksi }}</td>
            <td> 
            <button style='background-color:#228B22'> 
            <a href='admin_update.php?no=".$search['id_transaksi']."'><font color='#ffffff'>Detail</font></a> </button>
            <button style='background-color:#B22222'> 
            <a href='/customer/transaksi/konfirm_delete/{{ $t->id_transaksi }}'><font color='#ffffff'>Delete</font></a> </button> 
            </td>
        </tr>
        @endforeach
        </table>
            <?php
/*
            $tiappage = 5;
            $halaman = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
            $mulai = ($halaman > 1) ? ($halaman*$tiappage)-$tiappage : 0;
            $query = "SELECT transaksi.id_transaksi, .transaksi.id_user, toko.nama_toko, barang.nama_barang, barang.gambar, transaksi.tgl_transaksi, transaksi.tgl_digunakan, transaksi.tgl_kembali, transaksi.durasi_sewa, transaksi.jumlah_barang, transaksi.total_harga, transaksi.status_transaksi FROM transaksi INNER JOIN toko ON toko.id_toko = transaksi.id_toko INNER JOIN barang on barang.id_barang = transaksi.id_barang WHERE transaksi.id_user = '$id_cust' LIMIT $mulai, $tiappage"; 
            $result = mysqli_query($db, $query);

            $hitung = "SELECT * FROM transaksi where id_user = $id_cust";
            $hasilhitung = mysqli_query($db, $hitung);
            $jumlah = mysqli_num_rows($hasilhitung);

            $pembulatan = ceil($jumlah / $tiappage);
            $no = 1+$mulai;

            echo "<table border='1' cellpadding='10' cellspacing='1'>";
            echo "<tr bgcolor='#E9967A' align='center'>
            <td> <b> No </b> </td>
            <td> <b> Toko </b> </td>
            <td> <b> Nama Barang </b> </td>
            <td> <b> Gambar </b> </td>
            <td> <b> Jumlah </b> </td>
            <td> <b> Tgl Transaksi </b> </td>
            <td> <b> Tgl Digunakan </b> </td>
            <td> <b> Tgl Kembali </b> </td>
            <td> <b> Durasi Sewa </b> </td>
            <td> <b> Total </b> </td>
            <td> <b> Status </b> </td>
            <td> <b> Action </b> </td>
            </tr>";
            if (isset($_GET['cari'])) {
                $cari = $_GET['cari'];
                $get = mysqli_query($db,"SELECT transaksi.id_transaksi, transaksi.id_user, toko.nama_toko, barang.nama_barang, barang.gambar, transaksi.tgl_transaksi, transaksi.tgl_digunakan, transaksi.tgl_kembali, transaksi.durasi_sewa, transaksi.jumlah_barang, transaksi.total_harga, transaksi.status_transaksi FROM transaksi INNER JOIN toko ON toko.id_toko = transaksi.id_toko INNER JOIN barang on barang.id_barang = transaksi.id_barang WHERE transaksi.id_user = '$id_cust' AND toko.nama_toko like '%".$cari."%' OR barang.nama_barang like '%".$cari."%' AND transaksi.id_user = '$id_cust' OR transaksi.status_transaksi like '%".$cari."%' AND transaksi.id_user = '$id_cust'"); 
                while ($search = mysqli_fetch_array($get)) 
                {
                    $warnabaris= ($no% 2 == 1) ? "#F5F5DC" : "#FFEBCD";
                    echo "<tr bgcolor='$warnabaris' align='center'>
                    <td>".$no."</td>
                    <td>".$search['nama_toko']."</td>
                    <td>".$search['nama_barang']."</td>
                    <td>".$search['gambar']."</td>
                    <td>".$search['jumlah_barang']."</td>
                    <td>".$search['tgl_transaksi']."</td>
                    <td>".$search['tgl_digunakan']."</td>
                    <td>".$search['tgl_kembali']."</td>
                    <td>".$search['durasi_sewa']."</td>
                    <td>".$search['total_harga']."</td>
                    <td>".$search['status_transaksi']."</td>
                    <td> 
                    <button style='background-color:#228B22'> 
                    <a href='admin_update.php?no=".$search['id_transaksi']."'><font color='#ffffff'>Detail</font></a> </button>
                    <button style='background-color:#B22222'> 
                    <a href='konfirm_delete.php?no=".$search['id_transaksi']."'><font color='#ffffff'>Delete</font></a> </button> 
                    </td>
                    </tr>";
                    $no++;
                }
            }  else {
                while ($data = mysqli_fetch_array($result)) 
                {
                    $warnabaris= ($no% 2 == 1) ? "#F5F5DC" : "#FFEBCD";
                    echo "<tr bgcolor='$warnabaris' align='center'>
                    <td>".$no."</td>
                    <td>".$data['nama_toko']."</td>
                    <td>".$data['nama_barang']."</td>
                    <td>".$data['gambar']."</td>
                    <td>".$data['jumlah_barang']."</td>
                    <td>".$data['tgl_transaksi']."</td>
                    <td>".$data['tgl_digunakan']."</td>
                    <td>".$data['tgl_kembali']."</td>
                    <td>".$data['durasi_sewa']."</td>
                    <td>".$data['total_harga']."</td>
                    <td>".$data['status_transaksi']."</td>
                    <td> 
                    <button style='background-color:#228B22'> 
                    <a href='admin_update.php?no=".$data['id_transaksi']."'><font color='#ffffff'>Detail</font></a> </button>
                    <button style='background-color:#B22222'> 
                    <a href='konfirm_delete.php?no=".$data['id_transaksi']."'><font color='#ffffff'>Delete</font></a> </button> 
                    </td>
                    </tr>";
                    $no++;
                }
            }
            echo "</table>";
           */ ?>
        </div>
    </center>
        <div class="" style="text-align: center;margin-top: 40px;margin-bottom: 40px">
      <?php
      /*echo "Halaman Ke - ";
      for ($i=1; $i<=$pembulatan; $i++) {
        echo "<a href='?halaman=".$i."'> <button>$i</button> </a>";
    } */?>
</div>
</body>
</html>