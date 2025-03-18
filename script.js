function checkFlag() {
    let input = prompt("Enter the flag:");
    if (input === "CTF{example_flag}") {
        alert("Correct!");
    } else {
        alert("Wrong flag!");
    }
}
