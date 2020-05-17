<script>
let userId={{Auth()->user()->id}};
Echo.private(`App.User.${userId}`)
    .notification((notification) => {
       
     
     if(notification.type=='App\\Notifications\\ChatDecline'){

        $.dialog({
             title: 'Text content!',
            content: notification.message,
});

     }

     if(notification.type=='App\\Notifications\\ChatAccept'){
       
        $.confirm({
    title: 'Chat accepted',
    content: notification.message,
    buttons: {
        ok: function () {
      
        var base_url = window.location.origin;

       location.href = base_url + '/chatroomfinal/'+ notification.chatId;

     }
    }
        });
     }


     
             
    if(notification.type=='App\\Notifications\\ChatInvite')
                  
    $.confirm({
    title: 'You have a new chat invitation',
    content: notification.message,
    buttons: {
        yes: function () {

            var base_url = window.location.origin;
                        let acceptId = notification.userId;

                         axios.get('../../chatroomaccept?chatId=' + notification.chat_id + '&acceptId=' + acceptId, {
                    
                    })
                        .then(function (response) {
                 
                
                        
                            })
                        .catch(function (error) {
                    console.log(error);
                            })
                        .then(function () {
                    // always executed
                });  

                        location.href = base_url + '/chatroomfinal/'+ notification.chat_id;
                    },
            
        
        no: function () {


            let declineId = notification.userId;
                            axios.get('../../chatroomdecline?declinedUserId=' + declineId, {
                    
                    })
                        .then(function (response) {
                 
                
                        
                            })
                        .catch(function (error) {
                    console.log(error);
                            })
                        .then(function () {
                    // always executed
                });  

                    }
            
    }
       
    
    })
             
                     
    });   

                  

                

    
</script>