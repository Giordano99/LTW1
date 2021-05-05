<?php

    setcookie("mail","",time()-3600);
    echo "<script>alert('Logout Effettuato')</script>";
    echo "<script>window.open('../Index/index.html','_self')</script>";
?>