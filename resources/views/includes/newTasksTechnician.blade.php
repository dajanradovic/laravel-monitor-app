@if(sizeof($unreadTasksTechnician) == 0)
		<p class="text-white font-weight-bold mt-3">There are currently no new tasks</p>
		@endif
@foreach($tasks as $task)
			@foreach ($unreadTasksTechnician as $unreadTaskTechnician)
            	@if ($task->id == $unreadTaskTechnician->data['taskId'])
                    <div class="card text-center mt-3 border border-dark">
                        <div class="card-header">
                    	 <span class="float-left">#{{$task->id}} </span>
                            	<p>
	                  
	
            	<button id="updateTaskStatus{{$task->id}}" onclick="markMessageAsReadByTechnician('{{$task->id}}', '{{$unreadTaskTechnician->id}}');" class="markAsRead btn btn-danger float-right mt-3" type="button" data-toggle="collapse" data-target=".multi-collapse{{$task->id}}" aria-expanded="false" aria-controls="multiCollapseExample{{$task->id}} multiCollapseExample2{{$task->id}}">Details</button>
	
				@if ($task->status=='completed')
	<span style="color:green; font-size:20px">Completed!</span>
	@endif

	@if ($task->status!=='completed')
<button  onclick="changeStatusToCompleted('{{$task->id}}')" class="updateTaskStatusToCompleted btn btn-success float-right mt-3 mr-2" type="button">Announce completed</button>
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
	  							<div>
     								  

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
	    <p class="text-md-left ">{{$task->description}} </p>
			 @foreach ($task->comments as $comment)
	 <p class="text-danger text-md-left">- {{$comment->body}} <small class="text-md-left text-dark" style="padding-bottom: 0px;">written by {{$comment->user->name}} on {{$comment->created_at}}</small></p>
	 
	 @endforeach
	 @if($task->status !=='completed')
	 <button class="openInputCommentBox btn btn-sm btn-warning" style="width:120px; padding: 0px;">Enter comment</button>
	 @endif
	 <div style="text-align: left;" class="inputComment"><form class="submitComment" action="{{route ('submitcomment')}}" method="POST">
	 @csrf
	 <input type="hidden" name="task_id" value="{{$task->id}}" />
	 <input  type="text" name="comment"/></form><span class="badge badge-pill badge-primary ml-1 submitCommentForm"  title="Post a comment">Go</span>
	
      </div>
    </div>
  </div>

</div>
  
@include('includes.arrow')

  
 
</div>
</div>
</div>
@endif
@endforeach

@endforeach
