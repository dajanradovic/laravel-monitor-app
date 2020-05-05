@extends ('layouts.app')






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
      <a class="nav-link text-white" id="v-pills-home-tab"  href="{{url ('/tasks')}}"  aria-selected="true">Home</a>
      <a class="nav-link text-white active" id="v-pills-profile-tab"  href="{{url ('/users/profile')}}"  aria-controls="v-pills-profile" aria-selected="false">Profile</a>
      @can('isSupervisor', Auth()->user())
	 		<a class="nav-link text-white" id="v-pills-messages-tab"  href="{{route ('supervisor/addedtasks')}}" aria-selected="false">New tasks<span class="badge badge-pill badge-primary ml-1">{{auth()->user()->notifications->count()}}</span></a>
	 	  <a class="nav-link text-white" id="v-pills-home-tab"  href="{{url ('/register')}}"  aria-selected="true">Add new user</a>
	@endcan
	 @can('isPhoneAgent', Auth()->user())
	 	  <a class="nav-link text-white" id="v-pills-home-tab"  href="{{url ('/tasks/create')}}"  aria-selected="true">Add new task</a>
	@endcan
      
  	<a class="nav-link text-white" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Private messages
  </a>
 <div class="collapse border-0" id="collapseExample">
  <div class="card card-body border-0 pt-0 pr-0 bg-dark pb-0">
    <ul class="nav flex-column mt-0">
  <li class="nav-item">
    <a class="nav-link inboxoutbox text-white" href="../users/profile/inbox">Inbox</a>
  </li>
  <li class="nav-item">
    <a class="nav-link inboxoutbox text-white" href="../users/profile/outbox">Outbox</a>
  </li>
 </ul>
  </div>
</div>
    </div>
  
  <hr>

  
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
     <p style="color:white; width:100px;" class="bg-primary"><i>who is online:</i></p>
	 @foreach ($users as $user)
	 <a href="users/profile/{{$user->id}}" style="color:white;" ><span class="dot mr-2"></span>{{$user->name}}</a>
	 @endforeach
    </div>
  </div>
  <div class="col-md-3 mt-3">

    @if(Auth()->user()->img == "")
   <img style="width:100%; height: 285px;" src="{{asset('images/default-avatar.png')}}"  class="rounded ml-3" alt="profile photo">


   @else 
   <img style="width:100%; height: 285px;" src="/storage/{{Auth()->user()->img}}" class="rounded ml-3" alt="profile photo">
    @endif
   <form action="/users/uploadProfilePhoto" method="POST" enctype="multipart/form-data">
   @csrf
   <div class="form-group ml-3">
    <label for="img">Pick a profile-photo</label>

   <input type="file" name="img" class="form-control-file" />
   </div>
   <input type="submit" class="btn btn-sm btn-primary ml-3" value="Upload">
   </form>
  </div>
  <div class="col-md-6 ">

 <ul class="list-group  mt-3">
  <li class="list-group-item text-white d-flex justify-content-between bg-dark align-items-center">
    Name:
    <span class="badge badge-primary badge-pill">{{Auth()->user()->name}}</span>
  </li>
  <li class="list-group-item bg-dark text-white d-flex justify-content-between align-items-center">
     Surname:
    <span class="badge badge-primary badge-pill">{{Auth()->user()->surname}}</span>
  </li>
  <li class="list-group-item bg-dark text-white d-flex justify-content-between align-items-center">
    Address:
    <span class="badge badge-primary badge-pill">{{Auth()->user()->address}}</span>
  </li>
  <li class="list-group-item bg-dark text-white d-flex justify-content-between align-items-center">
   Town
    <span class="badge badge-primary badge-pill">{{Auth()->user()->town}}</span>
  </li>
  <li class="list-group-item bg-dark text-white d-flex justify-content-between align-items-center">
    Department
    <span class="badge badge-primary badge-pill">{{Auth()->user()->department}}</span>
  </li>

  @if (Auth()->user()->department == 'Technician on terrain')
  <li class="list-group-item bg-dark text-white d-flex justify-content-between align-items-center">
   Workplace
    <span class="badge badge-primary badge-pill">{{Auth()->user()->workplace}}</span>
  </li>
  @endif
  <li class="list-group-item bg-dark text-white d-flex justify-content-between align-items-center">
    E-mail
    <span class="badge badge-primary badge-pill">{{Auth()->user()->email}}</span>
  </li>
</ul>
   
</div>


</div>
    @include('includes.chatinvitationscript')


@endsection('content')




