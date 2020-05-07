<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Hapus Data Toko</title>
	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="style.css" rel="stylesheet">
</head>
<link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
<body>
	<div class="container">
		<section>
			<!-- Modal login -->
			<div id="konfirmdelete" class="modal fade" role="dialog">
				<div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-tittle">Konfirmasi Hapus Toko</h4>
							<button type="button" class="close"><a href="list_toko.php" style="color: black">&times;</a></button>
						</div>
						<div class="modal-body">
								<div class="form-group">
									<label>Hapus data toko ini ?</label>
									
								</div>
								
								<!--<input name="btn_batal_toko" type="submit" class="btn btn-success btn-sm" value="Batal" style="float: right;width: 80px" />
								<input name="btn_delete_toko" type="submit" class="btn btn-danger btn-sm" value="Hapus" style="float: right;margin-right: 10px;width: 80px" />
                                -->
                            <button class="btn btn-success btn-sm"><a href='/founder/list_toko'>Batal</a></button>
                            <button class="btn btn-success btn-sm"><a href='/founder/delete_toko/{{ $id }}'>Hapus</a></button>
						</div>
					</div>
				</div>
			</div>
			<!-- End Modal Login -->
		</section>
	</div>

	<!-- Bootstrap core JavaScript -->
	<script src="/vendor/jquery/jquery.min.js"></script>
	<script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script>
		$('#konfirmdelete').modal('show');
	</script>
</body>
</html>