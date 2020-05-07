<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }} "></script>
    
    <!-- Scripts -->
    

    
</head>

<style>

body{
    
    background-image: url("{{asset('images/919.jpg')}}") !important;
    opacity: 0.9;
       
}

a{

    color: black;
    font-size: 16px;

}

a:hover{

    color: white;
}

hr {

    border-top:1px solid black;
    margin: 0px;
}

#zupanija{

    display: none;
}



.flex-container {
  display: flex;
  flex-direction: row;
}

li {

	list-style-type: none;
}

.card-footer.text-muted{

	padding: 0px 0px 0px 0px;
}


.clearfix:after {
    clear: both;
    content: "";
    display: block;
    height: 0;
}

.container {
	font-family: 'Lato', sans-serif;
	width: 1000px;
	margin: 0 auto;
}

.wrapper {
	display: table-cell;
	height: 400px;
	vertical-align: middle;
}

.nav {
	margin-top: 40px;
}

.pull-right {
	float: right;
}

a, a:active {
	color: #333;
	text-decoration: none;
}

a:hover {
	color: #999;
}

/* Breadcrups CSS */

.arrow-steps .step {
	font-size: 14px;
	text-align: center;
	color: #666;
	cursor: default;
	margin: 0 3px;
	padding: 10px 10px 10px 30px;
	min-width: 150px;
	height: 35px;
	float: left;
	position: relative;
	background-color: #d9e3f7;
	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none; 
  transition: background-color 0.2s ease;
}

.arrow-steps .step:after,
.arrow-steps .step:before {
	content: " ";
	position: absolute;
	top: 0;
	right: -17px;
	width: 0;
	height: 0;
	border-top: 19px solid transparent;
	border-bottom: 17px solid transparent;
	border-left: 17px solid #d9e3f7;	
	z-index: 2;
  transition: border-color 0.2s ease;
}

.arrow-steps .step:before {
	right: auto;
	left: 0;
	border-left: 17px solid #fff;	
	z-index: 0;
}

.arrow-steps .step:first-child:before {
	border: none;
}

.arrow-steps .step:first-child {
	border-top-left-radius: 4px;
	border-bottom-left-radius: 4px;
}

.arrow-steps .step span {
	position: relative;
}

.arrow-steps .step span:before {
	opacity: 0;
	content: "✔";
	position: absolute;
	top: -2px;
	left: -20px;
}

.arrow-steps .step.done span:before {
	opacity: 1;
	-webkit-transition: opacity 0.3s ease 0.5s;
	-moz-transition: opacity 0.3s ease 0.5s;
	-ms-transition: opacity 0.3s ease 0.5s;
	transition: opacity 0.3s ease 0.5s;
}

.arrow-steps .step.current {
	color: #fff;
	background-color: #23468c;
}

.arrow-steps .step.current:after {
	border-left: 17px solid #23468c;	
}


#v-pills-settings-tab:hover, #v-pills-home-tab:hover, #v-pills-messages-tab:hover, #v-pills-profile-tab:hover  {

color: red !important;

}

.dot {
  height: 10px;
  width: 10px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  background-color: green;
}




.dot {
  height: 10px;
  width: 10px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  background-color: green;
}
tr.userrow:hover{

    background-color: grey;
    cursor:pointer;
}

a.nav-link.inboxoutbox.text-white:hover{
color: red !important;

}

.privatemessages{

    border-bottom: 1px solid yellow;
}

.breadcrumb{
    padding: 5px;
    
}

.breadcrumb-item + .breadcrumb-item::before{

    color: #ffed4a;
}

a#subjecttitle.list-group-item{

    padding: 0px !important;
}

a#subjecttitle-bg-dark.text-white:hover{

   background-color: #343a40 !important;
   opacity: inherit;
}

#inputComment{
display:none;
    
}

