<?php
include "system/config.php";
// logout.php sayfası kullanıcıyı çıkış yapmak için kullanılır
session_start();
session_unset(); // Oturum değişkenlerini temizle
session_destroy(); // Oturumu sonlandır
header("Location: index.php"); // Çıkış yapıldıktan sonra tekrar login sayfasına yönlendir
exit();
?>
