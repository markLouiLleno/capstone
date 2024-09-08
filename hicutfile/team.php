
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="Chatbot/style.css">
    <title>Team</title>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="shortcut icon" type="x-icon"href="images/logoo.png">
  </head>
  <body>


    <div class="container-fluid p-0">
      <?php include 'navbar.php'; ?>
      <div class="container p-5">
        <h1 class="fw-bold text-success">Team</h1>
        <div class="row m-0">
          <div class="col-lg-3">
            <div class="card border-0 bg-light p-3">
              <div class="card-body">
                <img src="images/Jayvee-Ramos.jpg" width="100%">
                <p class="fs-5 text-center">Jayvee R. Ramos</p>
                <p class="text-center">Project Manager</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="card border-0 bg-light p-3">
              <div class="card-body">
                <img src="images/Justine-Rosel.jpg" width="100%">
                <p class="fs-5 text-center">Justin S. Rosel</p>
                <p class="text-center">Programmer</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="card border-0 bg-light p-3">
              <div class="card-body">
                <img src="images/Lea-Lopez.jpg" width="100%">
                <p class="fs-5 text-center">Lea Lopez</p>
                <p class="text-center">Quality Assurance</p>
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