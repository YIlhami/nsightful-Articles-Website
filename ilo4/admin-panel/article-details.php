<?php include '../system/connect.php';?>
<?php include 'header.php'; 
    $article_id = $_GET["article_id"];
    $article = $db->prepare("SELECT * FROM articles INNER JOIN users ON articles.article_user_id=users.user_id WHERE article_id= ?");
    $article->execute(array($article_id));
    $article_check = $article->fetch(PDO::FETCH_ASSOC);
?>
<section class="product-details spad">
    <div class="container">
        <div class="row"> 
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large" src="admin/resimler/<?php echo $article_check["article_photo"]; ?>" >
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-10" style="left: 100px;">
                <div class="product__details__text">
                <form action="operations.php?article_id=<?php echo $article_check['article_id']; ?>" method="POST">

                    <h3><?php echo $article_check["article_tittle"]; ?></h3>
                    <p><?php echo $article_check["article_information"]; ?></p> 
                    <?php
                        $articles = $db->prepare("SELECT * FROM articles WHERE article_id=?");
                        $articles->execute(array($article_id));
                        $price_check = $articles->fetch(PDO::FETCH_ASSOC);
                        if ($price_check['article_price']>0) { ?>
                            <p style="font-size: 20px;color:red"><b><?php echo $price_check['article_price'] ?> TL</b></p>
                            <input type="hidden" name="article_file" value="<?php echo $price_check['article_file']; ?>">
                            <input type="hidden" name="article_tittle" value="<?php echo $price_check['article_tittle']; ?>">
                            <input type="hidden" name="article_user_id" value="<?php echo $_SESSION['user_id']; ?>">
                            <input type="hidden" name="article_price" value="<?php echo $price_check['article_price']; ?>">
                        <button class="primary-btn" name="add-basket"> Sepete Ekle</button>
                        </form>
                            
                        <?php }
                        else {?>
                        <p style="font-size: 20px;color:red"><b>Ücretsiz</b></p>
                            <a href="download.php?article_file=<?php echo $article_check['article_file'] ?>" class="primary-btn">İNDİR</a>
                        <?php } ?>




                    <ul>
                        <li><b>Makale Yazarı</b> <span><?php echo $article_check["article_writing"]; ?></span></li>
                        <li><b>İndirilme Sayısı</b> <span><?php echo $article_check["article_download"]; ?></span></li>
                        <li><b>Makaleyı Ekleyen</b> <span><?php echo $article_check["user_name"]; ?>  <?php echo $article_check["user_surname"]; ?></span></li>
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
    