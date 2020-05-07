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
            <center><h4>Data Customer</h4></center><hr>
        </div>
        <div class="col-sm-6">
            <button style="margin-top: 10px;margin-left: 5%"><a href="/founder/list/customer" style="color: black;padding: 5px;font-size: 14px;text-align: center;">Tampilkan Semua</a></button>
        </div>
        <div class="col-sm-6">
            <form action="/founder/list/customer/cari" method="get" style="float: right;margin-bottom: 10px;margin-top: 10px;margin-right: 20px">
                <label>Cari :</label>
                <input type="text" name="cari">
                <input type="submit" value="Cari">
            </form>
        </div>
    </div>

    
        <!-- <div id="1" style="margin-left: 1%;margin-top: 2%"> -->
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
        @foreach($customer as $c)
        <tr align='center'>
            <td>1</td>
            <td>{{ $c->username }}</td>
            <td>{{ $c->email }}</td>
            <td>{{ $c->no_hp }}</td>
            <td>{{ $c->status }}</td>
            <td> 
            <button style='background-color:#228B22'> 
            <a href='/founder/update/user/{{ $c->id_user }}'><font color='#ffffff'>Update</font></a> </button> 
            </td>
        </tr>
        @endforeach
        </table>
            <?php /*

            $tiappage = 5;
            $halaman = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
            $mulai = ($halaman > 1) ? ($halaman*$tiappage)-$tiappage : 0;
            $query = "SELECT * FROM user where status = 'customer' LIMIT $mulai, $tiappage"; 
            $result = mysqli_query($db, $query);

            $hitung = "SELECT * FROM user where status = 'customer'";
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
                $get = mysqli_query($db,"select * from user where username like '%".$cari."%' and status = 'customer' or email like '%".$cari."%' and status = 'customer' or no_hp like '%".$cari."%' and status = 'customer'"); 
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
                    <a href='customer_update.php?no=".$search['id_user']."'><font color='#ffffff'>Update</font></a> </button> 
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
                    <a href='customer_update.php?no=".$data['id_user']."'><font color='#ffffff'>Update</font></a> </button> 
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
      <?php
      /*echo "Halaman Ke - ";
      for ($i=1; $i<=$pembulatan; $i++) {
        echo "<a href='?halaman=".$i."'> <button>$i</button> </a>";
    } */?>
</div>
    
</body>
</html>