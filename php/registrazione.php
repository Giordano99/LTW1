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


    //reset cookie
    setcookie("mail","", time()-3600);

    $name = $_POST["nome"];
    $cogn = $_POST["cognome"];
    $pass = md5($_POST["password"]);
    $mail = $_POST["email"];

    $control = " select * from utente where email = '$mail'";

    $risultato = mysqli_query($conn,$control);
    $row = mysqli_fetch_array($risultato);


    if($row){
        
        #echo "utente già registrato";
        
        echo "<script>alert('Utente già Registrato')</script>";
        echo "<script>window.open('../Index/index.html#Accedi-Registrati','_self')</script>";
        
        
        exit();
    }
    else
    {
        $query = "insert into utente(nome,cognome,email,password) values ('$name','$cogn','$mail','$pass')";

        if(mysqli_query($conn,$query))
        {
            setcookie("mail", $mail);
            setcookie("mail", $mail, time()+3600,"/");  /* expire in 1 hour */
            echo "<script>alert('Registrazione Effettuata')</script>";
            echo "<script>window.open('../Accesso/accesso.php#Home_Accesso','_self')</script>";
            
            exit();
        }
    }



?>