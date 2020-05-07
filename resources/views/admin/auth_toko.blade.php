<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title>Cek Toko</title>
	<link href="/css/bootstrap.min.css" rel="stylesheet">
	<link href="style.css" rel="stylesheet">
</head>
<link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">

<body>
	<div class="container">
		<section>
			<center>
				<h4 style="margin-top: 20%;margin-bottom: 20px">Data Toko Harus Diisi</h4>
				<button class="btn btn-primary btn-sm">	<a href="#" data-toggle="modal" data-target="#tambahtoko" style="color: white">Tambah Toko</a>
				</button>
			</center>
		</section>
		<section>
			<div id="tambahtoko" class="modal fade" role="dialog" style="margin-top: 8%;">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-tittle">Tambah Data Toko</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>
						<div class="modal-body">
							<form action="/admin/toko/buat" method="post">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
								<div class="form-group">
									<label>Nama Toko</label>
									<input type="text" class="form-control" name="nama_toko" style="font-size: 14px" placeholder="Masukkan Nama Toko">
									<label>Alamat</label>
									<input type="text" class="form-control" name="alamat" style="font-size: 14px" placeholder="Masukkan Alamat Toko">
									<label>Lokasi Maps</label>
									<input type="text" class="form-control" name="lokasi_maps" style="font-size: 14px" placeholder="Masukkan Koordinat Lokasi Maps Toko">
									<label>Kategori</label>
									<select class="form-control" name="kategori">
									<option>-Pilih Kategori Toko-</option>
    								<option>Camping & Summit</option>
    								<option>Pakaian Formal</option>
      								<option>Peralatan Pesta</option>
      								<option>Peralatan Pernikahan</option>
      								<option>Properti</option>
    								</select>
								</div>
								<input name="simpan" type="submit" class="btn btn-success btn-sm" value="Submit" style="float: right;margin-top: 10px" />
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	<script type="text/javascript" src="/js/jquery.min.js"></script>
	<script type="text/javascript" src="/js/bootstrap.min.js"></script>
	<script>
		$('#resetpass').modal('show');
	</script>
</body>

</html>
