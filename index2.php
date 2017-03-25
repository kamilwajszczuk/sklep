<?php

	session_start();
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: sklep.php');
		exit();
	}

?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Najlepsze rogaliki</title>
	<meta name="description" content="Spróbuj najlepszych rogalików" />
	<meta name="keywords" content="rogaliki, rogal, najlepsze rogaliki" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<link rel="stylesheet" href="style.css" type="text/css" />
	<link rel="stylesheet" href="css/fontello.css" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Pacifico|Raleway:400,700&amp;subset=latin-ext" rel="stylesheet">
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
<?php		 
	 if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true)) {
        echo "<div class='twojekonto'><a href='twojekonto.php'>Twoje konto</a></div>";
		echo "<div class='wyloguj'><a href='logout.php'>Wyloguj się</a></div>";
		echo "<div style='clear:both;'></div>";
	 }	else {
		     echo "<div class='rejestracja'><a href='rejestracja.php'>Rejestracja</a></div>";
		     echo "<div class='logowanie'><a href='index2.php'>Logowanie</a></div>";  
		     echo "<div style='clear:both;'></div>";
	        }
?>	
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
			<span class="bigtitle">ZALOGUJ SIĘ</span>
			
			<div class="dottedline"></div>
	Zaloguj się aby złożyć zamówienie!<br /><br />
	<a href="rejestracja.php">Nie masz konta? Zapraszamy do założenia konta. Zajmie to dosłownie 2 minuty. Każdy zarejestrowany Klient może przeglądać swoją historię zakupów oraz składać zamówienia. </a>
	<br /><br />
	
	<form action="zaloguj.php" method="post">
	
		<br /> <input type="text" name="login" placeholder="Login" onfocus="this.placeholder=''" onblur="this.placeholder='login'" /> 
		<br /> <input type="password" name="haslo" placeholder="Hasło" onfocus="this.placeholder=''" onblur="this.placeholder='hasło'"/> <br /><br />
		<input type="submit" value="Zaloguj się" /><br />
	
	</form>
	
<?php
	if(isset($_SESSION['blad']))	echo $_SESSION['blad'];
?>

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