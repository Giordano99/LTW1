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


if($name){

    $query1 = "UPDATE utente SET nome = '$name' where email = '$_COOKIE[mail]'";
    if(mysqli_query($conn,$query1))
        {
            
            echo "<script>alert('Modifiche Effettuate')</script>";
            echo "<script>window.open('../Accesso/accesso.html#Home_Accesso','_self')</script>";
            
        }

}
if($cogn){

    $query2 = "UPDATE utente SET cognome= '$cogn' where email = '$_COOKIE[mail]'";
    if(mysqli_query($conn,$query2))
        {
            
            echo "<script>alert('Modifiche Effettuate')</script>";
            echo "<script>window.open('../Accesso/accesso.html#Home_Accesso','_self')</script>";
            
        }

}
if($pass){

    $query3 = "UPDATE utente SET password = '$pass' where email = '$_COOKIE[mail]'";
    if(mysqli_query($conn,$query3))
    {
        
        echo "<script>alert('Modifiche Effettuate')</script>";
        echo "<script>window.open('../Accesso/accesso.html#Home_Accesso','_self')</script>";
        

    }
}



exit();



?>
