<html>
	<head>
	<title>odpoved z databazy</title>
	</head>
 <body>
	<h2>Tabuľka jednotlivých podujatí</h2>
 </body>
</html>
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
   if(!$spojenie_s_databazou){
      echo "Error : Spojenie s databazou je nateraz nefunkcne.";
   } else {
      echo "<br>Spojenie s databazou je funkcne.";
   }
//---------------------------------------------------------------------------

//zobrazenie celeho zoznamu (podla)
$dopyt = 'select * from podujatia order by datum';
//$dopyt = "SELECT * FROM podujatia WHERE datum BETWEEN '12.1.2015' AND current_date";
//-------------------------------------------------------------------------------
//vymazanie duplicitnych zaznamov
$dopyt2 = pg_exec('DELETE FROM podujatia WHERE ctid NOT IN (SELECT max(ctid) FROM podujatia GROUP BY podujatia.*)');
//-------------------------------------------------------------------------------
//-------vymazanie-passe--datumov------------------------------------------------
//$vymazanie_neaktualnych = pq_exec('DELETE FROM podujatia WHERE datum < ');
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

