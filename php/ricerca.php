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


    $citta = $_POST["citta"];
    $nome = $_POST["nome"];
    $data = $_POST["data"];
    $orario = $_POST["orario"];
    $opzione = $_POST["opzione"];

    #echo $citta.$categoria.$data.$orario;


    $query = "select * from centroSportivo where citta = '$citta'";

    $risultato = mysqli_query($conn,$query);
    


    

    ?>

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

        <body class="text-center" onload="openPage('Home_Accesso', this, 'red')">

            <a href=#Home_Accesso><button class="tablink" onclick="openPage('Home_Accesso', this, 'red')">Home</button></a>
            <a href=#Partite><button class="tablink" onclick="openPage('Partite', this, 'blue')">Partite</button></a>
            <a href=#Come_Funziona><button class="tablink" onclick="openPage('Come_Funziona', this, 'green')">Come Funziona</button></a>
            <a href=#Utente><button class="tablink" onclick="openPage('Utente', this, 'orange')">Impostazioni</button></a>




            <div id="Home_Accesso" class="tabcontent">

                    <div>
                        $row['nome']
                        
                    </div>


            </div>

            <div id="Partite" class="tabcontent">

            </div>

            <div id="Come_Funziona" class="tabcontent">

            </div>

            <div id="Utente" class="tabcontent">

            </div>

        </body>

    </html>
    <?php
    while ($row = mysqli_fetch_array($risultato)) {
        echo "<div>";
        echo '<h2>'.$row['nome'].'</h2>';
        echo '<h4>'.$row['indirizzo'].'</h4>';
        echo " ".$row['citta']." ".$row['indirizzo']." ".$row['descrizione']." ".$row['regole'];
        echo $row['docce']." ".$row['ristorante']." ".$row['bar']." ".$row['pizzeria']." ".$row['area_picnic']." ".$row['spogliatoi']." ".$row['casacche']." ".$row['pub']." ".$row['parcheggio']." ".$row['tornei_campionati']." ".$row['sala_feste']." ".$row['calcio_A5']." ".$row['beach_volley']." ".$row['calcio_A8']." ".$row['rugby']." ".$row['squash'];
        
        echo "</div>";
        echo "<br>";

            ?>
            </body>
        </html>
<?php
    }

?>

<html>

<head>

