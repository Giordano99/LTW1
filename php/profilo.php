<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "partitella";

$conn = new mysqli($host,$user,$pass,$db) or die("unable to connect");
if(!$conn)
{echo "connessione fallita";}
echo "connessione al database effettuata";




?>
