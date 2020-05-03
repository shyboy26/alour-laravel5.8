<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Profil</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>

<body style="background-color: #f0f0f0">
    <div>@include('header_admin')</div>
    <div class="container">
        <section>
            <div class="row">
                <div class="col-sm-12" style="padding-right: 0px">
                    <center><h4>Detail Transaksi</h4></center><hr>
                    <form method="post" action="/admin/detail_sewa/update/{{ $transaksi->id_transaksi }}" style="margin-top: 20px">
                        {{ csrf_field() }}
						{{ method_field('PUT') }}
                        <tr>
                            <center><img src='{{ $transaksi->gambar }}' width='250px' margin-left='500px'></center>
                        </tr>
                        <table width="1000px" style="margin-top: 20px;margin-left: 5%">
                            <tr>
                                <td>Toko</td>
                                <td>
                                    <input type="text" name="nama_toko" class="textInput" value="{{ $transaksi->toko->nama_toko }}" style="padding:7px; width: 400px;height:40px;margin-left:10px;margin-bottom: 12px" readonly>
                                    <b style="margin-left: 32px">Customer</b>
                                    <input type="text" name="username" class="textInput" value="{{ $transaksi->user->username }}" style="padding:7px; width: 127px;height:40px;margin-left:10px;margin-bottom: 12px" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Nama Barang</td>
                                <td>
                                    <input type="text" name="nama_barang" class="textInput" value="{{ $transaksi->barang->nama_barang }}" style="padding:7px; width: 400px;height:40px;margin-left:10px;margin-bottom: 12px" readonly>
                                    <b style="margin-left: 50px">Jumlah</b>
                                    <input type="text" name="jumlah_barang" class="textInput" value="{{ $transaksi->jumlah_barang }}" style="padding:7px; width: 127px;height:40px;margin-left:10px;margin-bottom: 12px" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Tgl Transaksi</td>
                                <td>
                                    <input type="text" name="tgl_transaksi" class="textInput" value="{{ $transaksi->tgl_transaksi }}" style="padding:7px; width: 650px;height:40px;margin-left:10px;margin-bottom: 12px" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Tgl Digunakan</td>
                                <td>
                                    <input type="text" name="tgl_digunakan" class="textInput" value="{{ $transaksi->tgl_digunakan }}" style="padding:7px; width: 650px;height:40px;margin-left:10px;margin-bottom: 12px" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Tgl Kembali</td>
                                <td>
                                    <input type="text" name="tgl_kembali" class="textInput" value="{{ $transaksi->tgl_kembali }}" style="padding:7px; width: 650px;height:40px;margin-left:10px;margin-bottom: 12px" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Durasi Sewa</td>
                                <td>
                                    <input type="text" name="durasi_sewa" class="textInput" value="{{ $transaksi->durasi_sewa }}" style="padding:7px; width: 650px;height:40px;margin-left:10px;margin-bottom: 12px" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Total Harga</td>
                                <td>
                                    <input type="text" name="total_harga" class="textInput" value="{{ $transaksi->total_harga }}" style="padding:7px; width: 650px;height:40px;margin-left:10px;margin-bottom: 12px" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>
                                    <input type="text" name="status_transaksi" class="textInput" value="{{ $transaksi->status_transaksi }}" style="padding:7px; width: 200px;height:40px;margin-left:10px;margin-bottom: 12px" readonly>
                                     <button type="button" onclick='document.getElementById("terbaru").value = "Dipesan"' style="width: 107px;height:40px;margin-left:10px;margin-bottom: 5px;background-color: #B22222;color: #ffffff">Bayar DP</button>
                                     <button type="button" onclick='document.getElementById("terbaru").value = "Barang Diambil"' style="width: 150px;height:40px;margin-left:10px;margin-bottom: 5px;background-color: #4169E1;color: #ffffff">Barang Diambil</button>
                                     <button type="button" onclick='document.getElementById("terbaru").value = "Selesai"' style="width: 150px;height:40px;margin-left:10px;margin-bottom: 5px;background-color: #228B22;color: #ffffff">Barang Kembali</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Status Terbaru</td>
                                <td>
                                    <input type="text" name="status_baru" class="textInput"  id="terbaru" style="padding:7px; width: 650px;height:40px;margin-left:10px;margin-bottom: 12px" readonly>
                                </td>
                            </tr>
                            
                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" name="update_transaksi" value="Update Status Transaksi" style="width: 650px;height:40px;margin-left:10px;margin-bottom: 5px;background-color: #CC3300;color: #ffffff">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
                </div>
            </section>
        </div>

        <script src="/vendor/jquery/jquery.min.js"></script>
        <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>