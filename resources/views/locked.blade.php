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

// Set the date we're counting down to
var countDownDate = new Date("Feb 7, 2023 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="timer"
  document.getElementById("days").innerHTML = days + "d ";
  document.getElementById("hours").innerHTML = hours + "h ";
  document.getElementById("minutes").innerHTML = minutes + "m ";
  document.getElementById("seconds").innerHTML = seconds + "s ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("timer").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
@endsection