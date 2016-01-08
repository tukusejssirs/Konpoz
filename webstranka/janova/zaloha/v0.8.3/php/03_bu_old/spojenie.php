<?php 
//--------------------------------------------------------------------------
//   echo "Dnes je <b>".date("j.n.20y.")."</b><br>\n"; 
//--------------------------------------------------------------------------
   $host        = "host=127.0.0.1";
   $port        = "port=5432";
   $dbname      = "dbname=konpoz";
   $credentials = "user=aiex password=veslo";

   $spojenie_s_databazou = pg_connect( "$host $port $dbname $credentials"  );
//---------------------------------------------------------------------------
//-----echo-textu-spojenia---------------------------------------------------
//   if(!$spojenie_s_databazou){
//      echo "Error : Spojenie s databazou je nateraz nefunkcne.";
//   } else {
//      echo "<br>Spojenie s databazou je funkcne.<br><br>";
//   }
//---------------------------------------------------------------------------
?>
