<?php
include "system/config.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $query = "SELECT * FROM users WHERE username = :username";
        $statement = $db->prepare($query);
        $statement->bindParam(":username", $username);
        $statement->execute();
        if ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            if (password_verify($password, $row["password"])) {
                session_start();
                $_SESSION["userid"] = $row["userid"];
                header("Location: dashboard.php");
            } else {
                echo "Hatalı parola!";
            }
        } else {
            echo "Kullanıcı bulunamadı!";
        }
    } else {
        echo "Kullanıcı adı ve parola boş olamaz!";
    }
}
?>
<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Sistemi</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
</head>
<body class="text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <main class="form-signin w-100 mt-5">
                    <form action="" method="POST">
                        <h1 class="h3 mb-3 fw-normal">Üye Girişi</h1>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="username" id="floatingInput" placeholder="Kullanıcı Adınız...">
                            <label for="floatingInput">Kullanıcı Adı</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Şifreniz...">
                            <label for="floatingPassword">Şifre</label>
                        </div>
                        <div class="checkbox mt-1">
                            <label>
                                <input type="checkbox" value="remember-me"> Beni Hatırla!
                            </label>
                        </div>
                        <input class="w-100 btn btn-lg btn-primary mt-1" type="submit" value="Giriş Yap">
                        <p class="mt-2">Üyeliğiniz yoksa <a href="register.php">Kayıt olun!</a></p>
                        <p class="mt-5 mb-3 text-muted">&copy; 2023 | TFBDEV</p>
                    </form>
                </main>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</body>
</html>