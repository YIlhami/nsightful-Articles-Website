<?php include 'system/connect.php';  
if (isset($_GET['article_file'])) {
    $url = htmlspecialchars($_SERVER['HTTP_REFERER']); 

    echo "<script type='text/javascript'>alert('Siteye üye olmadan makale indiremezsiniz!');</script>";
    header("Refresh: 0.1; url=$url");
}
?>