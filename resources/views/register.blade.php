<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Login RIVAL</title>

	<!-- Bootstrap core CSS -->
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="css/simple-sidebar.css" rel="stylesheet">
</head>
<link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
<body style="background-color: #f0f0f0">
	<div class="container">
		<section>
			<center><h4 style="margin-top: 50px">Register User</h4></center>
			<hr style="width: 450px">

							<form action="/register" method="post" style="margin-top: 30px;margin-left: 360px;">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="form-group">
									<label>Username</label>
									<input type="text" class="form-control" name="username" style="font-size: 12px; width: 400px" placeholder="Masukkan Username Anda" required>
									<label>Email</label>
									<input type="email" class="form-control" name="email" style="font-size: 12px; width: 400px" placeholder="Masukkan Email Anda" required>
									<label>Password</label>
									<input type="password" class="form-control" name="password" style="font-size: 12px; width: 400px" placeholder="Masukkan Password Anda" required>
									<label>Password Again</label>
									<input type="password" class="form-control" name="password2" style="font-size: 12px; width: 400px" placeholder="Ulangi Password Anda" required>
									<label>Phone Number</label>
									<input type="text" class="form-control" name="no_hp" style="font-size: 12px; width: 400px" placeholder="Masukkan Nomor HP Anda" required>
                                    <input type="hidden" name="status" value='customer'>
								</div>
								<Button class="btn btn-danger btn-sm" value="Batal" style="float: left"><a href="/" style="color: white">Batal</a></Button>
								<input name="register_btn" type="submit" class="btn btn-success btn-sm" value="Register" style="float: right;margin-right: 350px" />
							</form>
		</section>
<section>
			<!-- Modal login -->
			<div id="register" class="modal fade" role="dialog" style="margin-top: 4%;">
				<div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-tittle">Register</h4>
							<button type="button" class="close"><a href="index.php" style="color: black">&times;</a></button>
						</div>
						<div class="modal-body">
						</div>
					</div>
				</div>
			</div>
			<!-- End Modal Login -->
		</section>
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>