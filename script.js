// TOGGLE CHATBOX
const popup = document.querySelector('.pop-up')
const Message = document.querySelector('.wrapper')

popup.addEventListener('click', function () {
	Message.classList.toggle('show')
});



$(document).ready(function() {
    // Load initial chat messages
    loadChat();

    // Submit message form on enter key press
    $('#messageInput').keypress(function(event) {
        if (event.which === 13) {
            event.preventDefault();
            sendMessage();
        }
    });

    $('#username').keypress(function(event) {
        if (event.which === 13) {
            event.preventDefault();
            sendMessage();
        }
    });

    // Submit message form on button click
    $('#messageForm').submit(function(event) {
        event.preventDefault();
        sendMessage();
    });

    // Function to load chat messages
    function loadChat() {
        $.ajax({
            url: 'fetch_chat.php',
            type: 'GET',
            success: function(response) {
                $('#chatBox').html(response);
            }
        });
    }

    
    // Function to send message
    function sendMessage() {
        var message = $('#messageInput').val().trim();
        var username = $('#username').text().trim();

        if (message !== '' && username !== '') {
            $.ajax({
                url: 'send_message.php',
                type: 'POST',
                data: { message: message, username: username },
                success: function(response) {
                    $('#messageInput').val('');
                    loadChat();

                    
                }
            });

            var chatBox = $('#chatBox');
        var bubbleClass = (username === $('#senderUsername').text().trim()) ? 'sent' : 'received';

        // Add message bubble with appropriate class
        var bubble = $('<div class="chat ' + bubbleClass + '"></div>').text(message);
        chatBox.append(bubble);
        }
    }

    // Function to refresh chat messages periodically
    setInterval(function() {
        loadChat();
    }, 3000); // Refresh every 3 seconds
});
