<!DOCTYPE html>
<head>
<title>zapis do databazy postgresql php skriptom</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
li {listt-style: none;}
</style>
</head>
<body>
<h2> &nbsp &nbsp Zápis dátumov do databázy</h2>
<ul>
<form name="insert" action="insert.php" method="POST" >
<li>Názov</li><li>             <input type="text"  name="nazov" /></li>
<li>Dedlajn prihlášky </li><li><input type="date"  name="prihlaska" /></li>
<li>Dátum konania </li><li>    <input type="date"  name="datum" /></li>
<li>Info</li><li>	<input type="text"  name="info" /></li>

<li><input type="submit" /></li>
</form>
</ul>
</body>
</html>
<?php
   $host        = "host=127.0.0.1";
   $port        = "port=5432";
   $dbname      = "dbname=konpoz";
   $credentials = "user=aiex password=veslo";

   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db){
      echo "Error : spojenie s databazou je nefunkcne \n";
   } else {
      echo " &nbsp &nbsp &nbsp Spojenie s databazou je funkcne\n";
   }
$query = "INSERT INTO podujatia VALUES ('$_POST[nazov]','$_POST[prihlaska]','$_POST[datum]','$_POST[info]')";
$result = pg_query($query); 

header("Location: ../konferencie.php");
exit;
?>
