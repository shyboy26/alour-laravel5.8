<?php
//include "/views/header_founder.blade.php";
/*include "../_config_/koneksi.php";

if (isset($_POST['register_btn'])) {
		// session_start();
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$password = mysqli_real_escape_string($db, md5($_POST['password']));
	$password2 = mysqli_real_escape_string($db, md5($_POST['password2']));
	$nomer_hp = mysqli_real_escape_string($db, $_POST['nomer_hp']);
	if (empty($_POST["username"]) or empty($_POST["email"]) or empty($_POST["password"]) or empty($_POST["password2"]) or empty($_POST["nomer_hp"])) {
		echo '  <script type="text/javascript">
		alert("Data Tidak Boleh Kosong");
		window.history.back();
		</script>';
	} else{
		$cekdata = "SELECT username from user WHERE username = '$username'";
		$ada = mysqli_query($db, $cekdata) or die(mysqli_error($db));
		if (mysqli_num_rows($ada)>0) {
			// die("Username telah terdaftar");
			echo '  <script type="text/javascript">
			alert("Username Telah Terdaftar");
			window.history.back();
			</script>';
		} else {
			$cek_email = "SELECT email from user WHERE email = '$email'";
			$ada_email = mysqli_query($db,$cek_email);
			if (mysqli_num_rows($ada_email)>0) {
				echo '  <script type="text/javascript">
				alert("Email Telah Terdaftar");
				window.history.back();
				</script>';
			} else{

				if ($password == $password2) {
				//create user
					$password = ($password);
					$sql = "INSERT INTO user (id_user, username, password, email, no_hp, status) VALUES ('','$username','$password','$email','$nomer_hp','admin')";
					mysqli_query($db, $sql);
					echo '  <script type="text/javascript">
					alert("Data Admin Berhasil Ditambahkan");
					window.location = "list_admin.php";
					</script>';
				} else {
					echo '  <script type="text/javascript">
					alert("Password Confirm Tidak Sesuai");
					window.history.back();
					</script>';
				}
			}
		}
	}
}*/
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Register Admin</title>
	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="style.css" rel="stylesheet">
</head>
<body style="background-color: #f0f0f0">
<div>
    @include('header_founder')
</div>
	<div class="container">
		<section>
			<div class="row">
				<div class="col-sm-12" style="padding-right: 0px">
					<center><h4 style="padding-bottom: 10px">Tambah Admin Toko</h4></center><hr>
					<form method="post" action="/register" style="margin-top: 6%;margin-left: 10%">
                        {{ csrf_field() }}
                        <table width="900px">
							<tr>
								<td>Username</td>
								<td>
									<input type="text" name="username" class="textInput" placeholder=" Username" style="width: 600px;height:40px;margin-left:10px;margin-bottom: 7px;padding:5px">
								</td>
							</tr>
							<tr>
								<td>Email</td>
								<td>
									<input type="email" name="email" class="textInput" placeholder=" Admin@email.com" style="width: 600px;height:40px;margin-left:10px;margin-bottom: 7px;padding:5px">
								</td>
							</tr>
							<tr>
								<td>Password</td>
								<td>
									<input type="password" name="password" class="textInput" placeholder=" Password untuk admin" style="width: 600px;height:40px;margin-left:10px;margin-bottom: 7px;padding:5px">
								</td>
							</tr>
							<tr>
								<td>Password Again</td>
								<td>
									<input type="password" name="password2" class="textInput" placeholder=" Ulangi password" style="width: 600px;height:40px;margin-left:10px;margin-bottom: 7px;padding:5px">
								</td>
							</tr>
							<tr>
								<td>Phone Number</td>
								<td>
									<input type="text" name="no_hp" class="textInput" placeholder=" Isi dengan angka" style="width: 600px;height:40px;margin-left:10px;margin-bottom: 7px;padding:5px">
                                    <input type="hidden" name="status" value="admin">
                                </td>
							</tr>
							<tr>
								<td></td>
								<td>
									<input type="submit" name="register_btn" value="Register" style="width: 600px;height:40px;margin-left:10px;margin-bottom: 7px;background-color: #ab0909;color: #ffffff">
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

<?php
//include "../_include_/footer.php";
?>