<?php
// index.php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Viewer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('bg.png') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.3);
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .btn-primary {
            transition: transform 0.2s;
        }

        .btn-primary:hover {
            transform: scale(1.1);
        }

        .input-group {
            display: flex;
            justify-content: center;
        }

        .form-control {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center">
        <div class="card p-4 text-center" style="max-width: 500px;">
            <h1 class="mb-3">View Documents</h1>
            <form action="read.php" method="GET">
                <div class="input-group mb-3">
                    <input type="text" name="file" class="form-control" placeholder="Enter filename" required>
                    <button type="submit" class="btn btn-primary">View</button>
                </div>
            </form>
            <p>Available files:</p>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">ctfhistory.txt</li>
                <li class="list-group-item">flag.txt</li>
            </ul>
        </div>
    </div>
</body>

</html>
