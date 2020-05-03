<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<div>
    @include('header_founder')
</div>
    <div class="row">
        <div class="col-sm-12">
            <center><h4>Data Toko</h4></center><hr>
        </div>
        <div class="col-sm-6">
            <button style="margin-bottom: 20px;margin-top: 10px;margin-left: 5%"><a href="/founder/list_toko" style="color: black;padding: 5px;font-size: 14px;text-align: center;">Tampilkan Semua</a></button>
        </div>
        <div class="col-sm-6">
            <form action="/founder/list_toko/cari" method="get" style="float: right;margin-bottom: 20px;margin-top: 10px;margin-right: 20px">
                <label>Cari :</label>
                <input type="text" name="cari">
                <input type="submit" value="Cari">
            </form>
        </div>
    </div>

    <center>
        <div id="1" style="margin-left: 1%;margin-top: 2%">
        <table border='1' cellpadding='8' cellspacing='1'>
            <tr bgcolor='#E9967A' align='center'>
            <td> <b> No </b> </td>
            <td> <b> Nama Toko </b> </td>
            <td> <b> Nama Admin </b> </td>
            <td> <b> Alamat Toko </b> </td>
            <td> <b> Lokasi Maps </b> </td>
            <td> <b> Kategori </b> </td>
            <td> <b> Action </b> </td>
            </tr>
            @foreach($toko as $t)
            <tr align='center'>
            <td>1</td>
            <td>{{ $t->nama_toko }}</td>
            <td>{{ $t->user->username }}</td>
            <td>{{ $t->alamat }}</td>
            <td>{{ $t->lokasi_maps }}</td>
            <td>{{ $t->kategori }}</td>
            <td> 
            <button style='background-color:#B22222'> 
            <a href='/founder/confirm_delete_toko/{{ $t->id_toko }}'><font color='#ffffff'>Delete</font></a> </button> 
            </td>
            </tr>
            @endforeach
        </table>
            <?php
            /*
             $tiappage = 5;
            $halaman = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
            $mulai = ($halaman > 1) ? ($halaman*$tiappage)-$tiappage : 0;
            $query = "SELECT user.username, toko.id_toko, toko.nama_toko, toko.alamat, toko.lokasi_maps, toko.kategori
            FROM user
            RIGHT JOIN toko
            ON user.id_user = toko.id_user";  
            $result = mysqli_query($db, $query);

            $hitung = "SELECT * FROM toko";
            $hasilhitung = mysqli_query($db, $hitung);
            $jumlah = mysqli_num_rows($hasilhitung);

            $pembulatan = ceil($jumlah / $tiappage);
            $no = 1+$mulai;

            echo "<table border='1' cellpadding='8' cellspacing='1' >";
            echo "<tr bgcolor='#E9967A' align='center'>
            <td> <b> No </b> </td>
            <td> <b> Nama Toko </b> </td>
            <td> <b> Nama Admin </b> </td>
            <td> <b> Alamat Toko </b> </td>
            <td> <b> Lokasi Maps </b> </td>
            <td> <b> Kategori </b> </td>
            <td> <b> Action </b> </td>
            </tr>";
            if (isset($_GET['cari'])) {
                $cari = $_GET['cari'];
                $get = mysqli_query($db,"SELECT user.username, toko.id_toko, toko.nama_toko, toko.alamat, toko.lokasi_maps, toko.kategori
                    FROM user
                    RIGHT JOIN toko
                    ON user.id_user = toko.id_user where nama_toko like '%".$cari."%' or username like '%".$cari."%' or alamat like '%".$cari."%' or kategori like '%".$cari."%'"); 
                while ($search = mysqli_fetch_array($get)) 
                {
                    $warnabaris= ($no% 2 == 1) ? "#F5F5DC" : "#FFEBCD";
                    echo "<tr bgcolor='$warnabaris' align='center'>
                    <td>".$no."</td>
                    <td>".$search['nama_toko']."</td>
                    <td>".$search['username']."</td>
                    <td>".$search['alamat']."</td>
                    <td>".$search['lokasi_maps']."</td>
                    <td>".$search['kategori']."</td>
                    <td> 
                    <button style='background-color:#B22222'> 
                    <a href='konfirm_delete_toko.php?no=".$search['id_toko']."'><font color='#ffffff'>Delete</font></a> </button> 
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
                    <td>".$data['username']."</td>
                    <td>".$data['alamat']."</td>
                    <td>".$data['lokasi_maps']."</td>
                    <td>".$data['kategori']."</td>
                    <td> 
                    <button style='background-color:#B22222'> 
                    <a href='konfirm_delete_toko.php?no=".$data['id_toko']."'><font color='#ffffff'>Delete</font></a> </button> 
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
      <?php /*
      echo "Halaman Ke - ";
      for ($i=1; $i<=$pembulatan; $i++) {
        echo "<a href='?halaman=".$i."'> <button>$i</button> </a>";
    } */ ?>
</div>
    
</body>
</html>