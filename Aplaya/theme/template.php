<?php
if (isset($_POST['avail'])) {
	$_SESSION['from'] = $_POST['from'];
	$_SESSION['to']  = $_POST['to'];

	redirect(WEB_ROOT . "index.php?page=5");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>JPAMS <?php echo $title; ?></title>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wdth,wght@0,75..100,300..800;1,75..100,300..800&display=swap" rel="stylesheet">

	<!-- Icon Font Stylesheet -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
	<link rel="stylesheet" href="/path/to/facebox.css">



	<!-- Bootstrap core CSS -->

	<!-- Update the path to the correct location -->
	<link href="/jpams_resort_management_system/css/style.css" rel="stylesheet">

	<!-- Customized Bootstrap Stylesheet -->
	<link href="/jpams_resort_management_system/css/bootstrap.min.css" rel="stylesheet">
	<!-- Template Stylesheet -->
	<link href="../css/style.css" rel="stylesheet"

		<link href="/jpams_resort_management_system/css/style.css" rel="stylesheet">
	<!-- Include jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- Include Facebox -->
	<script src="/path/to/facebox.js"></script>
	<link rel="stylesheet" href="/path/to/facebox.css">
	<!-- Include WOW.js -->

	<script type="text/javascript" language="javascript" src="<?php echo WEB_ROOT; ?>js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="<?php echo WEB_ROOT; ?>js/jquery.dataTables.js"></script>
	<script type="text/javascript" language="javascript" src="<?php echo WEB_ROOT; ?>js/bootstrap.min.js"></script>
	<script type="text/javascript" language="javascript" src="<?php echo WEB_ROOT; ?>js/bootstrap-modal.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.toggle-modal').click(function() {
				$('#logout').modal('toggle');
			});
		});
	</script>

	<!-- Custom styles for this template -->

	<link href="<?php echo WEB_ROOT; ?>css/offcanvas.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo WEB_ROOT; ?>css/prettyPhoto/css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
	<link href="css/facebox/facebox.css" media="screen" rel="stylesheet" type="text/css" />

	<style type="text/css">
		.panel-inverse {
			border-color: #000;
		}

		.panel-inverse>.panel-heading {
			color: #ffffff;
			background-color: #000;
			border-color: #000;
		}

		.panel-inverse>.panel-heading+.panel-collapse .panel-body {
			border-top-color: #000;
		}

		.panel-inverse>.panel-footer+.panel-collapse .panel-body {
			border-bottom-color: #000;
		}

		.btn-inverse {
			color: #ffffff;
			background-color: #080808;
			border-color: #222222;
		}

		.btn-inverse:hover,
		.btn-inverse:focus,
		.btn-inverse:active,
		.btn-inverse.active,
		.open .dropdown-toggle.btn-inverse {
			color: #ffffff;
			background-color: #222222;
			border-color: #080808;
		}

		.btn-inverse:active,
		.btn-inverse.active,
		.open .dropdown-toggle.btn-inverse {
			background-image: none;
		}

		.btn-inverse.disabled,
		.btn-inverse[disabled],
		fieldset[disabled] .btn-inverse,
		.btn-inverse.disabled:hover,
		.btn-inverse[disabled]:hover,
		fieldset[disabled] .btn-inverse:hover,
		.btn-inverse.disabled:focus,
		.btn-inverse[disabled]:focus,
		fieldset[disabled] .btn-inverse:focus,
		.btn-inverse.disabled:active,
		.btn-inverse[disabled]:active,
		fieldset[disabled] .btn-inverse:active,
		.btn-inverse.disabled.active,
		.btn-inverse[disabled].active,
		fieldset[disabled] .btn-inverse.active {
			background-color: #080808;
			border-color: #222222;
		}
	</style>
</head>

