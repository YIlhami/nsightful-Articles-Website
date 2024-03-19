<?php include '../../system/connect.php'; ?>
<?php   include 'header.php'; ?>
<?php   include 'sidebar.php'; 
session_start();
ob_start();
    if (!$_SESSION['user_username']) {
        echo "<script type='text/javascript'>alert('Erişim izni için lütfen giriş yapınız!');</script>";
        header("Refresh: 0.1; url=../login.php");
        exit();
    } 
    else {
        $article_id = $_GET["article_id"];
        $article_sor = $db->prepare("SELECT * FROM articles WHERE article_id=?");
        $article_sor->execute(array($article_id));
        $mak_cek = $article_sor->fetch(PDO::FETCH_ASSOC);
    } 
?>
<div class="main-content" style="margin-left: 400px;margin-top:-400px;">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Profil Bilgileri Güncelleme</strong>
                        </div>
                        <div class="card-body card-block" >
                        <form method="POST" action="../operations.php?article_id=<?php echo $mak_cek["article_id"]; ?>">
                            <div class="form-group">
                                <label for="company" class=" form-control-label">Başlık</label>
                                <input name="article_tittle" class="form-control" value="<?php echo $mak_cek["article_tittle"] ?>">
                            </div>
                            <div class="form-group">
                                <label for="vat" class=" form-control-label">Yazar</label>
                                <input name="article_writing" class="form-control" value="<?php echo $mak_cek["article_writing"]; ?>">
                            </div>
                            <div class="form-group">
                                <label for="street" class=" form-control-label">Kısa Bilgi</label>
                                <input name="article_information" class="form-control" value="<?php echo $mak_cek["article_information"]; ?>">
                            </div>
                            <div class="row form-group">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="city" class=" form-control-label">Açıklama</label>
                                        <input type="textarea" name="article_description" class="form-control" value="<?php echo $mak_cek["article_description"]; ?>">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="postal-code" class=" form-control-label">Kategori</label>
                                        <select name="article_category_id" class="form-control">
                                            <?php 
                                                $kategoriler = $db->prepare("SELECT * FROM  articles INNER JOIN categories ON categories.category_id = articles.article_category_id WHERE article_id=:article_id");
                                                $kategoriler->execute(array('article_id' => $_GET['article_id']));
                                                $kategori_cek = $kategoriler->fetchALL(PDO::FETCH_ASSOC);
                                                foreach ($kategori_cek as $row) { ?>
                                                    <option value="<?php echo $row["category_id"]; ?>">
                                                        <?php echo $row["category_tittle"]; ?>
                                                    </option>
                                                <?php } 
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary" name="article_update">Güncelle</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php   include 'footer.php'; ?>