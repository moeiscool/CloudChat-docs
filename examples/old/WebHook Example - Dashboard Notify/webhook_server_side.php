<?php
//set return type as JSON string
header('Content-Type: application/json');
//set default return variable
$json='{"ok":false}';
//check if data is setecho json_encode($_POST);exit();
if(isset($_POST['data'])&&$_POST['data']!==''){
    
//XXXXXXXXXXXXXXXXXXXXX must be replaced with your api key. This is generated in your superuser settings.
    
//Penguin Server
//    $url = "http://free.api.unmetered.chat/XXXXXXXXXXXXXXXXXXXXX/data";
//Husky Server
//    $url = "http://api.unmetered.chat/XXXXXXXXXXXXXXXXXXXXX/data";
    $url = "http://free.api.unmetered.chat/XXXXXXXXXXXXXXXXXXXXX/data";
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST,count($_POST));
    curl_setopt($curl, CURLOPT_POSTFIELDS,$_POST);
    curl_setopt($curl, CURLOPT_CONNECTTIMEOUT ,10000); 
    curl_setopt($curl, CURLOPT_TIMEOUT, 400);
    $json = curl_exec($curl);

    $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    curl_close($curl);
}
echo $json;
?>