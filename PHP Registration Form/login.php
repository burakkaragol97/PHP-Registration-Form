<?php
    require("config.php");

    if(!empty($_SESSION["id"])) {
        header("Location: index.php");
    }

    if(isset($_POST["submit"])) {
        $usernameemail = $_POST["usernameemail"];
        $password = $_POST["password"];
        $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$usernameemail' OR email = '$usernameemail'");
        $row = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result) > 0) {
            if($password == $row["password"]) {
                $_SESSION["login"] = true;
                $_SESSION["id"] = $row["id"];
                header("Location: index.php");
            } else {
                echo
                "<script> alert('Yanlış Parola!'); </script>";
            }
        } else {
            echo
            "<script> alert('Kullanıcı Bulunamadı'); </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş</title>
</head>
<body>
    <h2>Giriş Yap</h2>
    <form action="" method="post">
        <label for="usernameemail">Kullanıcı Adı veya E-Posta:</label>
        <input type="text" name="usernameemail" id="usernameemail" required> <br>
        <label for="password">Parola:</label>
        <input type="password" name="password" id="password" required> <br>
        <button type="submit" name="submit">Parola</button>
    </form>
    <br>
    <a href="registration.php">Kayıt Olmak İçin Tıkla</a>
</body>
</html>