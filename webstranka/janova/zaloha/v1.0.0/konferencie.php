<!DOCTYPE html>
<html lang="sk">

<head>
	<title>Pozvánky na konferencie</title>
	<meta charset="UTF-8">
	<link href="css/all.css" type="text/css" rel="stylesheet"/>
	<link rel="icon" href="/konpoz/favicon.png" />

</head>

<body>
	<header id="head">
		<h1>Pozvánky na konferencie</h1> <!-- Zislo by sa zmenit nazov--> <!-- Mas lepsi? Ja nie :p -->
	</header>
	<div class="group">
	<section id="table">
		<!-- table of conferences -->
		<?php include "php/output.php"; ?>
	</section>
	<aside>
		<h2>Pridať konferenciu</h2>
		<form id="form" class="forms" name="insert" action="php/input.php" method="POST" >
			Názov<br>
			<input type="text" name="nazov"                          accesskey="n" />
			Dátum konania<br>
				<!-- validator.w3.org/nu – Error: Attribute placeholder is only allowed when the input type is email, number, password, search, tel, text, or url. -->
				<!-- validator.w3.org/nu – Warning: The date input type is not supported in all browsers. Please be sure to test, and consider using a polyfill. -->
			<input type="date" name="datum" placeholder="dd/mm/yyyy" accesskey="d"/>
			Informácie o konferencii<br>
			<input type="text" name="info"                           accesskey="k"/>
			Zasielanie prihlášok do <br>
			<input type="date" name="prihlaska"                      accesskey="u"/>
			<datepicker type="grid" value="2007-03-26"/>
			<div class="submit">
				<input class="submit" type="submit" value="Pridaj konferenciu" accesskey= "p" />
			</div>
		</form>
		<!-- validator.w3.org/nu – Error: The align attribute on the p element is obsolete. Use CSS instead. -->
		<p class="note">Dátumy zapisovať v tvare<br /><b>d/m/r</b> alebo <b>r/m/d.</b></p>
	</aside>
	</div>
	<footer>
		<p>
			<span class="copyleft">©</span> GNU GPLv3<br>
			<b>Študenti AIEX UMB</b><br>
			2. ročník Bc.<br>
			<?php echo date("Y"); ?>
		</p>
	</footer>
</body>

</html>
