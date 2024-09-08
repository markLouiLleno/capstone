<style type="text/css">
    #Create:hover {
        background-color: #000 !important;
        color: white !important;
    }
</style>
<div class="login">
    <div class="rounded px-4 py-3" style="background-color: #e9e9e9; margin-top: 200px;">
        <form method="post" action="assets/php/actions.php?signup">
            <input type="hidden" name="user_role" value="<?php echo $_GET['type'] ?>">
            <div class="d-flex justify-content-center">
                <!-- <img class="mb-4" src="assets/images/hicuut.png" alt="" height="45"> -->
            </div>
            <br>
            <h1 class="h3 mb-3 fw-bold text-center">Sign up</h1>

            <div class="form-floating mt-1">
                <input type="email" name="email" value="<?=showFormData('email')?>" class="form-control rounded-0" placeholder="username/email">
                <label for="floatingInput">Email</label>
            </div>
            <?=showError('email')?>

            <div class="d-flex">
                <div class="form-floating mt-3 col-6">
                    <input type="text" name="first_name" value="<?=showFormData('first_name')?>" class="form-control rounded-0" placeholder="First name">
                    <label for="floatingInput">First name</label>
                </div>
                <div class="form-floating mt-3 col-6">
                    <input type="text" name="last_name" value="<?=showFormData('last_name')?>" class="form-control rounded-0" placeholder="Last name">
                    <label for="floatingInput">Last name</label>
                </div>
            </div>
            <?=showError('first_name')?>
            <?=showError('last_name')?>

            <div class="d-flex gap-3 my-3">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="1" <?=isset($_SESSION['formdata'])?'':'checked'?><?=showFormData('gender')==1?'checked':''?>>
                    <label class="form-check-label" for="exampleRadios1">Male</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="exampleRadios3" value="2" <?=showFormData('gender')==2?'checked':''?>>
                    <label class="form-check-label" for="exampleRadios3">Female</label>
                </div>
            </div>

            <div class="form-floating mt-3">
                <input type="text" name="username" value="<?=showFormData('username')?>" class="form-control rounded-0" placeholder="Username">
                <label for="floatingInput">Username</label>
            </div>
            <?=showError('username')?>

            <div class="form-floating mt-3">
                <input type="password" name="password" class="form-control rounded-0" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <?=showError('password')?>

            <div class="form-floating mt-3">
                <input type="password" name="confirm_password" class="form-control rounded-0" id="confirmFloatingPassword" placeholder="Confirm Password">
                <label for="confirmFloatingPassword">Confirm Password</label>
            </div>
            <div class="mt-3">
                <input type="text" name="location" class="form-control rounded-0" id="location" placeholder="Type Your Location">
            </div>

            <select class="form-select mt-3 <?php if ($_GET['type'] === 'Client') { echo "d-none"; }?>" name="profession">
                <option hidden value="">Select Profession</option>
                <option value="Photography">Photography</option>
                <option value="Videography">Videography</option>
                <option value="Video Editor">Video Editor</option>
                <option value="Audio Editor">Audio Editor</option>
                <option value="Film maker">Film maker</option>
                <option value="Digital Arts">Digital Arts</option>
                <option value="Graphic Designer">Graphic Designer</option>
                <option value="Logo Designer">Logo Designer</option>
            </select>

           
            <?=showError('password')?>

            <div class="mt-3 text-center">
                <span><i class="fas fa-plus"></i></span>
            </div>
            <div class="mt-3 text-center">
                <button id="Create" class="btn btn-outline-dark bg-light me-1 px-4 py-2 text-dark fw-bold" type="submit" style="border-radius: 20px;">Create Account</button>
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
        const signUpForm = document.querySelector('.login form');

        signUpForm.addEventListener('submit', function(event) {
            event.preventDefault();

            const firstName = signUpForm.querySelector('input[name="first_name"]').value;
            const lastName = signUpForm.querySelector('input[name="last_name"]').value;
            const gender = signUpForm.querySelector('input[name="gender"]:checked');
            const email = signUpForm.querySelector('input[name="email"]').value;
            const username = signUpForm.querySelector('input[name="username"]').value;
            const password = signUpForm.querySelector('input[name="password"]').value;
            const confirmPassword = signUpForm.querySelector('input[name="confirm_password"]').value;

            let errorMessage = '';

            if (firstName === '') {
                errorMessage = 'Please fill out the First Name field.';
            } else if (lastName === '') {
                errorMessage = 'Please fill out the Last Name field.';
            } else if (gender === null) {
                errorMessage = 'Please select a Gender.';
            } else if (email === '') {
                errorMessage = 'Please fill out the Email field.';
            } else if (username === '') {
                errorMessage = 'Please fill out the Username field.';
            } else if (password === '') {
                errorMessage = 'Please fill out the Password field.';
            } else if (password.length < 8) {
                errorMessage = 'Password must be at least 8 characters long.';
            } else if (password !== confirmPassword) {
                errorMessage = 'Password and Confirm Password do not match.';
            }

            if (errorMessage !== '') {
                swal({
                    title: "Oops!",
                    text: errorMessage,
                    icon: "error",
                    button: "Got it!",
                });
            } else {
                swal({
                    title: "Success!",
                    text: "Form submitted successfully!",
                    icon: "success",
                    button: "Proceed",
                }).then((proceed) => {
                    if (proceed) {
                        signUpForm.submit();
                    }
                });
            }
        });
    });
</script>
