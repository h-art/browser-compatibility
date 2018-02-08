<?php
$url = "http://gs.statcounter.com/chart.php?device=Desktop%20%26%20Mobile%20%26%20Tablet%20%26%20Console&device_hidden=desktop%2Bmobile%2Btablet%2Bconsole&multi-device=true&statType_hidden=browser_version&region_hidden=ww&granularity=monthly&statType=Browser%20Version&region=Worldwide&fromInt=201711&toInt=201801&fromMonthYear=2017-11&toMonthYear=2018-01&csv=1";
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
