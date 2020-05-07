<!DOCTYPE html>
<html>
<head>
    <title></title>
    {{-- <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/app.css')}}"> --}}
    {{-- <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="style.css" rel="stylesheet"> --}}
    {{-- <script type="text/javascript" src="{{URL::asset('js/app.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/bootstrap.min.js')}}"></script> --}}
    <link href="/css/bootstrap.min.css" rel="stylesheet">
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  {{-- <script type="text/javascript" src="/js/bootstrap.min.js"></script> --}}
  <link href="/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="/js/jquery.min.js"></script>
	<script type="text/javascript" src="/js/bootstrap.min.js"></script>
</head>
<body>
    <div>
        @include('header_admin')
    </div>
    <div class="row">
        <div class="col-sm-12">
            <center><h4>Daftar Sewa</h4></center><hr>
        </div>
        <div class="col-sm-6">
            <button style="margin-bottom: 20px;margin-top: 10px;margin-left: 10px"><a href="/admin/data_sewa" style="color: black;padding: 5px;font-size: 14px;text-align: center;">Tampilkan Semua</a></button>
        </div>
        <div class="col-sm-6">
            <form action="/admin/cari_sewa" method="get" style="float: right;margin-bottom: 20px;margin-top: 10px;margin-right: 20px">
                <label>Cari :</label>
                <input type="text" name="cari" required>
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
        <td> <b> Customer </b> </td>
        <td> <b> Nama Barang </b> </td>
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
                    <td>{{ $t->user['name'] }}</td>
                    <td>{{ $t->barang->nama_barang }}</td>
                    <td>{{ $t->jumlah_barang }}</td>
                    <td>{{ $t->tgl_transaksi }}</td>
                    <td>{{ $t->tgl_digunakan }}</td>
                    <td>{{ $t->tgl_kembali }}</td>
                    <td>{{ $t->durasi_sewa }}</td>
                    <td>{{ $t->total_harga }}</td>
                    <td>{{ $t->status_transaksi }}</td>
            <td> 
            <button style='background-color:#228B22'> 
            <a href='/admin/detail_sewa/{{ $t->id_transaksi }}'><font color='#ffffff'>Details</font></a> </button>
            <button style='background-color:#B22222'> 
            <a href='/admin/data_sewa/konfirm_delete/{{ $t->id_transaksi }}'><font color='#ffffff'>Delete</font></a> </button> 
            </td>
        </tr>
        @endforeach
    </table>
   
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