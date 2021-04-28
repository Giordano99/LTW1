<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{	
		$A=$_REQUEST['A'];
		$accessData=parse_ini_file('..\..\configDB2.ini');
		$conn=mysqli_connect("localhost", $accessData['Username'], $accessData['Password'], $accessData['DBName']);
		$ComandoSQL="insert into voto values('".$A."')";
		$Risultato=mysqli_query($conn, $ComandoSQL);
		header("Location: Voto_Effettuato.html");
	}
	mysqli_close($conn);
?>