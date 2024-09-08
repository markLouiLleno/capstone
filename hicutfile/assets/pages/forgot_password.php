<div class="login">
    <div class=" rounded p-4" style="background-color: #e9e9e9;">
        <?php
        if (isset($_SESSION['forgot_code']) && !isset($_SESSION['auth_temp'])) {
            $action = 'verifycode';
        } elseif (isset($_SESSION['forgot_code']) && isset($_SESSION['auth_temp'])) {
            $action = 'changepassword';
        } else {
            $action = 'forgotpassword';
        }
        ?>
        <form method="post" action="assets/php/actions.php?<?= $action ?>">
            <div class="d-flex justify-content-center">

            </div>
            <div class="mt-3 text-center">
                <img src="./images/lock.png" width="120px">
            </div>
            <h1 class="h3 mb-3 mt-2 fw-bold text-center">Update your password</h1>
            <p class="small text-center p-3">Enter your username or email address and select <strong>Send Email</strong></p>
            <?php
            if ($action == 'forgotpassword') {
            ?>
                <div class="form-floating">
                    <input type="email" name="email" class="form-control rounded-0" placeholder="username/email">
                    <label for="floatingInput">Enter your email</label>
                </div>
                <?= showError('email') ?>

                <br><br><br><br><br><br>
                <div class="text-end">
                    <a href="?login" class="text-decoration-none text-success fw-bold mx-3">Cancel</a>
                    <button class="btn btn-outline-dark bg-success me-1 px-2 py-1 text-dark fw-bold" type="submit" style="border-radius: 20px;">Send Email</button>
            </div>
            <?php
            }
            ?>


            <?php
            if ($action == 'verifycode') {
            ?>
                <p>Enter 6 Digit Code Sent to You - <?php echo $_SESSION['forgot_email']; ?></p>
                <div class="form-floating mt-1">
                    <input type="text" name="code" class="form-control rounded-0" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">######</label>
                </div>
                <?= showError('email_verify') ?>

                <br>
                <button class="btn btn-primary" type="submit">Verify Code</button>

            <?php
            }
            ?>


            <?php
            if ($action == 'changepassword') {
            ?>
                <p>Enter your new password - <?php echo $_SESSION['forgot_email']; ?></p>
                <div class="form-floating mt-1">
                    <input type="password" name="password" class="form-control rounded-0" id="password" placeholder="Password">
                    <label for="password">New password</label>
                </div>
                <?= showError('password') ?>

                <br>

                <!-- New field for confirming password -->
                <div class="form-floating mt-1">
                    <input type="password" name="confirm_password" class="form-control rounded-0" id="confirmPassword" placeholder="Confirm Password">
                    <label for="confirmPassword">Confirm new password</label>
                </div>
                <?= showError('confirm_password') ?>

                <br>
                <button class="btn btn-primary" type="submit" onclick="return validateForm()">Change Password</button>

                <script>
                    function validateForm() {
                        var password = document.getElementById("password").value;
                        var confirmPassword = document.getElementById("confirmPassword").value;

                        if (password != confirmPassword) {
                            alert("Passwords do not match!");
                            return false;
                        }
                        return true;
                    }
                </script>

            <?php
            }
            ?>


            <br>
            <br>

            
        </form>
    </div>
</div>
