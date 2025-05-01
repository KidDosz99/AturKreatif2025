function login() {
    const username = document.getElementById("username").value.toLowerCase();
    const password = document.getElementById("password").value;

    const userMap = {
        "ahmad": { password: "ahmad", id: 1 },
        "siti": { password: "p@ssword2", id: 2 },
        "ali": { password: "passw0rd3", id: 3 },
        "farah": { password: "password_4", id: 4 },
        "zain": { password: "p45sword5", id: 5 }
    };

    if (userMap[username] && userMap[username].password === password) {
        window.location.href = `profile.html?id=${userMap[username].id}`;
    } else {
        document.getElementById("error-msg").style.display = "block";
    }
}
