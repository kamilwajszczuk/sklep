<?php

	session_start();

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
	

</head>

<body>
	<div id="container">
	
		<div id="logo">
			 <div id="logoL">
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
			<div class="option">KONTAKT</div>
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
			<span class="bigtitle">KONTAKT</span>
			
			<div class="dottedline"></div>
		   Najlepsze rogaliki<br/ ><br/ >
           ul. Wyspowa 14/50<br/ ><br/ >
           03-687 Warszawa<br/ ><br/ >
            tel: 510 79 49 22<br/ ><br/ >
			email: kamil.wajszczuk@onet.eu<br/ ><br/ >
			czynne codziennie 10:00 - 21:00<br/ ><br/ >
			
			<iframe id="map" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d156388.803116818!2d21.061194099999998!3d52.23293795!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spl!2spl!4v1484420012927" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
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