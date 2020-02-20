@extends ('layouts.app')

@section('content')


<div class="container">	
<div class="row">
<div class="col-md-12">
<nav aria-label="breadcrumb " style="margin-left: -15px;" >
  <ol class="breadcrumb bg-dark text-warning pull-left" style="margin-left: 0px;">
    <li class="breadcrumb-item active text-warning" aria-current="page">Users List</li>
	 
  </ol>
</nav>

</div>
</div>
<div class="row">

<div class="col-md-8 offset-md-4">
<p class="text-center" style="font-size:26px;">Complete list of all users</p>
</div>
</div>

<div class="row">
  <div class="col-md-3 bg-dark" style="margin-top:15px;">
  

  
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
     <p style="color:white; width:100px;" class="bg-primary mt-3"><i>who is online:</i></p>
	 @foreach ($onlineusers as $onlineuser)
	 <p style="color:white;" ><span class="dot mr-2"></span>{{$onlineuser->name}}</p>
	 @endforeach
    </div>
  </div>
  <div class="col-md-1">
  </div>
  
  <div class="col-md-8 ">
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Surname</th>
      <th scope="col">Department</th>
    </tr>
  </thead>
   <tbody>
    @foreach($users as $user)
   <tr data-id="{{$user->id}}"class="userrow"> 
      <th scope="row">{{$user->id}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->surname}}</td>
      <td>{{$user->department}}</td></a>
    </tr>
    @endforeach

   
  </tbody>
</table>
 
   
</div>


</div>







@endsection('content')