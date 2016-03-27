
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ngeTRIP! Admin Login</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/metisMenu.min.css" rel="stylesheet">
    <link href="assets/css/admin.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                  <img class="logo" src="assets/img/logo.png" width="250" height="300">  
                  <div class="panel-heading">
                    <h3 class="panel-title" align="center">ngeTRIP! Admin Login</h3>
                  </div>
                  <div class="panel-body">
                      
                  </div>
                    <div class="panel-body">
                        <form role="form" action="loginConn.php" method="post">
                            <fieldset>
                                <div class="form-group">
									<div class="input-group margin-bottom-sm">
										<span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
										<input class="form-control" placeholder="Username" name="usrname" type="username" required>
									</div>
                                </div>
                                <div class="form-group">
									<div class="input-group margin-bottom-sm">
										<span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
										<input class="form-control" placeholder="Password" name="passwd" type="password" required>
									</div>
                                </div>
                                <button type="submit" name="login" value="Login" class="btn btn-info"><i class="fa fa-sign-in fa-fw"></i> Login</button>
                            </fieldset>
                        </form>
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
