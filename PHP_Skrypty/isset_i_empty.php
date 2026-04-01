<?php
// isset() = Zwraca TRUE jeżeli zmienna jest zadeklarowana i nie jest null
// empty() = zwraca TRUE jeżeli zmienna jest niezadeklarowana, false, null lub ""

    $username = "Nazwa";


    if(isset($username))
    {
        echo"Nazwa użytkownika jest ustawiona";
    }
    else
    {
        echo"Nazwa użytkownika nie jest ustawiona";
    }

    echo"<br>";

    if(empty($username))
    {
        echo"Nazwa użytkownika jest pusta";
    }
    else
    {
        echo"Nazwa użytkownika nie jest pusta";
    }
?>