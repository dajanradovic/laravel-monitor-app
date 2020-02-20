@extends ('layouts.app')





@section('content')

<div class="container">	
<div class="row">
<div class="col-md-12">
<nav aria-label="breadcrumb " style="margin-left: -15px;" >
  <ol class="breadcrumb bg-dark text-warning pull-left" style="margin-left: 0px;">
    <li class="breadcrumb-item active text-warning" aria-current="page">Dashboard</li>
	 <li class="breadcrumb-item text-warning " aria-current="page">New added tasks</li>
  </ol>
</nav>

</div>
</div>

<div class="row">
  <div class="col-md-3 bg-dark" style="margin-top:15px;">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link text-white" id="v-pills-home-tab"  href="{{url ('/tasks')}}"  aria-selected="true">Home</a>
      <a class="nav-link text-white" id="v-pills-profile-tab"  href="{{url ('/users/profile')}}"  aria-controls="v-pills-profile" aria-selected="false">Profile</a>
      <a class="nav-link text-white active" id="v-pills-messages-tab"  href="{{route ('supervisor/addedtasks')}}" aria-selected="false">New tasks<span class="badge badge-pill badge-primary ml-1">1</span></a>
      
  	<a class="nav-link text-white" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Private messages
  </a>
 <div class="collapse border-0" id="collapseExample">
  <div class="card card-body border-0 pt-0 pr-0 bg-dark pb-0">
    <ul class="nav flex-column mt-0">
  <li class="nav-item">
    <a class="nav-link inboxoutbox text-white" href="../../users/profile/inbox">Inbox</a>
  </li>
  <li class="nav-item">
    <a class="nav-link inboxoutbox text-white" href="../../users/profile/outbox">Outbox</a>
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

  @foreach (auth()->user()->notifications as $notification)
        @foreach($tasks as $task)

            @if ($task->id == $notification->data['taskId'])
                    <div class="card text-center mt-3 border border-dark">
                        <div class="card-header">
                    	 <span class="float-left">Problem number </span>
                            	<p>
	                    @cannot('isSupervisor', Auth()->user())
                        	<button class="btn btn-primary float-right mt-3" type="button" data-toggle="collapse" data-target=".multi-collapse{{$task->id}}" aria-expanded="false" aria-controls="multiCollapseExample{{$task->id}} multiCollapseExample2{{$task->id}}">Details</button>
                    	@endcannot 
                            	@can('isSupervisor', Auth()->user())
	
                            	<button id="updateTaskStatus{{$task->id}}" class="btn btn-danger float-right mt-3" type="button" data-toggle="collapse" data-target=".multi-collapse{{$task->id}}" aria-expanded="false" aria-controls="multiCollapseExample{{$task->id}} multiCollapseExample2{{$task->id}}">Details</button>
	
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
	  
						  <div class="flex-container">
	  							<div>
     								 <ul style="padding-left: 0px;">
 									 <li class="text-md-right" ><u>Complainer Name:</u></li>
  									<li class="text-md-right"><u>Complainer Surname:</u></li>
									<li class="text-md-right"><u>Complainer Address:</u></li>
									<li class="text-md-right"><u>Complainer Town:</u></li>
									<li class="text-md-right"><u>Complainer County:</u></li>
									<li class="text-md-right"><u>Complainer phone:</u></li>
									<li class="text-md-right"><u>Complainer e-mail:</u></li>


								</ul>
								</div>

								<div >

								<ul class="">
									<li class="text-md-left" >{{$task->name}}</li>
									<li  class="text-md-left">{{$task->surname}}</li>
									<li class="text-md-left">{{$task->address}}</li>
									<li class="text-md-left">{{$task->town}}</li>
									<li class="text-md-left">{{$task->county}}</li>
									<li class="text-md-left">{{$task->phone}}</li>
									<li class="text-md-left">{{$task->email}}></li>

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
	    <p class="text-md-left ">{{$task->description}} </p>
      </div>
    </div>
  </div>

</div>
  
  
  
  <div class="card-footer text-muted">
  <div class="arrow-steps clearfix">
          <div class="step current"> <span>Problem submitted</span> </div>
          <div class="step"> <span style="margin: 0 auto;">Reviewed by supervisor</span> </div>
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

@endif
@endforeach

@endforeach
   
</div>


</div>



@endsection('content')




