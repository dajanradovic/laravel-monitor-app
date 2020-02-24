@extends('layouts.app')

@section('content')

<div class="container">

<div class="row">
<div class="col-md-12">
<nav aria-label="breadcrumb " style="margin-left: -15px;" >
  <ol class="breadcrumb bg-dark text-warning pull-left" style="margin-left: 0px;">
    <li class="breadcrumb-item active text-warning" aria-current="page">Dashboard</li>
	 <li class="breadcrumb-item text-warning " aria-current="page">Profile</li>
  </ol>
</nav>

</div>
</div>

<div class="row">
  <div class="col-md-3 bg-dark" style="margin-top:15px;">
 
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
     <p id="chatUsers" style="color:white;" class="bg-primary"><i>users in chatroom:</i></p>
     <p>{{Auth()->user()->name}}</p>

    </div>
  </div>
  <div class="col-md-1">
  </div>
  <div class="col-md-8 bg-dark" style="margin-top:15px; height:400px; " >
  <div id="out" style="height:380px; overflow:auto">
  <ul id="chatcontent">



</ul>
</div >
<div class="pull-down" style="position:absolute; bottom: 10px; width:100%">
<input id="proba" style="width: 85%;"type="text" name="message"/>
<button class="btn btn-primary btn-md" id="submitChatMessage">Send</button>
</div>
</div>










</div>
<script>



jQuery(document).ready(function(){


  


$('#proba').keyup(function(e){

    if (e.key=="Enter"){

        let a= $('#proba').val();

$('#proba').val(' ');

axios.post('/chatroom', {
   message: a
  })
  .then(function (response) {
    console.log(response);
  })
  .catch(function (error) {
    console.log(error);
  });


    }
});

$('#submitChatMessage').click(function(){

let a= $('#proba').val();

$('#proba').val(' ');
axios.post('/chatroom', {
   message: a
  })
  .then(function (response) {
    console.log(response);
  })
  .catch(function (error) {
    console.log(error);
  });

})



var today = new Date();
var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
var dateTime = date+' '+time;
    
     //$('#chatcontent').append('<li> blago nama</li>');

  window.Echo.channel('chat-channel')
 .listen('SendChatMessageEvent', (data) =>{

   if(data.user_name=="{{Auth()->user()->name}}")
   {
        $('#chatcontent').append('<li style="color:white;"><i>' + data.user_name + ' says: </i>' + data.message.message + '<small class="pull-right">' +dateTime +'</small></li>');

   }
else{
 $('#chatcontent').append('<li style="color:yellow;"><i>' + data.user_name + ' says: </i>' + data.message.message + '<small class="pull-right">' +dateTime +'</small></li>');

}
  
   
    
    chatWindow = document.getElementById('out'); 
var xH = chatWindow.scrollHeight; 
chatWindow.scrollTo(0, xH);
 });

 
 
  

});

</script>














@endsection