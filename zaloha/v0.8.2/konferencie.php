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
		<?php include "php/odpoved.php"; ?>
	</section>
	<aside>
	<h2>Pridaj konferenciu</h2>
	<ul>
		<form class="forms" name="insert" action="php/insert.php" method="POST" >
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
		<p><span class="copyleft">©</span></a> GNU GPLv3<br><b>Študenti AIEX UMB</b><br>2. ročník Bc.<br>2016</p>
	</footer>
</body>

</html>
