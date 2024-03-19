<?php include '../../system/connect.php'; ?>
<?php include 'header.php'; ?>
<?php include 'sidebar.php';
session_start();
ob_start();
    $site_admin_username = $_SESSION['site_admin_username'];
    if (!$_SESSION['site_admin_username']) {
        echo "<script type='text/javascript'>alert('Erişim izni için lütfen giriş yapınız!');</script>";
        header("Refresh: 0.1; url=../login.php");
        exit();
    }
?>
<div class="main-content" style="margin-left: 550px;margin-top:-350px;">
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
                                $sorgu = $db->prepare("SELECT * FROM site_admin where site_admin_username= :site_admin_username");
                                $sorgu->execute(['site_admin_username' => $site_admin_username]);
                                while ($sonuc = $sorgu->fetch(PDO::FETCH_ASSOC)) {
                                $site_admin_id = $sonuc['site_admin_id'];
                                $site_admin_username = $sonuc['site_admin_username'];
                                $site_admin_password = $sonuc['site_admin_password'];
                            ?>
                            <form method="POST" action="../operations.php?site_admin_id=<?= $sonuc["site_admin_id"] ?>">
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Kullanıcı Adı</label>
                                    <input class="form-control" name="site_admin_username" value="<?php echo $site_admin_username; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Parola</label>
                                    <input name="site_admin_password" value="<?php echo $site_admin_password; ?>" class="form-control">
                                </div>
                                <div class="form-group"><a href="../operations.php?site_admin_id=<?= $sonuc["site_admin_id"] ?>"><button class="btn btn-success" type="submit">Güncelle</button></a></div>
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