<?php include '../../system/connect.php'; ?>
<?php   include 'header.php'; ?>
<?php   include 'sidebar.php'; 
session_start();
ob_start();
    $user_id = $_SESSION["user_id"];
    if (!$_SESSION['user_username']) {
        echo "<script type='text/javascript'>alert('Erişim izni için lütfen giriş yapınız!');</script>";
        header("Refresh: 0.1; url=../login.php");
        exit();
    }
    else {
        $arti = $db->prepare("SELECT * FROM articles INNER JOIN users ON users.user_id=articles.article_user_id  WHERE user_id =?");
        $arti->execute(array($user_id));
        $arti_cek = $arti->fetchALL(PDO::FETCH_ASSOC);
    }
?>
<!--Makale Güncelleme Formu Başlangıcı-->
<div class="main-content" style="margin-top: -400px;margin-left: 400px;">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                                <tr>
                                    <th>Başlık</th>
                                    <th>Yazar</th>
                                    <th>Eklenme Zamanı</th>
                                    <th>İşlem</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    foreach ($arti_cek as $row) { ?>
                                <tr>
                                    <td><?php echo $row["article_tittle"] ?></td>
                                    <td><?php echo $row["article_writing"] ?></td>
                                    <td><?php echo $row["article_add_time"] ?></td>
                                    <td>
                                        <a href="delete.php?articlesil_id=<?php echo $row['article_id']?>">
                                            <button type="button" class="btn btn-danger btn-lg"> Sil </button>
                                        </a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Makale Güncelleme Formu Bitişi-->
<?php   include 'footer.php'; ?>