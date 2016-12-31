# Push Storage Feature

The function that CloudChat uses for recieving push messages is as follows.


```
$.CloudChat.fn=function(){
    //your catch code here.
}
```


variables that comes in like so.

```
{stor:{key:'',value:''}}
```


How to make a call for a variable.

```
$.CloudChat.data({stor:{get:'page_dsl'}})
```


How to save a variable. Let's save the current time. by putting `/time` as the `value ` the server will set the current time on the server side.

```
$.CloudChat.data({stor:{put:'page_dsl',value:'/time'}})
```


But you may put any variable here. *Maximum length is 600 characters.*

```
$.CloudChat.data({stor:{put:'page_dsl',value:'a new variable changed based on user login or something.'}})
```

When you send data you will get a response on the master pusher function `$.CloudChat.fn`.

```
{hook:{stor:...}}
```

Here is an example of how to put it in action.

```
//make sure CloudChat is active.
//this checker interval will be remove in the next update.
var CloudChatFN=setInterval(function(){
    if($.CloudChat&&$.CloudChat.ao){
        //stop the checker.
        clearInterval(CloudChatFN);
        //function that is called when recieving a message.
        $.CloudChat.fn=function(d){
            
            if(d.stor&&d.stor.key&&d.stor.value){
                switch(d.stor.key){
                    case'page_dsl':
                        $('[viewed="page_dsl"] .livestamp').livestamp('destroy').livestamp(d.stor.value);
                    break;
                }
            }
            if(d.hook){
                if(d.hook.stor&&d.hook.stor.put){
                    switch(d.hook.stor.put){
                        case'page_dsl':
                            $('[viewed="page_dsl"] .livestamp').livestamp('destroy').livestamp(new Date);
                        break;
                    }
                }
            }
            console.log(d);
        }
    }
},1000);
```