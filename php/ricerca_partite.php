<html>
        <head>
            <title> Partitella? - Ricerca </title>
            <meta charset="utf-8"/>
            <meta name="viewport" content="width=device-width initial-scale=1"/>

            <link rel="stylesheet" type="text/css" href="../Index/index.css"/>

            <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>

            <link rel="stylesheet" type="type/css" href="style.css"/>
            <script type="text/javascript" lang="javascript"
            src="../js/bootstrap.min.js"></script>
            <!-- <script type="text/javascript" lang="javascript" src="script.js"></script> -->

            <script type="text/javascript" src="../Index/index.js"></script>


            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


        </head>

        <body class="text-center">
       

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


    $citta = $_GET["citta"];
    $nome = $_GET["nome"];
    $data = $_GET["data"];
    $orario = $_GET["orario"];
    $opzione = $_GET["opzione"];
    $check_value = $_GET["check_value"];
    
    $i = 0;
    if ($citta == '' && $nome == '') {

        $i = 2;
        echo "<script>alert('Inserire la città o il centro sportivo per la ricerca');</script>";
    }

    $query2 = "select * from prenotazione where check_value >= $check_value";

    $risultato2 = mysqli_query($conn,$query2);

    while ($row2 = mysqli_fetch_array($risultato2)) {

        $mancanti =$row2['check_value']; 

        if ($nome == '') {

            $query = "select * from centroSportivo where ID = '$row2[centroSportivoID]' and citta = '$citta' and $opzione = 1";
        }
        //else meanings --> if (nome != '') ...
        else {
    
            $query = "select * from centroSportivo where ID = '$row2[centroSportivoID]' and nome = '$nome' and $opzione = 1";
        }

        $risultato = mysqli_query($conn,$query);

        while ($row = mysqli_fetch_array($risultato)) {

            $query3 = "select * from prenotazione where centroSportivoID = '$row[ID]'";

            $risultato3 = mysqli_query($conn,$query3);                

            $al = 0;

            $orario = $orario.":00";

            while ($row3 = mysqli_fetch_array($risultato3)) {

                if ($orario == $row3['orario'] && $data == $row3['data_gioco'] && $opzione == $row3['sport']) {
                        
                    $al = 1;
                }
            }


            if ($al == 0) {

                $i = 1;
                echo "<div>";
                echo '<h2>'.$row['nome'].'</h2>';
                echo '<h4>'.$row['citta'].' -- '.$row['indirizzo'].'</h4>';
                echo 'Descrizione: '.$row['descrizione'];
                echo '<br>';
                echo 'Regole: '.$row['regole'];
                echo '<br>';
                echo 'Servizi Disponibili: ';

                if ($row['docce']) {

                    echo '<img src="https://image.flaticon.com/icons/png/512/93/93958.png" style="width:64px;height:64px;">';
                }

                if ($row['ristorante']) {

                    echo '<img src="https://img.icons8.com/material/452/restaurant--v1.png" style="width:64px;height:64px;">';
                }

                if ($row['bar']) {

                    echo '<img src="https://img.icons8.com/ios/452/cafe.png" style="width:64px;height:64px;">';
                }

                if ($row['pizzeria']) {

                    echo '<img src="https://img.icons8.com/ios/452/pizza.png" style="width:64px;height:64px;">';
                }

                if ($row['area_picnic']) {

                    echo '<img src="https://img.icons8.com/ios/452/picnic-table.png" style="width:64px;height:64px';
                }

                if ($row['spogliatoi']) {

                    echo '<img src="https://img.icons8.com/ios/452/drawer.png" style="width:64px;height:64px;">';
                }

                if ($row['casacche']) {

                    echo '<img src="https://img.icons8.com/small/452/vest.png" style="width:64px;height:64px;">';
                }

                if ($row['pub']) {

                    echo '<img src="https://img.icons8.com/ios/452/poolside-bar.png" style="width:64px;height:64px;">';
                }

                if ($row['parcheggio']) {

                    echo '<img src="https://img.icons8.com/ios/452/outdoor-parking.png" style="width:64px;height:64px;">';
                }

                if ($row['tornei_campionati']) {

                    echo '<img src="https://img.icons8.com/ios/452/tournament-mode.png" style="width:64px;height:64px;">';
                }

                if ($row['sala_feste']) {

                    echo '<img src="https://img.icons8.com/ios/452/party-baloons.png" style="width:64px;height:64px;">                    ';
                }

                echo '<br>';
                echo 'Sport Disponibili: ';

                if ($row['calcio_A5']) {

                    echo '<img src="https://img.icons8.com/metro/452/5.png" style="width:64px;height:64px;">';
                }

                if ($row['beach_volley']) {

                    echo '<img src="https://img.icons8.com/ios/452/volleyball--v2.png" style="width:64px;height:64px;">';
                }

                if ($row['calcio_A8']) {

                    echo '<img src="https://img.icons8.com/windows/452/8.png" style="width:64px;height:64px;">';
                }

                if ($row['rugby']) {

                    echo '<img src="https://img.icons8.com/metro/452/rugby.png" style="width:64px;height:64px;">';
                }

                if ($row['squash']) {

                    echo '<img src="https://img.icons8.com/ios/452/squash-racquet.png" style="width:64px;height:64px;">';
                }

                echo "<br>";
                echo "Posti Disponibili Ancora: ".$mancanti;

                echo "</div>";
            }

            echo "<a href=../php/prenotazione_partite.php?ID=", $row2['ID'],"&check_value=", $check_value,"&mancanti=", $mancanti,"><button> PRENOTA </button></a>";

        }
            
    }

    if ($i == 0) {

        echo "La ricerca non ha tornato alcun risultato, si prega di riprovare";
    }
    
    ?>
            
    </body>
</html>
