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

    .gray {
        color: gray;
    }
    .stared {
        color: orange;
        font-size: 24px;
    }

    .stars span:hover,
    .stars span:hover ~ span {
        color: orange;
        direction: ltr; /* Set the direction back to left-to-right */
    }
    .orange {
        color: orange;
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
    <title>Profile</title>
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
                    <a class="active nav-link fs-5" href="myinfo.php?user_id=<?php echo $_GET['user_id'];?>">My Info</a>
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
                    <a class="nav-link fs-5" href="save.php?user_id=<?php echo $_GET['user_id'];?>">Password & Security</a>
                  </li>
                  <?php }?>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-9">
            <div class="card border-0 bg-transparent p-3">
              <div class="card-body">
                <h1 class="fw-bold text-dark">Profile Information</h1>
                <?php
                  $user_id = $_GET['user_id'];
                  $sql = "SELECT SUM(rating) as total, COUNT(who_rated) as count FROM ratings WHERE rated_user = ? GROUP BY rated_user";
                  $stmt = $db->prepare($sql);
                  $stmt->bind_param("i", $user_id);
                  $stmt->execute();
                  $result = $stmt->get_result();
                  $row2 = $result->fetch_assoc();

                // if (!isset($user_id)) {
                ?>
                <p class="fs-5">This is a <?php echo $row['user_role'] ?> account</p>
                <div class="row border p-4">
                  <div class="col-lg-2 text-center mt-4">
                    <img src="images/profile.png" width="100px">
                  </div>
                  <div class="col-lg-4 px-5">
                    <div>
                      <p class="mb-0"><?php echo $row['user_role'] ?></p>
                      <p class="fw-bold">
                        <?php echo $row['first_name']." ".$row['last_name'] ?>
                      </p>
                    </div>
                    <div>
                      <p class="mb-0">Email</p>
                      <p class="fw-bold"><?php echo $row['email']; ?></p>
                    </div>
                    <div>
                      <p class="mb-0">Location</p>
                      <p class="fw-bold"><?php echo $row['location']; ?></p>
                    </div>
                  </div>
                  <?php  if ($row['user_role'] == "Freelancer") { ?>
                  <div class="col-lg-3 text-center">
                    <div role="button" id="ratingdiv" data-bs-target="#ratingmodal" data-bs-toggle="modal">
                    
                    </div>
                    <p class="small fw-bold"><?php if (isset($row2['total'])) {
                      echo $row2['total'];
                    }  ?></p>
                    <div role="button" data-bs-toggle="modal" data-bs-target='#ratingmodal2'>
                    <p class="small fw-bold" ><?php if (isset($row2['count'])) { echo $row2['count']." - "; } ?>Reviews</p>
                    </div>
                  </div>
                  <?php } ?>
                  <div class="col text-end">
                  
                  </div>
                </div>

               
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

<!-- rated Modal -->
<div class="modal fade" id="ratingmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content shadow">
      <div class="modal-body d-flex flex-column gap-1 p-4">
        <div class="d-flex pb-3">
            <span role="button" data-bs-dismiss="modal" class="ms-auto">
                <i class="fa fa-close fs-4"></i>
            </span>
        </div>
        <div class="d-flex flex-column pb-3" id="viewImages">
            <h5 class="text-center">Rate the User</h5>
            <form id="rating-form" method="POST">
                <div class="stars d-flex justify-content-center" id="star-rating">
                    <span data-rating="5" class="fs-1 gray">★</span>
                    <span data-rating="4" class="fs-1 gray">★</span>
                    <span data-rating="3" class="fs-1 gray">★</span>
                    <span data-rating="2" class="fs-1 gray">★</span>
                    <span data-rating="1" class="fs-1 gray">★</span>
                </div>
                <input type="hidden" id="rating-input" name="rating">
                <input type="hidden" id="who-rated" name="who_rated" value="<?php echo $_SESSION['userdata']['id']?>">
                <input type="hidden" id="rated-user" name="rated_user" value="<?php echo $user_id?>">
                <textarea name="descriptions" class="form-control" placeholder="Write your review about the freelancer here"></textarea>

                <div class="d-flex">
                  <input type="submit" name="submit" class="btn btn-primary ms-auto mt-3" value="POST">
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- description of rating modal -->
<div class="modal fade" id="ratingmodal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content shadow">
      <div class="modal-body d-flex flex-column gap-1 p-4 pe-3">
        <div class="d-flex pb-3 pe-4">
            <h5>All Ratings: <span id="textcomment"></span></h5>
            <span role="button" data-bs-dismiss="modal" class="ms-auto">
                <i class="fa fa-close fs-4"></i>
            </span>
        </div>
        
        <div class="d-flex flex-column row-gap-2 overflow-auto pe-2" style="max-height: 30em;">  
           <?php
            $user_id = $_GET['user_id'];
            $sql = "SELECT * FROM ratings r INNER JOIN users u ON u.id = r.who_rated WHERE r.rated_user = ? AND descriptions IS NOT NULL";
            $stmt = $db->prepare($sql);
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $result = $stmt->get_result();

            while($row2 = $result->fetch_assoc()) {
                ?>
                <div class="d-flex align-items-center column-gap-2 p-2">
                    <div>
                        <img src="upload/<?php echo ($row2['profile_pic'] !== null) ? $row2['profile_pic'] : 'profile.png'; ?>" width="50" height="50" class="rounded-circle border border-1 border-dark">
                    </div>
                    <div class="my-auto p-2 border border-1 border-dark rounded-2 w-100">
                      <p>
                        <?php echo $row2['descriptions']; ?>
                      </p>
                    </div>
                </div>
                <?php
            }
            ?>

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
            $('.stars span').click(function () {
                var rating = parseInt($(this).data('rating'));
                $('.stars span').removeClass('orange');
                $(this).addClass('orange');
                $(this).nextAll().addClass('orange');
                $('#rating-input').val(rating);
            });
    function rating() {
        var rated_user = $('#rated-user').val();
        $.ajax({
            type: 'POST',
            url: 'display_rating.php',
            data: { rated_user: rated_user },
            success: function (response) {
                // Handle success response
                $('#ratingdiv').html(response);
            }
        });
    }
    // Call rating() initially to display the rating on page load
    rating();

    $('#rating-form').on('submit', function (e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: 'insert_rating.php',
            data: formData,
            success: function (response) {
                rating();
                $('#ratingmodal').modal('hide');
            },
            error: function (xhr, status, error) {
                // Handle error
                console.error(error);
            }
        });
    });


    
});

    </script>

  </body>
</html>