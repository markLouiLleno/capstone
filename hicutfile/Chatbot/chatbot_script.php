<script type="text/javascript">
    const chatbotToggler = document.querySelector(".chatbot-toggler");
    chatbotToggler.addEventListener("click", () => document.body.classList.toggle("show-chatbot"));

    $(".quick-chat-option").click(function() {
        const value = $(this).data('message');

        var newChatItem = $("<li class='chat outgoing'><p>" + value + "</p></li>");
        $(".chatbox").append(newChatItem);
        $.ajax({
            url: 'chatbot_function.php', // PHP file to fetch data from
            type: 'GET',
            data: { value: value },
            success: function(response) {
                setTimeout(function() {
                    var responseItem = $("<li id='response-container' class='chat incoming'><span class='material-symbols-outlined'>smart_toy</span><p>" + response + "</p><div class='textarea d-block'></div></li>");
                    $(".chatbox").append(responseItem);
                }, 1000); // Delay in milliseconds (1000ms = 1 second)
            },
            error: function(xhr, status, error) {
                console.error('Error fetching data:', error);
            }
        }); // Close the AJAX request
    }); // Close the click event handler for ".quick-chat-option"
</script>
