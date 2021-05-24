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
    $now = date('H:i');
    $now = $now.":00";
    $query = "select * from prenotazione where utente = '$_COOKIE[mail]' and data_gioco >= '$data' and orario >= '$now'";
    
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
            $i = 0;
            
            while ($row = mysqli_fetch_array($risultato)) {
                
                $i = 1;
                $second_query = "select * from centroSportivo where ID = $row[centroSportivoID]";
                $results = mysqli_query($conn,$second_query);
        
                //ID unique so only one row resulted
                $riga = mysqli_fetch_array($results);
                
                echo '<hr style="border: 1px dashed black;" />';
                echo '<h1 style = "color:red">'.'Nome Centro Sportivo: '.$riga['nome'].'</h1>';
                echo '<h2 style = "color:black">'.'Città: '.$riga['citta'].'</h2>';
                echo '<h3 style = "color:black">'.'Indirizzo: '.$riga['indirizzo'].'</h3>';
                echo '<h4 style = "color:black">'.'Sport prenotato: '.$row['sport'].'</h4>';
                echo '<h5 style = "color:black">'.'Data di Prenotazione: '.$row['data_gioco'].'</h5>';
                echo '<h5 style = "color:black">'.'Orario di Prenotazione: '.$row['orario'].'</h5>';
                
                echo '<h6 style = "color:black">'.'Prenotazione a nome di: '.$row['utente'].'</h6>';
                
                
            ?>
        </body>
        </html>
        <?php
            
            }
            if ($i == 0) {

                echo "Non è presente alcuna prenotazione effettuata";
            }
        ?>

    </body>
</html>


  

    
