<?php
error_reporting(0);
session_start();
require('controller/place.php');
if(!isset($_SESSION[id])){
  echo "Maaf Anda Harus<a href='index.php'> Login</a>";
}else{
	if(isset($_GET['kodeT'])){
$pla = new place();
$tempat = $pla->editTempat($_GET['kodeT']);
$edit = $tempat->fetch(PDO::FETCH_OBJ);
echo '
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
                <a class="navbar-brand" href="dashboard.html">ngeTRIP! Admin</a>
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
                    <h1 class="page-header">Edit Places</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Places
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" method="POST">
                                        <div class="form-group">
                                            <label for="disabledSelect">Place Code</label>
                                            <input class="form-control" type="text" name="kodeT" value="'.$edit->kode_tempat_wisata.'" readonly>
                                        </div>
										<div class="form-group">
                                            <label for="disabledSelect">Place Name</label>
                                           <input class="form-control" type="text" name="nama" value="'.$edit->nama_tempat_wisata.'">
                                        </div>
										<div class="form-group">
                                            <label for="disabledSelect">City</label>
                                            <input class="form-control" type="text" name="kota" value="'.$edit->kota.'" readonly>
                                        </div>
										<div class="form-group">
                                            <label for="disabledSelect">Province</label>
                                            <input class="form-control" type="text" name="provinsi" value="'.$edit->provinsi.'" readonly>
                                        </div>
										<div class="form-group">
                                            <label for="disabledSelect">Type of Place</label>
                                            <input class="form-control" type="text" name="tipe" value="'.$edit->jenis_tempat.'" readonly>
                                        </div>
										<div class="form-group">
                                            <label>Description</label>
                                            <textarea name="deskrip" class="form-control" rows="5">'.$edit->deskripsi.'</textarea>
                                        </div>
										<br>
                                        <button type="submit" name="updateTempat" value="Update" class="btn btn-info"><i class="fa fa-wrench fa-lg"></i>  Update</button>
										<button type="submit" name="cancel" value="Cancel" class="btn btn-danger"><i class="fa fa-ban fa-lg"></i> Cancel</button>
                                    </form>
                                </div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/admin.js"></script>

</body>

</html>
';
}
}  
 
if(isset($_POST['updateTempat'])){
    $kodeT = $_POST['kodeT'];
    $nama = $_POST['nama'];
    $provinsi = $_POST['provinsi'];
    $kota = $_POST['kota'];
    $tipe = $_POST['tipe'];
    $deskrip = $_POST['deskrip'];
    
    $pla = new place();
    $upd = $pla->updateTempat($kodeT, $nama, $provinsi, $kota, $deskrip);
    if($upd == "Success"){
        echo "<script>alert('Update Place Successfull!');lihatTempat.php;</script>";
    }
}else{
    if(isset($_POST['cancel'])){
        header('Location: lihatTempat.php');
    }
}
?>
