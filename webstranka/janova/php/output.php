<?php
	include "passwd.php";
	$db_connection = pg_connect("$host $port $dbname $credentials");

	// variable according which column the db should be ordered
	$sort = $_GET['s'];  // options = nazov | datum | prihlaska | prihlaska

	// variable which way (upWARDs or downWARDs) should it be sorted
	$ward = $_GET['w'];  // options = asc | desc

	switch ($sort . $ward) {
		case nazov:
		case nazovasc:
			$table = pg_query('select nazov as "Názov konferencie", datum as "Dátum konferencie", info as "Krátky popis", prihlaska as "Ukončenie prihlasovania" from podujatia order by nazov asc, datum asc'); $name="&&w=desc"; break;
		case nazovdesc:
			$table = pg_query('select nazov as "Názov konferencie", datum as "Dátum konferencie", info as "Krátky popis", prihlaska as "Ukončenie prihlasovania" from podujatia order by nazov desc, datum desc'); break;
		case info:
		case infoasc:
			$table = pg_query('select nazov as "Názov konferencie", datum as "Dátum konferencie", info as "Krátky popis", prihlaska as "Ukončenie prihlasovania" from podujatia order by info asc, datum asc'); $info="&&w=desc"; break;
		case infodesc:
			$table = pg_query('select nazov as "Názov konferencie", datum as "Dátum konferencie", info as "Krátky popis", prihlaska as "Ukončenie prihlasovania" from podujatia order by info desc, datum desc'); break;
		case prihlaska:
		case prihlaskaasc:
			$table = pg_query('select nazov as "Názov konferencie", datum as "Dátum konferencie", info as "Krátky popis", prihlaska as "Ukončenie prihlasovania" from podujatia order by prihlaska asc, datum asc'); $reg="&&w=desc"; break;
		case prihlaskadesc:
			$table = pg_query('select nazov as "Názov konferencie", datum as "Dátum konferencie", info as "Krátky popis", prihlaska as "Ukončenie prihlasovania" from podujatia order by prihlaska desc, datum desc'); break;
		case datum:
		case datumdesc:
			$table = pg_query('select nazov as "Názov konferencie", datum as "Dátum konferencie", info as "Krátky popis", prihlaska as "Ukončenie prihlasovania" from podujatia order by datum desc, nazov desc'); $date="&&w=asc"; break;
		case datumasc:
		default:
			$table = pg_query('select nazov as "Názov konferencie", datum as "Dátum konferencie", info as "Krátky popis", prihlaska as "Ukončenie prihlasovania" from podujatia order by datum asc, nazov asc'); $date="&&w=desc"; break;
	}

	$i=0;
	echo '<table><tr>';

	while ($i < pg_num_fields($table)){
		switch ($i) {
			case 0:
				$column="nazov"; 
				if ($name){
					$sorting = $name;
				}else{
					$sorting = "&&w=asc";
				}
				break;
			case 1:
				$column="datum";
				if ($date){
					$sorting = $date;
				}else{
					$date = "&&w=desc";
				}
				break;
			case 2:
				$column="info";
				if ($info){
					$sorting = $info;
				}else{
					$sorting = "&&w=asc";
				}
				break;
			case 3:
				$column="prihlaska";
				if ($reg){
					$sorting = $reg;
				}else{
					$sorting = "&&w=asc";
				}
				break;
		}

		// remove duplicates
		$db_duplicates = pg_exec('delete from podujatia where ctid not in (select max(ctid) from podujatia group by podujatia.*)');

		// remove conferences older than today exclusively
		$db_old_con = pg_exec('DELETE FROM podujatia WHERE datum < current_date');

		$poleMenom = pg_field_name($table, $i);
		echo '<th><a href=konferencie.php?s=' . $column . $sorting . '>' . $poleMenom . '</a></th>';
		++$i;
	}
	echo '</tr>';
	$i=0;
	while ($riadok = pg_fetch_row($table)){
		echo '<tr>';
		$odpocet = count($riadok);
		$y=0;
		while ($y < $odpocet){
			$c_row = current($riadok);
			echo '<td>' . $c_row . '</td>';
			next($riadok);
			++$y;
		}
		echo '</tr>'; ++$i;
	}
	pg_free_result($table);
	echo '</table>';
	echo "<br>" . $table . "<br>";
?>
