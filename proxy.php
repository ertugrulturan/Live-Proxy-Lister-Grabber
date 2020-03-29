<?php
//v4t1.eu // v4r1able - t13r
$liste = file_get_contents("https://api.proxyscrape.com/?request=getproxies&proxytype=http&timeout=50&country=all&ssl=all&anonymity=all");
$proxy_ex = explode("\n",$liste);
$deger = ("5"); // listeden ne kadar proxy kontrol edilsin burda belirtirsiniz default 5 listede ki tum proxyleri kontrol etmek istiyorsanız $deger = count($proxy_ex); olarak burayı degistirin.
function proxy_checker($proxy_ip) {
        $proxy_ayir = explode(":", $proxy_ip);
	$ch = curl_init();
	curl_setopt ($ch, CURLOPT_URL, "https://1.1.1.1/");
	curl_setopt ($ch, CURLOPT_TIMEOUT, 20);
        curl_setopt ($ch, CURLOPT_HTTPPROXYTUNNEL , 1);
	curl_setopt ($ch, CURLOPT_PROXY, $proxy_ayir[0]);
        curl_setopt ($ch, CURLOPT_PROXYPORT, $proxy_ayir[1]);
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, true);
	$result = curl_exec($ch);
        if($result=="") {
        echo '';
        } else {
        print $proxy_ip."<br>";
        }
	curl_close($ch);
}
        for($i=0; $i<$deger; $i++) {
        proxy_checker($proxy_ex[$i]);
        }
?>
