@if (count($errors) > 0)
<div class="alert alert-danger alert-styled-left alert-bordered">
		<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
        @foreach ($errors->all() as $error)
            <span class="text-semibold"><i class="icon-arrow-right15"></i></span> {{$error}} <br>
        @endforeach
</div>
@endif