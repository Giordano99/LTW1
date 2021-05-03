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
    $pass = md5($_POST["password"]);
    $mail = $_POST["email"];

    $control = " select * from utente where email = '$mail'";
    #echo $control;
    $risultato = mysqli_query($conn,$control);
    $row = mysqli_fetch_array($risultato);
    echo $row;

    if($row){
        echo " utente già registrato";
        return false;
    }
    else
    {
    $query = "insert into utente(nome,cognome,email,password) values ('$name','$cogn','$mail','$pass')";
    
    if(mysqli_query($conn,$query))
    {
        echo " registrazione effettuata";
    }
    }
    


?>
