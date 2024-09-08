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
  </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Fonts Link For Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0" />
    <script src="Chatbot/script.js" defer></script>
    <script src="assets/js/fontawesome.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <title>Save</title>
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
                        $user_id = $_GET['user_id'];
                        $sql = "SELECT * FROM users WHERE id = ?";
                        $stmt = $db->prepare($sql);
                        $stmt->bind_param('i', $user_id);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $row = $result->fetch_assoc();

                        if ($row['user_role'] === 'Freelancer') {
                   ?>
                   <li class="nav-item">
                    <a class="nav-link fs-5" href="works.php?user_id=<?php echo $_GET['user_id'];?>">Works</a>
                  </li>
                  <?php } ?>
                
                  <li class="nav-item">
                    <a class="active nav-link fs-5" href="save.php?user_id=<?php echo $_GET['user_id'];?>">Save</a>
                  </li>
                  <?php if($user_id === $_SESSION['userdata']['id']){?>
                  <li class="nav-item">
                    <a class="nav-link fs-5" href="security.php?user_id=<?php echo $_GET['user_id'];?>">Password & Security</a>
                  </li>
                  <?php }?>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-9">
            <div class="card border-0 bg-transparent p-3">
              <div class="card-body">
                <h1 class="fw-bold text-dark">Saved</h1>
               <?php
                // Assuming $db is your mysqli connection object and $user_id is already defined

                // Construct SQL query to fetch data from multiple tables
                $sql = "SELECT * FROM likes
                        INNER JOIN freelance_post f ON f.freelance_id = likes.post_id 
                        INNER JOIN users u ON u.id = likes.user_id 
                        WHERE likes.user_id = '$user_id' GROUP BY f.freelance_id";

                // Execute the query
                $result = mysqli_query($db, $sql);

                // Process the results in a loop
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <!-- Displaying data in HTML format -->
                    <div class="row border my-1 p-4">
                      <div class="dropdown dropstart d-flex">
                          <div class="ms-auto" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="fa fa-ellipsis-h fs-4"></i>
                          </div>
                        <ul class="dropdown-menu">
                          <li>
                              <a class="imagesBtn dropdown-item" data-images="<?php echo $row['freelance_id']; ?>" href="#" data-bs-target="#viewmodal" data-bs-toggle="modal">View All Images</a>
                          </li>
                        </ul>
                      </div>
                        <div class="col-lg-2 text-center">
                            <!-- Display the image -->
                            <?php
                            $freelance_id = $row['freelance_id'];
                            $sql2 = "SELECT * FROM images_list WHERE freelance_id = '$freelance_id' GROUP BY freelance_id";
                            $result2 = mysqli_query($db, $sql2);
                            $row2 = mysqli_fetch_assoc($result2);
                            if ($result2) {
                              
                            ?>
                            <img src="<?php echo $row2['freelance_images']; ?>" width="200">
                            <?php }?>
                        </div>

                        <div class="col-lg-4 px-5 d-flex flex-column justify-content-center">
                            <div>
                                <span class="me-2"><img src="images/profile.png" width="40"></span>
                                <span><?php echo $row['categories']; ?></span>
                            </div>
                            <div>
                                <p class="mb-0"><?php echo $row['caption'] ." | ".$row['categories']; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                } // End of the while loop
                ?>


              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

<!-- View All IMages Modal -->
<div class="modal modal-lg fade" id="viewmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content shadow">
      <div class="modal-body d-flex flex-column gap-1 p-4">
        <div class="d-flex pb-3">
            <span role="button" data-bs-dismiss="modal" class="ms-auto">
                <i class="fa fa-close fs-4"></i>
            </span>
        </div>
        <div class="d-flex flex-column row-gap-2 overflow-auto" id="viewImages" style="max-height: 30em;">
            <!-- display the comment here -->
        </div>
      </div>
    </div>
  </div>
</div>

    <?php include 'chatbot.php'; ?>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script type="text/javascript">
            $('.imagesBtn').click(function (e) {
          var freelance_id = $(this).data('images');

           $.ajax({
              type: 'POST',
              url: 'controller/display_images.php',
              data: {freelance_id: freelance_id},
              success: function(output) {
                  $('#viewImages').html(output);
              }
          });
      });
    </script>
  </body>
</html>