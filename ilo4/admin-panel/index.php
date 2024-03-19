<?php include '../system/connect.php';
$article = $db->prepare("SELECT * FROM articles ORDER BY article_id ASC LIMIT 0,12");
$article->execute();
$article_list = $article->fetchAll(PDO::FETCH_OBJ);
?>
<?php include 'header.php'; ?>
<?php include 'top-content.php'; ?>
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Öne Çıkanlar</h2>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            <?php
            $status = $db->prepare("SELECT * FROM articles where article_status=?");
            $status->execute(array(1));
            $article_status = $status->fetchALL(PDO::FETCH_ASSOC);
            if ($article_status) {
                foreach ($article_status as $articlee) { ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg">
                                <img src="admin/resimler/<?php echo $articlee['article_photo']; ?>">
                                <ul class="featured__item__pic__hover">
                                    <?php
                                    if ($articlee['article_price'] > 0) {
                                    ?>
                                        <li>
                                            <a href="article-details.php?article_id=<?php echo $articlee['article_id']; ?>">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    <?php } else { ?>
                                        <li>
                                            <a href="download.php?article_file=<?php echo $articlee['article_file']; ?>">
                                                <i class="fa fa-download" aria-hidden="true"></i>
                                            </a>
                                            <section class="alert-wrap p-t-70 p-b-70">
                                        </li>
                                        <li>
                                            <a href="article-details.php?article_id=<?php echo $articlee['article_id']; ?>">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } ?>
        </div>
    </div>
</section>
<?php include 'footer.php'; ?>