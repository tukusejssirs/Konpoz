<!DOCTYPE html>
<html lang="sk">

<head>
	<title>Pozvánky na konferencie</title>
	<meta charset="UTF-8">
	<link href="css/dida/all.css" type="text/css" rel="stylesheet"/>
	<!-- odkomentuj, prip uprav nasledovny riadok, ked uz bude vytvoreny favicon -->
	<!--	<link rel="icon" href="favicon.png" type="image/png"> -->
	<link rel="icon" href="/konpoz/favicon.png" />

</head>

<body>
	<header>
		<h1>Pozvánky na konferencie</h1> <!-- Zislo by sa zmenit nazov-->
	</header>
	<div id"unit">
		<div id="section">
			<?php include "php/output.php"; ?>
		</div>
		<div id="aside">
			<h2>Pridať konferenciu</h2>
			<ul>
				<form class="forms" name="insert" action="php/input.php" method="POST" >



					Názov <br>
					<input type="text" name="nazov"          accesskey="n" />
					Dátum konania <br>
					<input type="date" name="datum"   placeholder="dd/mm/yyyy"     accesskey="d"/>
					Informácie o konferencii <br>
					<input type="text" name="info"              accesskey="k"/>
					Zasielanie prihlášok do <br>
					<input type="date" name="prihlaska"  accesskey="u"/>
					<div class="submit">
						<input class="submit" type="submit" value="Pridaj konferenciu" accesskey= "p" />
					</div>  
				</form>
			</ul>
			<p align="center" class="note">Dátumy zapisovať v tvare<br><b>d/m/r</b> alebo <b>r/m/d.</b></p>
		</div>
	</div>
	<footer>
		<p><span class="copyleft">©</span></a> GNU GPLv3<br><b>Študenti AIEX UMB</b><br>2. ročník Bc.<br>2016</p>
	</footer>

</body>

</html>
