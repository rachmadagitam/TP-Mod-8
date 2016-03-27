<?php
error_reporting(0);
session_start();
if(!isset($_SESSION[id])){
  echo "Maaf Anda Harus<a href='index.php'> Login</a>";
}else{
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
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">View Places</h1>
                </div>
            </div>
			<div class="row">
				<div class="col-lg-5">
					<div class="input-group custom-search-form">
						<input type="text" class="form-control" placeholder="Search Place" name="cari">
						<span class="input-group-btn">
							<a class="btn btn-default" href="cariTempat.php?cari=$data->nama_tempat_wisata"><i class="fa fa-search"></i></a>
						</span>
					</div>
				</div>
			</div>
			<div class="panel">
			</div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-globe fa-fw"></i> View Places
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped" >
                                    <thead>
                                        <tr>
                                            <th width="100">Place Code</th>
                                            <th width="125">Place Name</th>
											<th width="150">Type of Place</th>
											<th width="350">Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
									
									require("controller/place.php");
									$pla = new place();
									$show = $pla->tampilTempat();
									while($data = $show->fetch(PDO::FETCH_OBJ)){
										echo "
                                        <tr>
                                            <td>$data->kode_tempat_wisata</td>
											<td>$data->nama_tempat_wisata</td>
                                            <td>$data->jenis_tempat</td>
                                            <td>$data->deskripsi</td>
											<td><a class='btn btn-info' href='lokasi.php?$data->kode_tempat_wisata'><i class='fa fa-map-marker fa-lg'></i> Lihat Lokasi</a></td>
											<td><a class='btn btn-danger' href='lihatTempat.php?delete=$data->kode_tempat_wisata'><i class='fa fa-trash-o fa-lg'></i> Delete</a></td>
											<td><a class='btn btn-info' href='editPlace.php?kodeT=$data->kode_tempat_wisata'><i class='fa fa-pencil-square-o fa-lg'></i> Edit</td>
											<td><a class='btn btn-info' href='lihatFoto.php?kodeT=$data->kode_tempat_wisata'><i class='fa fa-photo fa-lg'></i>   View Photos</td>
                                        </tr>";
									};
									
									echo '
                                    </tbody>
                                </table>
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
</html>';
}

	if(isset($_GET['delete'])){
		$del = $pla->hapusTempat($_GET['delete']);
	}
?>
