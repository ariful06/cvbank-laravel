@if(Session::has('message-success'))
	<div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered">
		<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
		<span class="text-semibold">{{Session::get('message-success')}}</span>
	</div>
@endif 

@if(Session::has('message-error'))

	<div class="alert alert-danger alert-styled-left alert-bordered">
		<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
		<span class="text-semibold">{{Session::get('message-error')}}</span>
	</div>

@endif 