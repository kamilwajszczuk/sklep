<?php
  // utworzenie krótkich nazw zmiennych
  $iloscmarmolada = $_POST['iloscmarmolada'];
  $iloscjablko = $_POST['iloscjablko'];
  $iloscmak = $_POST['iloscmak'];
  $adres = $_POST['adres'];
  $adres = $_POST['adres'];
  $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
  $data=date('H:i, jS F Y');
?>

<html>
<head>
  <title></title>
</head>
<body>
<h1></h1>
<h2>Wyniki zamówienia</h2>
<?php

  echo "<p>Zamówienie przyjęte o ".$data."</p>";

  echo "<p>Zamówienie Państwa wygląda następująco: </p>";

  $ilosc = 0;
  $ilosc = $iloscmarmolada + $iloscjablko + $iloscmak;
  echo "Zamówionych rogalików: ".$ilosc."<br />";

  if($ilosc == 0) {
    echo "Na poprzedniej stronie nie zostało złożone żadne zamówienie!<br />";

  } else {

    if ($iloscmarmolada > 0) {
      echo $iloscmarmolada." Rogaliki z marmoladą<br />";
    }

    if ($iloscjablko > 0) {
      echo $iloscjablko." Rogaliki z jabłkiem<br />";
    }

    if ($iloscmak > 0) {
      echo $iloscmak." Rogaliki z makiem<br />";
    }
  }

  $wartosc=0.00;

  define('CENAMARMOLADA', 5);
  define('CENAJABLKO', 4);
  define('CENAMAK', 4);

  $wartosc =$iloscmarmolada * CENAMARMOLADA + $iloscjablko * CENAJABLKO + $iloscmak * CENAMAK;

  $wartosc=number_format($wartosc, 2, '.', ' ');

  echo "<p>Wartość zamówienia wynosi ".$wartosc."</p>";
  echo "<p>Adres wysyłki to ".$adres. "</p>";

  $ciagwyjsciowy = $data."\t".$iloscmarmolada." Rogaliki z marmoladą \t".$iloscjablko." Rogaliki z jabłkiem\t"
                   .$iloscmak." Rogaliki z makiem\t".$wartosc
                   ."PLN\t". $adres."\n";

  // otwarcie pliku w celu dopisywania
  @ $wp = fopen("$DOCUMENT_ROOT/../zamowienia.txt", 'ab');

  flock($wp, LOCK_EX);

  if (!$wp) {
    echo "<p><strong> Zamówienie Państwa nie może zostać przyjęte w tej chwili.
         Proszę spróbować później.</strong></p></body></html>";
    exit;
  }

  fwrite($wp, $ciagwyjsciowy, strlen($ciagwyjsciowy));
  flock($wp, LOCK_UN);
  fclose($wp);

  echo "<p>Zamówienie zapisane.</p>";
?>
</body>
</html>