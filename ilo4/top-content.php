<?php   
    $categories = $db->prepare("SELECT * FROM categories");
    $categories->execute();
    $categories_list=$categories->fetchAll(PDO::FETCH_OBJ);
?>
<section class="hero"> 
    <div class="container">
        <div class="row">
            <div class="col-lg-3"><br>
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>Kategoriler</span>
                    </div>
                    <?php
                        foreach($categories_list as $categoryy){ ?>
                            <ul>
                                <li>
                                    <a href="category_list.php?category_id=<?= $categoryy->category_id ?>">
                                        <span><?= $categoryy->category_tittle ?></span>
                                    </a>
                                </li>
                            </ul>
                        <?php } 
                    ?>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__text">
                    <h3 style="margin-top:0px;color: #7fad39; padding: 10px; text-align: center;">İSTEDİĞİNİZ MAKALEYİ İNCELEYEBİLİR <br>ÜCRETSİZ OLARAK İNDİREBİLİRSİNİZ</h3>
                </div>
                <div class="hero__item set-bg" data-setbg="img/hero/6.png"></div>
            </div>
        </div>
    </div>
</section>
