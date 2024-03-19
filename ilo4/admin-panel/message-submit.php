<?php include '../system/connect.php';
extract($_POST);
if(isset($_POST['message-submit'])) {
	if (!$message_name || !$message_surname || !$message_mail || !$message_message) {
	    echo "<script type='text/javascript'>alert('Lütfen formu eksiksiz doldurunuz!');</script>";
		header("Refresh: 0.1; url=contact.php");
	}
	else {
	 	$messages=$db->prepare("INSERT INTO messages SET message_name=?,message_surname=?,message_mail=?,message_message=?");
	 	$insert = $messages->execute(array($message_name,$message_surname,$message_mail,$message_message));
	 	if ($insert) {
	 		echo "<script type='text/javascript'>alert('Tebrikler! Mesajınız Gönderildi');</script>";
		    header("Refresh: 0.1; url=contact.php");
	 	}
	 	else {
	 		echo "<script type='text/javascript'>alert('Bir Hata Oluştu!');</script>";
		    header("Refresh: 0.1; url=contact.php");
	 	}
	}
}?>