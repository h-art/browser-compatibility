<?php

$month_from = date('m', strtotime('-3 month'));
$year_from = date('Y', strtotime('-3 month'));
$month_to = date('m', strtotime('-1 month'));
$year_to = date('Y', strtotime('-1 month'));

echo "Download browser statistics form ${month_from} ${year_from} to ${month_to} ${year_to}\n";

$url = "http://gs.statcounter.com/chart.php?device=Desktop%20%26%20Mobile%20%26%20Tablet%20%26%20Console&device_hidden=desktop%2Bmobile%2Btablet%2Bconsole&multi-device=true&statType_hidden=browser_version&region_hidden=ww&granularity=monthly&statType=Browser%20Version&region=Worldwide&fromInt=${year_from}${month_from}&toInt=${year_to}${month_to}&fromMonthYear=${year_from}-${month_from}&toMonthYear=${year_to}-${month_to}&csv=1";
echo "URL : ".$url."\n";

$ch = curl_init($url);
$fh = fopen('stats.csv', 'w');
curl_setopt($ch, CURLOPT_FILE, $fh); 
//curl_setopt($ch, CURLOPT_HEADER, 0);
//curl_setopt($ch, CURLOPT_POST, 1);
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($ch);
if (!curl_errno($ch)) {
  $info = curl_getinfo($ch);
  if ($info['http_code'] == 200) {
  	echo 'Took ', $info['total_time'], ' seconds to send a request to ', $info['url'], "\n";		
  } else {
  	echo "Error, status is not 200 ".$info['http_code']."\n";
  }
} else {
	echo "Error: ".curl_error($ch)."\n";
}
curl_close($ch);
fclose($fh); 
