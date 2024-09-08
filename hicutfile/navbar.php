<style type="text/css">
    #Google:hover{
        background-color: #000 !important;
        color: white !important;
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="p-3 px-5 border-bottom border-2 border-dark bg-white position-sticky top-0" style="z-index: 100;">
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img src="images/HiCut_Logo.png" width="100px"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

          <?php if (isset($_SESSION['userdata']['id'])) { ?>

            <li class="nav-item">
              <a class="nav-link fs-5" href="home.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fs-5" href="categories.php">Categories</a>
            </li>
          <style>
            .nav-link {
  color: #000; /* Default text color */
  transition: background-color 0.3s ease; /* Smooth transition for hover effect */
}

.nav-link:hover {
  background-color: #f0f2f5; /* Light gray background color on hover (similar to Facebook) */
}

.nav-link.active {
  color: #000; /* Keep text color the same for active link */
  background-color: #e4e6eb; /* Light gray background color for active link (similar to Facebook) */
}

          </style>
            
          <?php } else { ?>

            <li class="nav-item">
              <a class="nav-link fs-5" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fs-5" href="about.php">About</a><title>About</title>
            </li>
            <li class="nav-item">
              <a class="nav-link fs-5" href="team.php">Team</a>
            </li>

          <?php } ?>

        </ul>

        <?php if (!isset($_SESSION['userdata']['id'])) { ?>
          <form class="d-flex" role="search">
            <a href="login.php"><button id="Google" class="btn btn-outline-dark bg-light me-1 px-3 py-2 text-dark fw-bold" type="button" style="border-radius: 20px;">Log in</button></a>
            <a href="login.php?type" class="btn btn-success ms-1 px-3 py-2 border-dark fw-bold" type="submit" style="border-radius: 20px;">Sign up</a>
          </form>
        <?php } else { ?>
         <div class="d-flex flex-column align-items-start flex-lg-row" role="search" style="place-items: center;">
            <div class="mb-3 mb-md-0 me-md-3 form-control border-2 border-dark d-flex" style="place-items: center; position: relative;">
                <i class="far fa-search"></i>
                <input type="text" id="search" class="w-100 h-200 border-0 px-3" placeholder="Search..." style="outline: none;">
                <div id="search-output" style="height: auto; width: 100%; position: absolute; top: 40px; left: 0">
                </div>
            </div>
            <div class="d-flex column-gap-2">
              <div class="dropstart mt-2 mx-1">
                <?php
                  // Assuming $db is your database connection object

                  if (isset($_SESSION['userdata']['id'])) {
                      $to_user_id = $_SESSION['userdata']['id'];
                      
                      // Count unread notifications
                      $sql_count_unread = "SELECT *, COUNT(read_status) AS unread_count FROM notifications WHERE to_user_id = ? AND read_status = 'unread'";
                      $stmt_count_unread = $db->prepare($sql_count_unread);
                      $stmt_count_unread->bind_param('i', $to_user_id);
                      $stmt_count_unread->execute();
                      $result_count_unread = $stmt_count_unread->get_result();
                      $unread_count = $result_count_unread->fetch_assoc();

                      // Fetch unread notifications
                      $sql_fetch_unread = "SELECT * FROM notifications WHERE to_user_id = ? ORDER BY id DESC";
                      $stmt_fetch_unread = $db->prepare($sql_fetch_unread);
                      $stmt_fetch_unread->bind_param('i', $to_user_id);
                      $stmt_fetch_unread->execute();
                      $result_fetch_unread = $stmt_fetch_unread->get_result();
                  ?>
                      <a href="#" class="position-relative" role="button" data-bs-toggle="dropdown" aria-expanded="false" id="read" data-to_user_id="<?php echo $unread_count['to_user_id']; ?>">
                          <i class="far fa-bell h4 text-dark"></i>
                          <span class="badge text-bg-warning rounded-circle position-absolute" style="top: -13px; right: -8px;"><?php echo $unread_count['unread_count']; ?></span>
                      </a>

                      <ul class="dropdown-menu overflow-y-auto" style="min-width:20em; max-height: 14em;">
                          <?php 
                          if ($stmt_fetch_unread) {
                            while ($row = $result_fetch_unread->fetch_assoc()) { ?>
                              <li class="<?php if ($row['read_status'] === 'unread') { echo "bg-danger-subtle"; }?>  mb-1">
                                <?php 
                                  if ($row['type'] === 'conversation') {
                                ?>
                                <a class="dropdown-item " href="conversation.php?receiver_id=<?php echo $row['from_user_id']; ?>"><?php echo $row['message']; ?></a>
                                <?php
                                  }else{
                                ?>
                                <a class="dropdown-item" href="#"><?php echo $row['message']; ?></a>
                                <?php
                                  }
                                ?>
                              </li>
                          <?php 
                            }
                          }else{
                          ?>
                            <li>
                                <a class="dropdown-item" href="#">No notification.</a>
                            </li>
                          <?php  
                          } ?>
                      </ul>
                  <?php
                  } else {
                      // Handle the case where the user ID is not set in the session
                      echo "User ID not found in session.";
                  }
                  ?>

                  </ul>
              </div>
              <a href="conversation.php" class="text-decoration-none mt-2 mx-1">
                  <i class="far fa-comment-dots h4 text-dark"></i>
              </a>
              <a href="myinfo.php?user_id=<?php echo $_SESSION['userdata']['id'];?>" class="text-decoration-none mt-2 mx-1">
                  <i class="far fa-user-circle h4 text-dark"></i>
              </a>
              <div class="dropstart mt-2 mx-1">
                  <a href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="far fa-cog h4 text-dark"></i>
                  </a>

                  <ul class="dropdown-menu">
                    <div class="d-flex flex-column align-items-center p-3" style="width: 14em;">
                      <div class="d-flex flex-column align-items-center mb-2">
                       <?php 
                        $stmt_select = $db->prepare("SELECT * FROM users WHERE id = ?");
                        $stmt_select->bind_param("i", $_SESSION['userdata']['id']);
                        $stmt_select->execute();
                        $result = $stmt_select->get_result(); // Get the result set
                        $user = $result->fetch_assoc(); // Fetch the row as an associative array
                        $stmt_select->close(); // Close the statement after fetching the result
                        ?>
                        <img src="upload/<?php echo ($user['profile_pic'] !== null) ? $user['profile_pic'] : 'profile.png'; ?>" width="100" height="100">
                        <p class="mb-0 mt-2"><?php echo $_SESSION['userdata']['first_name']." ".$_SESSION['userdata']['last_name'];?></p>
                        <b><?php echo $_SESSION['userdata']['user_role'];?></b>
                      </div>
                      <div>
                        <a class="btn btn-success d-flex align-items-center gap-1 h4" href="#editProfile" data-bs-toggle="modal">
                          <i class="far fa-cog"></i>Settings
                        </a>
                        <a class="btn btn-success d-flex align-items-center gap-1 h4" href="logout.php">
                          <i class="fas fa-sign-out-alt"></i>Logout
                        </a>
                      </div>
                    </div>
                  </ul>
              </div>
            </div>
        </div>
        <?php } ?>
      </div>

    </div>
  </nav>
