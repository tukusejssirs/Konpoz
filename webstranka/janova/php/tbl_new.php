<!DOCTYPE html>
<head>
	<title>Vytvorenie tabulky php skriptom</title>
	<meta charset="UTF-8">
	<link href="../css/all.css" type="text/css" rel="stylesheet"/>
	<!-- odkomentuj, prip uprav nasledovny riadok, ked uz bude vytvoreny favicon -->
	<!--	<link rel="icon" href="favicon.png" type="image/png"> -->
</head>
<body>

<?php
include "spojenie.php";

   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db){
      echo "<p>ERROR: Databaza je momentalne nepristupna.</p>";
   } else {
      echo "<p>Spojenie s databazou je funkcne.</p>";
      }
$query = "CREATE TABLE konferencie
(
Názov\ konferencie text,
Do\ kedy\ je\ možné\ sa\ prihlásiť date,
Dátum\ konferencie date,
Krátky\ popis text
)";
$query = pg_query($query); // Execute the Query
if($query)
  echo "<p>Tabuľka je vytvorená.</p>"; // Check to see if The Query Worked.
else{
//  echo "<p>ERROR: Tabuľka nebola vytvorená!</p>"; .pg_last_error();
	$error=pg_last_error();
	echo "<p>ERROR: Tabuľka nebola vytvorená!<br>$error</p>";
//  echo "Daky ERROR !!! ".pg_last_error();
}
?>

</body>
</html>
