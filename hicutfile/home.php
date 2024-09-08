<?php include 'assets/php/functions.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="Chatbot/style.css">
    <link rel="shortcut icon" type="x-icon"href="images/logoo.png">
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
    <title>Home</title>
  </head>
  <body>


    <div class="container-fluid p-0">
      <?php include 'navbar.php'; ?>
      <div class="container-fluid row m-0 p-5 gap-5">
      		<div class="col-12 col-lg-7">
      			<div class="container ">
                    <?php if ($_SESSION['userdata']['user_role'] !== 'Client') { ?>
                    <div class="ms-auto col-11 mb-3">
                        <button class="btn btn-success rounded-5 border-dark" data-bs-target="#createpostmodal" data-bs-toggle="modal">Add Post</button>
                    </div>
      				<?php
                    }
                        $current_user_id = $_SESSION['userdata']['id'];
                        // Prepare the SQL query
                        $sql = "SELECT *, users.id as user_id, freelance_post.categories as fc 
                                FROM freelance_post 
                                INNER JOIN images_list AS il ON il.freelance_id = freelance_post.freelance_id
                                INNER JOIN users AS users ON users.id = freelance_post.user_id
                                GROUP BY freelance_post.freelance_id ORDER BY freelance_post.freelance_id DESC";

                        $stmt = $db->prepare($sql);

                        // Bind the parameter
                        // $stmt->bind_param('i', $current_user_id);

                        // Execute the query
                        $stmt->execute();

                        // Get the result set
                        $result = $stmt->get_result();

                        // Fetch the results as an associative array
                        while ($row = $result->fetch_assoc()) {
                        ?>
                                <div class="card rounded-0 border-dark ms-auto col-11 mt-2">
                                    <div class="card-body py-2 px-4">
                                        <!-- top -->
                                        <div class="d-flex my-2">
                                            <div>
                                                <a class=" text-reset text-decoration-none d-flex align-items-center column-gap-2" href="works.php?user_id=<?php echo $row['user_id'];?>">
                                                    <div>
                                                        <img src="images/profile.png" width="40">
                                                    </div>
                                                    <div>
                                                        <span class="fw-bold"><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></span>
                                                        <div class="d-block form-text m-0">
                                                            <?php  
                                                            $datetime = $row['time_post']; 
                                                            $formatted = date("F j, i - h:i A", strtotime($datetime));
                                                            echo $formatted;
                                                            ?>
                                                        </div>
                                                    </div>
                                                   
                                                </a>

                                            </div>
                                            <div class="dropdown dropstart ms-auto">
                                                <div role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-h fs-3"></i>
                                                </div>
                                              <ul class="dropdown-menu">
                                                <li>
                                                    <a class="imagesBtn dropdown-item d-flex align-items-center gap-1" data-images="<?php echo $row['freelance_id']; ?>" href="#" data-bs-target="#viewmodal" data-bs-toggle="modal"><i class="far fa-eye"></i> View All Images</a>
                                                </li>
                                                <li>
                                                    <a href="conversation.php?receiver_id=<?php echo $row['id']; ?>" class="dropdown-item d-flex align-items-center gap-1"><i class="far fa-comment-dots"></i> Messages </a>
                                                </li>
                                              </ul>
                                            </div>
                                            
                                        </div>
                                        <!-- mid -->
                                        <div class="my-2">
                                            <div class="d-flex align-items-center column-gap-2 my-2">
                                                <p class="m-0"><?php echo $row['caption']; ?></p>
                                                <small>(<?php echo $row['fc'];?>)</small>
                                            </div>
                                            <div class="px-4 row m-0">
                                                <?php
                                                $freelance_id = $row['freelance_id'];
                                                // Prepare the SQL query
                                                $sql_inner = "SELECT * FROM images_list 
                                                            WHERE freelance_id = ?
                                                            LIMIT 1";

                                                $stmt_inner = $db->prepare($sql_inner);

                                                // Bind the parameter
                                                $stmt_inner->bind_param('i', $freelance_id);

                                                // Execute the query
                                                $stmt_inner->execute();

                                                // Get the result set
                                                $result_inner = $stmt_inner->get_result();

                                                // Fetch the results as an associative array
                                                while ($rowss = $result_inner->fetch_assoc()) {
                                                ?>
                                                    <div class="col px-0 border border-start-1 border-dark">
                                                        <?php
                                                    // Assuming $rowss['freelance_images'] contains the path to either an image or a video file

                                                    // Check if the content is an image
                                                    if (strpos($rowss['freelance_images'], '.jpg') !== false || strpos($rowss['freelance_images'], '.jpeg') !== false || strpos($rowss['freelance_images'], '.png') !== false || strpos($rowss['freelance_images'], '.gif') !== false) {
                                                        // Display the image
                                                        echo '<img src="' . $rowss['freelance_images'] . '" width="100%" height="350">';
                                                    }
                                                    // Check if the content is a video
                                                    elseif (strpos($rowss['freelance_images'], '.mp4') !== false || strpos($rowss['freelance_images'], '.webm') !== false || strpos($rowss['freelance_images'], '.ogg') !== false) {
                                                        // Display the video
                                                        echo '
                                                        <video width="350" height="300" controls>
                                                            <source src="' . $rowss['freelance_images'] . '" type="video/mp4">
                                                            <source src="' . $rowss['freelance_images'] . '" type="video/webm">
                                                            <source src="' . $rowss['freelance_images'] . '" type="video/ogg">
                                                            Your browser does not support the video tag.
                                                        </video>';
                                                    }
                                                    ?>

                                                    </div>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <!-- bottom -->
                                        <div class="my-3 d-flex align-items-center column-gap-2">
                                          <?php
                                            // Fetch the initial like count
                                            $sql_inner = "SELECT COUNT(post_id) as total FROM likes WHERE post_id = ?";
                                            $stmt_inner = $db->prepare($sql_inner);
                                            $stmt_inner->bind_param('i', $freelance_id);
                                            $stmt_inner->execute();
                                            $result_inner = $stmt_inner->get_result();
                                            $rowss = $result_inner->fetch_assoc();
                                            $total_likes = $rowss['total'];
                                            $stmt_inner->close();
                                            ?>

                                            <!-- Wrap the like count display in a container with a unique identifier -->
                                            <div id="like_count_<?php echo $freelance_id; ?>">
                                                <div role="button" class="me-2 heart" 
                                                data-post_id="<?php echo $freelance_id; ?>" data-user_id="<?php echo $_SESSION['userdata']['id']; ?>"
                                                data-to_user_id="<?php echo $row['user_id']; ?>">
                                                    <i class="fa fa-heart <?php if ($total_likes > 0) echo 'text-danger'; ?>"></i>
                                                    <span id="heart_output"><?php echo $total_likes; ?> Likes</span>
                                                </div>
                                            </div>
                                            <?php
                                            // Fetch the initial like count
                                            $sql_inner = "SELECT COUNT(user_id) as totals FROM comments WHERE post_id = ?";
                                            $stmt_inner2 = $db->prepare($sql_inner);
                                            $stmt_inner2->bind_param('i', $freelance_id);
                                            $stmt_inner2->execute();
                                            $result_inner = $stmt_inner2->get_result();
                                            $rowss = $result_inner->fetch_assoc();
                                            $total_comms = $rowss['totals'];
                                            $stmt_inner2->close();
                                            ?>
                                            <div role="button" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#commentmodal" 
                                            class="me-2 comment" 
                                            data-post_id="<?php echo $row['freelance_id']; ?>" data-to_user_id="<?php echo $row['user_id']; ?>"
                                            data-comment="<?php echo $row['caption']; ?>" 
                                            data-user_id="<?php echo $_SESSION['userdata']['id']; ?>">
                                                <i class="far fa-comment-alt"></i>
                                                <span><?php echo $total_comms; ?> comments</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>

				</div>
			</div>

					<div class="col-12 col-lg-3 d-flex flex-column gap-3"><?php
                        if ($db) {
                            $sql = "SELECT u.id, u.username, u.first_name, u.last_name, SUM(r.rating) as total_rating 
                                    FROM ratings AS r 
                                    INNER JOIN users AS u ON u.id = r.rated_user 
                                    WHERE profession = 'videographer'
                                    GROUP BY u.id 
                                    ORDER BY total_rating DESC 
                                    LIMIT 4";
                            // Prepare and execute the statement
                            $stmt = $db->prepare($sql);
                            $stmt->execute();

                            // Fetch the result set
                            $result = $stmt->get_result();

                            // Check if there are rows in the result set
                            if ($result->num_rows > 0) {?>

						<div class="card rounded-5 border-dark">
							<div class="card-body py-2 px-4">
								<p>Top Videographer</p>
								<ul class="navbar-nav d-flex flex-column gap-2">
                                   <?php
                                                $count = 1; // Counter for crown display
                                                while ($row = $result->fetch_assoc()) {
                                                    ?>
                                                    <li>
                                                        <i class="<?php echo $count == 1 ? 'fas fa-crown text-warning ms-auto fs-5 me-2' : 'fa fa-user ms-auto fs-5 me-2 border border-dark rounded-circle p-1'; ?>"></i>
                                                        <span><?php echo $row['first_name'] . " " . $row['last_name']; ?></span>
                                                    </li>
                                                    <?php
                                                    $count++; // Increment the counter
                                                }

                                    ?>

								</ul>
							</div>
						</div>
                        <?php
                            }
                        } 
                        if ($db) {
                            $sql = "SELECT u.id, u.username, u.first_name, u.last_name, SUM(r.rating) as total_rating 
                                    FROM ratings AS r 
                                    INNER JOIN users AS u ON u.id = r.rated_user 
                                    WHERE profession = 'Logo Designer'
                                    GROUP BY u.id 
                                    ORDER BY total_rating DESC 
                                    LIMIT 4";
                            // Prepare and execute the statement
                            $stmt = $db->prepare($sql);
                            $stmt->execute();

                            // Fetch the result set
                            $result = $stmt->get_result();

                            // Check if there are rows in the result set
                            if ($result->num_rows > 0) {?>

                        <div class="card rounded-5 border-dark">
                            <div class="card-body py-2 px-4">
                                <p>Top Logo Designer</p>
                                <ul class="navbar-nav d-flex flex-column gap-2">
                                   <?php
                                        
                                                $count = 1; // Counter for crown display
                                                while ($row = $result->fetch_assoc()) {
                                                    ?>
                                                    <li>
                                                        <i class="<?php echo $count == 1 ? 'fas fa-crown text-warning ms-auto fs-5 me-2' : 'fa fa-user ms-auto fs-5 me-2 border border-dark rounded-circle p-1'; ?>"></i>
                                                        <span><?php echo $row['first_name'] . " " . $row['last_name']; ?></span>
                                                    </li>
                                                    <?php
                                                    $count++; // Increment the counter
                                                }
                                    ?>

                                </ul>
                            </div>
                        </div>
                        <?php
                            }
                        } 
                        if ($db) {
                            $sql = "SELECT u.id, u.username, u.first_name, u.last_name, SUM(r.rating) as total_rating 
                                    FROM ratings AS r 
                                    INNER JOIN users AS u ON u.id = r.rated_user 
                                    WHERE profession = 'Photography'
                                    GROUP BY u.id 
                                    ORDER BY total_rating DESC 
                                    LIMIT 4";
                            // Prepare and execute the statement
                            $stmt = $db->prepare($sql);
                            $stmt->execute();

                            // Fetch the result set
                            $result = $stmt->get_result();

                            // Check if there are rows in the result set
                            if ($result->num_rows > 0) {?>
                        <div class="card rounded-5 border-dark">
                            <div class="card-body py-2 px-4">
                                <p>Top Photography</p>
                                <ul class="navbar-nav d-flex flex-column gap-2">
                                   <?php
                                                $count = 1; // Counter for crown display
                                                while ($row = $result->fetch_assoc()) {
                                                    ?>
                                                    <li>
                                                        <i class="<?php echo $count == 1 ? 'fas fa-crown text-warning ms-auto fs-5 me-2' : 'fa fa-user ms-auto fs-5 me-2 border border-dark rounded-circle p-1'; ?>"></i>
                                                        <span><?php echo $row['first_name'] . " " . $row['last_name']; ?></span>
                                                    </li>
                                                    <?php
                                                    $count++; // Increment the counter
                                                }
                                          
                                    ?>

                                </ul>
                            </div>
                        </div>
                        <?php
                            }
                        } 
                        if ($db) {
                            $sql = "SELECT u.id, u.username, u.first_name, u.last_name, SUM(r.rating) as total_rating 
                                    FROM ratings AS r 
                                    INNER JOIN users AS u ON u.id = r.rated_user 
                                    WHERE profession = 'Video Editor'
                                    GROUP BY u.id 
                                    ORDER BY total_rating DESC 
                                    LIMIT 4";
                            // Prepare and execute the statement
                            $stmt = $db->prepare($sql);
                            $stmt->execute();

                            // Fetch the result set
                            $result = $stmt->get_result();

                            // Check if there are rows in the result set
                            if ($result->num_rows > 0) {?>
                        <div class="card rounded-5 border-dark">
                            <div class="card-body py-2 px-4">
                                <p>Top Video Editor</p>
                                <ul class="navbar-nav d-flex flex-column gap-2">
                                   <?php
                                                $count = 1; // Counter for crown display
                                                while ($row = $result->fetch_assoc()) {
                                                    ?>
                                                    <li>
                                                        <i class="<?php echo $count == 1 ? 'fas fa-crown text-warning ms-auto fs-5 me-2' : 'fa fa-user ms-auto fs-5 me-2 border border-dark rounded-circle p-1'; ?>"></i>
                                                        <span><?php echo $row['first_name'] . " " . $row['last_name']; ?></span>
                                                    </li>
                                                    <?php
                                                    $count++; // Increment the counter
                                                }
                                          
                                    ?>

                                </ul>
                            </div>
                        </div>
                        <?php
                            }
                        } 
                        if ($db) {
                            $sql = "SELECT u.id, u.username, u.first_name, u.last_name, SUM(r.rating) as total_rating 
                                    FROM ratings AS r 
                                    INNER JOIN users AS u ON u.id = r.rated_user 
                                    WHERE profession = 'Audio Editor'
                                    GROUP BY u.id 
                                    ORDER BY total_rating DESC 
                                    LIMIT 4";
                            // Prepare and execute the statement
                            $stmt = $db->prepare($sql);
                            $stmt->execute();

                            // Fetch the result set
                            $result = $stmt->get_result();

                            // Check if there are rows in the result set
                            if ($result->num_rows > 0) {?>
                        <div class="card rounded-5 border-dark">
                            <div class="card-body py-2 px-4">
                                <p>Top Audio Editor</p>
                                <ul class="navbar-nav d-flex flex-column gap-2">
                                   <?php
                                                $count = 1; // Counter for crown display
                                                while ($row = $result->fetch_assoc()) {
                                                    ?>
                                                    <li>
                                                        <i class="<?php echo $count == 1 ? 'fas fa-crown text-warning ms-auto fs-5 me-2' : 'fa fa-user ms-auto fs-5 me-2 border border-dark rounded-circle p-1'; ?>"></i>
                                                        <span><?php echo $row['first_name'] . " " . $row['last_name']; ?></span>
                                                    </li>
                                                    <?php
                                                    $count++; // Increment the counter
                                                }
                                          
                                    ?>

                                </ul>
                            </div>
                        </div>
                        <?php
                            }
                        } 
                        if ($db) {
                            $sql = "SELECT u.id, u.username, u.first_name, u.last_name, SUM(r.rating) as total_rating 
                                    FROM ratings AS r 
                                    INNER JOIN users AS u ON u.id = r.rated_user 
                                    WHERE profession = 'Film maker'
                                    GROUP BY u.id 
                                    ORDER BY total_rating DESC 
                                    LIMIT 4";
                            // Prepare and execute the statement
                            $stmt = $db->prepare($sql);
                            $stmt->execute();

                            // Fetch the result set
                            $result = $stmt->get_result();

                            // Check if there are rows in the result set
                            if ($result->num_rows > 0) {?>
                        <div class="card rounded-5 border-dark">
                            <div class="card-body py-2 px-4">
                                <p>Top Film Maker</p>
                                <ul class="navbar-nav d-flex flex-column gap-2">
                                   <?php
                                                $count = 1; // Counter for crown display
                                                while ($row = $result->fetch_assoc()) {
                                                    ?>
                                                    <li>
                                                        <i class="<?php echo $count == 1 ? 'fas fa-crown text-warning ms-auto fs-5 me-2' : 'fa fa-user ms-auto fs-5 me-2 border border-dark rounded-circle p-1'; ?>"></i>
                                                        <span><?php echo $row['first_name'] . " " . $row['last_name']; ?></span>
                                                    </li>
                                                    <?php
                                                    $count++; // Increment the counter
                                                }
                                          
                                    ?>

                                </ul>
                            </div>
                        </div>
                        <?php
                            }
                        } 
                        if ($db) {
                            $sql = "SELECT u.id, u.username, u.first_name, u.last_name, SUM(r.rating) as total_rating 
                                    FROM ratings AS r 
                                    INNER JOIN users AS u ON u.id = r.rated_user 
                                    WHERE profession = 'Digital Arts'
                                    GROUP BY u.id 
                                    ORDER BY total_rating DESC 
                                    LIMIT 4";
                            // Prepare and execute the statement
                            $stmt = $db->prepare($sql);
                            $stmt->execute();

                            // Fetch the result set
                            $result = $stmt->get_result();

                            // Check if there are rows in the result set
                            if ($result->num_rows > 0) {?>
                        <div class="card rounded-5 border-dark">
                            <div class="card-body py-2 px-4">
                                <p>Top Digital Arts</p>
                                <ul class="navbar-nav d-flex flex-column gap-2">
                                   <?php
                                                $count = 1; // Counter for crown display
                                                while ($row = $result->fetch_assoc()) {
                                                    ?>
                                                    <li>
                                                        <i class="<?php echo $count == 1 ? 'fas fa-crown text-warning ms-auto fs-5 me-2' : 'fa fa-user ms-auto fs-5 me-2 border border-dark rounded-circle p-1'; ?>"></i>
                                                        <span><?php echo $row['first_name'] . " " . $row['last_name']; ?></span>
                                                    </li>
                                                    <?php
                                                    $count++; // Increment the counter
                                                }
                                          
                                    ?>

                                </ul>
                            </div>
                        </div>
                        <?php
                            }
                        } 
                        if ($db) {
                            $sql = "SELECT u.id, u.username, u.first_name, u.last_name, SUM(r.rating) as total_rating 
                                    FROM ratings AS r 
                                    INNER JOIN users AS u ON u.id = r.rated_user 
                                    WHERE profession = 'Graphic Designer'
                                    GROUP BY u.id 
                                    ORDER BY total_rating DESC 
                                    LIMIT 4";
                            // Prepare and execute the statement
                            $stmt = $db->prepare($sql);
                            $stmt->execute();

                            // Fetch the result set
                            $result = $stmt->get_result();

                            // Check if there are rows in the result set
                            if ($result->num_rows > 0) {?>
                        <div class="card rounded-5 border-dark">
                            <div class="card-body py-2 px-4">
                                <p>Top Graphic Designer</p>
                                <ul class="navbar-nav d-flex flex-column gap-2">
                                   <?php
                                                $count = 1; // Counter for crown display
                                                while ($row = $result->fetch_assoc()) {
                                                    ?>
                                                    <li>
                                                        <i class="<?php echo $count == 1 ? 'fas fa-crown text-warning ms-auto fs-5 me-2' : 'fa fa-user ms-auto fs-5 me-2 border border-dark rounded-circle p-1'; ?>"></i>
                                                        <span><?php echo $row['first_name'] . " " . $row['last_name']; ?></span>
                                                    </li>
                                                    <?php
                                                    $count++; // Increment the counter
                                                }
                                          
                                    ?>

                                </ul>
                            </div>
                        </div>
                        <?php
                          }
                        } ?>

                    </div>
      </div>
    </div>
<!-- Create Post Modal -->
<div class="modal fade" id="createpostmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content shadow">
      <div class="modal-body d-flex flex-column gap-1 p-4">
        <span role="button" data-bs-dismiss="modal" class="ms-auto">
            <i class="fa fa-close fs-4"></i>
        </span>
        <h4 class="text-center">Create post</h4>
        <div class="mb-3">
            <img src="images/profile.png" width="40">
            <span>Name</span>
        </div>
        <form id="post_form" enctype="multipart/form-data">
            <textarea class="form-control mb-3" name="caption" placeholder="caption"></textarea>
            <select class="form-select form-select-sm mb-3" name="categories">
                <option hidden value="">Select Categories</option>
                <option value="Photography">Photography</option>
                <option value="Videography">Videography</option>
                <option value="Video Editor">Video Editor</option>
                <option value="Audio Editor">Audio Editor</option>
                <option value="Film maker">Film maker</option>
                <option value="Digital Arts">Digital Arts</option>
                <option value="Graphic Designer">Graphic Designer</option>
                <option value="Logo Designer">Logo Designer</option>
            </select>
            <div class="mb-3">
                <input type="file" name="images[]" class="form-control" multiple>
                <div class="form-text">Add Images</div>
            </div>
            <div class="d-flex">
                <button type="submit" class="ms-auto py-1 px-3 btn btn-success rounded-5 border-dark">Post</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Comment Modal -->
<div class="modal fade" id="commentmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content shadow">
      <div class="modal-body d-flex flex-column gap-1 p-4">
        <div class="d-flex pb-3">
            <h5>Comment on post: <span id="textcomment"></span></h5>
            <span role="button" data-bs-dismiss="modal" class="ms-auto">
                <i class="fa fa-close fs-4"></i>
            </span>
        </div>
        <div class="mb-3">
            <img src="images/profile.png" width="40">
            <span><?php echo $_SESSION['userdata']['first_name'] . " " . $_SESSION['userdata']['last_name']?></span>
        </div>
        <form id="comment_form">
            <input type="text" name="post_id" id="post_id" hidden >
            <input type="text" name="user_id" id="user_id" hidden >
            <input type="text" name="to_user_id" id="to_user_id" hidden >
            <textarea class="form-control mb-3" name="comment" id="commenttextarea" placeholder="comment here"></textarea>
            <div class="d-flex">
                <button type="submit" class="ms-auto py-1 px-3 btn btn-success rounded-5 border-dark">Comment</button>
            </div>
        </form>
        <hr>
        <div>All Comments:</div>
        <div class="d-flex flex-column row-gap-2 overflow-auto" id="comment_list" style="max-height: 30em;">
            <!-- display the comment here -->
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


    	
        $('#post_form').submit(function (e) {
            e.preventDefault();
            var postData = new FormData(this);

            $.ajax({
                url: 'post.php',
                type: 'post',
                data: postData,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function(output) {
                    $('#post_form')[0].reset();
                    $('#createpostmodal').modal('hide');
                    
                    if (output.status === 'success') {
                        Swal.fire({
                            position: "top-center",
                            icon: "success",
                            title: "Post Successfully!",
                            showConfirmButton: true
                        });
                    }
                }
            });

        });

$(document).ready(function() {

    $('#comment_form').submit(function (e) {
        e.preventDefault();

        // Get the post_id value from your form
        var post_id = $('#post_id').val(); // Assuming your input field has an id of 'post_id'

        $.ajax({
            url: 'controller/insert_comment.php',
            type: 'post',
            data: $(this).serialize(),
            success: function(output) {
                $.ajax({
                    url: 'controller/display_comment.php',
                    type: 'POST',
                    data: { post_id: post_id }, // Pass the post_id value here
                    success: function(response) {
                        $('#comment_list').html(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        alert('Error occurred! Please try again.');
                    }
                });

                $('#commenttextarea').val("");
            }
        });

    });


    // $('.comment').click(function (e) {
    //     e.preventDefault();

    //     $('#post_id').val($(this).data('post_id'));
    //     $('#user_id').val($(this).data('user_id'));
    //     $('#textcomment').text($(this).data('comment'));

    
    // });
    $('.comment').click(function (e) {
        e.preventDefault();

        var post_id = $(this).data('post_id');
        $('#post_id').val(post_id);
        $('#user_id').val($(this).data('user_id'));
        $('#to_user_id').val($(this).data('to_user_id'));
        $('#textcomment').text($(this).data('comment'));

        $.ajax({
            url: 'controller/display_comment.php',
            type: 'POST',
            data: { post_id: post_id },
            success: function(output) {
                 $('#comment_list').html(output);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('Error occurred! Please try again.');
            }
        });
    });


});
$('.heart').click(function (e) {
    e.preventDefault();
    var $heartIcon = $(this).find('.fa-heart'); // Select the heart icon element
    var post_id = $(this).data('post_id');
    var user_id = $(this).data('user_id');
    var to_user_id = $(this).data('to_user_id');
    var $likeCount = $(this).find('#heart_output'); // Select the element displaying like count
    $.ajax({
        url: 'heart_controller.php',
        type: 'post',
        data: { post_id: post_id, user_id: user_id, to_user_id: to_user_id },
        dataType: 'json',
        success: function(output) {
            if (output.status === 'success') {
                // Update like count dynamically for like action
                var newCount = parseInt($likeCount.text()) + 1;
                $likeCount.text(newCount + ' Likes');
                $heartIcon.addClass('text-danger'); // Add class to heart icon to make it red
            } else if (output.status === 'success_unlike') {
                // Update like count dynamically for unlike action
                var newCount = parseInt($likeCount.text()) - 1;
                $likeCount.text(newCount + ' Likes');
                $heartIcon.removeClass('text-danger'); 
            }
        }
    });
});
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

// function output(){
//     $.ajax({
//         type: 'POST',
//         url: 'output.php',
//         dataType: 'json', // removed the semicolon at the end
//         success: function(output) {
//             $('#heart_output').text(output.total);
//         }
//     });
// }

// output();

    </script>
  </body>
</html>