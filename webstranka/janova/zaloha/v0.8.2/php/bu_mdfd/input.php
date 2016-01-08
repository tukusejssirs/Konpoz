<?php
	include "passwd.php";

	$query = "INSERT INTO podujatia VALUES ('$_POST[nazov]','$_POST[prihlaska]','$_POST[datum]','$_POST[info]')";
	$result = pg_query($query); 

	header("Location: ../konferencie.php");
	exit;
?>
