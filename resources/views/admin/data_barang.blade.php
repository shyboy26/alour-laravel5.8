<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="/js/jquery.min.js"></script>
	<script type="text/javascript" src="/js/bootstrap.min.js"></script>
</head>
<body>
<div> @include('header_admin') </div>
    <div class="row">
        <div class="col-sm-12">
            <center><h4>Daftar Barang</h4></center><hr>
        </div>
        <div class="col-sm-6">
            <button style="margin-bottom: 20px;margin-top: 10px;margin-left: 10px"><a href="/admin/data_barang" style="color: black;padding: 5px;font-size: 14px;text-align: center;">Tampilkan Semua</a></button>

            <button style="margin-bottom: 20px;margin-top: 10px;margin-left: 10px" ><a href="/admin/tambah_barang" style="color: black;padding: 5px;font-size: 14px;text-align: center;">Tambah Barang</a></button>
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
    <div class="data">
    <table border='1' cellpadding='15' cellspacing='1'>
        <tr bgcolor='#E9967A' align='center'>
        <td> <b> No </b> </td>
        <td> <b> Toko </b> </td>
        <td> <b> Nama Barang </b> </td>
        <td> <b> Stok </b> </td>
        <td> <b> Harga </b> </td>
        <td> <b> Gambar </b> </td>
        <td> <b> Deskripsi </b> </td>
        <td> <b> Action </b> </td>
        </tr>
        @foreach($barang as $b)
        <tr align='center'>
                    <td>1</td>
                    <td>{{ $b->toko->nama_toko }}</td>
                    <td>{{ $b->nama_barang }}</td>
                    <td>{{ $b->stok }}</td>
                    <td>{{ $b->harga }}</td>
                    <td><img src='{{ $b->gambar }}' height='100'></td>
                    <td>{{ $b->deskripsi }}</td>
            <td> 
            <button style='background-color:#FF8C00'> 
            <a href='/admin/data_barang/form_update/{{ $b->id_barang }}'><font color='#ffffff'>Update</font></a> </button>
            <button style='background-color:#228B22'>
            <a href='/admin/data_barang/konfirm_delete/{{ $b->id_barang }}'><font color='#ffffff'>Delete</font></a> </button> 
            </td>
        </tr>
        @endforeach
    </table>
    <?php
/*
    $id_toko_ = $_SESSION['id_toko'];

    $tiappage = 5;
    $halaman = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
    $mulai = ($halaman > 1) ? ($halaman*$tiappage)-$tiappage : 0;
    $query = "SELECT toko.id_toko, toko.nama_toko, barang.id_barang, barang.id_toko, barang.nama_barang, barang.stok, barang.harga, barang.gambar, barang.deskripsi FROM barang INNER JOIN toko ON toko.id_toko = barang.id_toko WHERE barang.id_toko = '$id_toko_' LIMIT $mulai, $tiappage"; 
    $result = mysqli_query($db, $query);

    $hitung = "SELECT * FROM barang where id_toko = $id_toko_";
    $hasilhitung = mysqli_query($db, $hitung);
    $jumlah = mysqli_num_rows($hasilhitung);

    $pembulatan = ceil($jumlah / $tiappage);
    $no = 1+$mulai;

//echo "$id_perusahaan_";
    echo "<table border='1' cellpadding='15' cellspacing='1'>";
    echo "<tr bgcolor='#E9967A' align='center'>
    <td> <b> No </b> </td>
    <td> <b> Toko </b> </td>
    <td> <b> Nama Barang </b> </td>
    <td> <b> Stok </b> </td>
    <td> <b> Harga </b> </td>
    <td> <b> Gambar </b> </td>
    <td> <b> Deskripsi </b> </td>
    <td> <b> Action </b> </td>
    </tr>";
    if (isset($_GET['cari'])) {
        $cari = $_GET['cari'];
        $get = mysqli_query($db,"SELECT toko.id_toko, toko.nama_toko, barang.id_barang, barang.id_toko, barang.nama_barang, barang.stok, barang.harga, barang.gambar, barang.deskripsi FROM barang INNER JOIN toko ON toko.id_toko = barang.id_toko WHERE barang.id_toko = '$id_toko_' AND barang.nama_barang like '%".$cari."%' OR barang.stok like '%".$cari."%' AND barang.id_toko = '$id_toko_' OR barang.harga like '%".$cari."%' AND barang.id_toko = '$id_toko_'"); 
        while ($search = mysqli_fetch_array($get)) 
        {
            $warnabaris= ($no% 2 == 1) ? "#F5F5DC" : "#FFEBCD";
            echo "<tr bgcolor='$warnabaris' align='center'>
                    <td>".$no."</td>
                    <td>".$search['nama_toko']."</td>
                    <td>".$search['nama_barang']."</td>
                    <td>".$search['stok']."</td>
                    <td>".$search['harga']."</td>
                    <td>".$search['gambar']."</td>
                    <td>".$search['deskripsi']."</td>
            <td> 
            <button style='background-color:#FF8C00'> 
            <a href='formupdate.php?no=".$search['id_barang']."'><font color='#ffffff'>Update</font></a> </button>
            <button style='background-color:#228B22'>
            <a href='deletebarang.php?no=".$search['id_barang']."'><font color='#ffffff'>Delete</font></a> </button> 
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
                    <td>".$data['stok']."</td>
                    <td>".$data['harga']."</td>
                    <td><img src='../images/barang/".$data['gambar']."' width='100px'></td>
                    <td>".$data['deskripsi']."</td>
            <td> 
            <button style='background-color:#FF8C00'> 
            <a href='formupdate.php?no=".$data['id_barang']."'><font color='#ffffff'>Update</font></a> </button>
            <button style='background-color:#228B22'>
            <a href='deletebarang.php?no=".$data['id_barang']."'><font color='#ffffff'>Delete</font></a> </button> 
            </td>
            </tr>";
            $no++;
        }
    }
    echo "</table>";*/
    ?>
    </div>
    </center>

    <div class="" style="text-align: center;margin-top: 40px;margin-bottom: 40px">
      <?php
     /* echo "Halaman Ke - ";
      for ($i=1; $i<=$pembulatan; $i++) {
        echo "<a href='?halaman=".$i."'> <button>$i</button> </a>";
    }*/ ?>
    </div>


<section>
            <!-- Modal login -->
            <div id="tambah_barang" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-tittle">Tambah Barang</h4>
                            <button type="button" class="close"><a href="data_barang.php" style="color: black">&times;</a></button>
                        </div>
                        <div class="modal-body">
                            <form action="data_barang.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <input type="text" class="form-control" name="nama_barang" style="font-size: 14px" required>
                                    <label>Stok</label>
                                    <input type="number" class="form-control" name="stok" style="font-size: 14px" required>
                                    <label>Harga</label>
                                    <input type="number" class="form-control" name="harga" style="font-size: 14px" required>
                                    <label>Deskripsi</label>
                                    <textarea type="text" class="form-control" name="deskripsi" style="font-size: 14px" required></textarea>
                                    <label>Gambar</label>
                                    <input type="file" class="form-control" name="gambar" style="font-size: 14px" required>
                                </div>
                                <input name="tambah_barang" type="submit" class="btn btn-success btn-sm" value="Simpan" style="float: right;" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal Login -->
    </section>
    
</body>
</html>