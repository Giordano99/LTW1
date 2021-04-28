<?php
	session_start();
	$a=0;
	$b=0;
	$c=0;
	$r=0;
	$Af=0;
	$var1=0;
	$var2=0;
	$var3=0;
	$accessData=parse_ini_file('..\..\configDB2.ini');
	$conn=mysqli_connect("localhost", $accessData['Username'], $accessData['Password'], $accessData['DBName']);
	$accessData=parse_ini_file('..\..\configDB.ini');
	$conn2=mysqli_connect("localhost", $accessData['Username'], $accessData['Password'], $accessData['DBName']);	
	if (getdate()['mday']>'5' and getdate()['mday']<'31' and getdate()['mon']=='6' and getdate()['year']=='2018' ) //Funziona all'inverso
	{
		echo "Entrato!";
		$comandoSQL="select (Scelta) from voto";
		$C1="select (Scelta) from voto where Scelta='A'";
		$C2="select (Scelta) from voto where Scelta='B'";
		$C3="select (Scelta) from voto where Scelta='C'";
		$CAff="select (ID) from users";
		$risultato=mysqli_query($conn, $comandoSQL);
		while($ris=mysqli_fetch_assoc($risultato)) $r++;
		$Aff=mysqli_query($conn2, $CAff);
		while($Affluenza=mysqli_fetch_assoc($Aff)) $Af++;
		$R1=mysqli_query($conn, $C1);
		$R2=mysqli_query($conn, $C2);
		$R3=mysqli_query($conn, $C3);
		while ($P1=mysqli_fetch_assoc($R1)) $a++;
		while ($P2=mysqli_fetch_assoc($R2)) $b++;
		while ($P3=mysqli_fetch_assoc($R3)) $c++;
		$var1=($a/$r)*100;
		$var2=($b/$r)*100;
		$var3=($c/$r)*100;
		$_SESSION['r']=$r; //numero voti effettivi
		$_SESSION['a']=$a; //numero voti a
		$_SESSION['b']=$b; //numero voti b
		$_SESSION['c']=$c; //numero voti c
		$_SESSION['var1']=$var1; //percentuali voto a
		$_SESSION['var2']=$var2; //percentuali voto b
		$_SESSION['var3']=$var3; //percentuali voto c
		$_SESSION['Af']=$Af; //numero aventi diritto al voto
		$Perc_Af=($r/$Af)*100;
		$_SESSION['Perc_Af']=$Perc_Af; //percentuale affluenza
		header("Location: Risultati.php");
	}
	else
	{
		header("Location: Tempo_Non_Scaduto.html");
	}
?>