<?php
	include "passwd.php";

	$db_connection = pg_connect("$host $port $dbname $credentials");

	// variable to store the db query with column aliases
	$table = pg_query('select nazov as "Názov konferencie", datum as "Dátum konferencie", info as "Krátky popis", prihlaska as "Termín prihlásenia do" from podujatia order by datum');

	// db ($table) export to file (for pure php table re-sorting)
	//$file = 'db_output.txt';
	//file_put_contents($file, "$table", lock_ex);

	// remove duplicates
	$db_duplicates = pg_exec('delete from podujatia where ctid not in (select max(ctid) from podujatia group by podujatia.*)');

	// remove conferences older than today exclusively
	$db_old_con = pg_exec('DELETE FROM podujatia WHERE datum < current_date');

	// DEBUG: uncomment to test if the duplicates were removed
	//include "dbdouble.php";

        // DEBUG: uncomment to test connection with database
        //include "dbconctn.php";

	// DEBUG: uncomment to test if old conferences were removed
	//include "dboldcon.php";

	$i = 0;
	echo '<table><tr>';

	while ($i < pg_num_fields($table))
	{
		$poleMenom = pg_field_name($table, $i);
		echo '<th>' . $poleMenom . '</th>';
		++$i;
	}

	echo '</tr>';

	$i = 0;

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
