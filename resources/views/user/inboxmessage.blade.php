@extends ('layouts.app')






@section('content')

<div class="container">	
<div class="row">
<div class="col-md-12">
<nav aria-label="breadcrumb " style="margin-left: -15px;" >
  <ol class="breadcrumb bg-dark text-warning pull-left" style="margin-left: 0px;">
      <li class="breadcrumb-item active text-warning" aria-current="page">Dashboard</li>

    <li class="breadcrumb-item active text-warning" aria-current="page">Private Messages</li>
	 <li class="breadcrumb-item text-warning " aria-current="page">Inbox</li>
  <li class="breadcrumb-item text-warning " aria-current="page">Read subject</li>

  </ol>
</nav>

</div>
</div>

<div class="row">
  <div class="col-md-3 bg-dark" style="margin-top:15px;">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link text-white" id="v-pills-home-tab"  href="{{url ('/tasks')}}"  aria-selected="true">Home</a>
      <a class="nav-link text-white" id="v-pills-profile-tab"  href="{{url ('/users/profile')}}"  aria-controls="v-pills-profile" aria-selected="false">Profile</a>
      <a class="nav-link text-white" id="v-pills-messages-tab"  href="{{route ('supervisor/addedtasks')}}" aria-selected="false">New tasks<span class="badge badge-pill badge-primary ml-1">{{auth()->user()->notifications->count()}}</span></a>
      
  	<a class="nav-link text-white" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Private messages
  </a>
 <div class="collapse-show border-0" id="collapseExample">
  <div class="card card-body border-0 pt-0 pr-0 bg-dark pb-0">
    <ul class="nav flex-column mt-0">
  <li class="nav-item">
    <a class="nav-link inboxoutbox text-white active" href="../inbox">Inbox</a>
  </li>
  <li class="nav-item">
    <a class="nav-link inboxoutbox text-white" href="../outbox">Outbox</a>
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
  <div class="col-md-1">
  </div>
  <div class="col-md-8 bg-dark mt-3">
  <div class="text-white">
  <h3 class="pt-2">{{$privatemessage->subject->name}}</h3>
  @foreach($samesubject as $single)
  @if ($single->user_id == Auth()->user()->id)
  <p class="privatemessages pt-2 bg-danger">"{{$single->message}}" <small class="pull-right"><i>written by {{$single->user->name}} on {{$single->created_at}}</i></small></p>
  @else
 <p class="privatemessages pt-2 ">"{{$single->message}}" <small class="pull-right"><i>written by {{$single->user->name}} on {{$single->created_at}}</i></small></p>
 @endif
  @endforeach
       
  
      <form method="POST" action="/users/profile/inbox/reply">
      @csrf
      
      <input type="hidden" name="subject_id" value="{{$privatemessage->subject_id}}">
      <input type="hidden" name="recipientId" value="{{$privatemessage->user_id}}">
      
     <textarea class="form-control" name="message" placeholder="Reply"></textarea>
      <button type="submit" class="btn btn-primary  mt-2"">Reply</button>
      </form>
      </div>
  </div>
  


</div>


@include('includes.chatinvitationscript')
@endsection('content')




