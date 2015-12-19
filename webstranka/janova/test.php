<HTML> 
<?php
   include "spojenie.php";

   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db){
      echo "Nemame spojenie s databazou\n";
   } else {
      echo "Spojenie s databazou je fachci \n";
   }



 
    $result =pg_query($db_connection, "SELECT * FROM podujatia");
    if ($result):
        echo "OK.";
    else:
        echo " \n nezadarilo sa pridat novy zaznam.";
    endif;
    pg_Close($conn);
?>    

</HTML>
