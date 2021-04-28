<?php
	session_start();
	$a=$_SESSION['a'];
	$b=$_SESSION['b'];
	$c=$_SESSION['c'];
	$var1=$_SESSION['var1'];
	$var2=$_SESSION['var2'];
	$var3=$_SESSION['var3'];
	$r=$_SESSION['r'];
	$Af=$_SESSION['Af'];
	$Perc_Af=$_SESSION['Perc_Af'];
?>
<html>
	<head> <title> Affluenza </title> </head>
	<body background="repubblica.gif">
		<br /> <br/> <br/> <br/> <br/> <br/>
		<p align="center">
			<font color="purple" face="Palace Script MT"> <span style="font-size:130px;"> <b> Hanno Votato <?php echo $r ?> Su <?php echo $Af ?> Persone Aventi Diritto </b> </span> </font>
			<font color="purple" face="Palace Script MT">  <span style="font-size:130px;"> <b> Quindi La Percentuale Sull'Affluenza Equivale A: <?php echo $Perc_Af ?>% </b> </span> </font>
		</p>
		<br /> <br />
		<p align="center">
			<font color="purple"> <span style="font-size:65px;"> <a href="Progetto_Esame.html"> Clicca Qui Per Tornare Alla Pagina Principale </a> </span> </font>
		</p>
	</body>
</html>