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
    
    
    $i = 0;
    if ($citta == '' && $nome == '') {

        $i = 2;
        echo "<script>alert('Inserire la città o il centro sportivo per la ricerca');</script>";
    }

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

                $query2 = "select * from prenotazione where centroSportivoID = '$row[ID]'";

                $risultato2 = mysqli_query($conn,$query2);                

                $al = 0;

                $orario = $orario.":00";

                while ($row2 = mysqli_fetch_array($risultato2)) {

                    if ($orario == $row2['orario'] && $data == $row2['data_gioco'] && $opzione == $row2['sport']) {
                            
                        $al = 1;
                    }
                }


                if ($al == 0) {


                    $i = 1;
                    echo "<div>";
                    echo '<h2 style = "color:red">'.$row['nome'].'</h2>';
                    echo '<h4 style = "color:black">'.$row['citta'].' -- '.$row['indirizzo'].'</h4>';
                    echo '<h4 style = "color:black"> Descrizione: '.$row['regole'].'</h4>';
                    echo '<br>';
                    echo '<h4 style = "color:black"> Regole: '.$row['regole'].'</h4>';
                    echo '<br>';
                    echo '<h4 style = "color:black">Servizi Disponibili: </h4>';
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

                    $control = "select ID from centroSportivo where nome = '$row[nome]' and citta = '$row[citta]' and indirizzo = '$row[indirizzo]'";

                

                    $valore = mysqli_query($conn,$control);

                    $row = mysqli_fetch_array($valore);

                


                    setcookie("opzione", "", time()-3600);
                    setcookie("opzione", $opzione);
                    setcookie("opzione", $opzione, time()+3600);  /* expire in 1 hour */
                    #echo "<a href=../php/prenotazione.php?row['ID']=", $row['ID'],"><button> PRENOTA </button></a>";
                    
                    $value = $row['ID'];
                    
                    echo "<br>";

                    echo "AUTENTICATI PER POTER PRENOTARE";
              
                }
            ?>
        </body>
        </html>
        <?php
            
            }

            if ($i == 0) {

                echo "La ricerca non ha tornato alcun risultato, si prega di riprovare";
            }
        ?>

    </body>
</html>