footer{


    background-color: black;
    height:30px;
    width: 100%;
    position: fixed;
    bottom: 0px;
    color: white;
    text-align: center;

    

}
</style>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link mr-4 text-warning font-italic" href="{{ url('tasks') }}">{{ __('Dashboard') }}</a>
                            </li>
                            <li class="nav-item mr-4 ">
                                <a class="nav-link text-warning font-italic" href="{{ url('users') }}">{{ __('Users List') }}</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} ({{Auth::user()->department}}) <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <hr class="container">

        <main class="py-4">
            @yield('content')
        </main>
    </div>
     <footer>
  
    </footer>
    <script>
 

jQuery(document).ready(function(){

    if ($('.selectchange').val() === "Technician on terrain"){
                
                $('#zupanija').css('display', 'flex');
           }

    $('.selectchange').change(function(){

            console.log("bla");
            
            if ($('.selectchange').val() === "Technician on terrain"){
                
                 $('#zupanija').css('display', 'flex');
            }

            else {
                $('#zupanija').css('display', 'none');

            }
            
    

});

 



$('.updateTaskStatusToRviewed').click(function(e){
     
     var taskId=$('#taskIdHidden').val();
     axios.get('tasks/updateTaskStatus?id='+ taskId , {
                    
                    })
                        .then(function (response) {
                 
                
                        
                            })
                        .catch(function (error) {
                    console.log(error);
                            })
                        .then(function () {
                    // always executed
                });  
});

/*$('.markAsRead').click(function(e){
     
     var taskId=$('#taskIdHidden').val();
     axios.get('tasks/updateTaskStatus?id='+ taskId , {
                    
                    })
                        .then(function (response) {
                 
                
                        
                            })
                        .catch(function (error) {
                    console.log(error);
                            })
                        .then(function () {
                    // always executed
                });  
});*/




            $('#openInputCommentBox').on('click',function()

                                {

                            $('#inputComment').slideDown(200);

                        });


var back =jQuery(".prev");
		var	next = jQuery(".next");
		var	steps = jQuery(".step");
		
		next.bind("click", function() { 
			jQuery.each( steps, function( i ) {
				if (!jQuery(steps[i]).hasClass('current') && !jQuery(steps[i]).hasClass('done')) {
					jQuery(steps[i]).addClass('current');
					jQuery(steps[i - 1]).removeClass('current').addClass('done');
					return false;
				}
			})		
		});
		back.bind("click", function() { 
			jQuery.each( steps, function( i ) {
				if (jQuery(steps[i]).hasClass('done') && jQuery(steps[i + 1]).hasClass('current')) {
					jQuery(steps[i + 1]).removeClass('current');
					jQuery(steps[i]).removeClass('done').addClass('current');
					return false;
				}
			})		
		});


 $('table').on('click', '.userrow', function(){

    var id= $(this).attr('data-id');
    var base_url = window.location.origin;
   // alert (base_url);
    location.href = base_url + '/users/profile/' + id;

 });

 $('#privatemessagebutton').click(function(){
    var currentLocation = window.location;
     location.href = currentLocation + '/privatemessage';
     
 });
	


$('#submitCommentForm').click(function(){

    $('#submitComment').submit();
});

});

function markAsRead(notificationId){

    axios.get('../../tasks/markAsRead?id='+ notificationId , {
                    
                    })
                        .then(function (response) {
                 
                                console.log(response);
                        
                            })
                        .catch(function (error) {
                    console.log(error);
                            })
                        .then(function () {
                    // always executed
                });  
}


function markMessageAsRead(notificationId){
    
    axios.get('../../markMessageAsRead?id='+ notificationId , {
                    
                    })
                        .then(function (response) {
                 
                                console.log(response);
                        
                            })
                        .catch(function (error) {
                    console.log(error);
                            })
                        .then(function () {
                    // always executed
                });  
}



    setInterval(function(){
        var today = new Date();
var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
var dateTime = date+' '+time;

        document.querySelector('footer').textContent = dateTime;
     }, 1000);



</script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
