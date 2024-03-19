<?php include '../../system/connect.php';
session_start();
  if (isset($_POST['user_username'],$_POST['user_password']) & isset($_GET['user_id'])) {
    $user_username = trim(filter_input(INPUT_POST, 'user_username', FILTER_SANITIZE_STRING));
    $user_password = trim(filter_input(INPUT_POST, 'user_password', FILTER_SANITIZE_STRING));
    if (empty($user_username)&empty($user_password)) {
        echo "<script type='text/javascript'>alert('Formu boş bırakma!');</script>";
        header("Refresh: 0.1; url=admin/username-update.php");
    }
    else {
      $sorgu=$db->prepare("UPDATE users set user_username=:user_username,user_password=:user_password where user_id=:user_id");
      $sonuc=$sorgu->execute(array(
        'user_id' => $_GET['user_id'],
        'user_username' =>  $_POST['user_username'],
        'user_password' => $_POST['user_password']
      ));
        if ($sonuc) {
          $user_username = $_SESSION['user_username'];
          echo "<script type='text/javascript'>alert('Kayıt Başarılı.Lütfen yeni bilgileriniz ile giriş yapınız!');</script>";
          header("refresh: 0.1; url=../login.php");    
        } 
        else {
          echo "<script type='text/javascript'>alert('Bir hata oluştu!!');</script>";
          header("refresh: 0.1; url=username-update.php"); 
        }
    }
  }
?>