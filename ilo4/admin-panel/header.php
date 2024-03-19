<?php include '../system/connect.php';
session_start(); 
// Oturum Güvenliği
    $users=$db->prepare("SELECT * FROM users");
    $users->execute();
    $user_check = $users->fetch(PDO::FETCH_ASSOC);
    if (empty($_SESSION['user_username'])) {
        header("Location:login.php");
        exit;
    } 
    else {
        $user_que=$db->prepare("SELECT * FROM users WHERE user_username=:user_username");
        $user_que->execute(array('user_username'=>$_SESSION['user_username']));
        $result=$user_que->rowcount();
        if ($result==0) {
            header("Location:login.php");
        }    
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Makale Durağı</title>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <!-- Css Styles -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="../css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
</head>
<body>
    <!-- Sayfa Başlangıcı -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
   <!-- Header Başlangıcı -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> ilhamiyilmaz@gmail.com</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a><i class="fa fa-facebook"></i></a>
                                <a><i class="fa fa-twitter"></i></a>
                                <a><i class="fa fa-linkedin"></i></a>
                                <a>Hoş Geldin <b><?php echo $_SESSION["user_username"] ?></b></a>
                                <a href="logout.php">Çıkış Yap</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header_logo">
                        <a href="./index.php"><img src="../img/logo1.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-9">
                    <nav class="header__menu">
                        <ul>
                            <li><a href="index.php">Ana Sayfa</a></li>
                            <li><a href="blog.php">Makale Nasıl Yazılır ?</a></li>
                            <li><a href="max-download.php">EN ÇOK İNDİRİLENLER</a></li>
                            <li><a href="contact.php">İLETİŞİM</a></li>
                            <li><a href="admin/index.php">PANEL</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-12">
                    <div class="header__cart">
                        <ul>
                            <li><a href="shoping-cart.php"><i class="fa fa-shopping-bag"></i></a></li>
                        </ul>
                        <?php 
                        $user_id= $_SESSION['user_id'];
                        $wallet=$db->prepare("SELECT * FROM users INNER JOIN wallet ON users.user_id = wallet.wallet_user_id WHERE user_id=?");
                        $wallet->execute(array($user_id));
                        $wallet_check = $wallet->fetch(PDO::FETCH_ASSOC);
                           
                        ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </header>

