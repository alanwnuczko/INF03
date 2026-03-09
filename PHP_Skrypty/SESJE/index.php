<?php
    session_start();
    
    if(isset($_SESSION["zalogowany"])){
        header("Location: glowna.php");

    }
    ?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
</head>
<body>
    <form action="" method="post">
        login:  <input type="text" name="login"><br><br>
        hasło:  <input type="password" name="haslo"><br><br>
        <input type="submit" value="zaloguj się"><br><br>
    </form>

    <?php
    if(isset($_POST["login"]) && isset($_POST["haslo"])){

        if($_POST['login'] == "admin" && $_POST['haslo'] == "admin123"){

            $_SESSION["zalogowany"] = "admin";
            header("Location: glowna.php");
        }
        else{
            echo"Błędne dane logowania";
        }
    }

    ?>
</body>
</html>