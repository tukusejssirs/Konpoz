<html>
 <body>
	<h2>Tabuľka jednotlivých podujatí</h2>
 </body>
</html>


<?php 
include "spojenie.php";
$query = 'select * from podujatia order by nazov';

$result = pg_query($query);

$i = 0;
echo '<html><body><table><tr>';
echo '<table border="2" cellpadding="5" cellspacing="4">';
while ($i < pg_num_fields($result))
{
	$fieldName = pg_field_name($result, $i);
	echo '<td>' . $fieldName . '</td>';
	$i = $i + 1;
}
echo '</tr>';
$i = 0;

while ($row = pg_fetch_row($result)) 
{
	echo '<tr>';
	$count = count($row);
	$y = 0;
	while ($y < $count)
	{
		$c_row = current($row);
		echo '<td>' . $c_row . '</td>';
		next($row);
		$y = $y + 1;
	}
	echo '</tr>';
	$i = $i + 1;
}
pg_free_result($result);

echo '</table></body></html>';
   
?>
