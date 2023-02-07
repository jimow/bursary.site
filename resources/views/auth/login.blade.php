@extends('layouts.app')

@section('style')
<style>
body {
background-image: linear-gradient(rgba(0, 0, 255, 0.5), rgba(255, 255, 0, 0.5)),
                  src="{{url('bg.jpg')}}";
}
</style>
<img src='bg.jpg' />
@endsection
@section('content')

   
	
    <div class="card">
        <div class="card-body">
		<div class="row" >
		 <div class="col-md-4 bg-secondary bg-gradient" style="border-radius: 10px; margin-right: 10px">
            <p >
                {{ trans('global.login') }}
            </p>

            @if(session()->has('message'))
                <p class="alert alert-info">
                    {{ session()->get('message') }}
                </p>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf

                <div class="form-group">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}" name="email" value="{{ old('email', null) }}">

                    @if($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="{{ trans('global.login_password') }}">

                    @if($errors->has('password'))
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                </div>


                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" name="remember" id="remember">
                            <label for="remember">{{ trans('global.remember_me') }}</label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">
                            {{ trans('global.login') }}
                        </button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>


            @if(Route::has('password.request'))
                <p class="mb-1">
                    <a href="{{ route('password.request') }}">
                        {{ trans('global.forgot_password') }}
                    </a>
                </p>
            @endif
            <p class="mb-1">
                <a class="text-center" href="{{ route('register') }}">
                    {{ trans('global.register') }}
                </a>
            </p>
			</div> <!-- End Of Colums 1 -->
           
			<div class="col-md-7" style="height: 500px" >
                <div class="vr"></div>
			<h4><b>Welcome to Mandera County Bursary Management System</b></h4>
            <p>For you to successfully apply for bursary, you must follow the instructions given below</p>
           <ol>
            <li>You are only allowed to apply bursary to only one and only one ward. The system does not allow that</li>
            <li>You can only have one user account per applicant. Trying to have fake accounts will lead to automatic disqualifications</li>
            <li>Provide all the required documents. The system will not accept application without required documents.</li>
            <li>If you encounter an error during the application process, make sure you have filled all the required fields</li>
            <li>Once you apply, you can't reapply. Take your time during the application process</li>
            <li>Make sure the provided information is correct and accurate</li>
           </ol>
            </p>
            <hr color="gray" width="80%">
            <h4><b>Required Documents for Application</b></h4>
            <ul>
                <li>Admission Letter</li>
                <li>Father's Identity Card / Death Certificate in Case father is dead</li>
                <li>Mother's Identity Card</li>
                <li>Fees Structure - Important for bursary consideration</li>
                
            </ul>
          	</div>
		</div> <!-- End Div Row -->
       
        </div>
        <!-- /.login-card-body -->
    </div>

@endsection