<body>
	<!--Header-->
	<!-- Spinner Start -->
	<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
		<div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
			<span class="sr-only">Loading...</span>
		</div>
	</div>
	<!-- Spinner End -->

	<!-- Navbar & Hero Start -->
	<div class="container-fluid nav-bar sticky-top px-4 py-2 py-lg-0">
		<nav class="navbar navbar-expand-lg navbar-light">
			<!-- Brand Logo -->
			<a href="<?php echo WEB_ROOT; ?>index.php" class="navbar-brand">
				<img src="/jpams_resort_management_system/img/JPAMS LOGO.png" alt="Logo" loading="lazy" style="max-height: 80px; width: auto;">
			</a>
			<!-- Toggler Button -->
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
				<span class="fa fa-bars"></span>
			</button>
			<!-- Navbar Links -->
			<div class="collapse navbar-collapse" id="navbarCollapse">
				<ul class="navbar-nav mx-auto py-0">
					<li class="nav-item">
						<a href="<?php echo WEB_ROOT; ?>index.php" class="nav-link active">Home</a>
					</li>
					<li class="nav-item">
						<a href="../userpages/contact.php" class="nav-link">Contact</a>
					</li>
					<li class="nav-item">
						<a href="../userpages/package.php" class="nav-link">Services</a>
					</li>
					<li class="nav-item">
						<a href="../userpages/about.php" class="nav-link">About</a>
					</li>
				</ul>
				<!-- Social Icons -->
				<div class="team-icon d-none d-xl-flex justify-content-center me-3">
					<a class="btn btn-square btn-light rounded-circle mx-1" href="https://www.facebook.com/profile.php?id=100081561532377" target="_blank" rel="noopener noreferrer">
						<i class="fab fa-facebook-f"></i>
					</a>
					<!-- Add more social icons if needed -->
				</div>
				<!-- User Dropdown -->
				<div class="nav-item dropdown">
					<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
						<img class="me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
						<span class="d-none d-lg-inline-flex"></span>
					</a>
					<div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
						<a href="../userpages/profile.php" class="dropdown-item">My Profile</a>
						<a href="../views/logout.php" class="dropdown-item">Log Out</a>
					</div>
				</div>
			</div>
		</nav>
	</div>
	<!-- Navbar & Hero End -->


	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- <div class="well"> -->
				<div class="container-fluid bg-breadcrumb">
					<div class="container text-center py-5" style="max-width: 900px;">
						<ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
						</ol>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!--End of Header-->
	<div class="container">
		<?php check_message(); ?>
		<?php require_once $content; ?>
		<!--/row-->

		<hr>
		<footer>
			<p>&copy; Some footer here </p>
			<!--      <script type="text/javascript" src="<?php echo WEB_ROOT; ?>jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
         <script type="text/javascript" src="<?php echo WEB_ROOT; ?>js/tooltip.js"></script>
		 <script type="text/javascript" src="<?php echo WEB_ROOT; ?>assets/js/jquery.js"></script>
	     <script type="text/javascript" src="<?php echo WEB_ROOT; ?>js/bootstrap.min.js"></script>
		 <script type="text/javascript" src="<?php echo WEB_ROOT; ?>js/popover.js"></script>-->
			<script type="text/javascript" src="<?php echo WEB_ROOT; ?>js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
			<script type="text/javascript" src="<?php echo WEB_ROOT; ?>js/locales/bootstrap-datetimepicker.uk.js" charset="UTF-8"></script>
			<!--	<script type="text/javascript" src="<?php echo WEB_ROOT; ?>js/prettyPhoto/prettyPhoto.js"  charset="utf-8"></script>
		<script type="text/javascript" src="<?php echo WEB_ROOT; ?>js/facebox/facebox.js" ></script>-->

			<script type="text/javascript">
				// The facebox Jquery
				$(document).ready(function($) {
					$('a[rel*=facebox]').facebox({
						loadingImage: 'images/facebox/loading.gif',
						closeImage: 'images/facebox/closelabel.png'
					})
				});

				//The slideshow Jquery
				$(document).ready(function() {
					$('#slideshowHolder').jqFancyTransitions({
						width: 477,
						height: 215
					});
				});

				//The light box Jquery
				$(document).ready(function() {
					$("area[rel^='prettyPhoto']").prettyPhoto();

					$(".lightbox:first a[rel^='prettyPhoto']").prettyPhoto({
						animation_speed: 'normal',
						theme: 'light_square',
						slideshow: 3000,
						autoplay_slideshow: true
					});
					$(".lightbox:gt(0) a[rel^='prettyPhoto']").prettyPhoto({
						animation_speed: 'fast',
						slideshow: 10000,
						hideflash: true
					});
				});
			</script>
			<script type="text/javascript">
				$('.from').datetimepicker({
					language: 'en',
					weekStart: 1,
					todayBtn: 1,
					autoclose: 1,
					todayHighlight: 1,
					startView: 2,
					minView: 2,
					forceParse: 0
				});
				$('.to').datetimepicker({
					language: 'en',
					weekStart: 1,
					todayBtn: 1,
					autoclose: 1,
					todayHighlight: 1,
					startView: 2,
					minView: 2,
					forceParse: 0
				});
				$(function() {
					var dates = $("#from, #to").datepicker({
						defaultDate: '',
						changeMonth: true,
						numberOfMonths: 1,
						onSelect: function(selectedDate) {
							var now = Date();
							var option = this.id == "from" ? "minDate" : "maxDate",
								instance = $(this).data("datepicker"),
								date = $.datepicker.parseDate(
									instance.settings.dateFormat ||
									$.datepicker._defaults.dateFormat,
									selectedDate, instance.settings);
							dates.not(this).datepicker("option", option, date);
						}
					});
				});
			</script>

			<script type="text/javascript">
				//in this line of code, to display the datetimepicker,  we used ‘form_datetime’ as an argument to be 
				//passed in javascript. This is for Date and Time.

				//this is for Date only	
				$('.form_date').datetimepicker({
					language: 'en',
					weekStart: 1,
					todayBtn: 1,
					autoclose: 1,
					todayHighlight: 1,
					startView: 2,
					minView: 2,
					forceParse: 0
				});
			</script>
			<script>
				function checkall(selector) {
					if (document.getElementById('chkall').checked == true) {
						var chkelement = document.getElementsByName(selector);
						for (var i = 0; i < chkelement.length; i++) {
							chkelement.item(i).checked = true;
						}
					} else {
						var chkelement = document.getElementsByName(selector);
						for (var i = 0; i < chkelement.length; i++) {
							chkelement.item(i).checked = false;
						}
					}
				}

				function checkNumber(textBox) {
					while (textBox.value.length > 0 && isNaN(textBox.value)) {
						textBox.value = textBox.value.substring(0, textBox.value.length - 1)
					}
					textBox.value = trim(textBox.value);
				}
				//
				function checkText(textBox) {
					var alphaExp = /^[a-zA-Z]+$/;
					while (textBox.value.length > 0 && !textBox.value.match(alphaExp)) {
						textBox.value = textBox.value.substring(0, textBox.value.length - 1)
					}
					textBox.value = trim(textBox.value);
				}

				function validateBook() {
					var j = document.forms["book"]["adults"].value;
					if (j == null || j == "") {
						alert("select from adults");
						return false;
					}
					var k = document.forms["book"]["child"].value;
					if (k == null || k == "") {
						alert("select from kids ");
						return false;
					}
				}

				function dateDiff($start, $end) {

					$start_ts = strtotime($start);

					$end_ts = strtotime($end);

					$diff = $end_ts - $start_ts;

					return round($diff / 86400);

				}
			</script>
			<script language="javascript" type="text/javascript">
				/* Visit http://www.yaldex.com/ for full source code
		and get more free JavaScript, CSS and DHTML scripts! */
				<!-- Begin
				var timerID = null;
				var timerRunning = false;

				function stopclock() {
					if (timerRunning)
						clearTimeout(timerID);
					timerRunning = false;
				}

				function showtime() {
					var now = new Date();
					var hours = now.getHours();
					var minutes = now.getMinutes();
					var seconds = now.getSeconds()
					var timeValue = "" + ((hours > 12) ? hours - 12 : hours)
					if (timeValue == "0") timeValue = 12;
					timeValue += ((minutes < 10) ? ":0" : ":") + minutes
					timeValue += ((seconds < 10) ? ":0" : ":") + seconds
					timeValue += (hours >= 12) ? " P.M." : " A.M."
					document.clock.face.value = timeValue;
					timerID = setTimeout("showtime()", 1000);
					timerRunning = true;
				}

				function startclock() {
					stopclock();
					showtime();
				}

				window.onload = startclock;
				// End -->
				//Validates Personal Info
				function personalInfo() {
					var y = document.forms["personal"]["name"].value;
					var a = document.forms["personal"]["last"].value;
					var b = document.forms["personal"]["address"].value;
					var c = document.forms["personal"]["city"].value;
					var d = document.forms["personal"]["zip"].value;
					var e = document.forms["personal"]["country"].value;
					var f = document.forms["personal"]["email"].value;
					var g = document.forms["personal"]["cemail"].value;
					var x = document.forms["personal"]["phone"].value;
					var i = document.forms["personal"]["password"].value;
					var atpos = f.indexOf("@");
					var dotpos = f.lastIndexOf(".");
					if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= f.length) {
						alert("Not a valid e-mail address");
						return false;
					}
					if (f != g) {
						alert("email does not match");
						return false;
					}
					if ((a == "Lastname" || a == "") || (b == "Address" || b == "") || (c == "City" || c == "") || (d == "ZIP Code" || d == "") || (e == "Country" || e == "") || (f == "Email" || f == "") || (g == "Confirm Email" || g == "") || (x == "Contact Number" || x == "") || (y == "Firstname" || y == "") || (i == "Password" || i == "")) {
						alert("all field are required!");
						return false;
					}

					if (document.personal.condition.checked == false) {
						alert('pls. agree the term and condition of this hotel');
						return false;
					} else {
						return true;
					}
				}
			</SCRIPT>
			<script type="text/javascript" language="javascript" src="<?php echo WEB_ROOT; ?>../js/main.js"></script>

			<script src="../js/main.js"></script>
			<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
			<script>
				new WOW().init();
			</script>

		</footer>
	</div>
	<!--/.container-->
</body>

</html>