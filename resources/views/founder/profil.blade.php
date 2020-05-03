<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Tambah Jadwal</title>
	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="style.css" rel="stylesheet">
</head>

<body style="background-color: #f0f0f0">
<div>@include('header_founder')</div>
	<div class="container">
		<section>
			<div class="row">
				<div class="col-sm-12" style="padding-right: 0px">
					<center><h4 style="margin-top: 1%;padding-bottom: 19px" >Profil</h4></center><hr>
					<center>
						<form method="post" action="/founder/user_updating/{{ $user->id_user }}" style="margin-top: 3%;margin-left: 2%">
							{{ csrf_field() }}
                            {{ method_field('PUT') }}
							<table width="950px">
								<tr>
									<td>Username</td>
								</tr>
								<tr>
									<td>
										<input type="text" name="username" value="{{ $user->username }}" class="textInput" style="width: 900px;height:30px;margin-bottom: 5px;padding: 5px">
									</td>
								</tr>
								<tr>
									<td>Password</td>
								</tr>
								<tr>
									<td>
										<input type="password" name="password" value="" class="textInput" style="width: 900px;height:30px;margin-bottom: 5px;padding: 5px">
									</td>
								</tr>
								<tr>
									<td>Password Confirm</td>
								</tr>
								<tr>
									<td>
										<input type="password" name="password2" value="" class="textInput" style="width: 900px;height:30px;margin-bottom: 5px;padding: 5px">
									</td>
								</tr>
								<tr>
									<td>Email</td>
									</tr>
									<tr>
										<td>
											<input type="text" name="email" value="{{ $user->email }}" class="textInput" style="width: 900px;height:30px;margin-bottom: 5px;padding: 5px">
										</td>
									</tr>
									<tr>
										<td>No HP</td>
									</tr>
									<tr>
										<td>
											<input type="text" name="nomer_hp" value="{{ $user->no_hp }}" class="textInput" style="width: 900px;height:30px;margin-bottom: 25px;padding: 5px">
											<input type="hidden" name="status" value="{{ $user->status }}">
										</td>
									</tr>
									<tr>
										<td>
											<input type="submit" name="update_admin" value="Simpan Perubahan" style="width: 900px;height:30px;margin-bottom: 5px;background-color: #ab0909;color: #ffffff">
										</td>
									</tr>
								</table>
							</form>
						</center>
						
					</div>
					
				</div>
			</section>
		</div>

		<script src="/vendor/jquery/jquery.min.js"></script>
		<script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	</body>
</html>