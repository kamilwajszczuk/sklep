<?php

	session_start();
	
	if (isset($_POST['email']))
	{
		//Udana walidacja? Załóżmy, że tak!
		$wszystko_OK=true;
		
		//Sprawdź poprawność nickname'a
		$nick = $_POST['nick'];
		
		//Sprawdzenie długości nicka
		if ((strlen($nick)<3) || (strlen($nick)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_nick']="Nick musi posiadać od 3 do 20 znaków!";
		}
		
		if (ctype_alnum($nick)==false)
		{
			$wszystko_OK=false;
			$_SESSION['e_nick']="Nick może składać się tylko z liter i cyfr (bez polskich znaków)";
		}
		
		// Sprawdź poprawność adresu email
		$email = $_POST['email'];
		$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
		
		if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
		{
			$wszystko_OK=false;
			$_SESSION['e_email']="Podaj poprawny adres e-mail!";
		}
		
		//Sprawdź poprawność hasła
		$haslo1 = $_POST['haslo1'];
		$haslo2 = $_POST['haslo2'];
		
		if ((strlen($haslo1)<8) || (strlen($haslo1)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_haslo']="Hasło musi posiadać od 8 do 20 znaków!";
		}
		
		if ($haslo1!=$haslo2)
		{
			$wszystko_OK=false;
			$_SESSION['e_haslo']="Podane hasła nie są identyczne!";
		}	

		$haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);
		
		//Czy zaakceptowano regulamin?
		if (!isset($_POST['regulamin']))
		{
			$wszystko_OK=false;
			$_SESSION['e_regulamin']="Potwierdź akceptację regulaminu!";
		}				
		
		//Bot or not? Oto jest pytanie!
		$sekret = "6Le-FQ0UAAAAAA9h23_heFX2BZhXvVK2P1X2uJIB";
		
		$sprawdz = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$sekret.'&response='.$_POST['g-recaptcha-response']);
		
		$odpowiedz = json_decode($sprawdz);
		
		if ($odpowiedz->success==false)
		{
			$wszystko_OK=false;
			$_SESSION['e_bot']="Potwierdź, że nie jesteś botem!";
		}		
		
		//Zapamiętaj wprowadzone dane
		$_SESSION['fr_nick'] = $nick;
		$_SESSION['fr_email'] = $email;
		$_SESSION['fr_haslo1'] = $haslo1;
		$_SESSION['fr_haslo2'] = $haslo2;
		if (isset($_POST['regulamin'])) $_SESSION['fr_regulamin'] = true;
		
		require_once "connect.php";
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		try 
		{
			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
			if ($polaczenie->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{
				//Czy email już istnieje?
				$rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE email='$email'");
				
				if (!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_maili = $rezultat->num_rows;
				if($ile_takich_maili>0)
				{
					$wszystko_OK=false;
					$_SESSION['e_email']="Istnieje już konto przypisane do tego adresu e-mail!";
				}		

				//Czy nick jest już zarezerwowany?
				$rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE user='$nick'");
				
				if (!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_nickow = $rezultat->num_rows;
				if($ile_takich_nickow>0)
				{
					$wszystko_OK=false;
					$_SESSION['e_nick']="Istnieje już gracz o takim nicku! Wybierz inny.";
				}
				
				if ($wszystko_OK==true)
				{
					//Hurra, wszystkie testy zaliczone, dodajemy gracza do bazy
					
					if ($polaczenie->query("INSERT INTO uzytkownicy VALUES (NULL, '$nick', '$haslo_hash', '$email', 100, 100, 100, now() + INTERVAL 14 DAY)"))
					{
						$_SESSION['udanarejestracja']=true;
						header('Location: witamy.php');
					}
					else
					{
						throw new Exception($polaczenie->error);
					}
					
				}
				
				$polaczenie->close();
			}
			
		}
		catch(Exception $e)
		{
			echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
			echo '<br />Informacja developerska: '.$e;
		}
		
	}
	
	
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Najlepsze rogaliki</title>
	<meta name="description" content="Spróbuj najlepszych rogalików" />
	<meta name="keywords" content="rogaliki, rogal, najlepsze rogaliki" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<link rel="stylesheet" href="style.css" type="text/css" />
	<link rel="stylesheet" href="css/fontello.css" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Pacifico|Raleway:400,700&amp;subset=latin-ext" rel="stylesheet"> 
	<script src='https://www.google.com/recaptcha/api.js'></script>

</head>

<body>
	<div id="container">
	
		<div id="logo">
			 <div id="logoL" >
				<a href="index.php"><img src="rogal.jpg" /></a>
			 </div>
			 <div id="logoR">
			    <div class="nazwa">Najlepsze rogaliki</div>
			 </div>
			   <div class="rejestracja"><a href="rejestracja.php">Rejestracja</a></div>
			   <div class="logowanie"><a href="index2.php">Logowanie</a></div>   
			   <div style="clear:both;"></div>
		</div>
		
		<div id="menu" >
			<div class="option"><a href="index.php" style="color: white;">STRONA GŁÓWNA</a></div>
			<div class="option"><a href="onas.php" style="color: white;">O NAS</a></div>
			<div class="option"><a href="oferta.php" style="color: white;">OFERTA</a></div>
			<div class="option"><a href="formularz.php" style="color: white;">ZAMÓW WYPIEKI ONLINE</a></div>
			<div class="option"><a href="kontakt.php" style="color: white;">KONTAKT</a></div>
			<div style="clear:both;"></div>
		</div>
		
		  
	<!-- <div id="topbar"> 
			<div id="topbarL">
				reklama
			</div>
			<div id="topbarR">
				<span class="bigtitle">O projekcie słów kilka</span>
				<div style="height: 15px;"></div>	
			</div>
			<div style="clear:both;"></div>
		</div> -->

		<div id="sidebar">
			<div class="optionL">z marmoladą</div>
			<div class="optionL">z jabłkiem</div>
			<div class="optionL">z makiem</div>
		</div>
		
		<div id="content">
			<span class="bigtitle">ZAREJESTRUJ SIĘ</span>
			
			<div class="dottedline"></div>
			
			Jeśli masz już u nas konto, przejdź do strony logowania.<br /><br /><br />
			
			 <form method="post">
	
		<input type="text" placeholder="Nickname" onfocus="this.placeholder=''" onblur="this.placeholder='Nickname'" value="<?php
			if (isset($_SESSION['fr_nick']))
			{
				echo $_SESSION['fr_nick'];
				unset($_SESSION['fr_nick']);
			}
		?>" name="nick" /><br />
		
		<?php
			if (isset($_SESSION['e_nick']))
			{
				echo '<div class="error">'.$_SESSION['e_nick'].'</div>';
				unset($_SESSION['e_nick']);
			}
		?>
		
		<input type="text" placeholder="E-mail: " onfocus="this.placeholder=''" onblur="this.placeholder='E-mail: '" value="<?php
			if (isset($_SESSION['fr_email']))
			{
				echo $_SESSION['fr_email'];
				unset($_SESSION['fr_email']);
			}
		?>" name="email" /><br />
		
		<?php
			if (isset($_SESSION['e_email']))
			{
				echo '<div class="error">'.$_SESSION['e_email'].'</div>';
				unset($_SESSION['e_email']);
			}
		?>
		
		<input type="password"  placeholder="Twoje hasło:  " onfocus="this.placeholder=''" onblur="this.placeholder='Twoje hasło:  '" value="<?php
			if (isset($_SESSION['fr_haslo1']))
			{
				echo $_SESSION['fr_haslo1'];
				unset($_SESSION['fr_haslo1']);
			}
		?>" name="haslo1" /><br />
		
		<?php
			if (isset($_SESSION['e_haslo']))
			{
				echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';
				unset($_SESSION['e_haslo']);
			}
		?>		
		
		<input type="password" placeholder="Powtórz hasło:   " onfocus="this.placeholder=''" onblur="this.placeholder='Powtórz hasło:  '" value="<?php
			if (isset($_SESSION['fr_haslo2']))
			{
				echo $_SESSION['fr_haslo2'];
				unset($_SESSION['fr_haslo2']);
			}
		?>" name="haslo2" /><br /><br />
		
		<label>
			<input type="checkbox" name="regulamin" <?php
			if (isset($_SESSION['fr_regulamin']))
			{
				echo "checked";
				unset($_SESSION['fr_regulamin']);
			}
				?>/> Akceptuję regulamin
		</label>
		
		<?php
			if (isset($_SESSION['e_regulamin']))
			{
				echo '<div class="error">'.$_SESSION['e_regulamin'].'</div>';
				unset($_SESSION['e_regulamin']);
			}
		?>	
		
		<br/ >
		<div class="g-recaptcha" data-sitekey="6Le-FQ0UAAAAAFC1WEIEIqAoYDIvxA0Ct90tQrjf"></div>
		
		<?php
			if (isset($_SESSION['e_bot']))
			{
				echo '<div class="error">'.$_SESSION['e_bot'].'</div>';
				unset($_SESSION['e_bot']);
			}
		?>	
		
		<br />
		
		<input type="submit" value="Zarejestruj się" />
		
	</form>
	
	</div>
		
		<div id="footer">
			
			    <div id="footertwo">Poznaj Najlepsze rogaliki &copy; 2017</div>
				
				<div class="yt"><i class="icon-youtube"></i></div>
				<div class="fb"><i class="icon-facebook-rect"></i></div>
				<div class="tw"><i class="icon-twitter"></i></div>
				<div class="gplus"><i class="icon-googleplus-rect"></i></div>
				<div style="clear:both;"></div>
				
		
		</div>
	
	</div>
</body>
</html>