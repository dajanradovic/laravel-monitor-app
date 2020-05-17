@if($task->status == 'submitted')
<div class="card-footer text-muted">
  <div class="arrow-steps clearfix">
          <div class="step current"> <span>Problem submitted</span> </div>
			<div class="step"> <span style="margin: 0 auto;">Reviewed by supervisor</span> </div>
		     <div class="step"> <span>Being solved</span> </div>
          <div class="step"> <span>Completed</span> </div>
</div>
	<!--	<div class="nav clearfix">
        <a href="#" class="prev">Previous</a>
        <a href="#" class="next pull-right">Next</a>
		</div>-->

</div>

@endif

@if($task->status == 'reviewed by supervisor')
<div class="card-footer text-muted">
  <div class="arrow-steps clearfix">
          <div class="step current"> <span>Problem submitted</span> </div>
			<div class="step current"> <span style="margin: 0 auto;">Reviewed by supervisor</span> </div>
		     <div class="step"> <span>Being solved</span> </div>
          <div class="step"> <span>Completed</span> </div>
</div>
	<!--	<div class="nav clearfix">
        <a href="#" class="prev">Previous</a>
        <a href="#" class="next pull-right">Next</a>
		</div>-->

</div>

@endif

@if($task->status == 'being solved')
<div class="card-footer text-muted">
  <div class="arrow-steps clearfix">
          <div class="step current"> <span>Problem submitted</span> </div>
			<div class="step current"> <span style="margin: 0 auto;">Reviewed by supervisor</span> </div>
		     <div class="step current"> <span>Being solved</span> </div>
          <div class="step"> <span>Completed</span> </div>
</div>
	<!--	<div class="nav clearfix">
        <a href="#" class="prev">Previous</a>
        <a href="#" class="next pull-right">Next</a>
		</div>-->

</div>

@endif

@if($task->status == 'completed')
<div class="card-footer text-muted">
  <div class="arrow-steps clearfix">
          <div class="step current"> <span>Problem submitted</span> </div>
			<div class="step current"> <span style="margin: 0 auto;">Reviewed by supervisor</span> </div>
		     <div class="step current"> <span>Being solved</span> </div>
          <div class="step current"> <span>Completed</span> </div>
</div>
	<!--	<div class="nav clearfix">
        <a href="#" class="prev">Previous</a>
        <a href="#" class="next pull-right">Next</a>
		</div>-->

</div>

@endif