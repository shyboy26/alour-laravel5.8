<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Update Admin</title>
	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="style.css" rel="stylesheet">
</head>
<link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
<body>
<div>@include('header_founder')</div>
	<div class="container" id="updateadmin">
		<section>
			<center><h4>Data Admin Toko</h4></center>

			<form action="/founder/user_updating/{{ $user->id_user }}" method="post" style="margin-top: 30px">
				{{ csrf_field() }}
                {{ method_field('PUT') }}
				<div class="form-group">
					<label>Username</label>
					<input type="text" class="form-control" name="username" style="font-size: 14px" value="{{ $user->username }}">
					<label>Email</label>
					<input type="text" class="form-control" name="email" style="font-size: 14px" value="{{ $user->email }}">
					<label>Nomer HP</label>
					<input type="text" class="form-control" name="nomer_hp" style="font-size: 14px" value="{{ $user->no_hp }}">
					<label>Status</label>
					<input type="text" class="form-control" name="status" style="font-size: 14px" readonly value="{{ $user->status }}">
					<input type="hidden" name="password" value="{{ $user->password }}">
				</div>
				<input name="update_admin" type="submit" class="btn btn-success btn-sm" value="Simpan" style="float: right;" />
				<button class="btn btn-primary btn-sm"><a href="/founder/list/admin" style="color: white">Kembali</a></button>
			</form>
		</section>
	</div>

	<!-- Bootstrap core JavaScript -->
	<script src="/vendor/jquery/jquery.min.js"></script>
	<script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
