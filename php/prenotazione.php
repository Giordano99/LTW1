<?php

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "partitella";

    $conn = new mysqli($host,$user,$pass,$db) or die("unable to connect");
    if(!$conn) {echo 

        "connessione fallita";
    }
    else {

        echo "connessione al database effettuata";
    }


    $value = $_GET['value']; 


    $query = "insert into prenotazione(centroSportivoID,utente,sport) values
    ('$value','$_COOKIE[mail]','$_COOKIE[opzione]')";
    
    if(mysqli_query($conn,$query))
    {
                
        echo "<script>alert('Prenotazione Effettuata')</script>";
        echo "<script>window.open('../Accesso/accesso.html#Home_Accesso','_self')</script>";                
        exit();
    }
?>