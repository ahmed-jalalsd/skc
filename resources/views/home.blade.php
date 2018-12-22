
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sudanese Kennel Club</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
<!--===============================================================================================-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.css" />
<!--===============================================================================================-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" />
<!--===============================================================================================-->
  <link href="{{ asset('css/util.css') }}" rel="stylesheet">
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">
<!--===============================================================================================-->
</head>
<body>

	<div class="bg-img1 size1 flex-w flex-c-m p-t-55 p-b-55 p-l-15 p-r-15" style="background-image: url('images/bg01.jpg'); ">
		<div class="wsize1 bor1 bg1 p-t-175 p-b-45 p-l-15 p-r-15 respon1 " style="padding-top:0;">
			<div class="wrappic1 logo">
        <!-- Sudanes Kennel Club -->
				<img src="{{asset('images/skc-logo.png')}}" alt="LOGO" style="width:140px;">
			</div>

			<p class="txt-center m1-txt1 p-t-33 p-b-68">
				Our website is under construction <br>
				Coming soon
			</p>

			<!-- <div class="wsize2 flex-w flex-c hsize1 cd100">
				<div class="flex-col-c-m size2 how-countdown">
					<span class="l1-txt1 p-b-9 days">15</span>
					<span class="s1-txt1">Days</span>
				</div>

				<div class="flex-col-c-m size2 how-countdown">
					<span class="l1-txt1 p-b-9 hours">17</span>
					<span class="s1-txt1">Hours</span>
				</div>

				<div class="flex-col-c-m size2 how-countdown">
					<span class="l1-txt1 p-b-9 minutes">50</span>
					<span class="s1-txt1">Minutes</span>
				</div>

				<div class="flex-col-c-m size2 how-countdown">
					<span class="l1-txt1 p-b-9 seconds">39</span>
					<span class="s1-txt1">Seconds</span>
				</div>
			</div> -->

			<!-- <form class="flex-w flex-c-m contact100-form validate-form p-t-55">
				<div class="wrap-input100 validate-input where1" data-validate = "Email is required: ex@abc.xyz">
					<input class="s1-txt2 placeholder0 input100" type="text" name="email" placeholder="Your Email">
					<span class="focus-input100"></span>
				</div>


				<button class="flex-c-m s1-txt3 size3 how-btn trans-04 where1">
					Get Notified
				</button>

			</form>

			<p class="s1-txt4 txt-center p-t-10">
				I promise to <span class="bor2">never</span> spam
			</p> -->

		</div>
	</div>





<!--===============================================================================================-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!--===============================================================================================-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" integrity="sha256-xJOZHfpxLR/uhh1BwYFS5fhmOAdIRQaiOul5F/b7v3s=" crossorigin="anonymous" />
<!--===============================================================================================-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.23/moment-timezone.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.23/moment-timezone-with-data.min.js"></script>
  <script src="{{ asset('js/countdowntime.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/countdown/2.6.0/countdown.js"></script>
	<script>
		$('.cd100').countdown100({
			/*Set Endtime here*/
			/*Endtime must be > current time*/
			endtimeYear: 0,
			endtimeMonth: 0,
			endtimeDate: 15,
			endtimeHours: 18,
			endtimeMinutes: 0,
			endtimeSeconds: 0,
			timeZone: ""
			// ex:  timeZone: "America/New_York"
			//go to " http://momentjs.com/timezone/ " to get timezone
		});
	</script>
<!--===============================================================================================-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tilt.js/1.2.1/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
  <script src="{{ asset('js/main.js') }}"></script>

</body>
</html>
