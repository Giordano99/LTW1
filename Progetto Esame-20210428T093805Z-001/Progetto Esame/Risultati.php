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
	<head> <title> Risultati </title> </head>
	<body background="repubblica.gif">
	<p align="center">
		<font face="Palace Script MT"> <span style="font-size:80px;"> <b> Risultati Delle Elezioni </b> </span> </font>
	</p>
	<br> <br>
	<p align="center">
		<font color="blue" face="Palace Script MT"> <span style="font-size:65px;"> <b> I Risultati Numerici Delle Elezioni Sono: </b> </span> </font>
	</p>
		<table align="center">
			<tr>
				<td> <font color="black"> <span style="font-size:30px;"> <b> A: <?php echo $a ?> </b> </span> </font> </td>
			</tr>
			<tr> 
				<td> <font color="black"> <span style="font-size:30px;"> <b> B: <?php echo $b ?> </b> </span> </font> </td>
			</tr>
			<tr>
				<td> <font color="black"> <span style="font-size:30px;"> <b> C: <?php echo $c ?> </b> </span> </font> </td>
			</tr>
			<tr>
				<td>  </td>
			</tr>
			</span>
		</table>
		<p align="center">
			<font color="blue" face="Palace Script MT"> <span style="font-size:65px;"> <b> I Risultati Percentuali Delle Elezioni Sono: </b> </span></font>
		</p>
		<table align="center">			
			<tr>
				<td> <font color="black"> <span style="font-size:30px;"> <b> A: <?php echo $var1 ?>% </b> </span> </font> </td>
			</tr>
			<tr> 
				<td> <font color="black"> <span style="font-size:30px;"> <b> B: <?php echo $var2 ?>% </b> </span> </font> </td>
			</tr>
			<tr>
				<td> <font color="black"> <span style="font-size:30px;"> <b> C: <?php echo $var3 ?>% </b> </span> </font>  </td>
			</tr>
			<tr>
				<td>  </td>
			</tr>
			</span>
		</table>
		<p align="center">
		<font color="purple" face="Palace Script MT"> <span style="font-size:65px;"> <b> Hanno Votato <?php echo $r ?> Su <?php echo $Af ?> Persone Aventi Diritto </b> </span> </font>
		<font color="purple" face="Palace Script MT"> <span style="font-size:65px;"> <b> Quindi La Percentuale Sull'Affluenza Equivale A: <?php echo $Perc_Af ?>% </b> </span></font>
		</p>
		<p align="center">
			<font color="purple"> <span style="font-size:30px;"> <a href="Progetto_Esame.html"> Clicca Qui Per Tornare Alla Pagina Principale </a> </span> </font>
		</p>
	</body>
</html>