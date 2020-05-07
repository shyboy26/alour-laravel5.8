<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Tambah Barang</title>
</head>
<body style="background-color: #f0f0f0">
<div>
    @include('header_admin')
</div>
	<div class="container">
		<section>
			<div class="row">
				<div class="col-sm-12" style="padding-right: 0px">
					<center><h4 style="padding-bottom: 10px">Tambah Barang {{session()->get('toko')->id_toko}}</h4></center><hr>
					<h1>{{Session::get('email')}}</h1>
					<form method="post" action="/admin/barang/tambahBarang" enctype="multipart/form-data" style="margin-top: 6%;margin-left: 10%">
                        {{ csrf_field() }}
						{{-- {{ method_field('PUT') }} --}}
					
                        <table width="900px">
							<tr>
								<td>Nama Barang</td>
								<td>
									<input type="text" name="nama_barang" class="textInput" style="width: 600px;height:40px;margin-left:10px;margin-bottom: 7px;padding:5px">
								</td>
							</tr>
							<tr>
								<td>Stok</td>
								<td>
									<input type="number" name="stok" class="textInput" style="width: 600px;height:40px;margin-left:10px;margin-bottom: 7px;padding:5px">
								</td>
							</tr>
							<tr>
								<td>Harga</td>
								<td>
									<input type="number" name="harga" class="textInput" style="width: 600px;height:40px;margin-left:10px;margin-bottom: 7px;padding:5px">
								</td>
							</tr>
							<tr>
								<td>Gambar</td>
								<td>
									<input type="file" name="file" style="width: 600px;height:40px;margin-left:10px;margin-bottom: 7px;padding:5px">
								</td>
							</tr>
							<tr>
								<td>Deskripsi</td>
								<td>
									<input type="textarea" name="deskripsi" class="textInput" style="width: 600px;height:40px;margin-left:10px;margin-bottom: 7px;padding:5px">
                                </td>
							</tr>
							<tr>
								<td>
									<input type="hidden" name="id_toko" class="textInput" style="width: 600px;height:40px;margin-left:10px;margin-bottom: 7px;padding:5px" value="{{session()->get('toko')->id_toko}}">
									<input type="hidden" name="id_user" class="textInput" style="width: 600px;height:40px;margin-left:10px;margin-bottom: 7px;padding:5px" value="{{session()->get('user')->id_user}}">
                                </td>
							</tr>
							<tr>
								<td></td>
								<td>
									<input type="submit" name="tambah" value="Tambah Barang" style="width: 600px;height:40px;margin-left:10px;margin-bottom: 7px;background-color: #ab0909;color: #ffffff">
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