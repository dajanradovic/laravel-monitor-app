@if (Auth()->user()->department == 'Supervisor')
<div class="alert alert-secondary" role="alert">
  <h4 class="alert-heading">Hello supervisor!</h4>
  <p>As a supervisor, your goal is to check added problems and tasks, make comments or notification on them,
  and delegate them to specific technician on terrain! Most importantly, your goal is to add users and edit their details if needed.</p>
 </div>
 @endif

 @if (Auth()->user()->department == 'Phone-agent')
 <div class="alert alert-secondary" role="alert">
  <h4 class="alert-heading">Hello phone-agent!</h4>
  <p>As a phone-agent, your goal is to add user problems(tasks) with all the necessary data. Those problems will be taken care by the supervisor. </p>
 </div>
 @endif

 @if (Auth()->user()->department == 'Technician on terrain')
 <div class="alert alert-secondary" role="alert">
  <h4 class="alert-heading">Hello technician</h4>
  <p>As a technician, your goal is to solve problems(tasks) delegated to you by the supervisor. You can write your own observations on the problem and confirm once the problem gets solved </p>
 </div>
 @endif