</div>

<!-- Edit Profile Modal -->
<div class="modal fade" id="editProfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content shadow">
      <div class="modal-body d-flex flex-column gap-1 p-4">
        <div class="d-flex mb-3">
          <h4>Edit Profile</h4>
          <span role="button" data-bs-dismiss="modal" class="ms-auto">
              <i class="fa fa-close fs-4"></i>
          </span>
        </div>
        <form id="changeProfile" enctype="multipart/form-data">
          <input type="text" name="user_id" value="<?php echo $_SESSION['userdata']['id'];?>" hidden>
          <div class="mb-3 d-flex align-items-center gap-3">
              <img src="upload/<?php echo $user['profile_pic'];?>" width="80" height="80">
              <div>
                <label class="form-label">Choose new profile photo</label>
                <input type="file" name="profile_img" class="form-control" accept="image/*">
              </div>
          </div>
          <div class="mb-3 form-group">
            <label class="form-label">Change User Name</label>
            <input type="text" name="username" class="form-control" placeholder="Input New Username">
          </div>
          <div class="mb-3 d-flex"> 
            <button class="btn btn-success ms-auto">Confirm</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<style>
  .navbar-nav .nav-link.active {
    color: #559682 !important;
  }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
    $('#changeProfile').on('submit', function (e) {
        e.preventDefault();

        // Create FormData object to handle file uploads
        var formData = new FormData($(this)[0]);

        $.ajax({
            type: 'POST',
            url: 'controller/change_profile.php',
            data: formData,
            dataType: 'json',
            contentType: false, // Important for sending image files
            processData: false, // Important for sending image files
            success: function (response) {
                if (response.status === "success") {
                  $('#editProfile').modal('hide');
                  Swal.fire({
                    title: "Profile updated successfully.",
                    icon: "success"
                  });
                  $('#changeProfile')[0].reset();
                }
            },
            error: function (xhr, status, error) {
                // Handle error
            }
        });
    });
    
    $('#read').on('click', function (e) {
        e.preventDefault();

        var to_user_id = $(this).data('to_user_id');
        $.ajax({
            type: 'POST',
            url: 'controller/update_notif.php',
            data: {to_user_id:to_user_id},
            success: function (response) {
            },
        });
    });
    $('#search').on('keyup', function (e) {
            e.preventDefault();
            var search_query = $(this).val();
            $.ajax({
                type: 'POST',
                url: 'controller/search.php',
                data: {search_query: search_query},
                success: function (response) {
                    $('#search-output').html(response);
                },
            });
        });
});
</script>