<?php
	if ($db_old_con){
		echo "Záznamy staršie ako dnes sú vymazané.<br><br>";
	} else {
		echo "ERROR: Záznamy staršie ako dnes sa nepodarilo vymazať.<br><br>";
	}
?>
