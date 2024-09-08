<style type="text/css">
    #Google:hover{
        background-color: #000 !important;
        color: white !important;
    }
</style>
    <div class="login" >
        <div class=" rounded p-4" style="background-color: #e9e9e9;">
            <form method="post" action="assets/php/actions.php?login">
                <div class="d-flex justify-content-center">
                
               <!--  <a href="landpage.php">
                    <img class="mb-4" src="assets/images/hicuut.png" alt="" height="45">
                </a> -->
                </div>
                <br>
                <h1 class="h3 mb-3 fw-bold text-center">Log in</h1>

                <div class="form-floating">
                    <input type="text" name="username_email" value="<?=showFormData('username_email')?>" class="form-control rounded-0" placeholder="username/email">
                    <label for="floatingInput">Username or Email</label>
                </div>
                <?=showError('username_email')?>
                <div class="form-floating mt-1">
                    <input type="password" name="password" class="form-control rounded-0" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <?=showError('password')?>
                <?=showError('checkuser')?>

                <div class="text-end w-100 mt-3"><a href="?forgotpassword&newfp" class="text-decoration-none small text-success">Forgot password ?</a></div>
                <div class="mt-3 text-center">
                    <button class="btn btn-success me-1 px-4 py-2 fw-bold" type="submit" style="border-radius: 20px;">Log in</button>
                </div>

                <div class="d-flex my-4 p-2" style="width: 100%;place-items: center;justify-content: space-between;">
                    <span class="w-100 border-top border-dark"></span>
                    <!-- <span class="p-4">or</span>
                    <span class="w-100 border-top border-dark"></span> -->
                </div>

                <!-- <div class="text-center">

                    <button id="Google" class="btn btn-outline-dark bg-white w-100 me-1 px-4 py-2 text-dark fw-bold" type="submit" style="border-radius: 20px;">Continue with Google</button>
                </div>
                <div class="mt-3 text-center">
                    <button class="btn btn-outline-primary w-100 me-1 px-4 py-2 fw-bold" type="submit" style="border-radius: 20px;">Continue with Facebook</button>
                </div> -->

                <div class="small text-center mt-3">
                    Don't have an HiCut Account? <a href="?type" class="text-decoration-none fw-bold text-success">Sign up</a>
                </div>
                
            </form>
        </div>
    </div>




<script src="assets/js/sweetalert.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const loginForm = document.querySelector('.login form');

        loginForm.addEventListener('submit', function(event) {
            event.preventDefault();

            const usernameEmail = loginForm.querySelector('input[name="username_email"]').value;
            const password = loginForm.querySelector('input[name="password"]').value;

            if (usernameEmail === '' && password === '') {
                swal({
                    title: "Oops!",
                    text: "Please fill out both fields.",
                    icon: "error",
                    button: "Got it!",
                });
            } else if (usernameEmail === '') {
                swal({
                    title: "Oops!",
                    text: "Please fill out the username/email field.",
                    icon: "error",
                    button: "Got it!",
                });
            } else if (password === '') {
                swal({
                    title: "Oops!",
                    text: "Please fill out the password field.",
                    icon: "error",
                    button: "Got it!",
                });
            } else{
                swal({
                    title: "Success!",
                    text: "Password Matched!",
                    icon: "success",
                    button: "okay!",
                }).then(() => {
                    loginForm.submit();
                });
            }
        });
    });
</script>