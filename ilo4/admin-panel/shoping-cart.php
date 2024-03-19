<?php include '../system/connect.php'; ?>
<?php include 'header.php';
$article_user_id = $_SESSION['user_id'];
$file = $db->prepare("SELECT * FROM basket INNER JOIN users ON basket.article_user_id=users.user_id  WHERE article_user_id =?");
$file->execute(array($article_user_id));
$file_cek = $file->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <!-- Single Listing Content -->
    <div class="col-12 col-lg-8" style="margin-left: 200px;">
        <div class="single-listing-content"><br>
                <table class="table table-borderless table-striped table-earning">
                    <thead>
                        <tr>
                            <th style="text-align: center;">MAKALE İSMİ</th>
                            <th style="text-align: center;">FİYATI</th>
                            <th style="text-align: center;">DOSYA İSMİ</th>
                            <th style="text-align: center;">İŞLEM</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($file_cek as $row) { 
                            if ($row['buy_status']==0) {?>
                            <tr>
                                <td class="btn-dark" style="text-align: center;"><?php echo $row["article_title"] ?></td>
                                <td class="btn-success" style="text-align: center;"><?php echo $row["article_price"] ?> TL</td>
                                <td class="btn-dark" style="text-align: center;"><?php echo $row["article_file"] ?></td>
                                
                                 <td class="btn-danger" style="text-align: center;">
                                    
                                    <a href="operations.php?basket_delete=<?php echo $row["article_id"]; ?>" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a>
                                
                            </td>

                            
                            </tr>
                        <?php }
                        else{ ?>
                            


                        <?php } } ?>
                    </tbody>
                </table>
                <div class="col-lg-6" style="margin-left: 200px;">
                    <div class="shoping__checkout">
                        <h5 style="text-align: center;">Ücretli Makaleler Siparişi</h5>
                        <?php 
                        $price=$db->prepare("SELECT SUM(article_price) AS article_price FROM basket WHERE buy_status=? AND article_user_id=?");
                        $price->execute(array(0,$article_user_id));
                        $read_price= $price->fetch(PDO::FETCH_ASSOC);
                        $collection=$read_price['article_price'];
                        ?>  
                        <form action="operations.php" method="post">
                        <ul>
                        <input type="hidden" name="article_file" value="<?php echo $row["article_file"] ?>">
                        <input type="hidden" name="collection" value="<?php echo $collection; ?>">
                            <li>Toplam Fiyat <span><?php echo $collection; ?>  TL</span></li>
                        </ul>
                        <button type="submit" name="buy" class="primary-btn btn-block">Satın Al </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

                
          





<?php include 'footer.php'; ?>