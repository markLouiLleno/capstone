<style>
    .form-check-input:checked {
        background-color: #198754;
        border-color: #0d6efd;
    }

    #Create:hover {
        background-color: #000 !important;
        color: white !important;
    }

    .card-body .border {
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .card-body .border:hover {
        background-color: #f0f2f5; /* Light gray background on hover */
        color: #000; /* Ensure text remains readable */
    }

    .card-body label {
        cursor: pointer;
    }
</style>

<?php
if (isset($_POST['submit'])) {
    $type = $_POST['type'];
    header('location:?signup&type=' . $type);
}
?>
<div class="">
    <div class="col-lg-12 rounded p-4">
        <form method="post" action="">
            <div class="d-flex justify-content-center"></div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="card p-5 border-0 bg-transparent">
                        <div class="card-body p-5 text-center">
                            <div class="border border-3 border-dark p-5 position-relative">
                                <div style="position: absolute; top: 10px; right: 15px;">
                                    <div class="input-group">
                                        <input class="form-check-input mt-0" type="radio" name="type" value="Client" id="joinasaclient" aria-label="Radio button for following text input">
                                    </div>
                                </div>
                                <h3>Join as a client</h3>
                                <label for="joinasaclient" style="width:100%; height: 100%; position: absolute; top: 0; left: 0;"></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card p-5 border-0 bg-transparent">
                        <div class="card-body p-5 text-center">
                            <div class="border border-3 border-dark p-5 position-relative">
                                <div style="position: absolute; top: 10px; right: 15px;">
                                    <div class="input-group">
                                        <input class="form-check-input mt-0" type="radio" name="type" value="Freelancer" id="joinasafreelancer" aria-label="Radio button for following text input">
                                    </div>
                                </div>
                                <h3>Join as a freelancer</h3>
                                <label for="joinasafreelancer" style="width:100%; height: 100%; position: absolute; top: 0; left: 0;"></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-5 text-center">
                <button id="Create" class="btn btn-outline-dark bg-light me-1 px-4 py-2 text-dark fw-bold" name="submit" type="submit" style="border-radius: 20px;">Create Account</button>
            </div>

            <div class="small text-center mt-3">
                Already have an Account? <a href="?login" class="text-decoration-none fw-bold text-success">Log in</a>
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
            } else {
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
