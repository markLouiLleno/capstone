<?php
$arrival = '';
$departure = '';
if (isset($_SESSION['from'])) {
	$arrival = $_SESSION['from'];
	$departure = $_SESSION['to'];
}
if (isset($_POST['btnbook'])) {
	if (!isset($_SESSION['from']) || !isset($_SESSION['to'])) {
		message("Please Choose check-in and check-out dates to continue reservation!", "error");
		redirect("index.php?page=5");
	}
	if (isset($_POST['roomid'])) {
		$days = dateDiff($arrival, $departure);
		$totalprice = $_POST['roomprice'] * $days;
		addtocart($_POST['roomid'], $days, $totalprice, $arrival, $departure);

		redirect(WEB_ROOT . 'booking/');
	}
}
?>

<div class="container my-4">
	<div class="row">
		<div class="col-md-9">
			<fieldset>
				<p class="bg-warning">
					<?php echo '<div class="alert alert-info"><strong>From: ' . $arrival . ' To: ' . $departure . '</strong></div>'; ?>
				</p>

				<legend>
					<h2 class="text-left">Rooms and Rates</h2>
				</legend>

				<div class="row">
					<?php
					$mydb->setQuery("SELECT *, typeName FROM room ro, roomtype rt WHERE ro.typeID = rt.typeID");
					$cur = $mydb->loadResultList();

					foreach ($cur as $result) {
						$mydb->setQuery("SELECT STATUS FROM reservation
                            WHERE (
                                ('$arrival' >= arrival AND '$arrival' <= departure)
                                OR ('$departure' >= arrival AND '$departure' <= departure)
                                OR (arrival >= '$arrival' AND arrival <= '$departure')
                            ) AND roomNo = " . $result->roomNo);

						$stats = $mydb->executeQuery();
						$rows = $mydb->loadSingleResult($stats);

						$image = WEB_ROOT . 'admin/mod_room/' . $result->roomImage;
						$status = isset($rows->STATUS) ? $rows->STATUS : '';
					?>
						<div class="col-md-4 mb-4">
							<div class="card h-100 shadow-sm">
								<img src="<?php echo $image; ?>" class="card-img-top" alt="<?php echo $result->roomName; ?>" style="height: 200px; object-fit: cover;">
								<div class="card-body">
									<h5 class="card-title"><?php echo $result->typeName; ?></h5>
									<p class="card-text">
										<strong>Max Adults:</strong> <?php echo $result->Adults; ?><br>
										<strong>Max Children:</strong> <?php echo $result->Children; ?><br>
										<strong>Rate per Night:</strong> &#8369; <?php echo $result->price; ?>
									</p>
								</div>
								<div class="card-footer">
									<form name="book" method="POST" action="<?php echo WEB_ROOT; ?>index.php?page=5">
										<input type="hidden" name="roomid" value="<?php echo $result->roomNo; ?>" />
										<input type="hidden" name="roomprice" value="<?php echo $result->price; ?>" />
										<?php if ($status == 'pending'): ?>
											<div class="alert alert-warning text-center" role="alert">Reserve!</div>
										<?php elseif ($status == 'Confirmed' || $status == 'Checkedin'): ?>
											<div class="alert alert-success text-center" role="alert">Book!</div>
										<?php else: ?>
											<button type="submit" class="btn btn-primary w-100" name="btnbook" onclick="return validateBook();">Book Now!</button>
										<?php endif; ?>
									</form>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</fieldset>
		</div>
		<!-- Sidebar -->

		<?php include 'sidebar.php'; ?>
	</div>
</div>