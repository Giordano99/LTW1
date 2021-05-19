<?php

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "partitella";

    $conn = new mysqli($host,$user,$pass,$db) or die("unable to connect");
    if(!$conn) {

        echo "connessione fallita";
    }
    else {

        echo "connessione al database effettuata";
    }

    $ID = $_GET['ID'];

    $check_value = $_GET['check_value'];

    $mancanti = $_GET['mancanti'];
    
    echo $ID;
    
    $differenza = $mancanti - $check_value;

    $query = "update prenotazione set check_value = $differenza where ID = $ID";

    if(mysqli_query($conn,$query))
    {
                
        echo "<script>alert('Prenotazione Effettuata')</script>";
        echo "<script>window.open('../Accesso/accesso.php#Home_Accesso','_self')</script>";                
        exit();
    }

?>