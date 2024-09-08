<?php
global $user;
?>
    <div class="login">
        <div class=" rounded p-4" style="background-color: #e9e9e9;">
            <form method="post" action="assets/php/actions.php?verify_email">
                <div class="d-flex justify-content-center">


                </div>
                <h1 class="h5 mb-3 fw-normal">Verify Your Email Id (<?=$user['email']?>)</h1>


                <p>Enter 6 Digit Code Sended to You</p>
                <div class="form-floating mt-1">

                    <input type="text" name="code" class="form-control rounded-0" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">######</label>
                </div>
                <?php
if(isset($_GET['resended'])){
    ?>
<p class="text-success">Verification code resended !</p>

<?php
}
                ?>
                <?=showError('email_verify')?>

                <div class="mt-3 d-flex justify-content-between align-items-center">
                    <button class="btn btn-outline-dark bg-success me-1 px-4 py-2 text-dark fw-bold" type="submit" style="border-radius: 20px;">Verify Email</button>
                    <a href="assets/php/actions.php?resend_code" class="text-decoration-none text-success fw-bold mx-3">Resend Code</a>

                </div>
                <br>
                <a href="assets/php/actions.php?logout" class="text-decoration-none text-success fw-bold"><i class="bi bi-arrow-left-circle-fill"></i>
                    Logout</a>
            </form>
        </div>
    </div>


    <script src="assets/js/sweetalert.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Trigger the SweetAlert modal when the page loads
        swal({
            title: "Verification Code Sent!",
            text: "Your verification code has been sent to your email. Please check your inbox (and spam folder) for the code.",
            icon: "success",
            button: "Got it!",
        });
    });
</script>