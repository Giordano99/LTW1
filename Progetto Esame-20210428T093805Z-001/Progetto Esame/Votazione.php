<?php
	session_start();
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$accessData=parse_ini_file('..\..\configDB.ini');
		$conn=mysqli_connect("localhost", $accessData['Username'], $accessData['Password'], $accessData['DBName']);
		$Codice=$_POST['Codice'];
		$Password=$_POST['Password'];
		$comandoSQL="select * from Users where Codice='".$Codice."'"; 
		$risultato=mysqli_query($conn, $comandoSQL);
		$ComandoSQL="select * from Users where Password='".$Password."'";
		$Risultato=mysqli_query($conn, $ComandoSQL);
		
		if ($riga=mysqli_fetch_assoc($risultato))
		{
			$autenticato=($Codice===$riga['Codice']);
			if ($Riga=mysqli_fetch_assoc($Risultato))
			{
				$Autenticato=($Password===$Riga['Password']);		
				if ($Riga['ID']===$riga['ID'])
				{
					$Comando="select Votato from users where Codice='".$Codice."' and Votato='1'";
					$Ri=mysqli_query($conn, $Comando);
					if (getdate()['mday']>'5' and getdate()['wday']<'31' and getdate()['mon']=='6' and getdate()['year']=='2018')
					{
						if ($RIGA=mysqli_fetch_assoc($Ri)==0)
						{
							$ComandoSQL2="update users set Votato='1' where Codice='".$Codice."'";
							$R=mysqli_query($conn, $ComandoSQL2);
							header("Location: Autenticato.html");
						}
						else
						{
							header("Location: Gia_Votato.html");
						}
					}
					else
					{
						header("Location: Tempo_Scaduto.html");
					}
					
				}
				else 
				{
					header("Location: Non_Autenticato.html");
				}
			}
			else 
			{
				$autenticato=false;
				header("Location: Non_Autenticato.html");
			}
		}
		else
		{
			$Autenticato=false;
			header("Location: Non_Autenticato.html");
		}
		mysqli_close($conn);
	}
?>