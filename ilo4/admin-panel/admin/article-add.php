<?php include 'header.php'; ?>
<?php include 'sidebar.php'; 
session_start();
ob_start();
    $user_username = $_SESSION['user_username'];
    if (!$_SESSION['user_username']) {
        echo "<script type='text/javascript'>alert('Erişim izni için lütfen giriş yapınız!');</script>";
        header("Refresh: 0.1; url=../login.php");
        exit();
    }
    else {
        $user_que=$db->prepare("SELECT * FROM users WHERE user_username= :user_username");
        $user_que->execute(array('user_username'=>$_SESSION['user_username']));
        $user_check = $user_que->fetch(PDO::FETCH_ASSOC);
    }
?>
<!--Makale Ekleme Formu Başlangıcı--> 
<div class="col-lg-8" style="left: 400px;top: -300px;">
    <div class="card">
        <div class="card-header">
            <strong>Makale Ekleme Formu</strong>
        </div>
        <div class="card-body card-block">
            <form action="../operations.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Makale Başlığı</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" name="article_title" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Makale Yazarı</label>
                    </div>
                	<div class="col-12 col-md-9">
                  		<input type="text" name="article_writing" class="form-control">
                	</div>
                </div>
              	<div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Makale Hakkında Kısa Bilgi</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" name="article_information" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="file-input" class=" form-control-label">Makale Fotoğrafı</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="file" name="article_photo" accept="image/png">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="textarea-input" class=" form-control-label">Makale ile ilgili Açıklama</label>
                    </div>
                	<div class="col-12 col-md-9">
                    	<textarea name="article_description" id="textarea-input" rows="9" class="form-control"></textarea>
                	</div>
           		</div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="file-input" class=" form-control-label">Makale Dosyası</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="file" name="article_file" accept="application/pdf">
                    </div>
                </div>
           		<div class="row form-group">
                	<div class="col col-md-3">
                        <label for="multiple-select" class=" form-control-label">Kategori</label>
                    </div>
                	<div class="col col-md-9">
                    	<select name="article_category_id" class="form-control">
                            <?php 
                                $kategoriler = $db->prepare("SELECT * FROM  categories");
                                $kategoriler->execute();
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
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="file-input" class=" form-control-label">Ücret</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" name="article_price" class="form-control" value="0">
                    </div>
                </div>
                <button class="btn btn-primary btn-lg btn-block" name="article-add">Ekle</button>
       		</form>
    	</div>
    </div>
</div>
<!--Makale Ekleme Formu Bitişi-->
<?php include 'footer.php'; ?>