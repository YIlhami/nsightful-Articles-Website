<?php include 'system/connect.php'; ?>
<?php include 'header.php'; 
	$category_id = $_GET["category_id"];
	$categories = $db->prepare("SELECT * FROM  categories WHERE category_id=?");
	$categories->execute(array($category_id)); 
	$category_check = $categories->fetch(PDO::FETCH_ASSOC);
?>
<div class="page-subject">
	<b>
		<h2 style="text-align: center;"><?php echo $category_check["category_tittle"]; ?><hr></h2>
	</b>
</div>
<section class="featured spad">
    <div class="container">
    	<div class="row featured__filter">
			<?php  
			$article = $db->prepare("SELECT * FROM articles INNER JOIN categories ON categories.category_id = articles.article_category_id WHERE article_category_id=? AND article_status=?");
			$article->execute(array($category_id,1));
			$article_list = $article->fetchALL(PDO::FETCH_ASSOC);
			if ($article_list)
			{
				foreach ($article_list as $articlee) 
					{ ?>
						<div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                    		<div class="featured__item">
                        		<div class="featured__item__pic set-bg">
                        			<img src="admin-panel/admin/resimler/<?php echo $articlee['article_photo'] ?>">
                        			<ul class="featured__item__pic__hover">
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
					<?php 
					}
			}?>
		</div>
	</div>
</section>
<?php include 'footer.php'; ?>