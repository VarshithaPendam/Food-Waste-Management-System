<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot</title>
</head>
<body>

<div class="chat-container">
    <div id="chatbox">
        <!-- Initial chat messages -->
        <div class="message bot"></div>
        
    </div>

    <div class="input-container">
        <input type="text" id="userInput" placeholder="Type a message...">
        <button id="sendButton">Send</button>
    </div>
</div>

<script>

    // Predefined chatbot responses
const responses = {
  hello: "Hi there! How can I help you with India Eats today?",
  tips: "Here are some tips to reduce food waste:\n1. Plan your meals.\n2. Store food properly.\n3. Use leftovers creatively.\n4. Check your fridge and pantry before shopping.",
  donate: "You can donate excess food to local food banks or shelters. Check out platform 'India Eats' to connect with donation centers.",
  compost: "Composting is a great way to manage food waste. You can start a compost bin at home using kitchen scraps like vegetable peels, coffee grounds, and eggshells.",
  recycle: "Food waste can be recycled into biogas or used as animal feed. Check with local recycling centers for facilities near you.",
  default: "I'm sorry, I didn't quite understand that. Can you please rephrase your question?"
};

// Handle user input
function handleUserInput() {
  const userInput = document.getElementById("userInput").value.trim().toLowerCase();
  const chatbox = document.getElementById("chatbox");

  if (userInput === "") return;

  // Add user message to chatbox
  addMessage(userInput, "user");

  // Normalize user input (convert it to lowercase and remove unnecessary characters)
  const normalizedInput = normalizeInput(userInput);

  // Determine bot response
  const botResponse = responses[normalizedInput] || responses.default;

  // Add bot response to chatbox
  setTimeout(() => {
    addMessage(botResponse, "bot");
  }, 500);

  // Clear input field
  document.getElementById("userInput").value = "";
}

// Normalize user input (simplify or map to predefined keys)
function normalizeInput(input) {
  const normalizedInput = input.toLowerCase();
  if (normalizedInput.includes("hello") || normalizedInput.includes("hi")) {
    return "hello";
  } else if (normalizedInput.includes("tips")) {
    return "tips";
  } else if (normalizedInput.includes("donate")) {
    return "donate";
  } else if (normalizedInput.includes("compost")) {
    return "compost";
  } else if (normalizedInput.includes("recycle")) {
    return "recycle";
  } else {
    return "default"; // If input doesn't match any predefined key
  }
}

// Add a message to the chatbox
function addMessage(text, sender) {
  const chatbox = document.getElementById("chatbox");
  const messageDiv = document.createElement("div");
  messageDiv.className = `message ${sender}`;
  messageDiv.textContent = text;
  chatbox.appendChild(messageDiv);
  chatbox.scrollTop = chatbox.scrollHeight;
}

// Attach event listeners
document.getElementById("sendButton").addEventListener("click", handleUserInput);
document.getElementById("userInput").addEventListener("keypress", (e) => {
  if (e.key === "Enter") {
    handleUserInput();
  }
});

</script>

</body>
</html>
