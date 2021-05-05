<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "partitella";

$conn = new mysqli($host,$user,$pass,$db) or die("unable to connect");
if(!$conn)
{echo "connessione fallita";}
echo "connessione al database effettuata";

$query = "insert into prenotazione(centroSportivo,utente,sport,costo) values
('pucci','$_COOKIE[mail]','calcio','0')";
echo $query;

if(mysqli_query($conn,$query))
        {
            
            echo "<script>alert('Prenotazione Effettuata')</script>";
            echo "<script>window.open('../Accesso/accesso.html#Home_Accesso','_self')</script>";
            
            exit();
        }