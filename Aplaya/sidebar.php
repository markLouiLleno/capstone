<style>
	/* Custom styles for the sidebar */
	.sidebar-offcanvas {
		background-color: #007bff;
		/* Primary color */
		color: #fff;
		/* Text color */
	}

	.panel-heading {
		background-color: #343a40;
		/* Dark background for heading */
		color: #fff;
		/* White text */
	}

	.panel-body {
		background-color: #f8f9fa;
		/* Light background for panel body */
		border-radius: 0.5rem;
		/* Rounded corners */
	}

	.bg-dark-custom {
		background-color: #343a40 !important;
		/* Dark background */
	}
</style>
</head>

<body>

	<!-- Sidebar -->
	<div class="row row-offcanvas row-offcanvas-right">
		<div class="col-xs-12 col-sm-3 sidebar-offcanvas p-3" id="sidebar" role="navigation" style="">
			<div class="sidebar-nav">
				<div class="panel panel-inverse">
					<div class="panel-heading p-2 rounded">Book a Room</div>
					<div class="panel-body p-3 mt-3 rounded shadow-sm">
						<form method="POST" action="#.php">
							<div class="col-xs-12 col-sm-12">
								<div class="form-group">
									<div class="row">
										<div class="col-xs-12 col-sm-12">
											<label class="control-label" for="from">Check In</label>
											<input class="form-control from mb-3" size="11" type="text"
												value="<?php echo (isset($_SESSION['from'])) ? $_SESSION['from'] : ''; ?>"
												name="from" id="from" autocomplete="off">
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-xs-12 col-sm-12">
											<label class="control-label" for="to">Check Out</label>
											<input class="form-control to mb-3" size="11" type="text"
												value="<?php echo (isset($_SESSION['to'])) ? $_SESSION['to'] : ''; ?>"
												name="to" id="to" autocomplete="off">
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-xs-12 col-sm-12">
											<button type="submit" class="btn btn-dark w-100" name="avail">Check Availability</button>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
				<form name="clock" class="mt-3">
					<input class="form-control text-center bg-dark text-white" id="trans" type="text" name="face" value="Current Time">
				</form>
				<hr class="bg-light">
			</div>
		</div>
	</div>
	<!-- End of Sidebar -->

	