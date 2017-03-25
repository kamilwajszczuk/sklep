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
	
		<div id="logo" >
			 <div id="logoL">
				<img src="rogal.jpg" />
			 </div>
			 <div id="logoR">
			    <div class="nazwa">Najlepsze rogaliki</div>
			 </div>
<?php		 
	 if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true)) {
		echo "<div class='twojekonto'><a href='twojekonto.php'>Twoje konto</a></div>";
		echo "<div class='wyloguj'><a href='logout.php'>Wyloguj się</a></div>";
		echo "<div style='clear:both;'></div>";
	}	 else {
		echo "<div class='rejestracja'><a href='rejestracja.php'>Rejestracja</a></div>";
		echo "<div class='logowanie'><a href='index2.php'>Logowanie</a></div>";  
		echo "<div style='clear:both;'></div>";
	}
?>			   
		</div>
		
		<div id="menu" >
			<div class="option">STRONA GŁÓWNA</div>
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
			<span class="bigtitle">DLACZEGO ROGALIKI</span>
			
			<div class="dottedline"></div>
			
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean lacinia mollis odio eu bibendum. Praesent non hendrerit risus. Nulla id semper sem. Mauris risus mauris, ultrices sed ullamcorper sed, vulputate vel nisi. Aliquam augue ante, mattis in pulvinar vitae, ultrices nec leo. Nulla ultricies augue enim, sit amet semper tellus vulputate sit amet. Maecenas tincidunt, ex eu viverra scelerisque, quam lectus auctor nunc, at pretium nibh lacus in ligula. Cras condimentum felis ac aliquet tristique. Sed elementum eu nulla vel rutrum. Cras feugiat nulla non congue malesuada.
			
			<br /><br />
			Cras et nulla vehicula, efficitur enim non, fermentum tortor. Curabitur id elementum leo. Sed eget turpis accumsan dolor mollis imperdiet. Praesent pellentesque laoreet lectus, at commodo magna varius vitae. Aliquam erat volutpat. Curabitur commodo, tortor laoreet sagittis cursus, nulla enim laoreet libero, et egestas risus ante vel orci. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nunc quis posuere massa, sed sollicitudin lorem. Mauris lacinia, massa efficitur malesuada luctus, arcu ex mattis erat, a venenatis magna risus nec neque. Nulla vulputate nisl urna, quis egestas orci suscipit tristique. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras auctor nec elit at ultricies. Morbi aliquam pharetra diam, vitae porta felis. Pellentesque vel arcu tincidunt, luctus justo quis, ultrices erat. Vivamus efficitur leo vitae dui molestie, eu varius sapien iaculis. In quis pharetra mauris.
			
			<br /><br />			
			Nam ullamcorper turpis non tristique sollicitudin. Etiam id magna lacus. Pellentesque vestibulum ex eget quam consectetur, sit amet luctus erat feugiat. Sed gravida tellus tempus consequat rhoncus. Phasellus lobortis magna et risus pharetra, facilisis blandit sapien tristique. Vivamus aliquam interdum arcu, eget facilisis ante gravida ut. Proin nec nisl ut lacus finibus sagittis id non nibh. Donec volutpat pretium libero. Sed fermentum vel ante vitae mattis. Curabitur porttitor turpis at scelerisque auctor. Sed vitae iaculis risus, ut iaculis nibh.
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