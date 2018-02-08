<?php
$csv = array_map('str_getcsv', file('stats.csv'));
$a = array_combine($csv[0], end($csv));
array_shift($a);
arsort($a);
echo json_encode($a, JSON_PRETTY_PRINT);

?>