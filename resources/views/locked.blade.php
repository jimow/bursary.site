@extends('layouts.admin')
@section('content')
<style>
#timer {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 200px;
}

#timer div {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 50px;
  width: 50px;
  border-radius: 25px;
  margin: 10px;
  font-size: 20px;
  font-weight: bold;
}

    </style>
<h3>System is Locked.</h3>
   <p>Application has not been Openned. Please contact the system Administrator.</p>
   <div class="container">
    <div class="row">
      <div class="col-sm-6 offset-sm-3">
        <div class="card text-center">
          <div class="card-header">
            Countdown Timer
          </div>
          <div class="card-body">
            <div id="timer">
              <div id="days" class="timer-element">
                <div class="timer-value">0</div>
                <div class="timer-label">Days</div>
              </div>
              <div id="hours" class="timer-element">
                <div class="timer-value">0</div>
                <div class="timer-label">Hours</div>
              </div>
              <div id="minutes" class="timer-element">
                <div class="timer-value">0</div>
                <div class="timer-label">Minutes</div>
              </div>
              <div id="seconds" class="timer-element">
                <div class="timer-value">0</div>
                <div class="timer-label">Seconds</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  


@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>

@section('scripts')
<script>



</script>
@endsection