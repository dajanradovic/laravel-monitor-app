<script>
let userId={{Auth()->user()->id}};
Echo.private(`App.User.${userId}`)
    .notification((notification) => {
        console.log(notification.message);
     
     if(notification.type=='App\\Notifications\\ChatDecline'){

       alert (notification.message);

     }


     
             
    if(notification.type=='App\\Notifications\\ChatInvite')
                  
                    if(confirm(notification.message)){
                        var base_url = window.location.origin;

                        location.href = base_url + '/chatroomfinal';
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