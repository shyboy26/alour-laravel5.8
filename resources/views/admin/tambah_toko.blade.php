<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Profil</title>
    <!-- Bootstrap --><!--
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">-->
</head>

<body style="background-color: #f0f0f0">
<div>@include('header_admin')</div>
    <div class="container">
        <section>
            <div class="row">
                <div class="col-sm-12" style="padding-right: 0px">
                    <center><h4>Buat Toko</h4></center><hr>
                    <form method="post" action="data_toko.php" style="margin-top: 5%;margin-left: 5%">
                        <table width="1000px">
                            <tr>
                                <td>Nama Toko</td>
                                <td>
                                    <input type="text" name="nama_toko" class="textInput" value="" style="padding:7px; width: 650px;height:40px;margin-left:10px;margin-bottom: 12px">
                                </td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>
                                    <input type="text" name="alamat" class="textInput" value="" style="padding:7px; width: 650px;height:40px;margin-left:10px;margin-bottom: 12px">
                                </td>
                            </tr>
                            <tr>
                                <td>Koordinat Lokasi Maps Toko</td>
                                <td>
                                    <input type="text" name="maps" class="textInput" value="" style="padding:7px; width: 650px;height:40px;margin-left:10px;margin-bottom: 12px">
                                </td>
                            </tr>
                            <tr>
                                <td>Kategori Toko</td>
                                <td>
                                    <select name="kategori" style="width: 650px;height:40px;margin-left:10px;margin-bottom: 25px">
                                    <option><?php echo 'Pilih'; ?></option>
                                    <option>Camping & Summit</option>
                                    <option>Pakaian Formal</option>
                                    <option>Peralatan Pesta</option>
                                    <option>Peralatan Pernikahan</option>
                                    <option>Properti</option>
                                    </select>
                                </td>
                            </tr>
                            
                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" name="update_toko" value="Buat Toko" style="width: 650px;height:40px;margin-left:10px;margin-bottom: 5px;background-color: #CC3300;color: #ffffff">
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