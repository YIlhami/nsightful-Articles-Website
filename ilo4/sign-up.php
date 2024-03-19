<?php include 'system/connect.php'; ?>
<?php include 'header.php'; ?>
<hr>
<section class="checkout spad">
    <div class="container" style="background:#d1c4a1; width:800px;height: auto; margin-top: -50px;">
        <div class="checkout__form">
            <h4 style="padding: 10px; text-align: center;">ÜYE OLMAK İÇİN LÜTFEN GEREKLİ BİLGİLERİ EKSİKSİZ DOLDURUNUZ </h4>
            <form action="system/operation.php" method="post">
                <div class="row">
                    <div class="col-md-auto">
                        <div class="row" style="margin-left: 80px;">
                            <div class="col-lg-10">
                                <div class="checkout__input">
                                    <p><b>Adınız</b></p>
                                    <input type="text" name="user_name">
                                </div>
                            </div>
                            <div class="col-lg-10">
                                <div class="checkout__input">
                                    <p><b>Soyadınız</b></p>
                                    <input type="text" name="user_surname">
                                </div>
                            </div>
                            <div class="col-lg-10">
                                <div class="checkout__input">
                                    <p><b>Meslek</b></p>
                                    <input type="mail" name="user_job">
                                </div>
                            </div>
                            <div class="col-lg-10">
                                <div class="checkout__input">
                                    <p><b>Unvan</b></p>
                                    <input type="mail" name="user_jobtitle">
                                </div>
                            </div>
                            <div class="col-lg-10">
                                <div class="checkout__input">
                                    <p><b>E-Posta Adresi</b></p>
                                    <input type="email" name="user_mail">
                                </div>
                            </div>
                            <div class="col-lg-10">
                                <div class="checkout__input">
                                    <p><b>Telefon Numarası</b></p>
                                    <input type="text" name="user_phone">
                                </div>
                            </div>
                            <div class="col-lg-10">
                                <div class="checkout__input">
                                    <p><b>Kullanıcı Adı</b></p>
                                    <input type="text" name="user_username">
                                </div>
                            </div><br>
                            <div class="col-lg-10">
                                <div class="checkout__input">
                                    <p><b>Parola</b></p>
                                    <input type="text" name="user_password">
                                </div>
                            </div>
                            <div class="col-lg-10">
                                <button class="btn btn-primary btn-lg btn-block" name="user_add" >Gönder</button><br>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<?php include 'footer.php'; ?>