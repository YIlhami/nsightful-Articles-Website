<?php include 'system/connect.php';?> 
<?php include 'header.php'; 
    $article_id = $_GET["article_id"];
    $article = $db->prepare("SELECT * FROM articles INNER JOIN users ON users.user_id=articles.article_user_id WHERE article_id=?");
    $article->execute(array($article_id));
    $article_check = $article->fetch(PDO::FETCH_ASSOC);
?>
<section class="product-details spad"> 
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large" src="admin-panel/admin/resimler/<?php echo $article_check["article_photo"]; ?>" alt="">
                    </div>
                </div>
            </div>
        <div class="col-lg-6 col-md-6">
            <div class="product__details__text">
                <h3><?php echo $article_check["article_tittle"]; ?></h3>
                <p><?php echo $article_check["article_information"]; ?></p>
                <?php
                        $articles = $db->prepare("SELECT * FROM articles WHERE article_id=?");
                        $articles->execute(array($article_id));
                        $price_check = $articles->fetch(PDO::FETCH_ASSOC);
                        if ($price_check['article_price']>0) { ?>
                            <p style="font-size: 20px;color:red"><b><?php echo $price_check['article_price'] ?> TL</b></p>
                        <button class="primary-btn">BU MAKALE ÜCRETLİDİR LÜTFEN GİRİŞ YAPINIZ</button>
                        </form>
                            
                        <?php }
                        else {?>
                        <p style="font-size: 20px;color:red"><b>Ücretsiz</b></p>
                        <button class="primary-btn">BU MAKALEYİ ÜCRETSİZ OLARAK İNDİREBİLMEK İÇİN GİRİŞ YAPINIZ</button>
                        <?php } ?>
                <ul>
                    <li><b>Makaleyi Ekleyen</b> <span><?php echo $article_check["user_name"]; ?> <?php echo $article_check["user_surname"]; ?></span></li>
                    <li><b>İndirilme Sayısı</b> <span><?php echo $article_check["article_download"]; ?></span></li>
                    <li><b>Makale Yazarı</b> <span><?php echo $article_check["article_writing"]; ?></span></li>
                    <li><b>Eklenme Zamanı</b> <span><?php echo $article_check["article_add_time"]; ?></span></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="product__details__tab">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active">
                            Makale Hakkında Ön Bilgi
                        </a>
                    </li>
                </ul>
            <div class="tab-content">
                <p><?php echo $article_check["article_description"]; ?></p>
            </div>
            </div>
        </div>
        </div>
    </div>
</section>
<?php include 'footer.php'; ?>
    