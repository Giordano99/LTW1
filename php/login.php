<?php

require_once("database.php");

$pass = $_POST["password"];
$mail = $_POST["email"];

echo "$mail"."$pass";

$query = "select * from utente where email=$mail and password = $pass";

echo "$query";
