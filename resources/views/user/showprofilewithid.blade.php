@extends ('layouts.app')



@section('content')

<div class="container">	
<div class="row">
<div class="col-md-12">
<nav aria-label="breadcrumb " style="margin-left: -15px;" >
  <ol class="breadcrumb bg-dark text-warning pull-left" style="margin-left: 0px;">
    <li class="breadcrumb-item active text-warning" aria-current="page">Users List</li>
	 <li class="breadcrumb-item text-warning " aria-current="page">Personal Profile</li>
  </ol>
</nav>

</div>
</div>

<div class="row">
  <div class="col-md-3 bg-dark" style="margin-top:15px;">
   <p class="text-white mt-1 mb-1 font-weight-bold">Hello,</p>
   <p class="text-white font-weight-bold"> you are viewing {{$profileuser->name}} {{$profileuser->surname}}'s profile</p>
  <button type="button" id="privatemessagebutton" class="btn btn-success btn-md btn-block">Send private message</button>
  
  <button type="button" id="chatInvitationButton" class="btn btn-success btn-md mt-1 btn-block">Open chat dialog</button>
     @can('isSupervisor', Auth()->user())
    <a class="btn btn-warning btn-md mt-1 btn-block" href="/users/{{$profileuser->id}}/edit">Edit profile</a>
    @endcan
  <hr>

  
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
     <p style="color:white; width:100px;" class="bg-primary"><i>who is online:</i></p>
	 @foreach ($users as $user)
	 <p style="color:white;" ><span class="dot mr-2"></span>{{$user->name}}</p>
	 @endforeach
    </div>
  </div>
  <div class="col-md-3 mt-3">

   @if($profileuser->img == "")
   <img style="width:100%; height: 285px;" src="{{asset('images/default-avatar.png')}}"  class="rounded pr-3" alt="profile photo">

   @else 
   <img style="width:100%; height: 285px;" src="/storage/{{$profileuser->img}}" class="rounded ml-3" alt="profile photo">
    @endif
  </div>
  <div class="col-md-6 ">
 


 <ul class="list-group  mt-3">
  <li class="list-group-item text-white d-flex justify-content-between bg-dark align-items-center">
    Name:
    <span class="badge badge-primary badge-pill">{{$profileuser->name}}</span>
  </li>
  <li class="list-group-item bg-dark text-white d-flex justify-content-between align-items-center">
     Surname:
    <span class="badge badge-primary badge-pill">{{$profileuser->surname}}</span>
  </li>
  <li class="list-group-item bg-dark text-white d-flex justify-content-between align-items-center">
    Address:
    <span class="badge badge-primary badge-pill">{{$profileuser->address}}</span>
  </li>
  <li class="list-group-item bg-dark text-white d-flex justify-content-between align-items-center">
   Town
    <span class="badge badge-primary badge-pill">{{$profileuser->town}}</span>
  </li>
  <li class="list-group-item bg-dark text-white d-flex justify-content-between align-items-center">
    Department
    <span class="badge badge-primary badge-pill">{{$profileuser->department}}</span>
  </li>

  @if ($profileuser->department == 'Technician on terrain')
  <li class="list-group-item bg-dark text-white d-flex justify-content-between align-items-center">
   Workplace
    <span class="badge badge-primary badge-pill">{{$profileuser->workplace}}</span>
  </li>
  @endif
  <li class="list-group-item bg-dark text-white d-flex justify-content-between align-items-center">
    E-mail
    <span class="badge badge-primary badge-pill">{{$profileuser->email}}</span>
  </li>
</ul>
   
</div>


</div>

<script>

  $('#chatInvitationButton').click(function(){

      let invitedUserId={{$profileuser->id}};

        axios.get('../../chatroom?invitedUserId=' + invitedUserId, {
     
     })
          .then(function (response) {
      var base_url = window.location.origin;
   // alert (base_url);
    location.href = base_url + '/chatroomfinal';
            })
          .catch(function (error) {
    console.log(error);
              })
          .then(function () {
    // always executed
  });  


  });

</script>

@endsection('content')




