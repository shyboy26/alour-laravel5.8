<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Profil</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>

<body style="background-color: #f0f0f0">
<div>@include('header_admin')</div>
    <div class="container">
        <section>
            <div class="row">
                <div class="col-sm-12" style="padding-right: 0px">
                    <center><h4>Update Barang</h4></center><hr>
                    <form method="post" action="/admin/data_barang/update/{{ $barang->id_barang }}" style="margin-top: 20%;margin-left: 10%">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <table width="1000px">
<!--                             <tr>
                                <img src="../images/barang/ <?php //echo $array['gambar'];?>" width="300px"/>
                            </tr> -->
                            <tr>
                                <td>Nama Barang</td>
                                <td>
                                    <input type="text" name="nama_barang" class="textInput" value="{{ $barang->nama_barang }}" style="padding:7px; width: 650px;height:40px;margin-left:10px;margin-bottom: 12px">
                                </td>
                            </tr>
                            <tr>
                                <td>Stok</td>
                                <td>
                                    <input type="number" name="stok" class="textInput" value="{{ $barang->stok }}" style="padding:7px; width: 650px;height:40px;margin-left:10px;margin-bottom: 12px">
                                </td>
                            </tr>
                            <tr>
                                <td>Harga</td>
                                <td>
                                    <input type="number" name="harga" class="textInput" value="{{ $barang->harga }}" style="padding:7px; width: 650px;height:40px;margin-left:10px;margin-bottom: 12px">
                                </td>
                            </tr>
                            <tr>
                                <td>Deskripsi</td>
                                <td>
                                    <input type="text" class="textInput" name="deskripsi" value="{{ $barang->deskripsi }}" style="padding:7px; width: 650px;margin-left:10px;margin-bottom: 12px" ></input>
                                </td>
                            </tr>
                            
                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" name="update_barang" value="Update Barang" style="width: 650px;height:40px;margin-left:10px;margin-bottom: 5px;background-color: #CC3300;color: #ffffff">
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