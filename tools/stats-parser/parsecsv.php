<?php
$csv = array_map('str_getcsv', file('browser_version-ww-monthly-201701-201801.csv'));
$a = array_combine($csv[0], end($csv));
arsort($a);
echo json_encode($a, JSON_PRETTY_PRINT);

?>