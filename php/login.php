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

$query = "select nome from utente where email = '$mail' and password = '$pass'";
if(mysqli_query($conn,$query)) {

    echo "<script>alert('Login Effettuato')</script>";
    echo "<script>window.open('../Accesso/accesso.html#Home_Accesso','_self')</script>";
    exit();    
}

else {

    echo "<script>alert('Accesso NEGATO')</script>";
    echo "<script>window.open('../Index/index.html#Accedi-Registrati','_self')</script>";
    exit();
}

echo "$query";

?>
