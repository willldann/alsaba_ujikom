let currentChatUser = '';

function openChat(userName) {
    currentChatUser = userName;
    document.getElementById("chatUser").innerText = userName;
    document.getElementById("chatMessages").innerHTML = `<p class="info-text">Chat with ${userName}</p>`;
    document.getElementById("messageInput").disabled = false;
}

function sendMessage() {
    const messageInput = document.getElementById("messageInput");
    const chatMessages = document.getElementById("chatMessages");

    if (messageInput.value.trim() === '') return;

    // Tambahkan pesan admin
    let adminMessage = document.createElement("div");
    adminMessage.classList.add("message", "admin");
    adminMessage.innerText = messageInput.value;
    chatMessages.appendChild(adminMessage);

    // Simulasi balasan dari user
    setTimeout(() => {
        let userMessage = document.createElement("div");
        userMessage.classList.add("message", "user");
        userMessage.innerText = `Thanks for your response, Admin!`;
        chatMessages.appendChild(userMessage);
    }, 1000);

    messageInput.value = '';
}
