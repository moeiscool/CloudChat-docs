# Push Data

Send a POST request however you want.

Below is an example with `jQuery`. Replace `[KEY]` with your API Key. API keys can be generated from the master account in settings.

```
$.post('https://socket.unmetered.chat:8443/api/[KEY]/push/[CHANNEL]',{data:JSON.stringify({its_time_for:['muffins','cheesecake']})},function(d){console.log(d)})
```

Recieving on the client side requires that you connect to the channel. Set this

```
$.CloudChat.cx({f:'push',ff:'join',channel:'page_muffin_time'})
```

Then to recieve the responses add a catcher.

```
$.CloudChat.fn=function(d){
    console.log(d);
}
```

*TEMPORARY UNTIL NEXT UPDATE :* Here is an example code in action. "CloudChatFN" will not be needed after CloudFlare updates.

```
//check CloudChat is active
var CloudChatFN=setInterval(function(){
    if($.CloudChat&&$.CloudChat.ao){
        //stop the checker.
        clearInterval(CloudChatFN);
        
        //Connect to Channel
        $.CloudChat.cx({f:'push',ff:'join',channel:'page_muffin_time'})


        //function that is called when recieving a message.
        $.CloudChat.fn=function(d){
            console.log(d);
        }
        //

    }
},1000);
```


**PHP**

```
<?php
//set return type as JSON string
header('Content-Type: application/json');
//set default return variable
$json='{"ok":false}';

    $url = "https://socket.unmetered.chat:8443/api/[KEY]/push/[CHANNEL]";
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST,count($fields));
    curl_setopt($curl, CURLOPT_POSTFIELDS,$fields);
    curl_setopt($curl, CURLOPT_CONNECTTIMEOUT ,10000); 
    curl_setopt($curl, CURLOPT_TIMEOUT, 400);
    $json = curl_exec($curl);
    $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);
    
echo $json;
?>
```