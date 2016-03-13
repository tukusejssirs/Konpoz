<?php  // latest

   $host        = "host=127.0.0.1";
   $port        = "port=5432";
   $dbname      = "dbname=konpoz";
   $credentials = "user=aiex password=veslo";

$spojenie_s_databazou = pg_connect("$host $port $dbname $credentials");

$table = pg_query('select nazov as "Názov konferencie", datum as "Dátum konferencie", info as "Krátky popis", prihlaska as "Termín prihlásenia do" from podujatia order by datum');

// db ($table) export to file (for pure php table re-sorting)
//$file = 'db_output.txt';
//file_put_contents($file, "$table", LOCK_EX);

$i = 0;
echo '<table><tr>';

while ($i < pg_num_fields($table))
{
	$poleMenom = pg_field_name($table, $i);
	echo '<th>' . $poleMenom . '</th>';
	++$i;
}
echo '</tr>';

while ($riadok = pg_fetch_row($table)) 
{
	echo '<tr>';
	$odpocet = count($riadok);
	$y = 0;


	while ($y < $odpocet)
	{
		$c_row = current($riadok);
		echo '<td>' . $c_row . '</td>';
		next($riadok);
		++$y;


	}
	echo '</tr>';
	++$i;
}

pg_free_result($table);

echo '</table>';

?>
