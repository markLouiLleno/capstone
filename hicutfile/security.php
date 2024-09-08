<?php include 'assets/php/functions.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="Chatbot/style.css">
    <style>
    /* Add your custom styles here */
    .quick-chat-options {
      display: flex;
      gap: 10px;
      margin-top: 10px;
    }

    .quick-chat-option {
      padding: 10px;
      background-color: #3498db;
      color: #fff;
      border: none;
      cursor: pointer;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }

    .quick-chat-option:hover {
      background-color: #2980b9;
    }

    .homebg{
      height: 100vh;
      background-image: url(images/home-bg.png);
      background-position: center;
      background-size: cover;
    }
    .homebgtext{
      max-width: 500px;
      position: absolute;
      top: 50%;
      left: 200px;
      transform: translateY(-50%);
    }
    @media screen and ( max-width: 991px){
      .homebgtext{
        padding: 30px;
        max-width: unset;
        position: relative;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        text-align: center;
      }
    }
    .stars {
        display: inline-block;
        font-size: 24px;
        cursor: pointer;
        direction: rtl; /* Set the direction to right-to-left */
    }

    .stars span {
        color: gray;
    }

    .stars span:hover,
    .stars span:hover ~ span {
        color: orange;
        direction: ltr; /* Set the direction back to left-to-right */
    }
    .stared {
        color: orange;
        font-size: 24px;
    }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Fonts Link For Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0" />
    <script src="Chatbot/script.js" defer></script>
    <script src="assets/js/fontawesome.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <body>


    <div class="container-fluid p-0">
      <?php include 'navbar.php'; ?>
      <div class="container-fluid p-5">
        <h1 class="fw-bold text-dark">Profile</h1>
        <div class="row m-0">
          <div class="col-lg-3">
            <div class="card border-0 bg-transparent p-3">
              <div class="card-body border-bottom border-3 border-dark d-flex" style="place-items: center;">
                <img src="images/profile.png" width="70px">
                <p class="fs-4 text-center ms-3 mt-3">
                  <?php
                  $user_id = $_GET['user_id'];
                  $sql = "SELECT * FROM users WHERE id = ?";
                  $stmt = $db->prepare($sql);
                  $stmt->bind_param('i', $user_id);
                  $stmt->execute();
                  $result = $stmt->get_result();
                  $row = $result->fetch_assoc();
                  if (!isset($user_id)) {
                    echo $_SESSION['userdata']['first_name'] . " " . $_SESSION['userdata']['last_name'];
                  }else{
                    echo $row['first_name'] . " " . $row['last_name'];
                  }
                        
                  ?>
                    
                  </p>
              </div>
              <div class="card-body">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link fs-5" href="myinfo.php?user_id=<?php echo $_GET['user_id'];?>">My Info</a>
                  </li>
                  <?php

                        if ($row['user_role'] === 'Freelancer') {
                   ?>
                   <li class="nav-item">
                    <a class="nav-link fs-5" href="works.php?user_id=<?php echo $_GET['user_id'];?>">Works</a>
                  </li>

                  <?php } ?>
                
                  <li class="nav-item">
                    <a class="nav-link fs-5" href="save.php?user_id=<?php echo $_GET['user_id'];?>">Save</a>
                  </li>
                  <?php if($user_id === $_SESSION['userdata']['id']){?>
                  <li class="nav-item">
                    <a class="active nav-link fs-5" href="save.php?user_id=<?php echo $_GET['user_id'];?>">Password & Security</a>
                  </li>
                  <?php }?>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-9">
            <div class="card border-0 bg-transparent p-3">
              <div class="card-body">
                <h1 class="fw-bold text-dark">Password & Security</h1>
                <div class="row border p-4">
                  <form id="changepassword">
                    <div class="mb-3 form-group col-12 col-lg-5">
                      <label class="form-label">Change E-mail address you are using:</label>
                      <input required type="email" name="email" class="form-control" placeholder="Type your email" value="<?php echo $_SESSION['userdata']['email']?>">
                    </div>
                    <div class="mb-3 form-group col-12 col-lg-5">
                      <label class="form-label">Change Password:</label>
                      <input required type="password" name="password" class="form-control" placeholder="Input new password">
                    </div>
                    <div class="mb-3 form-group col-12 col-lg-5">
                      <label class="form-label">Confirm Password:</label>
                      <input required type="password" name="cpassword" class="form-control" placeholder="Check your password">
                    </div>
                    <input type="submit" name="submit" class="btn btn-success" value="CONFIRM">
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php include 'chatbot.php'; ?>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
      $(document).ready(function () {
          $('#changepassword').on('submit', function (e) {
              e.preventDefault();

              $.ajax({
                  type: 'POST',
                  url: 'controller/change_password.php',
                  data: $(this).serialize(),
                  dataType: 'json',
                  success: function (response) {
                    if (response.status === "success") {
                      Swal.fire({
                        title: "Password updated successfully!",
                        icon: "success"
                      });
                    }else if (response.status === "email") {
                      Swal.fire({
                        title: "User not found!",
                        icon: "error"
                      });
                    }else if (response.status === "cpassword") {
                      Swal.fire({
                        title: "Passwords do not match.",
                        icon: "warning"
                      });
                    }
                    $('#changepassword')[0].reset();
                  },
                  error: function (xhr, status, error) {
                      // Handle error
                      console.error(error);
                  }
              });
          });
      })
    </script>

  </body>
</html>