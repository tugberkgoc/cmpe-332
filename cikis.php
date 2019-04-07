<?php 
ob_start();
session_start();
$_SESSION = array();
session_destroy();
?>

<?php echo "Çıkış Tamamlanıyor..."; ?>
<meta http-equiv="refresh" content="2;url=giris">