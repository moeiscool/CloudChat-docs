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