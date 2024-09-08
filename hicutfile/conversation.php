<?php include 'assets/php/functions.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="Chatbot/style.css">
    <style>
      .messagebox:hover{
        background-color: #f2f2f2;
      }
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
    <title>Messages</title>
  </head>
  <body>


    <div class="container-fluid p-0">
      <?php include 'navbar.php'; ?>
      <div class="container-fluid m-0 position-relative " style="min-height: 86vh;">
      		<div class="px-4 border-end h-100" style="position: fixed; left: 0; width: 400px;">
      			<div class="my-3">
      				<h1 class="text-center fw-bold">Messages</h1>
              <div class="input-group mb-3">
                <span class="input-group-text">
                  <i class="fas fa-search"></i>
                </span>
                <input type="text" class="form-control" id="searchUser" placeholder="Search user conversation">
                <span class="input-group-text" role="button">
                  <i class="fas fa-times"></i>
                </span>
              </div>
      			</div>
      			<ul class="navbar-nav row-gap-1 border border-secondary-subtle rounded py-2" style="min-width: 20px;" id="Conversation">
              
              
      			</ul>
      		</div>
      		<div class="d-flex align-items-center justify-content-center h-100" style="position: absolute; left: 400px; right: 0; width: calc(100% - 400px);">

            <div class="col-12 col-lg-6 d-flex flex-column justify-content-end h-100">
              <?php 
                  if (!isset($_GET['receiver_id'])) { 
              ?>
              <div  class="col-12 h-100 d-flex flex-column align-items-center justify-content-center">
                <img src="images/feedback-for-website-.png" height="250" width="auto">
                <strong class="fs-1">Welcome to HiCut</strong>
                <p>Once you connect with a freelancer, you can chat and collaborate easily.</p>
              </div>
              <?php 
                  }else{
              ?>
              <div class="col-12 d-flex pt-5 flex-column align-items-center justify-content-center position-relative" style="max-height: 95%; overflow-y: auto;">
                <div id="displayMessagess" class="mt-auto d-flex flex-column row-gap-1 p-2 col-12" style="max-height: 100%; overflow-y: auto;">
                  <!-- display message -->
                  
                </div>
              </div>
              <div class=" col-12">
                <form id="sentmessageForm">
                  <input type="text" name="sender_id" value="<?php echo $_SESSION['userdata']['id']; ?>" hidden>
                  <input type="text" name="receiver_id" id="receiver_id" value="<?php echo $_GET['receiver_id']; ?>" hidden>
                  <div class="input-group mb-3">
                    <input type="text" name="messages" class="form-control form-control-lg" placeholder="Send a message...">
                    <button type="submit" role="button" class="input-group-text">
                      <i class="p-0 text-success fas fa-paper-plane h3"></i>
                    </button>
                  </div>
                </form>
              </div>
              <?php 
                  }
              ?>
            </div>
      		</div>
      </div>
    </div>


    <?php include 'chatbot.php'; ?>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script type="text/javascript">

    $(document).ready(function() {
      $('#searchUser').on('keyup', function (e) {
        e.preventDefault();
        var value = $(this).val();
           $.ajax({
              type: 'POST',
              url: 'controller/search_conversation.php',
              data: {value: value},
              success: function(output) {
              $('#Conversation').html(output);
              }
          });
      });

    function searchConvo() {
        var receiver_id = $('#receiver_id').val();
        $.ajax({
            type: 'POST',
            url: 'controller/search_conversation.php',
            success: function(output) {
                $('#Conversation').html(output);
            }
        });
    }
    searchConvo();

      $('#sentmessageForm').submit(function (e) {
        e.preventDefault();

           $.ajax({
              type: 'POST',
              url: 'controller/sent_messages.php',
              data: $(this).serialize(),
              dataType: 'json',
              success: function(output) {
               $('#sentmessageForm')[0].reset();
              }
          });
      });

    function displayMessages() {
        var receiver_id = $('#receiver_id').val();
        $.ajax({
            type: 'POST',
            url: 'controller/display_messages.php',
            data: { receiver_id: receiver_id },
            success: function(output) {
                $('#displayMessagess').html(output);
            }
        });
    }
    displayMessages();

    setInterval(displayMessages, 500);

    });

    </script>
  </body>
</html>