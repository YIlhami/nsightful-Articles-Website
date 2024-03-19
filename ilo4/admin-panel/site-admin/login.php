<?php include '../../system/connect.php'; 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
    	<meta name="description" content="Ogani Template">
    	<meta name="keywords" content="Ogani, unica, creative, html">
   		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>Giriş Yap</title>
        <link href="../../css/bootstrap.min.css" rel="stylesheet">
        <link href="../../css/metisMenu.min.css" rel="stylesheet">
        <link href="../../css/startmin.css" rel="stylesheet">
        <link href="../../css/font-awesome.min.css" rel="stylesheet" type="text/css">
    </head>
    <body> 
		<div class="container" style="margin-left: 550px;">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                	<div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-sign-in"></i> ADMİN GİRİŞİ</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" action="../operations.php" method="POST">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Kullanıcı Adı" name="site_admin_username" type="text" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Şifre" name="site_admin_password" type="password">
                                    </div>
                                    <button type="sumbit" name="admin" class="btn btn-lg btn-success btn-block">Giriş Yap</button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="../../js/jquery.min.js"></script>
		<script src="../../js/bootstrap.min.js"></script>
		<script src="../../js/metisMenu.min.js"></script>
		<script src="../../js/startmin.js"></script>
	</body>
</html>
