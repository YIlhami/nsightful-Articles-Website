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
        $user_que=$db->prepare("SELECT * FROM users");
        $user_que->execute();
        $user_check = $user_que->fetchALL(PDO::FETCH_ASSOC);
    }
?>
<div class="main-content" style="margin-top: -350px;margin-left: 550px;">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                                <tr>
                                    <th>Adı</th>
                                    <th>Soyadı</th>
                                    <th>Kullanıcı Adı</th>
                                    <th>Durum</th>
                                    <th>İşlem</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                foreach ($user_check as $row) { ?>
                                    <tr>
                                        <td><?php echo $row["user_name"] ?></td>
                                        <td><?php echo $row["user_surname"] ?></td>
                                        <td><?php echo $row["user_username"] ?></td>
                                        <td><?php 
                                                if ($row["user_status"]==1) {
                                                    echo "<span class='fa fa-check-circle text-success'> </span>";
                                                }
                                                else {
                                                    echo "<span class='fa fa-times-circle text-danger'> </span>";
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <a href="../operations.php?useronay_id=<?php echo $row["user_id"]; ?>">
                                                <button type="button" class="btn btn-success">Onayla    </button>
                                            </a>
                                            <a href="../operations.php?usersil_id=<?php echo $row["user_id"]; ?>">
                                                <button type="button" class="btn btn-danger">Sil    </button>
                                            </a>
                                        </td>
                                    </tr>
                                <?php   } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php   include 'footer.php'; ?>