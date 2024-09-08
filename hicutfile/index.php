<?php session_start(); ?>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Hicut-Landpages</title>
    <link rel="shortcut icon" type="x-icon"href="images/logoo.png">
  </head>
  <body>

 <?php include 'navbar.php'; ?>
    <div class="container-fluid homebg p-0">
     
      <div class="homebgtext">
        <h1 class="fw-bold">
          Visual Stories,<br>Crafted with Passion
        </h1>
        <p class="fs-5" style="letter-spacing: 2px;">Step into the realm of freelancing, where passiong meets opportunity. Embrace the freedom to shape yout own path and unleash your full potential</p>
        <div class="py-4 px-5">
          
        </div>
      </div>
      
    </div>
    <div class="d-flex align-items-center" style="height: 86vh;">
        <div class="container mx-auto d-flex justify-content-center row ">
          <div class="col-4">
            <h1 class="fw-bold" style="color: #009682;">Freelancers</h1>
            <ul style="list-style: none; line-height: 40px; font-size: 20px;">
              <li>Photographer</li>
              <li>Videographer</li>
              <li>Video Editor</li>
              <li>Audio Editor</li>
              <li>Film maker</li>
              <li>Digital Arts</li>
              <li>Graphic Designer</li>
              <li>Logo Designer</li>
            </ul>
          </div>
          <div class="col-6 row gap-1">
            <div class="col-3 p-0" style="width: 300px; height: 300px;">
              <img src="images/lance3.jpg" class="w-100 h-100">
            </div>
            <div class="col-3 p-0" style="width: 300px; height: 300px;">
              <img src="images/img2.png" class="w-100 h-100">
            </div>
            <div class="col-3 p-0" style="width: 300px; height: 300px;">
              <img src="images/lance2.jpg" class="w-100 h-100">
            </div>
            <div class="col-3 p-0" style="width: 300px; height: 300px;">
              <img src="images/vidd.jpg" class="w-100 h-100">
            </div>
          </div>
        </div>
      </div>


    <?php include 'chatbot.php'; ?>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>