<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Konfirmasi Hapus Barang</title>
	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="style.css" rel="stylesheet">
</head>
<link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
<body>
	<div class="container">
		<section>
			<div id="konfirmdelete" class="modal fade" role="dialog">
				<div class="modal-dialog">

					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-tittle">Konfirmasi Hapus Transaksi</h4>
							<button type="button" class="close"><a href="data_barang.php" style="color: black">&times;</a></button>
						</div>
						<div class="modal-body">
							<form action="/admin/data_sewa/delete/{{ $id }}" method="post">
								{{ csrf_field() }}
								{{ method_field('PUT') }}
								<div class="form-group">
									<label>Yakin ingin menghapus transaksi ini ? transaksi akan otomatis dibatalkan</label>
									
								</div>
								
								<input name="btn_batal_transaksi" type="submit" class="btn btn-success btn-sm" value="Batal" style="float: right;width: 80px" />
								<input name="btn_delete_transaksi" type="submit" class="btn btn-danger btn-sm" value="Hapus" style="float: right;margin-right: 10px;width: 80px" />
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	<script src="/vendor/jquery/jquery.min.js"></script>
	<script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script>
		$('#konfirmdelete').modal('show');
	</script>
</body>
</html>
