<?php 
session_start();

if(!isset($_SESSION["zalogowany"])){
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strona główna</title>
</head>
<body>
    <h1>Strona główna dla zalogowanych</h1>

    <p>Zalogowany użytkownik: <?php echo $_SESSION["zalogowany"]; ?></p>

    <a href="logout.php">Wyloguj się</a>
    
</body>
</html>