document.addEventListener('DOMContentLoaded', function () {
    const chatContainer = document.getElementById('chat-container');
    const toggleChatButton = document.getElementById('toggle-chat');
    const chatWindow = document.getElementById('chat-window');
    const chatForm = document.getElementById('chat-form');
    const loginModal = document.getElementById('login-modal');
    const loginForm = document.getElementById('login-form');
    const usernameInput = document.getElementById('username');
    const messageInput = document.getElementById('message');
    let currentUsername = '';

    // Show login modal on page load
    loginModal.style.display = 'flex';

    // Handle login form submission
    loginForm.addEventListener('submit', function (e) {
        e.preventDefault();
        currentUsername = usernameInput.value;
        loginModal.style.display = 'none'; // Hide the modal
    });

    // Handle the visibility of the chat container
    toggleChatButton.addEventListener('click', function() {
        if (chatContainer.style.display === 'none' || chatContainer.style.display === '') {
            chatContainer.style.display = 'block';
            toggleChatButton.textContent = 'Close Chat';
        } else {
            chatContainer.style.display = 'none';
            toggleChatButton.textContent = 'Open Chat';
        }
    });

    function fetchMessages() {
        fetch('../controllers/ChatController.php')
            .then(response => response.json())
            .then(messages => {
                chatWindow.innerHTML = '';
                messages.forEach(message => {
                    const messageElement = document.createElement('div');
                    messageElement.classList.add('message');

                    // Tentukan posisi pesan berdasarkan username
                    if (message.username === currentUsername) {
                        messageElement.classList.add('right');
                    } else {
                        messageElement.classList.add('left');
                    }

                    const usernameElement = document.createElement('div');
                    usernameElement.classList.add('username');
                    usernameElement.textContent = message.username;

                    const textElement = document.createElement('div');
                    textElement.classList.add('text');
                    textElement.textContent = message.message;

                    const timeElement = document.createElement('div');
                    timeElement.classList.add('time');
                    timeElement.textContent = message.created_at;

                    messageElement.appendChild(usernameElement);
                    messageElement.appendChild(textElement);
                    messageElement.appendChild(timeElement);
                    chatWindow.appendChild(messageElement);
                });
            })
            .catch(error => console.error('Error:', error));
    }

    chatForm.addEventListener('submit', function (e) {
        e.preventDefault();

        const message = {
            username: currentUsername,
            message: messageInput.value
        };

        fetch('../controllers/ChatController.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(message)
        })
            .then(response => response.json())
            .then(data => {
                console.log(data.message);
                fetchMessages();
                messageInput.value = '';
            })
            .catch(error => console.error('Error:', error));
    });

    setInterval(fetchMessages, 3000);
    fetchMessages();
});
