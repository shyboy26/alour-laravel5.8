<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Tambah Barang</title>
	<style>
	.barang{
        display:grid;
        grid-template-columns:70% 30%;
        grid-gap:1em;
    }
	.barang > div:nth-child(odd){
		padding:1em;
		background-color:white;
	}
	</style>
	<script src="http://maps.googleapis.com/maps/api/js"></script>
	<script>
		function initialize() {
			var propertiPeta = {
				center:new google.maps.LatLng({{ $barang->toko->lokasi_maps }}),
				zoom:15,
				mapTypeId:google.maps.MapTypeId.ROADMAP
			};
			var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
			// membuat Marker
			var marker=new google.maps.Marker({
				position: new google.maps.LatLng({{ $barang->toko->lokasi_maps }}),
				map: peta
			});
		}
		// event jendela di-load  
		google.maps.event.addDomListener(window, 'load', initialize);
	</script>
</head>
<body style="background-color: #f0f0f0">
<div>
    @include('header_customer')
</div>
	<div class="container">
		<section>
			<div class="row">
				<div class="col-sm-12" style="padding-right: 0px">
					<h4 style="padding-bottom: 10px">Kursi Lipat</h4><hr>
					<div class='barang'>
						<div>
							<img src='{{ $barang->gambar }}' height='250'>
							<table>
							<tr>
							<td><h5>Harga : Rp{{ $barang->harga}}</h5></td>
							</tr>
							<tr><td><b>Deskripsi Produk</b></td></tr>
							<tr>
							<td>{{ $barang->deskripsi }}</td>
							</tr>
							</table>
						</div>
						<div>
							<button style='background-color:#228B22; height:60px; width:100px;'> 
							<a href='/customer/sewa/{{ $barang->id_barang }}'><font color='#ffffff'>Sewa</font></a> </button><br><br>
							<p>Atau hubungi pemilik terlebih dahulu?<br>
							{{ $barang->toko->user->username }} : {{ $barang->toko->user->no_hp }}</p>
							<!-- Bagian Maps -->
							<div id="googleMap" style="width:100%;height:380px;"></div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

	<script src="/vendor/jquery/jquery.min.js"></script>
	<script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>