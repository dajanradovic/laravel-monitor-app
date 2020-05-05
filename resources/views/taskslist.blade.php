@extends ('layouts.app')





@section('content')

<div class="container" >	
<div class="row">
<div class="col-md-12">
<nav aria-label="breadcrumb " style="margin-left: -15px;" >
  <ol class="breadcrumb bg-dark text-warning pull-left" style="margin-left: 0px;">
    <li class="breadcrumb-item active text-warning" aria-current="page">Dashboard</li>
	 <li class="breadcrumb-item text-warning " aria-current="page">Home</li>
  </ol>
</nav>

</div>
</div>

<div class="row">
  <div class="col-md-3 bg-dark" style="margin-top:15px;">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link text-white active" id="v-pills-home-tab"  href="{{url ('/tasks')}}"  aria-selected="true">Home</a>
      <a class="nav-link text-white" id="v-pills-profile-tab"  href="{{url ('/users/profile')}}"  aria-controls="v-pills-profile" aria-selected="false">Profile</a>
      
     @can('isSupervisor', Auth()->user())
	 		<a class="nav-link text-white" id="v-pills-messages-tab"  href="{{route ('supervisor/addedtasks')}}" aria-selected="false">New tasks<span class="badge badge-pill badge-primary ml-1">{{auth()->user()->unreadNotifications->where('type', 'App\Notifications\TaskAdded')->count()}}</span></a>
	 	  <a class="nav-link text-white" id="v-pills-home-tab"  href="{{url ('/register')}}"  aria-selected="true">Add new user</a>
	@endcan
	 @can('isPhoneAgent', Auth()->user())
	 	  <a class="nav-link text-white" id="v-pills-home-tab"  href="{{url ('/tasks/create')}}"  aria-selected="true">Add new task</a>
	@endcan
  	<a class="nav-link text-white" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Private messages<span class="badge badge-pill badge-primary ml-1">{{auth()->user()->unreadNotifications->where('type', 'App\Notifications\NewPrivateMessage')->count()}}</span>
  </a>
 <div class="collapse border-0" id="collapseExample">
  <div class="card card-body border-0 pt-0 pr-0 bg-dark pb-0">
    <ul class="nav flex-column mt-0">
  <li class="nav-item">
    <a class="nav-link inboxoutbox text-white" href="users/profile/inbox">Inbox</a>
  </li>
  <li class="nav-item">
    <a class="nav-link inboxoutbox text-white" href="users/profile/outbox">Outbox</a>
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
  <div class="col-md-9">

  @foreach ($tasks as $task)

<div class="card text-center mt-3 border border-dark">
  <div class="card-header">
   	 <span class="float-left">Problem number </span>
	<p>
	@cannot('isSupervisor', Auth()->user())
	<button class="btn btn-primary float-right mt-3" type="button" data-toggle="collapse" data-target=".multi-collapse{{$task->id}}" aria-expanded="false" aria-controls="multiCollapseExample{{$task->id}} multiCollapseExample2{{$task->id}}">Details</button>
	@endcannot 
	@can('isSupervisor', Auth()->user())
	
	
	<input id="taskIdHidden" type="hidden" value="{{$task->id}}"/>
	
	<button id="updateTaskStatus{{$task->id}}" class="updateTaskStatusToRviewed btn btn-danger float-right mt-3" type="button" data-toggle="collapse" data-target=".multi-collapse{{$task->id}}" aria-expanded="false" aria-controls="multiCollapseExample{{$task->id}} multiCollapseExample2{{$task->id}}">Details</button>
	
	@endcan
			 
			  
			  @if ($task->status == 'problem submitted' && Auth()->user()->department == 'Phone-agent')
			 
					

						<form class="inline-block" method="GET" action="/tasks/{{$task->id}}/edit">
									@csrf
						  <button class="btn btn-warning float-right mr-3" type="submit">Edit</button>
						</form>
				

			 		

			@endif
	</p>
  </div>

  <div class="card-body">
  
		<div class="row">
  			<div class="col-md-6">
   				 <div class="collapse multi-collapse{{$task->id}}" id="multiCollapseExample{{$task->id}}">
     					 <div class="card card-body">
	  Complainer's details:
						  <div class="flex-container">
	  							<div >

								  

     								 <ul style="padding-left: 0px;">
 									 <li class="text-md-right mb-1 "><u>Name:</u></li>
  									<li class="text-md-right  mb-1"><u>Surname:</u></li>
									<li class="text-md-right  mb-1"><u>Address:</u></li>
									<li class="text-md-right  mb-1"><u>Town:</u></li>
									<li class="text-md-right  mb-1"><u>County:</u></li>
									<li class="text-md-right  mb-1"><u>phone:</u></li>
									<li class="text-md-right  mb-1 "><u>e-mail:</u></li>


								</ul>
								</div>

								<div >

								<ul class="">
									<li class="text-md-left  mb-1" style="width:190px;">{{$task->name}}</li>
									<li  class="text-md-left  mb-1"style="width:190px;">{{$task->surname}}</li>
									<li class="text-md-left  mb-1"style="width:190px;">{{$task->address}}</li>
									<li class="text-md-left  mb-1"style="width:190px;">{{$task->town}}</li>
									<li class="text-md-left  mb-1"style="width:190px;">{{$task->county}}</li>
									<li class="text-md-left  mb-1"style="width:190px;">{{$task->phone}}</li>
									
									<li class="text-md-left  mb-1 " style="width:190px;">{{$task->email}}></li>
									

									</ul>
								</div>
							</div>	



     						 </div>
    					</div>
 				 </div>
  <div class="col-md-6">
    <div class="collapse multi-collapse{{$task->id}}" id="multiCollapseExample2{{$task->id}}">
      <div class="card card-body">
       <label class="text-md-left"><u>Problem desription:</u></label>
	 <p class="text-md-left">{{$task->description}} </p>
	 @foreach ($task->comments as $comment)
	 <p class="text-danger text-md-left">- {{$comment->body}} <small class="text-md-left text-dark" style="padding-bottom: 0px;">written by {{$comment->user->name}} on {{$comment->created_at}}</small></p>
	 
	 @endforeach
	 <button id="openInputCommentBox" class="btn btn-sm btn-warning" style="width:120px; padding: 0px;">Enter comment</button>
	 <div style="text-align: left;" id="inputComment"><form id="submitComment" action="{{route ('submitcomment')}}" method="POST">
	 @csrf
	 <input type="hidden" name="task_id" value="{{$task->id}}" />
	 <input  type="text" name="comment"/></form><span class="badge badge-pill badge-primary ml-1" style="cursor:pointer;" id="submitCommentForm" title="Post a comment">Go</span></div>
      </div>
    </div>
  </div>

</div>
  
  
  
  <div class="card-footer text-muted">
  <div class="arrow-steps clearfix">
          <div class="step current"> <span>Problem submitted</span> </div>
		@if($task->status == 'reviewed by supervisor')
			<div class="step current"> <span style="margin: 0 auto;">Reviewed by supervisor</span> </div>
		@else
          <div class="step"> <span style="margin: 0 auto;">Reviewed by supervisor</span> </div>

		@endif
          <div class="step"> <span> Problem delegated</span> </div>
          <div class="step"> <span>Being solved</span> </div>
			</div>
	<!--	<div class="nav clearfix">
        <a href="#" class="prev">Previous</a>
        <a href="#" class="next pull-right">Next</a>
		</div>-->

</div>
</div>
</div>

@endforeach
   
</div>


</div>



@endsection('content')




