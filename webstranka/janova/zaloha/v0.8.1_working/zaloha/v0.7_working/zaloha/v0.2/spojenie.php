 <?php echo "Dnes je <b>".date("j.n.20y.")."</b><br>\n"; 

   $host        = "host=127.0.0.1";
   $port        = "port=5432";
   $dbname      = "dbname=konpoz";
   $credentials = "user=aiex password=veslo";

   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db){
      echo "Error : Spojenie s databazou je nateraz nefunkcne.";
   } else {
      echo "<br>Spojenie s databazou je funkcne.<br><br>";
   }
?>
