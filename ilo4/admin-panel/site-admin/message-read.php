<?php include '../../system/connect.php'; ?> 
<?php   include 'header.php'; ?>
<?php   include 'sidebar.php'; 
session_start();
ob_start();
    $site_admin_id = $_SESSION["site_admin_id"];
    if (!$_SESSION['site_admin_username']) {
        echo "<script type='text/javascript'>alert('Erişim izni için lütfen giriş yapınız!');</script>";
        header("Refresh: 0.1; url=login.php");
        exit();
    }
    else {
        $message_id = $_GET["message_id"];
        $message = $db->prepare("SELECT * FROM messages WHERE message_id=?");
        $message->execute(array($message_id));
        $check = $message->fetch(PDO::FETCH_ASSOC);
    }
?> 
<div class="main-content" style="margin-left: 400px;margin-top:-350px;">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Üyelik İptali</strong>
                        </div>
                        <div class="card-body card-block">
                            <div class="form-group">
                                <p><?php echo $check["message_message"] ?></p>
                            </div>
                            <div class="form-group">
                                <a href="../operations.php?messageoku_id=<?php echo $check["message_id"]; ?>">
                                    <button class="btn btn-primary">Okundu Olarak İşaretle</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>