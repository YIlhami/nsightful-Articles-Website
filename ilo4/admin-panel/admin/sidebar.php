<?php include '../../system/connect.php';
ob_start();
// Oturum Güvenliği
$users=$db->prepare("SELECT * FROM users");
$users->execute();
$user_check = $users->fetch(PDO::FETCH_ASSOC);
?>
<div class="page-container3"> 
    <section>
        <div class="container">
            <div class="row">
                <div class="col-xl-3">
                    <aside class="menu-sidebar3 js-spe-sidebar">
                        <nav class="navbar-sidebar2 navbar-sidebar3">
                            <ul class="list-unstyled navbar__list">
                                <li class="has-sub">
                                    <a class="js-arrow" href="index.php">
                                        <i class="fa fa-user"></i>Profil Yönetimi
                                    </a>
                                </li>
                                <li class="has-sub">
                                    <a class="js-arrow" href="article-add.php">
                                        <i class="fa fa-plus"></i>Makale Ekle
                                    </a>                                            
                                </li>
                                <li class="has-sub">
                                    <a class="js-arrow" href="article-update.php">
                                        <i class="fa fa-refresh"></i>Makale Güncelle
                                    </a>
                                </li>
                                <li class="has-sub">
                                    <a class="js-arrow" href="article-delete.php">
                                        <i class="fa fa-trash"></i>Makale Sil
                                    </a>
                                </li>
                                <li class="has-sub">
                                    <a class="js-arrow" href="username-update.php">
                                        <i class="fa fa-pencil-square-o"></i>Kullanıcı Adı ve Parola
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </aside>
                </div>
            </div>
        </div>
    </section>
</div>
            

