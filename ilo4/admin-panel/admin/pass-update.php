<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?> 
<!--Parola Güncelleme Formu Başlangıcı-->
<div class="main-content" style="margin-left: 400px;margin-top:-500px;">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Parola Güncelleme</strong>
                        </div>
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label for="company" class=" form-control-label">Mevcut Parola</label>
                                <input type="text" id="company"  class="form-control">
                            </div>
                            <hr>    
                            <div class="form-group">
                                <label for="street" class=" form-control-label">Yeni Parola</label>
                                <input type="text" id="street"class="form-control">
                            </div>
                            <button class="btn btn-success">Güncelle</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Parola Güncelleme Formu Bitişi-->
<?php include 'footer.php'; ?>