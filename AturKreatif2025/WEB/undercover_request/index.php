<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Undercover Request</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #240b36, #c31432);
            color: white;
            font-family: 'Poppins', sans-serif;
        }

        .container {
            background: rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0px 10px 30px rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
        }

        h1 {
            font-weight: bold;
            font-size: 2.5rem;
        }

        .btn-primary {
            background: #ff6f61;
            border: none;
            padding: 12px 24px;
            font-size: 1.2rem;
            border-radius: 50px;
            transition: 0.3s;
        }

        .btn-primary:hover {
            background: #d43f00;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.2);
            border: none;
            color: white;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.9);
            color: black;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }
    </style>
</head>

<body class="d-flex align-items-center justify-content-center vh-100">
    <div class="container text-center">
        <h1 class="mb-4">Undercover Request</h1>
        <p class="text-white">Send a message using the form below.</p>
        <form id="requestForm" class="mt-3">
            <div class="mb-3">
                <input type="text" class="form-control" name="message" placeholder="Type something..." required>
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </div>
    <script>
        document.getElementById('requestForm').addEventListener('submit', function(event) {
            event.preventDefault();
            var xhr = new XMLHttpRequest();
            php - S 127.0 .0 .1: 8000
            xhr.open("GET", "index.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    alert("Sent successfully!");
                }
            };
            xhr.send();
        });
    </script>
</body>

</html>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "Flag: AKCTF25{h1dd3n_1n_h34d3rs}";
    exit;
}
?>