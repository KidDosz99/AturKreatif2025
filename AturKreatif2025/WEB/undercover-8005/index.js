document.getElementById('requestForm').addEventListener('submit', function(event) {
    event.preventDefault();
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "serv3rrr.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            alert("Sent successfully!");
        }
    };
    xhr.send();
});
