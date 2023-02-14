@extends('layouts.app')
@section('content')
    <div class="container h-100">
        <div class="row h-100 align-items-center">

            <div class="col-md-5">
                
                <div class="form-container text-center">
                    <div class="text-right mt-4">
                        Don't have an account? <a href="{{ route('register') }}"><b>Register Here</b></a>
                    </div> 
                    <img src="{{ asset('favicon.jpg') }}" alt="Logo" style="width: 200px;"><br />
                    @if(session()->has('message'))
                    <p class="alert alert-info">
                        {{ session()->get('message') }}
                    </p>
                @endif
                    <h2 class="mb-4">Sign In</h2>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary btn-block">
                                Sign In
                            </button>
                        </div>
                    </form>
                    <div class="text-center mt-4">
                        <a href="{{ route('password.request') }}">Forgot Password?</a>
                    </div>
                    <div class="text-right mt-4">
                        Don't have an account? <a href="{{ route('register') }}"><b>Register Here</b></a>
                    </div> 
                </div>
            </div>
            <div class="col-md-7">
                <div class="sidebar" style="font-size: 16px">
                    
            <h4> <b>Welcome to Mandera County Wards & NG-CDF Bursary Management System</b></h4>
               To successfully apply for a bursary, you must follow the instructions below.<br />
              1. You can only submit a bursary application to one constituency and one ward. The system does not allow multiple applications. <br />
              2. You can only have one user account per applicant. Trying to have multiple accounts will lead to automatic disqualifications.<br />
              3. Provide all the required documents. The system will only accept applications with the required documents.<br />
              4. If you encounter an error during the application process, ensure you have filled in all the required fields.<br />
              5. Once you submit your application, you will not be able to reapply, so take your time during the application process.<br />
              6. Ensure that all the information you provide is correct and accurate.
              
                  

              <h4><b>Required Documents for Application</b></h4>
            <ul>
                <li>Admission Letter</li>
                <li>Father's Identity Card / Death Certificate in Case father is dead</li>
                <li>Mother's Identity Card</li>
                <li>Fees Structure - Important for bursary consideration</li>
                <li>Applicant's Identity Card  - For College & University Students</li>
                
            </ul>
				</div>
            </div>
        </div>
    </div>
    @endsection



