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
	<header>
		<h1>Pozvánky na konferencie</h1>
	</header>
	<section>
		<p>
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
		</p>
	</section>
	<aside>
	<h2>Pridaj konferenciu</h2>
	<ul>
		<form class="forms" name="insert" action="test_aio/insert_only.php" method="POST" >
			<input type="text" name="nazov" placeholder="Názov konferencie" accesskey="k" />
			<input type="date" name="prihlaska" placeholder="Dokedy sa dá prihlásiť" accesskey="r"/>
			<input type="date" name="datum" placeholder="Dátum konania" accesskey="d"/>
			<input type="text" name="info" placeholder="Krátky popis" accesskey="p"/>
			<div class="submit">
				<input class="submit" type="submit" value="Pridaj konferenciu" accesskey="s" />
			</div>
		</form>
	</ul>
	</aside>
	<footer>
		<p><span class="copyleft">©</span></a> GNU GPLv3<br>Študenti AIEX UMB<br>2. ročník Bc.<br>2016</p>
	</footer>
</body>

</html>
