<?php

   $host        = "host=127.0.0.1";
   $port        = "port=5432";
   $dbname      = "dbname=konpoz";
   $credentials = "user=aiex password=veslo";

$spojenie_s_databazou = pg_connect("$host $port $dbname $credentials");

//$table=pg_query('select nazov as `Názov konferencie`, prihlaska as `Do kedy je možné sa prihlásiť`, datum as `Dátum konferencie`, info as `Krátky popis` from podujatia order by datum ")';
//or die('<br><br>' . pg_last_error());

//$dopyt="select nazov AS Názov from podujatia order by datum";
//$odpoved = pg_query($dopyt);

$table = pg_query('select nazov as "Názov konferencie", prihlaska as "Do kedy je možné sa prihlásiť", datum as "Dátum konferencie", info as "Krátky popis" from podujatia order by datum');

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
		$y = $y + 1;


	}
	echo '</tr>';
	$i = $i + 1;
}

pg_free_result($table);

echo '</table>';

?>
