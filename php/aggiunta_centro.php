<?php

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "partitella";

    $conn = new mysqli($host,$user,$pass,$db) or die("unable to connect");
    if(!$conn) {

        echo "connessione fallita";
    }
    
    #echo "connessione al database effettuata";


    $nome = $_POST["nome"];
    $citta = $_POST["citta"];
    $indirizzo = $_POST["indirizzo"];
    $descrizione = $_POST["descrizione"];
    $regole = $_POST["regole"];

    $servizi = $_POST['servizi'];

    $array = $servizi;
    print_r(array_values($array));
    #echo array_values($array[0]);

    $query = "insert into centroSportivo(nome, citta, indirizzo, descrizione, regole, docce, ristorante, bar, pizzeria, area_picnic, spogliatoi, casacche, pub, parcheggio, tornei_campionati, sala_feste, calcio_A5, beach_volley, calcio_A8, rugby, squash) values ('$nome','$citta','$indirizzo','$descrizione', '$regole', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
    
    if (mysqli_query($conn,$query)) {

        foreach($array as $key => $value) {
            
            $query = "update centroSportivo set $value = 1 where nome = '$nome' and citta = '$citta' and indirizzo = '$indirizzo';";            
            if (mysqli_query($conn,$query)) {

                echo "<script>alert('Centro Sportivo Aggiunto con Successo')</script>";
        
            }
            else {

                echo "<script>alert('Centro Sportivo NON Aggiunto')</script>";
            }
        }
    }
    else {

        echo "<script>alert('Centro Sportivo NON Aggiunto')</script>";
    }
    
    echo "<script>window.open('../Accesso/accesso.html','_self')</script>";

?>
