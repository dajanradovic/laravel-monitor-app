<script>
let userId={{Auth()->user()->id}};
Echo.private(`App.User.${userId}`)
    .notification((notification) => {
        console.log(notification);
     
     if(notification.type=='App\\Notifications\\ChatDecline'){

       alert (notification.message);

     }

     if(notification.type=='App\\Notifications\\ChatAccept'){

       alert (notification.message);
        var base_url = window.location.origin;

       location.href = base_url + '/chatroomfinal/'+ notification.chatId;

     }


     
             
    if(notification.type=='App\\Notifications\\ChatInvite')
                  
                    if(confirm(notification.message)){
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
                    }

                    else {

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

    });
</script>