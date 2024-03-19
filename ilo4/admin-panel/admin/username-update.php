<?php include '../../system/connect.php'; ?>
<?php include 'header.php'; ?>
<?php include 'sidebar.php'; 
session_start();
ob_start();
    $user_username = $_SESSION['user_username'];
    if (!$_SESSION['user_username']) {
        echo "<script type='text/javascript'>alert('Erişim izni için lütfen giriş yapınız!');</script>";
        header("Refresh: 0.1; url=../login.php");
        exit();
    }
?>
<!--Profil Ayarları Formu Başlangıcı-->
<div class="main-content" style="margin-left: 400px;margin-top:-400px;">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Kullanıcı Adı Güncelleme Formu</strong>
                        </div>
                        <div class="card-body card-block" >
                            <?php
                                $sorgu = $db->prepare("SELECT * FROM users where user_username= :user_username");
                                $sorgu->execute(['user_username' => $user_username]);
                                while ($sonuc = $sorgu->fetch(PDO::FETCH_ASSOC)) {
                                $user_id = $sonuc['user_id'];
                                $user_username = $sonuc['user_username'];
                                $user_password = $sonuc['user_password'];
                            ?>
                        <form method="POST" action="update.php?user_id=<?= $sonuc["user_id"] ?>">
                            <div class="form-group">
                                <label for="company" class=" form-control-label">Kullanıcı Adı</label>
                                <input class="form-control" name="user_username" value="<?php echo $user_username; ?>">
                            </div>
                            <div class="form-group">
                                <label for="company" class=" form-control-label">Parola</label>
                                <input name="user_password" value="<?php echo $user_password; ?>" class="form-control">
                            </div>
                            <div class="form-group"><a href="update.php?user_id=<?= $sonuc["user_id"] ?>"><button class="btn btn-success" type="submit">Güncelle</button></a></div>
                            </form>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Profil Ayarları Formu Bitişi-->
<?php include 'footer.php'; ?>