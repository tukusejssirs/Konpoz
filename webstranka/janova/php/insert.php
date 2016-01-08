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
