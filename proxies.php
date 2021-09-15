<?php

header('Content-Type:application/json'); 
$url = "https://www.my-proxy.com/free-proxy-list.html"; 
 
$ch = curl_init(); 

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); 
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/'.rand(111,999).'.36 (KHTML, like Gecko) Chrome/88.0.'.rand(1111,9999).'.104 Safari/'.rand(111,999).'.36');
curl_setopt($ch, CURLOPT_URL, $url); 

$proxies = array();
$firstcount = 1;
$endcound = 10;
for ($i = $firstcount; $i <= $endcound; $i++){
    curl_setopt($ch, CURLOPT_URL, "https://www.my-proxy.com/free-proxy-list-$i.html"); 
    $result =curl_exec($ch);
  

    ///Get Proxy 
    // >102.64.122.214:8085#U
    preg_match_all("!\d{1,3}.\d{1,3}.\d{1,3}.\d{1,3}:.\d{2,4}!", $result, $matches);
    $proxies = array_merge($proxies, $matches[0]);
}
curl_close($ch);
// echo json_encode($proxies);
foreach($proxies as $x => $value) {
    echo $value;
    echo  "\n";
}

?>
