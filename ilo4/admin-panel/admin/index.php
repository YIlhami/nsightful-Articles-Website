<?php include '../../system/connect.php'; ?>
<?php include 'header.php'; ?>
<?php include 'sidebar.php';
session_start();
ob_start();
    if (!$_SESSION['user_username']) {
        echo "<script type='text/javascript'>alert('Erişim izni için lütfen giriş yapınız!');</script>";
        header("Refresh: 0.1; url=../login.php");
        exit();
    }
    else {
        $user_que=$db->prepare("SELECT * FROM users WHERE user_username= :user_username AND user_id = :user_id");
        $user_que->execute(array('user_username'=>$_SESSION['user_username'],'user_id'=>$_SESSION['user_id']));
        $user_check = $user_que->fetch(PDO::FETCH_ASSOC);
    }
?>
<!--Profil Ayarları Formu Başlangıcı-->
<div class="main-content" style="margin-left: 600px;margin-top:-400px;">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Profil Bilgileri Güncelleme</strong>
                        </div>
                        <div class="card-body card-block" >
                        <form method="POST" action="../operations.php">
                            <div class="form-group">
                                <label for="company" class=" form-control-label">Adı</label>
                                <input name="user_name" class="form-control" value="<?php echo $user_check["user_name"] ?>">
                            </div>
                            <div class="form-group">
                                <label for="vat" class=" form-control-label">Soyadı</label>
                                <input name="user_surname" class="form-control" value="<?php echo $user_check["user_surname"]; ?>">
                            </div>
                            <div class="form-group">
                                <label for="street" class=" form-control-label">Meslek</label>
                                <input name="user_job" class="form-control" value="<?php echo $user_check["user_job"]; ?>">
                            </div>
                            <div class="row form-group">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="city" class=" form-control-label">Unvan</label>
                                        <input name="user_jobtitle" class="form-control" value="<?php echo $user_check["user_jobtitle"]; ?>">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="postal-code" class=" form-control-label">E-posta</label>
                                        <input name="user_mail" class="form-control" value="<?php echo $user_check["user_mail"]; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="country" class=" form-control-label">Telefon</label>
                                <input name="user_phone" class="form-control" value="<?php echo $user_check["user_phone"]; ?>">
                            </div>
                            <button class="btn btn-primary" name="profile-update">Bilgilerimi Güncelle</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Profil Ayarları Formu Bitişi-->
<?php include 'footer.php'; ?>