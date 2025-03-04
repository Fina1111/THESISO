const chatInput = document.querySelector(".chat-input textarea");
const sendChatBtn = document.querySelector(".chat-input span");
const chatbox = document.querySelector(".chatbox");

let userMessage;
const API_KEY = "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";

const createChatLi = (message, className) => {
    const chatLi = document.createElement("li");
    chatLi.classList.add("chat", className);
    let chatContent = className === "outgoing"? `<p>${message}</p>` : `<span class="material-symbol-outlined">smart_toy</span><p>${message}</p>`;
    chatLi.innerHTML = chatContent;
    return chatLi;
}

const generateResponse = (incomingChatLi)  => {
    const API_URL = "https://api.openai.com/v1/chat/completions";
    const messageElement = incomingChatLi.querySelector("p");

    const requestOptions = {
        method: "POST",
        headers:  {
            "Content-Type": "application/json",
            "Authorization": `Bearer ${API_KEY}`
        },
        body: JSON.stringify ({
            model: "gpt-3.5-turbo",
            message: [{role: "user", content: userMessage}]
        }

        )
    }

    fetch(API_URL, requestOptions).then(res => res.json()).then(data => {
        messageElement.textContent = data.choices[0].message.content;
    }).catch((error) => {
        messageElement.textContent = "Oops! Something went wrong. Please try again."
    }
    )
}

const handleChat = () =>  {
    userMessage = chatInput.value.trim();
    if(!userMessage) return;

  chatbox.appendChild(createChatLi(userMessage, "outgoing"));
  chatbox.scrollTo(0, chatbox.scrollHeight);

setTimeout(() => {
    const incomingChatLi = createChatLi("...", "incoming")
    chatbox.appendChild(incomingChatLi);
    generateResponse(incomingChatLi);
}, 600);

}

sendChatBtn.addEventListener("click", handleChat);