// Fake user database
const users = {
    1: { name: "Ahmad", class: "5 Alpha", age: "17" },
    2: { name: "Siti", class: "5 Beta", age: "17" },
    3: { name: "Ali", class: "4 Gamma", age: "16" },
    4: { name: "Farah", class: "4 Delta", age: "16" },
    5: { name: "Zain", class: "5 Epsilon", age: "17" },
    6: { name: "Meera", class: "Try to find a flag?", age: "22" },
    22: { name: "Fake", class: "AKCTF25{fake_flag}", age: "N/A" },
    0: { name: "k!dd05z", class: "Superuser", age: "N/A", flag: "AKCTF25{4cc355_w17h0u7_p3rm15510n}" }
};

// Fake user credentials (username → password → user ID)
const credentials = {
    "ahmad": { password: "ahmad", id: 1 },
    "siti": { password: "p@ssword2", id: 2 },
    "ali": { password: "passw0rd3", id: 3 },
    "farah": { password: "password_4", id: 4 },
    "zain": { password: "p45sword5", id: 5 }
};

// Function to handle login
function login() {
    const username = document.getElementById("username").value.toLowerCase();
    const password = document.getElementById("password").value;

    if (credentials[username] && credentials[username].password === password) {
        window.location.href = `profile.html?id=${credentials[username].id}`;
    } else {
        document.getElementById("error-msg").classList.remove("d-none");
    }
}

// Detect previous ID to trigger flip animation
let previousId = null;

// Function to load user profile with instant flip effect
function loadProfile() {
    const urlParams = new URLSearchParams(window.location.search);
    const userId = urlParams.get("id");

    if (userId === previousId) return;
    previousId = userId;

    const card = document.getElementById("card");

    // Flip animation
    card.style.transform = "rotateY(180deg)";

    // Update content after the flip
    setTimeout(() => {
        const user = users[userId] || { name: "Unknown", class: "Unknown", age: "Unknown" };

        document.getElementById("user-id").innerText = userId || "N/A";
        document.getElementById("name").innerText = user.name;
        document.getElementById("class").innerText = user.class;
        document.getElementById("age").innerText = user.age;

        if (userId == "0") {
            document.getElementById("flag-container").innerText = `Flag: ${user.flag}`;
        } else {
            document.getElementById("flag-container").innerText = "";
        }

        card.style.transform = "rotateY(0deg)";
    }, 400); // Faster transition
}

// Logout function
function logout() {
    window.location.href = "index.html";
}

// Call functions if on the correct page
if (window.location.pathname.includes("profile.html")) {
    loadProfile();

    // Detect ID change when URL is modified manually
    setInterval(() => {
        const urlParams = new URLSearchParams(window.location.search);
        const newId = urlParams.get("id");
        if (newId !== previousId) {
            loadProfile();
        }
    }, 500);
}
