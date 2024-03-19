 <?php include 'connect.php';
extract($_POST);
// Üye Ekleme Formu
if (isset($_POST['user_add'])) {
	if (!$user_name || !$user_surname || !$user_job || !$user_jobtitle || !$user_mail || !$user_phone || !$user_username || !$user_password) {
		echo "<script type='text/javascript'>alert('Lütfen formu eksiksiz doldurunuz!');</script>";
		header("Refresh: 0.1; url=../sign-up.php");
	}
	else {
		$sign=$db->prepare("INSERT INTO users SET
			user_name=:user_name,
			user_surname=:user_surname,
			user_job=:user_job,
			user_jobtitle=:user_jobtitle,
			user_mail=:user_mail,
			user_phone=:user_phone,
			user_username=:user_username,
			user_password=:user_password
		");
		$insert=$sign->execute(array(
			'user_name' => $_POST['user_name'],
			'user_surname' => $_POST['user_surname'],
			'user_job' => $_POST['user_job'],
			'user_jobtitle' => $_POST['user_jobtitle'],
			'user_mail' => $_POST['user_mail'],
			'user_phone' => $_POST['user_phone'],
			'user_username' => $_POST['user_username'],
			'user_password' => $_POST['user_password']
	    ));
	    if ($insert) {
		    echo "<script type='text/javascript'>alert('Tebrikler! Admin onayından sonra giriş yapabilirsiniz.');</script>";
		    header("Refresh: 0.1; url=../sign-up.php");
	    }
		else {
		    echo "<script type='text/javascript'>alert('Bir hata oluştu!');</script>";
		    header("Refresh: 0.1; url=../sign-up.php");
	    }
    }
}
?>