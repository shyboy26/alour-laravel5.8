<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Sewa Barang</title>
    <style>
    .sewa-barang{
        display:grid;
        grid-template-columns:30% 70%;
    }
    .sewa-barang >div{
        padding:1em;
    }
    </style>
</head>
<body style="background-color: #f0f0f0">
<div>
    @include('header_customer')
</div>
	<div class="container">
		<section>
			<div class="row">
				<div class="col-sm-12" style="padding-right: 0px">
					<center><h4 style="padding-bottom: 10px">Sewa Barang</h4></center><hr>
                    <div class="sewa-barang">
                        <div>
                            <img src="{{ $barang->gambar }}" height="150"><br>
                            <p><b>{{ $barang->nama_barang }}</b></p>
                            <p>Rp {{ $barang->harga }}</p>
                        </div>
                        <div>
                            <form method="post" action="/customer/sewa_proses">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <table width="600px">
                                <input type="hidden" name="id_barang" value="{{ $barang->id_barang }}">
                                <tr>
                                    <td>Tanggal digunakan</td>
                                    <td>
                                        <input type="date" name="tgl_digunakan" class="textInput" style="width: 300px;height:40px;margin-left:10px;margin-bottom: 7px;padding:5px">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tanggal kembali</td>
                                    <td>
                                        <input type="date" name="tgl_kembali" class="textInput" style="width: 300px;height:40px;margin-left:10px;margin-bottom: 7px;padding:5px">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Durasi sewa</td>
                                    <td>
                                        <input type="text" name="durasi" class="textInput" style="width: 300px;height:40px;margin-left:10px;margin-bottom: 7px;padding:5px">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jumlah barang dipinjam</td>
                                    <td>
                                        <input type="text" name="jumlah" class="textInput" style="width: 300px;height:40px;margin-left:10px;margin-bottom: 7px;padding:5px">
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="submit" name="register_btn" value="Sewa Barang" style="width: 300px;height:40px;margin-left:10px;margin-bottom: 7px;background-color: #ab0909;color: #ffffff">
                                    </td>
                                </tr>
                            </table>
                            </form>
                        </div>
                    </div>
				</div>
			</div>
		</section>
	</div>

	<script src="/vendor/jquery/jquery.min.js"></script>
	<script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>