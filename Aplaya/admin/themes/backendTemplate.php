<?php
//require_once("../includes/initialize.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>JPAMS</title>


	<link href="<?php echo WEB_ROOT; ?>admin/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo WEB_ROOT; ?>admin/css/dataTables.bootstrap.css" rel="stylesheet" media="screen">
	<link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT; ?>admin/css/jquery.dataTables.css">
	<link href="<?php echo WEB_ROOT; ?>admin/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
	<script type="text/javascript" language="javascript" src="<?php echo WEB_ROOT; ?>admin/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="<?php echo WEB_ROOT; ?>admin/js/jquery.dataTables.js"></script>
	<script type="text/javascript" language="javascript" src="<?php echo WEB_ROOT; ?>admin/js/bootstrap.min.js"></script>
	<script type="text/javascript" language="javascript" src="<?php echo WEB_ROOT; ?>admin/js/bootstrap-modal.js"></script>
	<script type="text/javascript" src="<?php echo WEB_ROOT; ?>admin/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
	<script type="text/javascript" src="<?php echo WEB_ROOT; ?>admin/js/locales/bootstrap-datetimepicker.uk.js" charset="UTF-8"></script>
</head>
<script type="text/javascript">
</script>
<link href="<?php echo WEB_ROOT; ?>admin/css/offcanvas.css" rel="stylesheet">

<body>
	<!--Header-->

	<div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo WEB_ROOT; ?>../views/admin_dashboard.php">JPAMS</a>
			</div>
			<!-- <<div class="collapse navbar-collapse">
				//<ul class="nav navbar-nav">
					<li class="<?php echo (currentpage() == 'index.php') ? "active" : false; ?>"><a href="<?php echo WEB_ROOT; ?>admin/index.php">Home</a></li>
					<li class="<?php echo (currentpage() == 'mod_room') ? "active" : false; ?>"><a href="<?php echo WEB_ROOT; ?>admin/mod_room/index.php">Rooms</a></li>
					<li class="<?php echo (currentpage() == 'mod_roomtype') ? "active" : false; ?>"><a href="<?php echo WEB_ROOT; ?>admin/mod_roomtype/index.php">Room Types</a></li>
					<li class="<?php echo (currentpage() == 'mod_reservation') ? "active" : false; ?>"><a href="<?php echo WEB_ROOT; ?>admin/mod_reservation/index.php">Reservation</a></li>
					<li class="<?php echo (currentpage() == 'mod_comments') ? "active" : false; ?>"><a href="<?php echo WEB_ROOT; ?>admin/mod_comments/index.php">Comments</a></li>
					<li class="<?php echo (currentpage() == 'mod_reports') ? "active" : false; ?>"><a href="<?php echo WEB_ROOT; ?>admin/mod_reports/index.php">Reports</a></li>
					<?php if ($_SESSION['admin_ACCOUNT_TYPE'] == "Administrator") { ?>
						<li class="<?php echo (currentpage() == 'mod_users') ? "active" : false; ?>"><a href="<?php echo WEB_ROOT; ?>admin/mod_users/index.php">Users</a></li>
						<li class="<?php echo (currentpage() == 'mod_settings') ? "active" : false; ?>"><a href="<?php echo WEB_ROOT; ?>admin/mod_settings/index.php">Settings</a></li>
					<?php } ?>
					<li class="<?php echo (currentpage() == 'logout.php') ? "active" : false; ?>"><a class="toggle-modal" href="#logout">Logout</a></li>
				</ul>-->

		</div><!-- /.nav-collapse -->
	</div><!-- /.container -->
	</div><!-- /.navbar -->

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="well">
					<img width="1100px" hieght="100px" class="img-rounded" />
					<div class="media">
						<a class="pull-left" href="#">
							<img class="media-object" src="../img/banner.png" alt="...">
						</a>
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
			<p>&copy; JPAMS </p>


			<script>

			</script>

			});

			});
			</script>

		</footer>
	</div>
	<!--/.container-->
</body>

</html>