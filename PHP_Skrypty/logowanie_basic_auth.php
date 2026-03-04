<?php
$authorized = false;

if(isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW']))
{
    $a=$_SERVER['PHP_AUTH_USER'];
	$b=$_SERVER['PHP_AUTH_PW'];

	$pol=@mysqli_connect('localhost','root','','logowanie') //Baza danych logowanie.sql - 27.02.2026
	or die ("Nie można się połaczyć");

	$query="SELECT id_u FROM uzytkownicy WHERE nazwa='$a' AND haslo='$b'";
	$result=mysqli_query($pol, $query);
	if (!$result || mysqli_num_rows($result)==0)
	{
		echo "<P>Nie ma takiego loginu lub złe hasło</P>";
	}
	else
	{
        echo"<p>Autoryzacja prawidłowa</p>";
        $authorized = true;
    }
}
    else
    {
        header('WWW-Authenticate: Basic realm="Moja strona"');
        header('HTTP/1.0 401 Unauthorized');
    }

?>
