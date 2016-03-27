<?php
error_reporting(0);
session_start();
require("controller/place.php");
if(!isset($_SESSION[id])){
  echo "Maaf Anda Harus<a href='index.php'> Login</a>";
}else{
	if(isset($_GET['kodeT'])){
$pla = new place();
$sho = $pla->tampilFoto($_GET['kodeT']);
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
                    <h1 class="page-header">View Photos</h1>
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
			
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
						<div class="container">
							<div id="myCarousel" class="carousel slide" data-ride="carousel">
								<ol class="carousel-indicators">';
									$count = mysqli_query("SELECT COUNT(*) FROM db_gambar WHERE '$kodeT'=kode_tempat_wisata") or die(mysqli_error());
									$count = mysqli_result($count,0);
									for($i=0; $i<$count;$i++){
										echo '<li data-target="##myCarousel" data-slide-to="'.$i.'"'; if($i==0){ echo 'class="active"'; } echo '></li>';
									}
								echo'
								</ol>

								<div class="carousel-inner" role="listbox">';
								while($data = $sho->fetch(PDO::FETCH_OBJ)){
									echo'
									<div class="item active">
										<img src="images/'.$data->nama_ga.'" width="460" height="345">
									</div>

									<div class="item">
										<img src="images/'.$data->nama_ga.'" alt="Chania" width="460" height="345">
									</div>';
								}
									
								echo'
								</div>
									
								<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
								  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
								  <span class="sr-only">Previous</span>
								</a>
								<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
								  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
								  <span class="sr-only">Next</span>
								</a>
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
}

	if(isset($_GET['delete'])){
		$del = $pla->hapusTempat($_GET['delete']);
	}
?>