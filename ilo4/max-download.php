<?php include 'system/connect.php';  
$article = $db->prepare("SELECT * FROM articles ORDER BY article_download DESC LIMIT 0,6");
$article->execute(); ?>
<?php include 'header.php'; ?>
<section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>EN ÇOK İNDİRİLENLER</h2>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
            <?php
                $yeni = $db->prepare("SELECT * FROM articles  WHERE article_status=?");
                $yeni->execute(array(1));
                $article_list=$yeni->fetchAll(PDO::FETCH_ASSOC);
                foreach($article_list as $articlee){?>
                    <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg">
                                <img src="admin-panel/admin/resimler/<?= $articlee['article_photo']; ?>">
                                <ul class="featured__item__pic__hover">
                                    <li><a href="#" aria-hidden="true"><?= $articlee['article_download']; ?></a></li>
                                    <?php 
                                    if ($articlee['article_price']>0) {
                                    ?> 
                                        
                                        <li>
                                            <a href="article-details.php?article_id=<?php echo $articlee['article_id'];?>">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    <?php }else { ?>
                                        <li>
                                            <a href="download.php?article_file=<?php echo $articlee['article_file']; ?>">
                                                <i class="fa fa-download" aria-hidden="true"></i>
                                            </a>
                                            <section class="alert-wrap p-t-70 p-b-70">
                                        </li>
                                        <li>
                                            <a href="article-details.php?article_id=<?php echo $articlee['article_id'];?>">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <?php }?>    
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php } 
            ?>
        </div>
    </div>
</section>
<?php include 'footer.php'; ?>