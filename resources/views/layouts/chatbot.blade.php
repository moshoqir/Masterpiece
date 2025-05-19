<script type="importmap">
    {
        "imports":{
            "@google/generative-ai":"https://esm.run/@google/generative-ai"
        }
    }
</script>

<div id="chatbot-launcher">
    <img src="{{ asset('img/chatbot.png') }}" alt="Chat" id="chatbot-icon">
    <span id="chatbot-label">ASK AI</span>
</div>

<div id="chatbot-container" class="hidden">
    <div id="chatbot-header">
        <h6 style="color: white">Chat with Gym AI</h6>
        <button id="chatbot-close">&times;</button>
    </div>
    <div id="chatbot-messages" style="max-height: 300px; overflow-y: auto;">
        <!-- Chat messages will be dynamically added here -->
    </div>
    <div id="chatbot-input">
        <input type="text" id="text" name="text" placeholder="Type a message...">
        <button id="chatbot-send">Send</button>
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

    // Chat functionality
    document.getElementById('chatbot-send').addEventListener('click', run);
    document.getElementById('text').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            run();
        }
    });

    async function run() {
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
    }

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

    // Toggle functionality
    document.getElementById("chatbot-launcher").addEventListener("click", function() {
        document.getElementById("chatbot-container").classList.toggle("hidden");
    });

    document.getElementById("chatbot-close").addEventListener("click", function(e) {
        e.stopPropagation();
        document.getElementById("chatbot-container").classList.add("hidden");
    });

    // Close when clicking outside (optional)
    document.addEventListener('click', function(event) {
        const chatbot = document.getElementById("chatbot-container");
        const launcher = document.getElementById("chatbot-launcher");

        if (!chatbot.contains(event.target) && !launcher.contains(event.target) && !chatbot.classList.contains(
                'hidden')) {
            chatbot.classList.add("hidden");
        }
    });

    // Navigation toggle (keep this if needed)
    const navToggle = document.querySelector('.nav-toggle');
    const nav = document.querySelector('nav');
    if (navToggle && nav) {
        navToggle.addEventListener('click', () => {
            nav.classList.toggle('active');
            navToggle.classList.toggle('active');
        });
    }
</script>
