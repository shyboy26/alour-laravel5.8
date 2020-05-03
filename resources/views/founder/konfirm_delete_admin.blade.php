<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Hapus Admin</title>
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
							<h4 class="modal-tittle">Konfirmasi Hapus Admin Toko</h4>
							<button type="button" class="close"><a href="/list/admin" style="color: black">&times;</a></button>
						</div>
						<div class="modal-body">
							
								<div class="form-group">
									<label>Hapus data admin toko ini ? Data toko yang berkaitan juga akan terhapus!</label>
									
								</div>
								
								<!--<input name="btn_batal" type="submit" class="btn btn-success btn-sm" value="Batal" style="float: right;width: 80px" />
								<input name="btn_delete_admin" type="submit" class="btn btn-danger btn-sm" value="Hapus" style="float: right;margin-right: 10px;width: 80px" />
                            -->
                            <button class="btn btn-success btn-sm"><a href='/founder/list/admin'>Batal</a></button>
                            <button class="btn btn-success btn-sm"><a href='/founder/delete/{{ $id }}'>Hapus</a></button>
						</div>
					</div>
				</div>
			</div>
			<!-- End Modal Login -->
		</section>
	</div>

	<!-- Bootstrap core JavaScript -->
	<script src="../js/jquery/jquery.min.js"></script>
	<script src="../js/bootstrap/bootstrap.bundle.min.js"></script>
	<script>
		$('#konfirmdelete').modal('show');
	</script>
</body>
</html>
