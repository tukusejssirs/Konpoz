<!DOCTYPE html>
<head>
<title>vytvorenie tabulky php skriptom</title>

</head>
<body>

</body>
</html>
<?php
include "spojenie.php";

   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db){
      echo "Databaza je momentalne nepristupna\n";
   } else {
      echo "Spojenie s databazou je funkcne\n";
      }
$query = "CREATE TABLE podujatia
(
nazov text,
prihlaska date,
datum date,
info text
)";
$query = pg_query($query); // Execute the Query
if($query)
  echo "Tabulka je vytvorena"; // Check to see if The Query Worked.
else{
  echo "Daky ERROR !!! ".pg_last_error();
}

?>
