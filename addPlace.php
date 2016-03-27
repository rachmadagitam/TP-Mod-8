<?php
error_reporting(0);
session_start();
if(!isset($_SESSION[id])){
  echo "Maaf Anda Harus<a href='index.php'> Login</a>";
}else{

	echo'
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ngeTRIP! Admin</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/metisMenu.min.css" rel="stylesheet">
    <link href="assets/css/timeline.css" rel="stylesheet">
    <link href="assets/css/admin.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div id="wrapper">
		<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="dashboard.php">ngeTRIP! Admin</a>
            </div>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                        </li>
                        <li>
                            <a href="dashboard.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="addPlace.php"><i class="fa fa-location-arrow fa-fw"></i> Add New Places</a>
                        </li>
						<li>
                            <a href="lihatTempat.php"><i class="fa fa-globe fa-fw"></i> View Places</a>
                        </li>
                        <li>
                            <a href="viewUsers.php"><i class="fa fa-users fa-fw"></i> View Users</a>
                        </li>
						<li>
							<a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Log Out</a>
						</li>
                    </ul>
                </div>
            </div>
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add New Places</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add New Places
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div id="map">
                                      <script src="assets/js/peta.js"></script>
                                    </div>    
                                </div>
                            </div>
                            <br>
                            <div class="row">                                
                                <div class="col-lg-6">
                                    <form role="form" method="POST" name="formTambah" id="formA" onsubmit="return validasi_input(this)" >
                                        <div class="form-group">
                                            <label>Latitude</label>
                                            <input name="lat" class="form-control" placeholder="Pick from the Map" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Longitude</label>
                                            <input name="lng" class="form-control" placeholder="Pick from the Map" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Place Code</label>
                                            <input name="kodeT" class="form-control" placeholder="Place Code" required>
                                        </div>
										<div class="form-group">
                                            <label>Place Name</label>
                                            <input name="nama" class="form-control" placeholder="Place Name" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Province</label>
                                            <select name="provinsi" class="form-control">
												<option value="pilih">- Select Province -</option>
                                                <option>Aceh</option>
												<option>Bali</option>
												<option>Banten</option>
												<option>Bengkulu</option>
												<option>DKI Jakarta</option>
												<option>Gorontalo</option>
												<option>Jambi</option>
												<option>Jawa Barat</option>
												<option>Jawa Timur</option>
												<option>Jawa Tengah</option>
												<option>Kalimantan Barat</option>
												<option>Kalimantan Selatan</option>
												<option>Kalimantan Tengah</option>
												<option>Kalimantan Timur</option>
												<option>Kalimantan Utara</option>
												<option>Kep. Bangka Belitung</option>
												<option>Kep. Riau</option>
												<option>Lampung</option>
												<option>Maluku</option>
												<option>Maluku Utara</option>
												<option>Nusa Tenggara Barat</option>
												<option>Nusa Tenggara Timur</option>
												<option>Papua</option>
												<option>Papua Barat</option>
												<option>Riau</option>
												<option>Sulawesi Barat</option>
												<option>Sulawesi Selatan</option>
												<option>Sulawesi Tengah</option>
												<option>Sulawesi Tenggara</option>
												<option>Sulawesi Utara</option>
												<option>Sumatera Barat</option>
												<option>Sumatera Selatan</option>
												<option>Sumatera Utara</option>
												<option>Yogyakarta</option>
                                            </select>
                                        </div>
										<div class="form-group">
                                            <label>City</label>
                                            <input name="kota" class="form-control" placeholder="City" required>
                                        </div>
										<div class="form-group">
                                            <label>Type of Place</label>
                                            <select name="tipe" class="form-control">
												<option value="pilih">- Select Type -</option>
                                                <option>Tourist Object</option>
                                                <option>Restaurant</option>
                                                <option>Hotel</option>
                                            </select>
                                        </div>
										<div class="form-group">
                                            <label>Description</label>
                                            <textarea name="deskrip" class="form-control" rows="5" required></textarea>
                                        </div>
                                        <br>

                                        <button type="submit" name="tambahTempat" value="Tambah" class="btn btn-info"><i class="fa fa-plus-square fa-fw"></i> Add Place</button>
                                        <button type="reset" name="reset" value="Reset" class="btn btn-danger"><i class="fa fa-ban fa-fw"></i> Reset</button>
                                    </form>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD4x5rGxELp3QOKlTxOdvChzcsSig3b3Kw&callback=initMap"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/admin.js"></script>
	<script type="text/javascript">
		function validasi_input(form){
			var maxcar = 5;
			if (form.kodeT.value.length > maxcar){
				alert("Place Code Length Must Be 5 Characters");
				form.kodeT.focus();
				return (false);
			}
			if (form.kodeT.value != ""){
				var x = (form.kodeT.value);
				var status = true;
				var list = new Array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
				for (i=0; i<=x.length-1; i++){
					if (x[i] in list) cek = true;
					else cek = false;
					status = status && cek;
				}
				if (status == false){
					alert("Place Code Must Be Filled With Number!");
					form.kodeT.focus();
					return false;
				}
			}
			if (form.provinsi.value =="pilih"){
				alert("Province Must Be Selected!");
				return (false);
			}
			if (form.tipe.value =="pilih"){
				alert("Type of Place Must Be Selected!");
				return (false);
			}
		return (true);
		
		}
	</script>

</body>

</html>';
}

require('controller/place.php');
if(isset($_POST['tambahTempat'])){
    $lat = $_POST['lat'];
    $lng =$_POST['lng'];
    $kodeT = $_POST['kodeT'];
    $nama = $_POST['nama'];
    $provinsi = $_POST['provinsi'];
    $kota = $_POST['kota'];
    $tipe = $_POST['tipe'];
    $deskrip = $_POST['deskrip']; 
     
    $pla = new place();
    $add = $pla->tambahTempat($lat, $lng, $kodeT, $nama, $provinsi, $kota, $tipe, $deskrip);
    if($add == "Success"){
        echo "<script>alert('Add Place Successfull!');lihatTempat.php;</script>";
    }else{
        echo "<script>alert('Add Place Failed!');history.go(-1);</script>";
    }
}
	
?>