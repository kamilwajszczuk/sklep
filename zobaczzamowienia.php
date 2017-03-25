<?php
  // utworzenie krótkich nazw zmiennych
  $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
?>
<html>
<head>
  <title></title>
</head>
<body>
<h1></h1>
<h2>Zamówienia klientów</h2>
<?php

@ $wp = fopen("$DOCUMENT_ROOT/../zamowienia.txt", 'rb');

  if (!$wp) {
    echo "<p><strong>Brak zamówień.
         Proszę spróbować później.</strong></p>";
    exit;
  }

  while (!feof($wp)) {
    $zamowienie = fgets($wp, 999);
    echo $zamowienie."<br />";
  }

  fclose($wp);

?>
</body>
</html>