<?php include '../system/connect.php'; ?>
<?php include 'header.php'; ?>
<!-- İletişim Sekmesi Başlangıcı -->
<hr>
<section class="checkout spad">
    <div class="container" style="background:#d1c4a1">
        <div class="checkout__form">
            <h4 style="padding: 10px">BİZE İLETMEK İSTEDİKLERİNİZİ YAZABİLİRSİNİZ!</h4>
            <form action="message-submit.php" method="post">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="checkout__input">
                            <p><b>Adınız</b></p>
                            <input type="text" name="message_name">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="checkout__input">
                            <p><b>Soyadınız</b></p>
                            <input type="text" name="message_surname">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="checkout__input">
                            <p><b>E-Posta Adresi</b></p>
                            <input type="mail" name="message_mail">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="checkout__input">
                            <p><b>Mesajınız</b></p>
                            <input type="text" name="message_message">
                        </div>
                    </div>
                    <div class="col-lg-12"> 
                        <button class="btn btn-primary btn-md btn-block" name="message-submit">Gönder</button>  
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- İletişim Sekmesi Bitişi -->
<?php include 'footer.php'; ?>
   