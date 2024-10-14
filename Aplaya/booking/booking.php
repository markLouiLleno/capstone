<?php

if (@$_SESSION['from'] == "" || @$_SESSION['to'] == "") {
  message("Please choose check-in and check-out dates to continue reservation!", "error");
  redirect(WEB_ROOT . 'index.php?page=5');
}

$arrival = $_SESSION['from'];
$departure = $_SESSION['to'];

if (isset($_POST['clear'])) {
  unset($_SESSION['pay']);
  unset($_SESSION['magbanua_cart']);
  message("The cart is empty.", "success");
  redirect(WEB_ROOT . "booking/");
}

?>

<div class="container my-4">
  <div class="row">
    <?php include '../sidebar.php'; ?>

    <div class="col-md-9">
      <div class="panel panel-default">
        <div class="panel-body">
          <form action="" method="POST">
            <h3 class="text-center mb-4">Your Booking Cart</h3>
            <table class="table table-hover table-bordered">
              <thead class="thead-dark">
                <tr>
                  <th>#</th>
                  <th>Room Type</th>
                  <th>Check In</th>
                  <th>Check Out</th>
                  <th>Nights</th>
                  <th>Price</th>
                  <th>Room</th>
                  <th>Amount</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $arival = $_SESSION['from'];
                $departure = $_SESSION['to'];
                $days = dateDiff($arival, $departure);
                $payable = 0;

                if (isset($_SESSION['magbanua_cart'])) {
                  $count_cart = count($_SESSION['magbanua_cart']);

                  for ($i = 0; $i < $count_cart; $i++) {
                    $mydb->setQuery("SELECT *, typeName FROM room ro, roomtype rt WHERE ro.typeID = rt.typeID AND roomNo =" . $_SESSION['magbanua_cart'][$i]['magbanuaroomid']);
                    $cur = $mydb->loadResultList();

                    foreach ($cur as $result) {
                      echo '<tr>';
                      echo '<td>' . ($i + 1) . '</td>';
                      echo '<td>' . $result->typeName . '</td>';
                      echo '<td>' . $_SESSION['magbanua_cart'][$i]['magbanuacheckin'] . '</td>';
                      echo '<td>' . $_SESSION['magbanua_cart'][$i]['magbanuacheckout'] . '</td>';
                      echo '<td>' . $_SESSION['magbanua_cart'][$i]['magbanuaday'] . '</td>';
                      echo '<td>&#8369; ' . number_format($result->price, 2) . '</td>';
                      echo '<td>1</td>';
                      echo '<td>&#8369; ' . number_format($_SESSION['magbanua_cart'][$i]['magbanuaroomprice'], 2) . '</td>';
                      echo '<td><a href="index.php?view=processcart&id=' . $result->roomNo . '" class="btn btn-danger btn-sm">Remove</a></td>';
                      echo '</tr>';

                      $payable += $result->price;
                      $_SESSION['pay'] = $payable * $days;
                    }
                  }
                }
                ?>
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="6">
                    <h5><b><?php echo isset($_SESSION['pay']) ? 'Order Total: &#8369; ' . number_format($_SESSION['pay'], 2) : 'Your booking cart is empty.'; ?></b></h5>
                  </td>
                  <td colspan="3" class="text-right">
                    <?php if (isset($_SESSION['magbanua_cart'])) { ?>
                      <a href="../index.php?page=5" class="btn btn-primary">Add Another Room</a>
                      <button type="submit" class="btn btn-warning" name="clear">Clear Cart</button>
                      <?php if (isset($_SESSION['guest_id'])) { ?>
                        <a href="<?php echo WEB_ROOT; ?>booking/index.php?view=payment" class="btn btn-success">Continue Booking</a>
                      <?php } else { ?>
                        <a href="<?php echo WEB_ROOT; ?>booking/index.php?view=info" class="btn btn-success">Continue Booking</a>
                      <?php } ?>
                    <?php } ?>
                  </td>
                </tr>
              </tfoot>
            </table>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>