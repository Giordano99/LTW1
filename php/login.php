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
    

    //reset cookie
    setcookie("mail","", time()-3600);
    
    $pass = $_POST["password"];
    $mail = $_POST["email"];

    $pass = md5($pass);
    
    $query = "select nome from utente where email = '$mail' and password = '$pass'";
    if(mysqli_query($conn,$query)) {

        $risultato = mysqli_query($conn,$query);
        #$row = mysqli_fetch_array($risultato);


        $rowcount = mysqli_num_rows($risultato);
        if ($rowcount > 0) {
            
            setcookie("mail", $mail);
            setcookie("mail", $mail, time()+3600);  /* expire in 1 hour */
            echo "<script>alert('Login Effettuato con e-mail: $mail')</script>";
            echo "<script>window.open('../Accesso/accesso.html#Home_Accesso','_self')</script>";
            exit();  
        }
        else {

            echo "<script>alert('Accesso NEGATO')</script>";
            echo "<script>window.open('../Index/index.html#Accedi-Registrati','_self')</script>";
            exit();
        }
    }
    else {

        echo "<script>alert('Problema di Connessione al Server')</script>";
        echo "<script>window.open('../Index/index.html#Accedi-Registrati','_self')</script>";
        exit();
    }

    echo "$query";

?>
