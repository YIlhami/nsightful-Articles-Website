<?php include '../system/connect.php';
error_reporting(E_ALL & ~E_NOTICE);
ob_start();
session_start();
extract($_POST);
// Kullanıcı Girişi Kontrol (Kullanıcı)
if(isset($_POST['login'])){
	if (!$user_username || !$user_password ) {
		echo "<script type='text/javascript'>alert('Lütfen formu eksiksiz doldurunuz!');</script>";
		header("Refresh: 0.1; url=login.php");
	} 
	else {
		$users=$db->prepare("SELECT * FROM users WHERE user_username= :user_username AND user_password= :user_password AND user_status=:user_status");
		$users->execute(array(
			'user_status' =>1,
			'user_username'=>$_POST['user_username'],
			'user_password'=>$_POST['user_password']
		));
		$user_check = $users->fetch(PDO::FETCH_ASSOC);
		if ($user_check) {		   
		    $_SESSION['user_username']=$_POST['user_username'];
		    $_SESSION['user_id']=$user_check['user_id'];
			header("Refresh: 0.1; url=index.php");
		}
		else {
		   echo "<script type='text/javascript'>alert('Kullanıcı Adı veya Şifre Hatalı! Eğer yeni üye olduysanız lütfen admin onayını bekleyiniz!');</script>";
		   header("Refresh: 0.1; url=login.php");
		}
	}
}

// Admin Girişi Kontrol (Site Admin)
if(isset($_POST['admin'])){ 
	if (!$site_admin_username || !$site_admin_password ) {
		echo "<script type='text/javascript'>alert('Lütfen formu eksiksiz doldurunuz!');</script>";
		header("Refresh: 0.1; url=site-admin/login.php");
	} 
	else {
		$users=$db->prepare("SELECT * FROM site_admin WHERE site_admin_username= :site_admin_username AND site_admin_password= :site_admin_password");
		$users->execute(array(
			'site_admin_username'=>$_POST['site_admin_username'],
			'site_admin_password'=>$_POST['site_admin_password']
		));
		$user_check = $users->fetch(PDO::FETCH_ASSOC);
		if ($user_check) {		   
		    $_SESSION['site_admin_username']=$_POST['site_admin_username'];
		    $_SESSION['site_admin_id']=$user_check['site_admin_id'];
			header("Refresh: 0.1; url=site-admin/articles.php");
		}
		else {
		    echo "<script type='text/javascript'>alert('Kullanıcı Adı veya Şifre Hatalı');</script>";
		    header("Refresh: 0.1; url=site-admin/login.php");
		}
	}
}

