<?php
if (!isset($_POST['s']))
{
?>
<form action="i4g2_10.php" method="post">
    Podaj login: <input type="text" name="log"><br><br>
    Podaj hasło: <input type="password" name="pas"><br><br><br>
    <input type="submit" name="s" value="wyślij">
</form>
<?php
}
else
{
    if (strlen($_POST['log']) > 0 && strlen($_POST['pas']) > 0)
    {
        $l = $_POST['log'];
        $p = $_POST['pas'];

        if ($l == "u1" && $p == "aaa")
        {
            header('Location: poprawnedane.php');
            exit;
        }
        else
        {
            echo "Nieprawidłowe dane <br>";
        }
    }
    else
    {
        echo "Uzupełnij wszystkie pola";
    }
}
?>
