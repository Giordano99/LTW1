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

    $control = " select * from centroSportivo where nome = '$nome' and citta = '$citta' and indirizzo = '$indirizzo'";

    $risultato = mysqli_query($conn,$control);
    $row = mysqli_fetch_array($risultato);


    if($row){
        
        #echo "utente già registrato";
        
        echo "<script>alert('Centro Sportivo già Registrato')</script>";
        echo "<script>window.open('../Accesso/accesso.php','_self')</script>";
        
        
        exit();
    }
    else {

        $query = "insert into centroSportivo(nome, citta, indirizzo, descrizione, regole, docce, ristorante, bar, pizzeria, area_picnic, spogliatoi, casacche, pub, parcheggio, tornei_campionati, sala_feste, calcio_A5, beach_volley, calcio_A8, rugby, squash) values ('$nome','$citta','$indirizzo','$descrizione', '$regole', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";

        if (mysqli_query($conn,$query)) {

            $servizi = $_POST['servizi'];
            $array = $servizi;

            foreach($array as $key => $value) {

                $query2 = "update centroSportivo set $value = 1 where nome = '$nome' and citta = '$citta' and indirizzo = '$indirizzo';";            
                

                if (!mysqli_query($conn,$query2)) {
                    echo "<script>alert('op')</script>";
                }
            }
            
            $sport = $_POST['sport'];

            foreach($sport as $key => $value) {
                
                $query3 = "update centroSportivo set $value = 1 where nome = '$nome' and citta = '$citta' and indirizzo = '$indirizzo';";            
                if (mysqli_query($conn,$query3)) {
                
                    echo "<script>alert('Centro Sportivo Aggiunto con Successo')</script>";
                }
                else {
                echo "<script>alert('op')</script>";}
            }
        }
    }
    echo "<script>window.location.href='../Accesso/accesso.php'</script>";
?>