//Profil Güncelleme (Kullanıcı)
if (isset($_POST['profile-update'])) {
	$update=$db->prepare("UPDATE users SET 
		user_name=:user_name,
		user_surname=:user_surname,
		user_job=:user_job,
		user_jobtitle=:user_jobtitle,
		user_mail=:user_mail,
		user_phone=:user_phone WHERE user_username= :user_username");
	$update->execute(array(
		'user_name'=>$_POST['user_name'],
		'user_surname'=>$_POST['user_surname'],
		'user_job'=>$_POST['user_job'],
		'user_jobtitle'=>$_POST['user_jobtitle'],
		'user_mail'=>$_POST['user_mail'],
		'user_phone'=>$_POST['user_phone'],
		'user_username'=>$_SESSION['user_username']));
	if ($update) {
		echo "<script type='text/javascript'>alert('BİLGİLERİNİZ GÜNCELENDİ!');</script>";
		header("Refresh: 0.1; url=admin/index.php");
	}
	else {
		echo "<script type='text/javascript'>alert('Hiçbir değişiklik yapılmadı!!');</script>";
		header("Refresh: 0.1; url=admin/index.php");
	}
}
//Makale Ekleme İşlemi (Kullanıcı)
if (isset($_POST['article-add'])) {
	if ( !$article_title || !$article_writing  ||  !$article_information || !$article_description || !$article_category_id ) {
        echo "<script type='text/javascript'>alert('Lütfen formu eksiksiz doldurunuz!');</script>";
		header("Refresh: 0.1; url=admin/article-add.php");
	} 
	else {
		$resimTmp = $_FILES["article_photo"]["tmp_name"];
		$resimAdi = $_FILES["article_photo"]["name"];
		$resimYolu =__DIR__."/admin/resimler/".$resimAdi;

		$dosyaTmp = $_FILES["article_file"]["tmp_name"];
		$dosyaAdi = $_FILES["article_file"]["name"];
		$dosyaYolu =__DIR__."/admin/makaleler/".$dosyaAdi;
		if (move_uploaded_file($resimTmp,$resimYolu) && move_uploaded_file($dosyaTmp,$dosyaYolu)) {
			$articleadd = $db->prepare("INSERT INTO articles SET 
				article_tittle= :article_tittle,
				article_writing= :article_writing,
				article_information= :article_information,
				article_photo= :article_photo,
				article_description= :article_description,
				article_file= :article_file,
				article_category_id= :article_category_id,
				article_price= :article_price,
				article_user_id= :article_user_id");
			$articleadd->execute([
				"article_tittle" =>$_POST["article_title"],
				"article_writing" =>$_POST["article_writing"],
				"article_information" =>$_POST["article_information"],
				"article_photo" =>$resimAdi,
				"article_description" =>$_POST["article_description"],
				"article_file" => $dosyaAdi,
				"article_category_id" =>$_POST["article_category_id"],
				"article_price" =>$_POST["article_price"],
				"article_user_id"=>$_SESSION["user_id"]]);
			if ($articleadd) {
			  	echo "<script type='text/javascript'>alert('Tebrikler! Admin onayından sonra sitede paylaşılacaktır.');</script>";
		   		header("Refresh: 0.1; url=admin/article-add.php");
			}
			else {
			   	echo "<script type='text/javascript'>alert('Bir hata oluştu!');</script>";
		   		header("Refresh: 0.1; url=admin/article-add.php");
			}

		}
 	}
}

//Kullanıcı Adı Güncelleme (Kullanıcı)
if (isset($_POST['username-update'])) {
	$update=$db->prepare("UPDATE users SET 
		user_username=:user_username WHERE user_id=:user_id AND user_password=:user_password");
	$update->execute(array(
		'user_username'=>$_POST['user_username'],
		'user_password'=>$_SESSION['user_password']));
	if ($update) {
			echo "<script type='text/javascript'>alert('BİLGİLERİNİZ GÜNCELENDİ!');</script>";
		    header("Refresh: 0.1; url=admin/username-update.php");
	}
	else {
		echo "<script type='text/javascript'>alert('Hiçbir değişiklik yapılmadı!!');</script>";
		header("Refresh: 0.1; url=admin/user_username-update.php");
	}
}
//Makale Güncelleme İşlemi (Kullanıcı)

if (isset($article_update)) {
	$article_id = $_GET['article_id'];
	$articlee=$db->prepare("UPDATE articles SET 
		article_tittle=?,
		article_writing=?,
		article_information=?,
		article_description=?,
		article_category_id=? WHERE article_id=?");
	$update=$articlee->execute(array(
		$article_tittle,
		$article_writing,
		$article_information,
		$article_description,
		$article_category_id,
		$article_id));
	if ($update) {
		echo "<script type='text/javascript'>alert('Makale Bilgileri Güncellendi!');</script>";
		header("Refresh: 0.1; url=admin/article-update.php");
	}
	else {
		echo "<script type='text/javascript'>alert('Hiçbir değişiklik yapılmadı!!');</script>";
		header("Refresh: 0.1; url=admin/article-update.php");
	}
}


//Makale Onayı İşlemi (Site Admin)
$articleonay_id = $_GET["articleonay_id"];
if (isset($articleonay_id)) {
	$articlee=$db->prepare("UPDATE articles SET article_status=? WHERE article_id=?");
	$update=$articlee->execute(array(1,$articleonay_id));
	if ($update) {
		echo "<script type='text/javascript'>alert('Makale Onaylandı!');</script>";
		header("Refresh: 0.1; url=site-admin/articles.php");
	}
	else {
		echo "<script type='text/javascript'>alert('Bir hata oluştu!');</script>";
		header("Refresh: 0.1; url=site-admin/articles.php");
	}
}

//Makale Silme (Site Admin)
$articlesil_id = $_GET["articlesil_id"];
if (isset($articlesil_id)) {
	$articles = $db->prepare("DELETE FROM articles WHERE article_id=?");
    $delete = $articles->execute(array($articlesil_id));
    if ($delete) {
        echo "<script type='text/javascript'>alert('Makale Silindi!');</script>";
		header("Refresh: 0.1; url=site-admin/articles.php");
    }
    else{
       	echo "<script type='text/javascript'>alert('İşlem Başarısız!');</script>";
		header("Refresh: 0.1; url=site-admin/articles.php");
    }
}
//Kullanıcı Onay İşlemi (Site Admin)
    $useronay_id = $_GET["useronay_id"];
if (isset($useronay_id)) {
	$articlee=$db->prepare("UPDATE users SET user_status=? WHERE user_id=?");
	$update=$articlee->execute(array(1,$useronay_id));
	if ($update) {
		echo "<script type='text/javascript'>alert('Kullanıcı Onaylandı!');</script>";
		header("Refresh: 0.1; url=site-admin/users.php");
	}
	else {
		echo "<script type='text/javascript'>alert('Bir hata oluştu!');</script>";
		header("Refresh: 0.1; url=site-admin/users.php");
	}
}
// Kullanıcı Silme İşlemi (Site Admin)
$usersil_id = $_GET["usersil_id"];
if (isset($usersil_id)) {
	$articles = $db->prepare("DELETE FROM users WHERE user_id=?");
    $delete = $articles->execute(array($usersil_id));
    if ($delete) {
        echo "<script type='text/javascript'>alert('Kullanıcı Silindi!');</script>";
		header("Refresh: 0.1; url=site-admin/users.php");
    }
    else{
        echo "<script type='text/javascript'>alert('İşlem Başarısız!');</script>";
		header("Refresh: 0.1; url=site-admin/users.php");
    }
}

// Mesaj Silme İşlemi
    $messagesil_id = $_GET["messagesil_id"];
if (isset($messagesil_id)) {
	$message = $db->prepare("DELETE FROM messages WHERE message_id=?");
    $delete = $message->execute(array($messagesil_id));
    if ($delete) {
        echo "<script type='text/javascript'>alert('Mesaj Silindi!');</script>";
		header("Refresh: 0.1; url=site-admin/messages.php");
    }
    else{
        echo "<script type='text/javascript'>alert('İşlem Başarısız!');</script>";
		header("Refresh: 0.1; url=site-admin/messages.php");
    }
}

// Mesaj Okunma Bilgisi (Site Admin)
        $messageoku_id = $_GET["messageoku_id"];
if (isset($messageoku_id)) {
	$message=$db->prepare("UPDATE messages SET message_status=? WHERE message_id=?");
	$update=$message->execute(array(1,$messageoku_id));
	if ($update) {
		header("Refresh: 0.1; url=site-admin/messages.php");
	}
	else {
		header("Refresh: 0.1; url=site-admin/messages.php");
	}
}

//Site Admin Kullanıcı ve Parola Güncelleme
if (isset($_POST['site_admin_username'],$_POST['site_admin_password']) & isset($_GET['site_admin_id'])) {
	$site_admin_username = trim(filter_input(INPUT_POST, 'site_admin_username', FILTER_SANITIZE_STRING));
    $site_admin_password = trim(filter_input(INPUT_POST, 'site_admin_password', FILTER_SANITIZE_STRING));
    if (empty($site_admin_username)&empty($site_admin_password)) {
        echo "<script type='text/javascript'>alert('Formu boş bırakma!');</script>";
        header("Refresh: 0.1; url=site-admin/username-pass.php");
    }
    else{
  		$sorgu=$db->prepare("UPDATE site_admin set site_admin_username=:site_admin_username,site_admin_password=:site_admin_password where site_admin_id=:site_admin_id");
  		$sonuc=$sorgu->execute(array(
    		'site_admin_id' => $_GET['site_admin_id'],
    		'site_admin_username' =>  $_POST['site_admin_username'],
    		'site_admin_password' => $_POST['site_admin_password']));
  		if ($sonuc) {
   			$user_username = $_SESSION['site_admin_username'];
   			echo "<script type='text/javascript'>alert('Kayıt Başarılı.Lütfen yeni bilgileriniz ile giriş yapınız!');</script>";
    		header("refresh: 0.1; url=site-admin/login.php");    
		} 
		else {
			echo "<script type='text/javascript'>alert('Bir hata oluştu!!');</script>";
    		header("refresh: 0.1; url=site-admin/username-pass.php"); 
  		}
	}		
}
// Sepete Ekleme İşlemi
if (isset($_POST['add-basket'])) {
	$article_user_id = $_SESSION["user_id"];
	$article_title=$_POST["article_title"];
	$article_price=$_POST["article_price"];
	$article_file=$_POST["article_file"];


	$basket = $db->prepare("INSERT INTO basket(article_user_id, article_title, article_price , article_file)
                VALUES (:article_user_id, :article_title, :article_price , :article_file)");
                    
             $insert = $basket->execute(array(
            'article_user_id' => $article_user_id,
             'article_title' => $article_tittle,
             'article_price' => $article_price,
			 'article_file' => $article_file

         ));
                if ($insert) {
                       header("Refresh: 0.1; url=shoping-cart.php");
                }
                else {
                       echo "<script type='text/javascript'>alert('Bir hata oluştu!');</script>";
					   header("Refresh: 0.1; url=shoping-cart.php");

                }

}

//Sepet Ürün İptal İşlemi
$basket_delete = $_GET["basket_delete"];
if (isset($basket_delete)) {
    $url = htmlspecialchars($_SERVER['HTTP_REFERER']); 
	$basket = $db->prepare("DELETE FROM basket WHERE article_id=?");
	$delete = $basket->execute(array($basket_delete));
	if ($delete) {
        header("Refresh: 0.1; url=$url");	
    } 
    else {
        header("Refresh: 0.1; url=$url");		}
}

//Makale Satın Alma İşlemi
if(isset($_POST['buy'])){
	$article_file = $_POST["article_file"];
	$article_price = $_POST["collection"];
	$wallet_user_id = $_SESSION['user_id'];

	$update_price = $db->prepare("SELECT * FROM basket INNER JOIN wallet ON basket.article_user_id=wallet.wallet_user_id WHERE buy_status=0 and article_user_id=?");
    $update_price->execute(array($wallet_user_id));
	$update = $update_price->fetch(PDO::FETCH_ASSOC);
	if($update){
		$price = $db->prepare("UPDATE wallet set wallet_quantity = wallet_quantity-? where wallet_user_id=?");
		$price->execute(array($article_price,$wallet_user_id));	
			if ($price) {
			$down = $db->prepare("SELECT * FROM articles WHERE article_file=?");
	    	$down->execute(array($article_file));
	    	$down_list=$down->fetch(PDO::FETCH_ASSOC);
	    	$filepath = 'admin/makaleler/' . $down_list['article_file'];
	    	if (file_exists($filepath)) {
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename=' . basename($filepath));
            readfile('admin/makaleler/' . $down_list['article_file']);
            $pdo=$db->prepare("UPDATE articles SET article_download = article_download+1 WHERE article_file = ?");
            $pdo->execute(array($article_file));
			if ($pdo) {
				$sil=$db->prepare("UPDATE basket SET buy_status = 1 WHERE article_file = ?");
				$sil->execute(array($article_file));
			
			
			

			}}
		}
		
		

		
	}
	

}


?>