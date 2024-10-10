<?php
session_start();

require_once "../require/config.php";

if (!isset($_SESSION['is_logged_in']) || $_SESSION['user_type'] !== 'admin') {
  header('Location: ../');
  exit;
}

if (isset($_SESSION['user_id']) && $_SESSION['user_type'] === 'admin') {
  $stmt = $conn->prepare("SELECT * FROM users WHERE user_type = 'customer' ORDER BY created_at DESC");
  if ($stmt === false) {
    die("Prepare failed: " . $conn->error);
  }

  $stmt->execute();
  $result = $stmt->get_result();

  $chatList = '';

  while ($user = $result->fetch_assoc()) {
    $fullname = $user['first_name'] . ' ' . $user['last_name'];
    $chatList .= '
      <li class="chat-item" data-user-id="'. $user['id'] .'" onclick="selectUser('. $user['id'] .', \''. $fullname . '\')">
        <img src="./images/avatar-placeholder.png" alt="User Avatar" class="chat-avatar">
        <div class="chat-info">
          <div class="chat-name">'. htmlspecialchars($user['first_name']) .' '. htmlspecialchars($user['last_name']) .'</div>
        </div>
      </li>
    ';
  }

  if (empty($chatList)) {
    $chatList = '<li>No customers found.</li>';
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ChatApp - Stunning UI</title>
  <link rel="stylesheet" href="../global.css">
  <link rel="stylesheet" href="../css/chat.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body>
  <div class="container">
    <aside class="sidebar">
      <ul class="chat-list">
      </ul>
    </aside>
    <main class="chat-area">
      <div class="chat-header">
        <img src="./images/avatar-placeholder.png" alt="User Avatar" class="chat-avatar">
        <div class="chat-name" id="selected-user-name">Select a user</div>
      </div>
      <div class="message-list" id="message-list">
      </div>
      <div class="chat-input-container">
        <form class="chat-input" id="chat-input-form" method="POST">
          <input type="hidden" id="selected-user-id" name="recipient_id" value="">
          <input type="text" placeholder="Type your message..." id="chat-input" name="message">
          <button type="submit" id="chat-send-button">
            <i class="fas fa-paper-plane"></i>
          </button>
        </form>
      </div>
    </main>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script>
    let selectedUserId = null;

    const selectUser = (userId, userName) => {
      selectedUserId = userId;
      $('#selected-user-id').val(userId);
      $('#selected-user-name').text(userName);
      fetchMessages(userId);

      if (selectedUserId) {
        setInterval(() => {
          fetchMessages(selectedUserId);
        }, 3000);
      }
    }

    const fetchMessages = (userId) => {
      $.ajax({
        type: 'GET',
        url: './handlers/admin/get-messages.php',
        data: { customer_id: userId },
        dataType: 'json',
        success: (response) => {
          if (response.success) {
            displayMessages(response.messages);
          } else {
            console.error('Error fetching messages:', response.message);
          }
        },
        error: (xhr, status, error) => {
          console.error('AJAX error:', error);
        }
      });
    }

    const displayMessages = (messages) => {
      const messageList = $('#message-list');
      messageList.empty();

      messages.forEach((message) => {
        const messageClass = message.sender_type === 'admin' ? 'outgoing' : 'incoming';
        const messageHtml = `
          <div class="message ${messageClass}">
            ${message.content}
          </div>
        `;
        messageList.append(messageHtml);
      });

      // Scroll to the bottom of the message list
      messageList.scrollTop(messageList[0].scrollHeight);
    }

    $(document).ready(() => {
      $('.chat-item').click(function() {
        const userId = $(this).data('user-id');
        const userName = $(this).find('.chat-name').text();
        selectUser(userId, userName);
      });

      $('#chat-input-form').submit((e) => {
        e.preventDefault();

        if (!selectedUserId) {
          alert('Please select a user first.');
          return;
        }

        $.ajax({
          type: 'POST',
          url: './handlers/admin/send-message.php',
          data: $('#chat-input-form').serialize(),
          dataType: 'json',
          success: (response) => {
            if (response.success) {
              $('#chat-input').val('');
              $('#chat-send-button i').css('color', '');
              // Fetch messages after sending a new one
              fetchMessages(selectedUserId);
            }
          },
          error: (xhr, status, error) => {
            console.error('Error sending message:', error);
          }
        });
      });

      $('#chat-input').on('input', function() {
        if ($(this).val().length > 0) {
          $('#chat-send-button i').css('color', 'white');
        } else {
          $('#chat-send-button i').css('color', '');
        }
      });
    });
  </script>
</body>
</html>