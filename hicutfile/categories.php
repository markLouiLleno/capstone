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
    <!-- Include SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Categories</title>
  </head>
  <body>


    <div class="container-fluid p-0">
      <?php include 'navbar.php'; ?>
      <div class="container-fluid m-0 position-relative " style="min-height: 86vh;">
      		<div class="px-4 border-end h-100" style="position: fixed; left: 0; width: 250px;">
      			<div class="d-flex align-items-center gap-3 mt-3">
      				<img src="images/profile.png" width="40">
      				<span><?php echo $_SESSION['userdata']['first_name'] . " " . $_SESSION['userdata']['last_name']?></span>
      			</div>
      			<hr>
      			<ul class="navbar-nav gap-3">
      				<li class="nav-item">
      					<a class="nav-link" href="categories.php?profession=Photography">Photography</a>
      				</li>
      				<li class="nav-item">
      					<a class="nav-link" href="categories.php?profession=Videography">Videography</a>
      				</li>
      				<li class="nav-item">
      					<a class="nav-link" href="categories.php?profession=Video Editor">Video Editor</a>
      				</li>
      				<li class="nav-item">
      					<a class="nav-link" href="categories.php?profession=Audio Editor">Audio Editor</a>
      				</li>
      				<li class="nav-item">
      					<a class="nav-link" href="categories.php?profession=Film maker">Film maker</a>
      				</li>
      				<li class="nav-item">
      					<a class="nav-link" href="categories.php?profession=Digital Arts">Digital Arts</a>
      				</li>
      				<li class="nav-item">
      					<a class="nav-link" href="categories.php?profession=Graphic Designer">Graphic Designer</a>
      				</li>
      				<li class="nav-item">
      					<a class="nav-link" href="categories.php?profession=Logo Designer">Logo Designer</a>
      				</li>
      			</ul>
      			<hr>
      			<div class="d-flex align-items-center gap-3">
      				<span>Follow us:</span>
      				<div class="fs-3 gap-2 d-flex" role="button">
      					<a href="#" class="nav-link">
      						<i class="fab fa-facebook-square text-primary"></i>
      					</a>
      					<a href="#" class="nav-link">
      						<i class="fab fa-instagram text-danger"></i>
      					</a>
      					<a href="#" class="nav-link">
      						<i class="fab fa-twitter-square text-dark"></i>
      					</a>
      				</div>
      			</div>
      		</div>
      		<div style="position: absolute; left: 250px; right: 0; width: calc(100% - 250px);">
      			<div class="p-4">
      				<h1>
                <?php if (isset($_GET['profession'])) { echo $_GET['profession']; } ?>
              </h1>
      				<div class="row m-0 row-gap-4">
      					<?php    
                      if (isset($_GET['profession'])) {
                        $profession = $_GET['profession'];
                        // Prepare the SQL query
                        $sql = "SELECT * FROM freelance_post fp INNER JOIN users u ON u.id = fp.user_id WHERE categories = ? ";
                        $stmt = $db->prepare($sql);
                        $stmt->bind_param('s', $profession);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        if ($result->num_rows > 0) {
                      // Fetch the results as an associative array
                            while ($row = $result->fetch_assoc()) {
                ?>
            	      					<div class="col-12 col-lg-4">
            		      					<div class="card imagesBtn" data-images="<?php echo $row['freelance_id']; ?>" data-bs-target="#viewmodal" data-bs-toggle="modal" role="button">
                                  <?php 
                                      $freelance_id = $row['freelance_id'];
                                      $sql2 = "SELECT * FROM images_list WHERE freelance_id = ? ";
                                      $stmt2 = $db->prepare($sql2);
                                      $stmt2->bind_param('s', $freelance_id);
                                      $stmt2->execute();
                                      $result2 = $stmt2->get_result();
                                      $row2 = $result2->fetch_assoc();
                                  ?>
                								  <img src="<?php echo $row2['freelance_images'];?>" class="object-fit-cover card-img-top" height="250" style="width: 100%;" alt="...">
                								  <div class="card-body">
                								    <h5 class="card-title">
                								    	<img src="images/profile.png" width="40" class="rounded-circle">
                					      				<span><?php echo $row['first_name']. " " . $row['last_name'];?></span>
                					      			</h5>
                								    <p class="card-text"><?php echo $row['categories'];?></p>
                								  </div>
                								</div>
              							  </div>
        				<?php     
                            }
                        }else{
                ?>
                              <h4 class="text-secondary mt-5">No Post</h4>
                <?php
                        }
                      }else{
                        // Prepare the SQL query
                        $sql = "SELECT * FROM freelance_post fp INNER JOIN users u ON u.id = fp.user_id ";
                        $stmt = $db->prepare($sql);
                        $stmt->execute();
                        $result = $stmt->get_result();

                      // Fetch the results as an associative array
                        while ($row = $result->fetch_assoc()) {
                ?>
                              <div class="col-12 col-lg-4">
                                <div class="card imagesBtn" data-images="<?php echo $row['freelance_id']; ?>" data-bs-target="#viewmodal" data-bs-toggle="modal" role="button">
                                  <?php 
                                      $freelance_id = $row['freelance_id'];
                                      $sql2 = "SELECT * FROM images_list WHERE freelance_id = ? ";
                                      $stmt2 = $db->prepare($sql2);
                                      $stmt2->bind_param('s', $freelance_id);
                                      $stmt2->execute();
                                      $result2 = $stmt2->get_result();
                                      $row2 = $result2->fetch_assoc();
                                  ?>
                                  <img src="<?php echo $row2['freelance_images'];?>" class="object-fit-cover card-img-top" height="250" style="width: 100%;" alt="...">
                                  <div class="card-body">
                                    <h5 class="card-title">
                                      <img src="images/profile.png" width="40" class="rounded-circle">
                                        <span><?php echo $row['first_name']. " " . $row['last_name'];?></span>
                                      </h5>
                                    <p class="card-text"><?php echo $row['categories'];?></p>
                                  </div>
                                </div>
                              </div>
                <?php
                        }
                      }
                ?>
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

    $(document).ready(function() {
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
    });

    </script>
  </body>
</html>