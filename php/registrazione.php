<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "partitella";

$conn = new mysqli($host,$user,$pass,$db) or die("unable to connect");
if(!$conn)
{echo "connessione fallita";}
echo "connessione al database effettuata";


    $name = $_POST["nome"];
    $cogn = $_POST["cognome"];
    $pass = $_POST["password"];
    $mail = $_POST["email"];

    echo "$name"."$cogn"."$pass"."$mail";

   $query = "insert into utente(nome,cognome,email,password) values ('$name','$cogn','$mail','$pass')";
 
    if(mysqli_query($conn,$query))
    {
        echo "registrazione effettuata";
    }
    


?>
