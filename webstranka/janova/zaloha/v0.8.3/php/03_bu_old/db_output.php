<?php

// output to file
//$pdo = new PDO(...);
//result= $pdo->pg_query("select * from podujatia INTO OUTFILE 'db_output.txt'");
//$dummy = $result->fetchAll();

$file = 'db_output.txt';
file_put_contents($file, $odpoved);



?>
