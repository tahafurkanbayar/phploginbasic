<?php
include "system/config.php";
include "function.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $query = "SELECT * FROM users WHERE username = :username";
        $statement = $db->prepare($query);
        $statement->bindParam(":username", $username);
        $statement->execute();
        if ($statement->rowCount() > 0) {
            echo "Bu kullanıcı adı zaten kullanılıyor!";
        } else {

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $insertQuery = "INSERT INTO users (username, password, email) VALUES (:username, :password, :email)";
            $insertStatement = $db->prepare($insertQuery);
            $insertStatement->bindParam(":username", $username);
            $insertStatement->bindParam(":email", $email);
            $insertStatement->bindParam(":password", $hashedPassword);

            if ($insertStatement->execute()) {
                echo "Kayıt başarılı. Artık giriş yapabilirsiniz!";
                $redirectURL = "index.php";
                $delay = 2;
                delayedRedirect($redirectURL, $delay);
            } else {
                echo "Kayıt işlemi sırasında bir hata oluştu.";
            }
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
                    <h1 class="h3 mb-3 fw-normal">Üye Kayıt</h1>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="username" id="floatingInput" placeholder="Kullanıcı Adınız...">
                        <label for="floatingInput">Kullanıcı Adı</label>
                    </div>
                    <div class="form-floating">
                        <input type="email" class="form-control" name="email" id="floatingInput" placeholder="E-mail...">
                        <label for="floatingInput">E-mail</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Şifreniz...">
                        <label for="floatingPassword">Şifre</label>
                    </div>

                    <button class="w-100 btn btn-lg btn-primary mt-2" type="submit">Kayıt Ol</button>
                    <p class="mt-2">Üye olduysanız <a href="index.php">Giriş yapın!</a></p>
                    <p class="mt-5 mb-3 text-muted">&copy; 2023 | TFBDEV</p>
                </form>
            </main>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
</body>
</html>