<?php


$host = "localhost";
$user = "root";
$pass = "";
$db = "partitella";

$conn = new mysqli($host,$user,$pass,$db) or die("unable to connect");
if(!$conn)
{echo "connessione fallita";}
echo "connessione al database effettuata";

$pass = $_POST["password"];
$mail = $_POST["email"];

#echo "$mail"."$pass";

$query = "select nome from utente where email = '$mail' and password = '$pass'";
if(mysqli_query($conn,$query))
    {
        echo "login effettuato";
    }

echo "$query";
