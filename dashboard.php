<?php
include "system/config.php";
include "function.php";
if (!isset($_SESSION["userid"])) {
    header("Location: index.php");
    exit();
}
$data = $db->query("SELECT * FROM users WHERE userid = '{$_SESSION['userid']}'")->fetch(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="tr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <title>Dashboard Ekranı</title>
    </head>
    <body>
    <div class="container-fluid">
        <header class="p-3 mb-3 border-bottom">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                        <h3>LOGO</h3>
                    </a>
                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0"></ul>
                    <div class="dropdown text-end">
                        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                        </a>
                        <ul class="dropdown-menu text-small" style="">
                            <li><a class="dropdown-item" href="logout.php">Çıkış yap</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <div>
            <div class="container px-4 py-5" id="featured-3">
                <h2 class="pb-2 border-bottom">Merhaba, <?php echo $data["username"]; ?>! Dashboard Sayfasına Hoşgeldiniz!</h2>
                <div class="row g-4 py-5 row-cols-1 row-cols-lg-12">
                    <div class="feature col">
                        <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">
                            <svg class="bi" width="1em" height="1em"><use xlink:href="#collection"></use></svg>
                        </div>
                        <h3 class="fs-2">Kullanıcı Adı</h3>
                        <ul><li><?php echo $data["username"]; ?> (Üyeliğiniz <?=$data["active"] == 0 ? "Pasif" : "Aktif"?> durumdadır.)</li></ul>
                    </div>
                    <div class="feature col">
                        <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">
                            <svg class="bi" width="1em" height="1em"><use xlink:href="#people-circle"></use></svg>
                        </div>
                        <h3 class="fs-2">E-mail</h3>
                        <ul><li><?=$data["email"] ?></li></ul>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</html>
