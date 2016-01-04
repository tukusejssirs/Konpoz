<!DOCTYPE html>
<html lang="sk">

<head>
	<title>Pozvánky na konferencie</title>
	<meta charset="UTF-8">
	<link href="css/all.css" type="text/css" rel="stylesheet"/>
	<!-- odkomentuj, prip uprav nasledovny riadok, ked uz bude vytvoreny favicon -->
	<!--	<link rel="icon" href="favicon.png" type="image/png"> -->
</head>

<body>
	<h2>Tabuľka jednotlivých podujatí</h2>
</body>
</html>


<?php
include "spojenie.php";
//zobrazenie celeho zoznamu (podla)
$dopyt = 'select * from akcie order by datum';
//$dopyt = "SELECT * FROM akcie WHERE datum BETWEEN '12.1.2015' AND current_date";
//-------------------------------------------------------------------------------
//vymazanie duplicitnych zaznamov
$dopyt2 = pg_exec('DELETE FROM akcie WHERE ctid NOT IN (SELECT max(ctid) FROM akcie GROUP BY akcie.*)');
//-------------------------------------------------------------------------------
//-------vymazanie-passe--datumov------------------------------------------------
//$vymazanie_neaktualnych = pq_exec('DELETE FROM akcie WHERE datum < ');
//-------vypis z tabulky databazy------------------------------------------------
$odpoved = pg_query($dopyt);


$i = 0;
echo '<html><body><table><tr>';
echo '<table border="2" cellpadding="5" cellspacing="4">';

while ($i < pg_num_fields($odpoved))
{
	$poleMenom = pg_field_name($odpoved, $i);
	echo '<td>' . $poleMenom . '</td>';
	$i = $i + 1;
}
echo '</tr>';
$i = 0;

while ($riadok = pg_fetch_row($odpoved)) 
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
pg_free_result($odpoved);

echo '</table></body></html>';


//---------------------------------------------------------------------------
//------echo-uspesnosti-dopytu2----------------------------------------------
    if ($dopyt2):
        echo "<br>Duplicitne zaznamy su vymazane.";
    else:
        echo "<br>Duplicitne zaznamy sa nepodarilo vymazat.";
    endif;
//---------------------------------------------------------------------------   
?>

