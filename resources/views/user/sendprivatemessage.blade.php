@extends ('layouts.app')



@section('content')

<div class="container">	
<div class="row">
<div class="col-md-12">
<nav aria-label="breadcrumb " style="margin-left: -15px;" >
  <ol class="breadcrumb bg-dark text-warning pull-left" style="margin-left: 0px;">
    <li class="breadcrumb-item active text-warning" aria-current="page">Users List</li>
	 <li class="breadcrumb-item text-warning " aria-current="page">Perosonal Profile</li>
   	 <li class="breadcrumb-item text-warning " aria-current="page">Send private message</li>

  </ol>
</nav>

</div>
</div>

<div class="row">
  <div class="col-md-3 bg-dark" style="margin-top:15px;">
   <p class="text-white mt-1 mb-1 font-weight-bold">Hello,</p>
   <p class="text-white font-weight-bold"> you are viewing {{$profileuser->name}} {{$profileuser->surname}}'s profile</p>
  <button type="button" class="btn btn-success btn-md btn-block active">Send private message</button>
  
  <button type="button" class="btn btn-success btn-md mt-1 btn-block">Open chat dialog</button>
  <button type="button" class="btn btn-warning btn-md mt-1 btn-block">Edit profile</button>
  <hr>

  
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
     <p style="color:white; width:100px;" class="bg-primary"><i>who is online:</i></p>
	 @foreach ($users as $user)
	 <p style="color:white;" ><span class="dot mr-2"></span>{{$user->name}}</p>
	 @endforeach
    </div>
  </div>
  <div class="col-md-1">
  </div>
  <div class="col-md-8 bg-dark" style="margin-top:15px;">
   

 <p class="text-center text-white" style="font-size:26px;">Send private message</p>
 <form method="POST" action="/users/profile/privatemessage">
 @csrf
    <input type="hidden" name="recipientId" value="{{$profileuser->id}}">
  <div class="form-group">
    <label class="text-white" for="subject">Subject</label>
    <input type="text" class="form-control" name="subject" value="{{ old('subject') }}" id="subject" placeholder="Subject">
        <div class="error" style="color:red;"> {{$errors->first('subject')}}</div>

                               
  </div>
  <div class="form-group">
    <label class="text-white" for="text">Enter message</label>
    <textarea type="text" class="form-control" id="text" name="message" rows="6" placeholder="Enter message">{{ old('message') }}</textarea>
          <div class="error" > {{$errors->first('message')}}</div>

                                
  </div>
  <button type="submit" class="btn btn-warning btn-lg btn-block mb-2">Submit</button>
</form>
   @if(session()->has('message'))
  <div class="alert alert-success" role="alert">
  {{session()->get('message')}}
  </div>
  @endif

</div>


</div>










@include('includes.chatinvitationscript')
@endsection('content')




