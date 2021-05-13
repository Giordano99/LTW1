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


    $data = date("Y-m-d");
    
    $query = "select * from prenotazione where utente = '$_COOKIE[mail]' and data_gioco >= '$data'";
    
    
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

                $second_query = "select * from centroSportivo where ID = $row[centroSportivoID]";
                $results = mysqli_query($conn,$second_query);
        
                //ID unique so only one row resulted
                $riga = mysqli_fetch_array($results);
                
                echo '<hr style="border: 1px dashed black;" />';
                echo '<h1>'.'Nome Centro Sportivo: '.$riga['nome'].'</h2>';
                echo '<h2>'.'Città: '.$riga['citta'].'</h3>';
                echo '<h3>'.'Indirizzo: '.$riga['indirizzo'].'</h4>';
                echo '<h4>'.'Sport prenotato: '.$row['sport'].'</h4>';
                echo '<h5>'.'Prenotazione a nome di: '.$row['utente'].'</h5>';
                
                
            ?>
        </body>
        </html>
        <?php
            
            }
        ?>

    </body>
</html>


  

    
