<?php
if (isset($_POST['submit'])) {
	$arival   = $_SESSION['from'];
	$departure = $_SESSION['to'];
	/*$adults = $_SESSION['adults'];
  $child = $_SESSION['child'];*/
	$adults = 1;
	$child = 1;
	$roomid = $_SESSION['roomid'];

	$_SESSION['name']   = $_POST['name'];
	$_SESSION['last']   = $_POST['last'];
	$_SESSION['country']   = $_POST['country'];
	$_SESSION['city']    = $_POST['city'];
	$_SESSION['address'] = $_POST['address'];
	$_SESSION['zip']   = $_POST['zip'];
	$_SESSION['phone']   = $_POST['phone'];
	$_SESSION['email'] = $_POST['email'];
	$_SESSION['pass']  = $_POST['pass'];
	$_SESSION['pending']  = 'pending';

	$name   = $_SESSION['name'];
	$last   = $_SESSION['last'];
	$country = $_SESSION['country'];
	$city   = $_SESSION['city'];
	$address = $_SESSION['address'];
	$zip    =  $_SESSION['zip'];
	$phone  = $_SESSION['phone'];
	$email  = $_SESSION['email'];
	$password = $_SESSION['pass'];


	$days = dateDiff($arival, $departure);


	redirect('index.php?view=payment');
}
?>

<div class="container">
	<?php include '../sidebar.php'; ?>

	<div class="col-xs-12 col-sm-9">
		<!--<div class="jumbotron">-->
		<div class="">
			<!--    <div class="panel panel-default">
            <div class="panel-body">   -->

			<?php //include'navigator.php';
			?>


			<td valign="top" class="body" style="padding-bottom:10px;">
				<?php
				if (isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) > 0) {
					echo '<ul class="err">';
					foreach ($_SESSION['ERRMSG_ARR'] as $msg) {
						echo '<li>', $msg, '</li>';
					}
					echo '</ul>';
					unset($_SESSION['ERRMSG_ARR']);
				}
				?>

				<form class="form-horizontal span6" action="index.php?view=info" method="post" name="personal" onsubmit="return personalInfo()" style="margin-left:20px">
					<fieldset>
						<legend>
							<h2>Personal Details</h2>
						</legend>
						<div class="form-group">
							<div class="col-md-8">
								<label class="col-md-4 control-label" for="name">Firstname:</label>
								<div class="col-md-8">
									<input name="name" type="text" class="form-control input-sm" id="name" placeholder="Enter your first name" />
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-8">
								<label class="col-md-4 control-label" for="last">Lastname:</label>
								<div class="col-md-8">
									<input name="last" type="text" class="form-control input-sm" id="last" placeholder="Enter your last name" />
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-8">
								<label class="col-md-4 control-label" for="city">City:</label>
								<div class="col-md-8">
									<input name="city" type="text" class="form-control input-sm" id="city" placeholder="Enter your city" />
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-8">
								<label class="col-md-4 control-label" for="address">Address:</label>
								<div class="col-md-8">
									<input name="address" type="text" class="form-control input-sm" id="address" placeholder="Enter your address" />
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-8">
								<label class="col-md-4 control-label" for="zip">Zip Code:</label>
								<div class="col-md-8">
									<input name="zip" type="text" class="form-control input-sm" id="zip" placeholder="Enter your zip code" />
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-8">
								<label class="col-md-4 control-label" for="phone">Phone:</label>
								<div class="col-md-8">
									<input name="phone" type="tel" class="form-control input-sm" id="phone" maxlength="11"
										pattern="\d{10}" title="Please enter a valid 10-digit phone number"
										placeholder="Enter your phone number" />
								</div>
							</div>
						</div>
						<!-- JavaScript to detect the max length and show an alert -->
						<script>
							document.getElementById('phone').addEventListener('input', function(e) {
								const maxLength = 11;
								if (this.value.length === maxLength) {
									alert('You have reached the maximum allowed digits.');
								}
							});
						</script>
						<div class="form-group">
							<div class="col-md-8">
								<label class="col-md-4 control-label" for="email">Email Address:</label>
								<div class="col-md-8">
									<input name="email" type="email" class="form-control input-sm" id="email"
										placeholder="Enter your email address" />
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-8">
								<label class="col-md-4 control-label" for="cemail">Confirm Email Address:</label>
								<div class="col-md-8">
									<input name="cemail" type="email" class="form-control input-sm" id="cemail"
										placeholder="Confirm your email address" />
								</div>
							</div>
						</div>
					</fieldset>
					&nbsp; &nbsp;
					<div class="form-group">
						<div class="col-md-6">
							<p>
								<input type="checkbox" name="condition" value="checkbox" />
								<small>I Agree with the <a class="toggle-modal" href="#logout"><b>TERMS AND CONDITION</b></a> of this Resort</small>
								<br />
								<img src="captcha_code_file.php?rand=<?php echo rand(); ?>" id='captchaimg'><a href='javascript: refreshCaptcha();'><img src="<?php echo WEB_ROOT; ?>images/refresh.png" alt="refresh" border="0" style="margin-top:5px; margin-left:5px;" /></a>
								<br /><small>If you are a Human Enter the code above here :</small><input id="6_letters_code" name="6_letters_code" type="text" class="form-control input-sm" width="20">
							</p><br />
							<div class="col-md-4">
								<input name="submit" type="submit" value="Confirm" class="btn btn-inverse" onclick="return personalInfo();" />
							</div>
						</div>
					</div>
				</form>
		</div>
		<!--  </div>          
        </div> -->
		<!--  </div>-->
	</div>
	<style>
		.form-group {
			position: relative;
			margin-bottom: 1.5rem;
		}

		.form-control {
			padding: 0.75rem 0.75rem;
		}

		.form-label {
			position: absolute;
			top: 10px;
			left: 15px;
			transition: 0.2s ease all;
			color: #999;
			pointer-events: none;
			/* Prevent interaction with the label */
		}

		.form-control:focus+.form-label,
		.form-control:not(:placeholder-shown)+.form-label {
			top: -10px;
			left: 15px;
			font-size: 12px;
			color: #007bff;
			/* Change to the desired color */
			opacity: 1;
			/* Ensure it's visible */
		}

		.form-control:focus {
			border-color: #007bff;
			/* Change border color on focus */
			box-shadow: 0 0 5px rgba(0, 123, 255, .5);
		}
	</style>
	<!--/span-->
	<!--Sidebar-->

</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!--/row-->
<?php require_once 'terms_condition.php'; ?>