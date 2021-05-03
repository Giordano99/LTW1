<?php

require_once("database.php");



    $name = $_POST["nome"];
    $cogn = $_POST["cognome"];
    $pass = $_POST["password"];
    $mail = $_POST["email"];

    $query = "insert into utente(nome,cognome,e-mail,password) values ('$name','$cogn','$mail','$pass')";
     
    if(mysqli_query($conn,$query))
    {
        echo "registrazione effettuata";
    }
    


?>
