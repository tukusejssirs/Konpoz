<?php
   $host        = "host=127.0.0.1";
   $port        = "port=5432";
   $dbname      = "dbname=konpoz";
   $credentials = "user=aiex password=veslo";

   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db){
      echo "Databaza je momentalne nepristupna\n";
   } else {
      echo "Spojenie s databazou je funkcne\n";
      }
   $sql =<<<EOF
      CREATE TABLE akcie
      (nazov          TEXT    NOT NULL,
      prihlaska       DATE    NOT NULL,
      datum           DATE    NOT NULL);
      EOF;
   $ret = pg_query($db, $sql);
   if(!$ret){
      echo pg_last_error($db);
   } else {
      echo "Tabulka je vytvorena\n";
   }
   pg_close($db);
?>
