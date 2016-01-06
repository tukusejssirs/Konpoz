<html>
 <body>
	<h2>Tabuľka jednotlivých podujatí</h2>
 </body>
</html>


<?php 
include "spojenie.php";
//$query = 'DELETE FROM podujatia WHERE ctid NOT IN (SELECT max(ctid) FROM podujatia GROUP BY podujatia.*)' ;
//zobrazenie celeho zoznamu (podla 
$dopyt = 'select * from podujatia order by nazov';
//$query = "SELECT * FROM podujatia WHERE prihlaska BETWEEN '1.2.2015' AND current_date";
//$dopyt = "SELECT * FROM podujatia WHERE datum BETWEEN '12.1.2015' AND current_date";
//vymazanie duplicitnych zaznamov



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
   
?>

