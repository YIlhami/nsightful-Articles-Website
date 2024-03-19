<?php include '../../system/connect.php';
ob_start();
session_start();
    $articlesil_id = $_GET["articlesil_id"];
    if (isset($articlesil_id)) {
        $articles = $db->prepare("DELETE FROM articles WHERE article_id=?");
        $delete = $articles->execute(array($articlesil_id));
        if ($delete) {
            echo "<script type='text/javascript'>alert('Makale Silindi!');</script>";
		    header("Refresh: 0.1; url=article-delete.php");
        }
        else{
            echo "<script type='text/javascript'>alert('İşlem Başarısız!');</script>";
		    header("Refresh: 0.1; url=article-delete.php");
        }
    }
?>