<?php
    require("config.php");

    if(!empty($_SESSION["id"])) {
        header("Location: index.php");
    }

    if(isset($_POST["submit"])){
        $name = $_POST["name"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirmpassword = $_POST["confirmpassword"];
        $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' OR email = '$email'");
        if(mysqli_num_rows($duplicate) > 0){
          echo
          "<script> alert('Kullanıcı Adı veya E-Posta Zaten Kayıtlı'); </script>";
        }
        else{
          if($password == $confirmpassword){
            $query = "INSERT INTO tb_user VALUES('','$name','$username','$email','$password')";
            mysqli_query($conn, $query);
            echo
            "<script> alert('Kayıt İşlemi Başarılı'); </script>";
          }
          else{
            echo
            "<script> alert('Parolalar Eşleşmiyor'); </script>";
          }
        }
      }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt</title>
</head>
<body>
    <h2>Kayıt Ol</h2>
    <form action="" method="post">
        <label for="name">İsim:</label>
        <input type="text" name="name" id="name" required> <br>
        <label for="username">Kullanıcı Adı:</label>
        <input type="text" name="username" id="username" required> <br>
        <label for="email">E-Posta:</label>
        <input type="email" name="email" id="email" required> <br>
        <label for="password">Parola:</label>
        <input type="password" name="password" id="password" required> <br>
        <label for="confirmpassword">Parola Kontrol:</label>
        <input type="password" name="confirmpassword" id="confirmpassword" required> <br>
        <button type="submit" name="submit">Kayıt Ol!</button>
    </form>
    <br>
    <a href="login.php">Giriş Yapmak İçin Tıkla</a>
</body>
</html>