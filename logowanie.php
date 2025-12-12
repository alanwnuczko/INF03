<?php
if (!isset($_POST['s']))
{

?>
<form action="i4g2_10.php" method="post">
    Podaj login: <input type="text" name="log"></br></br>
    Podaj hasło: <input type="password" name="pas"></br></br></br>
    <input type="submit" name="s" value="wyslij">
</form>
<?php
}
else
{
    if (strlen($_POST['log']) > 0 && strlen($_POST['pas']) > 0)
    {

        $l=$_POST['log'];
        $l=$_POST['pas'];
        
        if( $l =="u1" && $p="aaa")
        {
            echo"Prawidłowe dane </br>";
            header('Location: poprawnedane.php');
        }
        else
        {
            echo"Nieprawidłowe dane </br>";
        }

    }
}
?>
