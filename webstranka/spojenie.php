 <?php echo "Dnes je <b>".date("j.n.20y.")."</b><br>"; 

   $host        = "host=127.0.0.1";
   $port        = "port=5432";
   $dbname      = "dbname=konpoz";
   $credentials = "user=aiex password=veslo";

   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db){
      echo "Error : spojenie s databazou je nateraz nefunkcne \n";
   } else {
      echo "&nbsp &nbsp <br>Spojenie s databazou je funkcne <br><br>";
   }
?>
