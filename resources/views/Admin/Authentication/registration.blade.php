@extends('Admin.SinglePage')

@section('title', 'Registration')


@section('content')

<!-- Registration form -->



{!! Form::open(['url' => '/register' ]) !!}

	<div class="row">
		<div class="col-lg-6 col-lg-offset-3">
			<div class="panel registration-form">
				<div class="panel-body">
					
					<div class="text-center">
						<div class="icon-object border-success text-success"><i class="icon-plus3"></i></div>
						<h5 class="content-group-lg">Create account <small class="display-block">All fields are required</small></h5>
					</div>
					
					@include('layouts.include.errors')


					<div class="form-group {{ $errors->has('username') ? ' has-error' : '' }} has-feedback">

						{!! Form::text('username', null, 
				        	array('required', 'autofocus',
				              'class'=>'form-control', 
				              'placeholder'=>'Your User name' )) !!}

						<div class="form-control-feedback">
							<i class="icon-user-plus text-muted"></i>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">

						<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }} has-feedback">

							<div class="form-group has-feedback">
								<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required placeholder="Your Name">

								<div class="form-control-feedback">
									<i class="icon-user-check text-muted"></i>
								</div>
							</div>
						</div>
					</div>

						<div class="col-md-6">
							<div class="form-group {{ $errors->has('password') ? ' has-error' : '' }} has-feedback">

								<input id="password" type="password" class="form-control" name="password" required placeholder="Password">
								<div class="form-control-feedback">
									<i class="icon-user-lock text-muted"></i>
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group has-feedback">
								

								<input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="password confirm" required>



								<div class="form-control-feedback">
									<i class="icon-user-lock text-muted"></i>
								</div>
							</div>
						</div>


					<div class="col-md-12">
						<div class="form-group has-feedback">
							
							<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Email address">


							<div class="form-control-feedback">
								<i class="icon-mention text-muted"></i>
							</div>
						</div>
					</div>

						
				

					
					<div class="col-md-12">		
						<div class="text-right">
							<button class="btn btn-link"><i class="icon-arrow-left13 position-left"></i> Back to login form</button>

							<button type="submit" class="btn bg-teal-400 btn-labeled btn-labeled-right ml-10"><b><i class="icon-plus3"></i></b> Create account</button>

						</div>
					</div>

				</div>
			</div>
		</div>
	</div>



{!! Form::close() !!}




<!-- /registration form -->

@endsection
