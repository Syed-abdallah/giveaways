<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Access Denied</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8d7da;
            color: #721c24;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .card {
            max-width: 500px;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .btn-home {
            background-color: #dc3545;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn-home:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>

    <div class="card">
        <h1>🚫 Access Denied</h1>
        <p>Sorry, but access from <strong>{{ $country }}</strong> is restricted.</p>
        <p>If you believe this is a mistake, please contact support.</p>
        <a href="/" class="btn-home">Go to Homepage</a>
    </div>

</body>
</html>
