<?php

	//connect to database
/*include "_config_/koneksi.php";

if(!isset($_SESSION)) 
{ 
	session_start(); 
} 

if (isset($_POST['login_btn'])) {
	$username = $_POST['username'];
	$password = md5($_POST['password']);


	$_SESSION['username'] = $username;
	$sql = "SELECT * from user WHERE username = '$username' AND password = '$password'";
	$result = mysqli_query($db, $sql);
	$data = mysqli_fetch_array($result);
	$level = $data['status'];
	$id = $data['id_user'];
	$_SESSION['id_admin'] = $id;
	if (mysqli_num_rows($result)== 1) {

		if ($level == "founder") {
				//echo("{$_SESSION['id_admin']}");
			header("location: _founder_/list_admin.php");
		} elseif ($level == "customer") {
			header("location: _customer_/index.php");
		} else {
			header("location: _dashboard_/tambah_toko.php");
		}

	} else {
		echo '  <script type="text/javascript">
		alert("Kombinasi Password dan Username Tidak Sesuai");
		window.history.back();
		</script>';
	}
}*/
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>ALOUR</title>

	<!-- Bootstrap core CSS -->
	<link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="/css/simple-sidebar.css" rel="stylesheet">
</head>
<link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
<body style="background-image:url(images/BG-Login.jpg);background-size: cover; background-repeat: no-repeat;background-position: center">
	<div class="container">
		<section>
			<div class="header">
				<div class="row" style="width: 85%;text-align: center;vertical-align: center;margin: 6%;margin-top: 14%">
					<div class="col-sm-7" style="padding: 0px">
						<div class="content" style="background-color: #FFEBCD">
							<img src="images/alour2.png" 
							style="width: 35%;margin-right: 0px; margin-bottom: 75px; margin-top: 60px">
						</div>
					</div>
					<div class="col-sm-5" style="background-color: #E9967A;padding: 7px">
						<form method="post" action="/login" >
							{{ csrf_field() }}
                            {{ method_field('GET') }}
							<h4 style="background-color: #B22222;padding: 10px;padding-top: 5px;font-size: 20px; color: white">Log In User</h4>
							<center>
								<table style="margin-top: 10%;position: relative;">
									<tr>
										<td style="font-size: 14px">Username :</td>
									</tr>
									<tr>
										<td><input type="text" name="email" class="textInput"></td>
									</tr>
									<tr>
										<td style="font-size: 14px">Password :</td>
									</tr>
									<tr>
										<td><input type="password" name="password" class="textInput"></td>
									</tr>
									<tr>
										<td><input type="submit" class="btn btn-danger btn-sm" name="login_btn" value="Login" style="margin-top: 10px;width: 177px"></td>
									</tr>
								</table>
							</center>
						</form>
						<p id='login-gagal' style="color:red; font-size:14px"></p>
						<p style="font-size: 14px;margin-top: 5px">Forget Password? <a href="#" data-toggle="modal" data-target="#resetpass" style="color: white">Click Here</a><br>
							<a href="/form_register" style="color: white">Register</a>
						</p>
					</div>
				</div>
			</div>	
		</section>
		<section>
			<!-- Modal login -->
			<div id="resetpass" class="modal fade" role="dialog" style="margin-top: 8%;">
				<div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-tittle">Forget Password</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>
						<div class="modal-body">
							<form action="PHPMailer-5.2.13/index.php" method="post">
								<div class="form-group">
									<label>Username</label>
									<input type="text" class="form-control" name="username" style="font-size: 14px" placeholder="Masukkan Username Anda">
								</div>
								<input name="reset_pass" type="submit" class="btn btn-success btn-sm" value="Submit" style="float: right;" />
							</form>
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
</body>
</html>
