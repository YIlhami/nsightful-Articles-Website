<?php include '../system/connect.php';
ob_start();
session_start();
    if (isset($_GET['article_file'])) {
        $article_file = $_GET['article_file'];
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
        exit;
        }
    }
?>