@extends ('layouts.app')






@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <nav aria-label="breadcrumb " style="margin-left: -15px;">
        <ol class="breadcrumb bg-dark text-warning pull-left" style="margin-left: 0px;">
          <li class="breadcrumb-item active text-warning" aria-current="page">Dashboard</li>

          <li class="breadcrumb-item active text-warning" aria-current="page">Private Messages</li>
          <li class="breadcrumb-item text-warning " aria-current="page">Inbox</li>
        </ol>
      </nav>

    </div>
  </div>

  <div class="row">
    <div class="col-md-3 bg-dark" style="margin-top:15px;">
      <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <a class="nav-link text-white" id="v-pills-home-tab" href="{{url ('/tasks')}}" aria-selected="true">Home</a>
        <a class="nav-link text-white" id="v-pills-profile-tab" href="{{url ('/users/profile')}}" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
        @can('isSupervisor', Auth()->user())
        <a class="nav-link text-white" id="v-pills-messages-tab" href="{{route ('supervisor/addedtasks')}}" aria-selected="false">New tasks<span class="badge badge-pill badge-primary ml-1">{{auth()->user()->notifications->count()}}</span></a>
        <a class="nav-link text-white" id="v-pills-home-tab" href="{{url ('/register')}}" aria-selected="true">Add new user</a>
        @endcan
        @can('isPhoneAgent', Auth()->user())
        <a class="nav-link text-white" id="v-pills-home-tab" href="{{url ('/tasks/create')}}" aria-selected="true">Add new task</a>
        @endcan

        <a class="nav-link text-white" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
          Private messages
        </a>
        <div class="collapse-show border-0" id="collapseExample">
          <div class="card card-body border-0 pt-0 pr-0 bg-dark pb-0">
            <ul class="nav flex-column mt-0">
              <li class="nav-item">
                <a class="nav-link inboxoutbox text-white active" href="#">Inbox</a>
              </li>
              <li class="nav-item">
                <a class="nav-link inboxoutbox text-white" href="./outbox">Outbox</a>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <hr>


      <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <p style="color:white; width:100px;" class="bg-primary"><i>who is online:</i></p>
        @foreach ($users as $user)
        <a href="users/profile/{{$user->id}}" style="color:white;"><span class="dot mr-2"></span>{{$user->name}}</a>
        @endforeach
      </div>
    </div>
    <div class="col-md-1">
    </div>
    <div class="col-md-8 bg-dark mt-3">
      <div class="list-group bg-dark mt-2">
        @foreach($inboxmessages as $message)

        @if(sizeof($unreadPrivateMessages) > 0)
        @foreach($unreadPrivateMessages as $unreadPrivateMessage)

        @if ($unreadPrivateMessage->data['privateMessageId'] == $message->id)
        <a onclick="markInboxMessageAsRead('{{$unreadPrivateMessage->id}}','{{$message->id}}')" class="text-warning" style="border-bottom: 1px solid white; cursor:pointer;" id="subjecttitle">
          <span><b>{{$message->subject->name}}</b></span>
        </a>

        @else
        <a href="/users/profile/inbox/{{$message['id']}}" class="text-white" style="border-bottom: 1px solid white;" id="subjecttitle">
          <span>{{$message->subject->name}}</span>
        </a>



        @endif







        @endforeach
        @else
        <a href="/users/profile/inbox/{{$message['id']}}" class="text-white" style="border-bottom: 1px solid white;" id="subjecttitle">
          <span>{{$message->subject->name}}</span>
        </a>
        @endif

        @endforeach

        @empty($message)
        <span style="color:white;">Inbox empty</span>
        @endempty


      </div>
    </div>



  </div>


  @include('includes.chatinvitationscript')
  @endsection('content')