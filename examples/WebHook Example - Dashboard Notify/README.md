#WebHook Example - Dashboard Notify

With the provided PHP code you can post notifications to your dashboard. For notification options please refer to https://github.com/sciactive/pnotify.

The code below is a ``jQuery`` example of posting a notification with your ``API key`` hidden in the ``PHP`` file called ``webhook_server_side.php``.

``<script>

$.post(
        'http://mywebsite.unmetered.chat/webhook_server_side.php',
        {data:JSON.stringify({note:{text:'test',title:'test',type:'success'},log:{test:''}})},
        function(d){console.log(d)}
    )
    
</script>``