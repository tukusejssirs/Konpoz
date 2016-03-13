<?php>

$file = 'db_output.txt';
file_put_contents($file, "This is a test ;#[]áčľý\n", LOCK_EX);

file_get_contents($file);

?>

