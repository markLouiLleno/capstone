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

      .homebg {
        height: 100vh;
        background-image: url(images/ff.png);
        background-position: center;
        background-size: cover;
      }

      .homebgtext {
        max-width: 500px;
        position: absolute;
        top: 50%;
        left: 200px;
        transform: translateY(-50%);
      }

      @media screen and (max-width: 991px) {
        .homebgtext {
          padding: 30px;
          max-width: unset;
          position: relative;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          text-align: center;
        }
      }

      @media screen and (max-width: 991px) {
        .chatbot {
          bottom: 10px;
          right: 10px;
          /* Adjust as necessary for smaller screens */
        }

        .chatbot-toggler {
          bottom: 70px;
          right: 10px;
        }
      }
    </style>
    <button class="chatbot-toggler">
      <span class="material-symbols-rounded">mode_comment</span>
      <span class="material-symbols-outlined">close</span>
    </button>
    <div class="chatbot">
      <header>
        <h2>HiCut Chatbot</h2>
        <span class="close-btn material-symbols-outlined">close</span>
      </header>

      <div class="quick-chat-options row mx-0">
        <!-- <button class="quick-chat-option" data-message="Greetings">Greetings</button>
  <button class="quick-chat-option" data-message="User Assistance">User Assistance</button>
  <button class="quick-chat-option" data-message="Faqs">Faqs</button> -->

        <button class="quick-chat-option col text-nowrap" data-message="Photography">Feature</button>
        <button class="quick-chat-option col text-nowrap" data-message="Videography">About</button>
        <button class="quick-chat-option col text-nowrap" data-message="Video Editor">Contact</button>
        <button class="quick-chat-option col text-nowrap" data-message="Audio Editor">Package</button>
        <button class="quick-chat-option col text-nowrap" data-message="Film maker">Book now</button>
        <button class="quick-chat-option col text-nowrap" data-message="Digital Arts">Digital Arts</button>
      </div>

      <ul class="chatbox">
        <li id="response-container" class="chat incoming">
          <img src="path_to_your_icon_image.png" alt="Chat Icon" style="width: 20px; height: 20px; margin-right: 10px;">
          <p>Hi, this is HiCut Chatbot!👋<br>What service are you looking for? You can choose Quick Chats!</p>
          <div class="textarea d-block"></div>
        </li>
      </ul>


      <div class="chat-input">
        <textarea placeholder="Enter a message..." spellcheck="false" required></textarea>
        <span id="send-btn" class="material-symbols-rounded">send</span>
      </div>
    </div>
    <?php include 'Chatbot/chatbot_script.php'; ?>