@extends('Admin.SinglePage')

@section('title', 'Veryfy Account')


@section('content')

	{!! Form::open(['url' => '/verifyuser']) !!}

		<div class="panel login-form">
		<h2 style="text-align: center;color: cadetblue;">Verify Your Account</h2>
			<div class="thumb thumb-rounded">
				<img src="{{asset('assets/images/lock.png')}}" alt="">
				
			</div>

			<div class="panel-body">


			<div class="alert alert-info alert-styled-left alert-bordered">
				
				Enter the verification key, which you received in your email address, to <span class="text-semibold">verify your account</span>.  
		    </div>

		    @include('layouts.include.sessionmessage')

		    @include('layouts.include.errors')

	


			<div class="form-group has-feedback">
				<input name="key" type="text" class="form-control" placeholder="Key">
				<div class="form-control-feedback">
					<i class="icon-key text-muted"></i>
				</div>
			</div>

			<div class="form-group login-options">
				<div class="row">
					

					<div class="col-sm-12 text-right">
						<a data-toggle="modal" data-target="#modal_theme_info">Request a new code</a>
					</div>
				</div>
			</div>

			<button type="submit" class="btn btn-primary btn-block"> <i class="icon-unlocked2"> </i> Verify</button>
			</div>
		</div>

	{!! Form::close() !!}
	




<div id="modal_theme_info" class="modal fade" style="display: none;" data-backdrop="false">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-success">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h6 class="modal-title">Verification code</h6>
			</div>

			<div class="modal-body">
				<h6 class="text-semibold">Request a new verification code</h6>
				<p>If you already registered, you can request a new verification key, to verify your account.</p>

				<hr>

				{!! Form::open(['url' => '/newverification' ]) !!}
					

					<div class="input-group">
						<input name="email" type="email" class="form-control" placeholder="Your Registred Email Address" required>
						<span class="input-group-btn">
							<button class="btn bg-teal" type="submit">Request New Code</button>
						</span>
					</div>

				{!! Form::close() !!}

				
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-denger" data-dismiss="modal">Close</button>
				<!-- <button type="button" class="btn btn-info">Save changes</button> -->
			</div>
		</div>
	</div>
</div>



@endsection