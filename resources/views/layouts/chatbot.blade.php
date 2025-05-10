<script type="importmap">
    {
        "imports":{
            "@google/generative-ai":"https://esm.run/@google/generative-ai"
        }
    }
</script>


<div id="chatbot-launcher">
    <img src={{ asset('img/chatbot.png') }} alt="Chat" id="chatbot-icon" onclick="toggleChat()">
    <span id="chatbot-label"> ASK AI</span>
</div>

<div id="chatbot-container" class="hidden">
    <div id="chatbot-header">
        <h6 style="color: white">Chat with Gym AI</h6>
        <button id="chatbot-close" onclick="toggleChat()">&times;</button>
    </div>
    <div id="chatbot-messages" style="max-height: 300px; overflow-y: auto;">
        <!-- Chat messages will be dynamically added here -->
    </div>

    <div id="chatbot-input">
        <input type="text" id="text" name="text" placeholder="Type a message...">
        <button onclick="run()" id="chatbot-send">Send</button>
    </div>
</div>

<script type="module">
    import {
        GoogleGenerativeAI
    } from "@google/generative-ai";
    const genAI = new GoogleGenerativeAI("{{ env('API_gemini') }}");
    const model = genAI.getGenerativeModel({
        model: "gemini-1.5-flash"
    });

    window.run = async function run() {
        const input = document.getElementById("text");
        const question = input.value.trim();

        if (question === "") {
            alert("Please type a message");
            return;
        }

        addMessage("user", question);
        input.value = "";

        const prompt =
            "You are a fitness assistant. Answer clearly and in 3 lines maximum. If the user asks anything not related to fitness, training, nutrition, or gym plans, reply with: (هذه المنصة مخصصة للياقة فقط، اسأل عن شيء متعلق بالتدريب أو التغذية أو خطط الجيم)." +
            question;

        try {
            const result = await model.generateContent(prompt);
            const response = await result.response.text();

            addMessage("bot", response);
        } catch (err) {
            addMessage("bot", "⚠️ Error fetching response.");
        }
    };

    function addMessage(sender, text, save = true) {
        let messages = document.getElementById("chatbot-messages");
        let messageElem = document.createElement("div");
        messageElem.className = sender === "user" ? "user-message" : "bot-message";
        messageElem.style.margin = "5px 0";
        messageElem.style.padding = "10px";
        messageElem.style.borderRadius = "5px";
        messageElem.style.maxWidth = "100%";
        messageElem.style.backgroundColor = sender === "user" ? "#ffffff" : "#444";
        messageElem.style.color = sender === "user" ? "#000000" : "#ffffff";
        messageElem.style.alignSelf = sender === "user" ? "flex-end" : "flex-start";
        messageElem.innerText = text;
        messages.appendChild(messageElem);
        messages.scrollTop = messages.scrollHeight;

        if (save) {
            const chatHistory = JSON.parse(sessionStorage.getItem("chatHistory") || "[]");
            chatHistory.push({
                sender,
                text
            });
            sessionStorage.setItem("chatHistory", JSON.stringify(chatHistory));
        }
    }

    window.toggleChat = function() {
        const chatbot = document.getElementById("chatbot-container");
        if (chatbot.classList.contains("hidden")) {
            chatbot.classList.remove("hidden");
        } else {
            chatbot.classList.add("hidden");
        }
    };
    // window.addEventListener("load", loadChatHistory);

    // function loadChatHistory() {
    //     const messages = JSON.parse(sessionStorage.getItem("chatHistory") || "[]");
    //     messages.forEach(({
    //         sender,
    //         text
    //     }) => {
    //         addMessage(sender, text, false);
    //     });
    // }

    window.addEventListener('load', function() {
        let chatbotContainer = document.getElementById("chatbot-container");
        if (chatbotContainer) {
            chatbotContainer.style.display = "none";
        }
    });

    document.getElementById("chatbot-launcher").addEventListener("click", function() {
        let chatbotContainer = document.getElementById("chatbot-container");
        if (chatbotContainer.style.display === "none" || chatbotContainer.style.display === "") {
            chatbotContainer.style.display = "flex";
        } else {
            chatbotContainer.style.display = "none";
        }
    });

    document.getElementById("chatbot-close").addEventListener("click", function() {
        document.getElementById("chatbot-container").style.display = "none";
    });


    const navToggle = document.querySelector('.nav-toggle');
    const nav = document.querySelector('nav');

    if (navToggle && nav) {
        navToggle.addEventListener('click', () => {
            nav.classList.toggle('active');
            navToggle.classList.toggle('active');
        });
    }
</script>
