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
    <title>Works</title>
    <link rel="shortcut icon" type="x-icon"href="images/logoo.png">
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
                  <?php if ($_SESSION['userdata']['user_role'] === 'Freelancer') {?>
                  <li class="nav-item">
                    <a class="active nav-link fs-5" href="works.php?user_id=<?php echo $_SESSION['userdata']['id'];?>">Works</a>
                  </li>
                  <?php }else {?>
                   <li class="nav-item">
                    <a class="active nav-link fs-5" href="works.php?user_id=<?php echo $_GET['user_id'];?>">Works</a>
                  </li>
                  <?php }?>
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
                <h1 class="fw-bold text-dark">Works</h1>
                <div class="row m-0 row-gap-2">
                  <?php
                        $current_user_id = $_GET['user_id'];
                        // Prepare the SQL query
                        $sql = "SELECT * FROM freelance_post 
                                INNER JOIN images_list AS il ON il.freelance_id = freelance_post.freelance_id
                                INNER JOIN users AS users ON users.id = freelance_post.user_id 
                                WHERE freelance_post.user_id = ?";

                        $stmt = $db->prepare($sql);

                        // Bind the parameter
                        $stmt->bind_param('i', $current_user_id);

                        // Execute the query
                        $stmt->execute();

                        // Get the result set
                        $result = $stmt->get_result();

                        // Fetch the results as an associative array
                        while ($row = $result->fetch_assoc()) {
                        ?>

                  <div class="col-auto text-center">
                    <?php
                    $file_extension = pathinfo($row['freelance_images'], PATHINFO_EXTENSION);

                    // Check if the content is an image
                    if (in_array($file_extension, array('jpg', 'jpeg', 'png', 'gif'))) {
                        // Display the image
                        echo '<img src="' . $row['freelance_images'] . '" width="300" height="200" alt="Image">';
                    }
                    // Check if the content is a video
                    elseif (in_array($file_extension, array('mp4', 'webm', 'ogg'))) {
                        // Display the video
                        echo '
                        <video width="300" height="200" controls>
                            <source src="' . $row['freelance_images'] . '" type="video/mp4">
                            <source src="' . $row['freelance_images'] . '" type="video/webm">
                            <source src="' . $row['freelance_images'] . '" type="video/ogg">
                            Your browser does not support the video tag.
                        </video>';
                    }
                    ?>


                  </div>
                         <?php
                            }
                            $stmt->close();
                            $db->close();
                            ?>
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
  </body>
</html>