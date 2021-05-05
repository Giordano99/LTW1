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
    
    if ($nome == '') {

        $query = "select * from centroSportivo where citta = '$citta' and $opzione = 1";
    }
    //else meanings --> if (nome != '') ...
    else {

        $query = "select * from centroSportivo where nome = '$nome' and $opzione = 1";
    }
    
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

        <body class="text-center">
       
        
            <?php
            while ($row = mysqli_fetch_array($risultato)) {

                echo "<div>";
                echo '<h2>'.$row['nome'].'</h2>';
                echo '<h4>'.$row['citta'].' -- '.$row['indirizzo'].'</h4>';
                echo 'Descrizione: '.$row['descrizione'];
                echo '<br>';
                echo 'Regole: '.$row['regole'];
                echo '<br>';
                echo 'Servizi Disponibili: ';
                if ($row['docce']) {

                    echo 'Docce'.'--';
                }

                if ($row['ristorante']) {

                    echo 'Ristorante'.'--';
                }

                if ($row['bar']) {

                    echo 'Bar'.'--';
                }

                if ($row['pizzeria']) {

                    echo 'Pizzeria'.'--';
                }

                if ($row['area_picnic']) {

                    echo 'Area Picnic'.'--';
                }

                if ($row['spogliatoi']) {

                    echo 'Spogliatoi'.'--';
                }

                if ($row['casacche']) {

                    echo 'Casacche'.'--';
                }

                if ($row['pub']) {

                    echo 'Pub'.'--';
                }

                if ($row['parcheggio']) {

                    echo 'Parcheggio'.'--';
                }

                if ($row['tornei_campionati']) {

                    echo 'Tornei/Campionati'.'--';
                }

                if ($row['sala_feste']) {

                    echo 'Sala Feste'.'--';
                }

                if ($row['calcio_A5']) {

                    echo 'Calcio A5'.'--';
                }

                if ($row['beach_volley']) {

                    echo 'Beach Volley'.'--';
                }

                if ($row['calcio_A8']) {

                    echo 'Calcio A8'.'--';
                }

                if ($row['rugby']) {

                    echo 'Rugby'.'--';
                }

                if ($row['squash']) {

                    echo 'Squash'.'--';
                }
                
                echo "</div>";
                echo " <a href='../php/prenotazione.php'><button> PRENOTA </button></a>";
            
              
            ?>
        </body>
        </html>
        <?php
            
            }
        ?>

    </body>
</html>

