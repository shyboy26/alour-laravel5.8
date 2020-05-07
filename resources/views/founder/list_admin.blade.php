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
            <center><h4>Data Admin Toko</h4></center><hr>
        </div>
        <div class="col-sm-6">
            <button style="margin-bottom: 20px;margin-top: 10px;margin-left: 5%"><a href="/founder/list/admin" style="color: black;padding: 5px;font-size: 14px;text-align: center;">Tampilkan Semua</a></button>
        </div>
        <div class="col-sm-6">
            <form action="/founder/list/admin/cari" method="get" style="float: right;margin-bottom: 20px;margin-top: 10px;margin-right: 20px">
                <label>Cari :</label>
                <input type="text" name="cari">
                <input type="submit" value="Cari">
            </form>
        </div>
    </div>

    <center>
        <div id="1" style="margin-left: 1%;margin-top: 2%">
        <table border='1' cellpadding='10' cellspacing='1' width='1070'>
            <tr bgcolor='#E9967A' align='center'>
            <td> <b> No </b> </td>
            <td> <b> Username </b> </td>
            <td> <b> Email </b> </td>
            <td> <b> Nomer HP </b> </td>
            <td> <b> Status </b> </td>
            <td> <b> Action </b> </td>
            </tr>
            @foreach($admin as $a)
            <tr><td><?php echo('1')?></td>
            <td>{{ $a->username }}</td>
            <td>{{ $a->email }}</td>
            <td>{{ $a->no_hp }}</td>
            <td>{{ $a->status }}</td>
            <td>
            <button style='background-color:#228B22'> 
            <a href='/founder/update/user/{{ $a->id_user }}'><font color='#ffffff'>Update</font></a> </button><br>
            <button style='background-color:#B22222' onclick="confirmdelete({{ $a->id_user }})"> 
            <font color='#ffffff'>Delete</font></button> 
            </td></tr>
            @endforeach
            </table>
            <?php
/*
            $tiappage = 5;
            $halaman = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
            $mulai = ($halaman > 1) ? ($halaman*$tiappage)-$tiappage : 0;
            $query = "SELECT * FROM user where status = 'admin' LIMIT $mulai, $tiappage"; 
            $result = mysqli_query($db, $query);

            $hitung = "SELECT * FROM user where status = 'admin'";
            $hasilhitung = mysqli_query($db, $hitung);
            $jumlah = mysqli_num_rows($hasilhitung);

            $pembulatan = ceil($jumlah / $tiappage);
            $no = 1+$mulai;

            echo "<table border='1' cellpadding='10' cellspacing='1' width='1070'>";
            echo "<tr bgcolor='#E9967A' align='center'>
            <td> <b> No </b> </td>
            <td> <b> Username </b> </td>
            <td> <b> Email </b> </td>
            <td> <b> Nomer HP </b> </td>
            <td> <b> Status </b> </td>
            <td> <b> Action </b> </td>
            </tr>";
            if (isset($_GET['cari'])) {
                $cari = $_GET['cari'];
                $get = mysqli_query($db,"select * from user where username like '%".$cari."%' and status = 'admin' or email like '%".$cari."%' and status = 'admin' or nomer_hp like '%".$cari."%' and status = 'admin' or status like '%".$cari."%' and status = 'admin'"); 
                while ($search = mysqli_fetch_array($get)) 
                {
                    $warnabaris= ($no% 2 == 1) ? "#F5F5DC" : "#FFEBCD";
                    echo "<tr bgcolor='$warnabaris' align='center'>
                    <td>".$no."</td>
                    <td>".$search['username']."</td>
                    <td>".$search['email']."</td>
                    <td>".$search['no_hp']."</td>
                    <td>".$search['status']."</td>
                    <td> 
                    <button style='background-color:#228B22'> 
                    <a href='admin_update.php?no=".$search['id']."'><font color='#ffffff'>Update</font></a> </button>
                    <button style='background-color:#B22222'> 
                    <a href='konfirm_delete.php?no=".$search['id']."'><font color='#ffffff'>Delete</font></a> </button> 
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
                    <td>".$data['username']."</td>
                    <td>".$data['email']."</td>
                    <td>".$data['no_hp']."</td>
                    <td>".$data['status']."</td>
                    <td> 
                    <button style='background-color:#228B22'> 
                    <a href='admin_update.php?no=".$data['id_user']."'><font color='#ffffff'>Update</font></a> </button>
                    <button style='background-color:#B22222'> 
                    <a href='konfirm_delete.php?no=".$data['id_user']."'><font color='#ffffff'>Delete</font></a> </button> 
                    </td>
                    </tr>";
                    $no++;
                }
            }
            echo "</table>";
            */?>
        </div>
    </center>

    <div class="" style="text-align: center;margin-top: 40px;margin-bottom: 40px">
      <?php /*
      echo "Halaman Ke - ";
      for ($i=1; $i<=$pembulatan; $i++) {
        echo "<a href='?halaman=".$i."'> <button>$i</button> </a>";
    } */?>
    </div>
    <script>
        function confirmdelete(id) {
            var str = "/founder/delete/url"
            var url = str.replace("url", id)
            if (confirm("Hapus data admin toko ini ? Data toko yang berkaitan juga akan terhapus!")) {
                location.replace(url)
            }
        }
    </script>
</body>
</html>