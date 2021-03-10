<!DOCTYPE html>
<html>
<head>
  <title>ESSEX Under Maintenance</title>
</head>
<body>
  <br>

  <div class="row">
    <div class="col-md-12" style="text-align: center;">
        <img src="{{ asset('storage/web-maintenance-infograhics.gif') }}" style="width: 25%;">
        <span style="font-size: 30pt; display: block;">SYSTEM UNDER MAINTENANCE</span>
        <br>
        <span style="font-size: 15pt; display: block;">Estimated Resume Time: </span>
        <span id="remaining" style="font-size: 25pt; display: block; padding: 1%;"></span>

        <img src="{{ asset('storage/img/logo5.png') }}"><br>
        <img src="{{ asset('storage/companyLogo.png')}}" width="200">

    </div>
</div>
<style type="text/css">
  *{
    font-family: "Century Gothic";
  }
</style>
<script>
// Set the date we're counting down to
var countDownDate = new Date("Aug 28, 2019 13:40:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  // var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="remaining"
  document.getElementById("remaining").innerHTML = hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("remaining").innerHTML = "EXPIRED";
  }
}, 1000);
</script>

</body>
</html>