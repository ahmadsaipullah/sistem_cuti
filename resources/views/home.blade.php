<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UNION FOODS</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .card-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .card-header img {
            width: 200px;
        }

        .container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            max-width: 800px;
            width: 100%;
        }

        .card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            text-align: center;
            cursor: pointer;
            transition: transform 0.3s ease;
            text-decoration: none; /* Remove underline from links */
            padding: 20px;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card-icon {
            font-size: 4em;
            color: #333;
            margin-bottom: 10px;
        }

        .card h3 {
            margin: 10px 0;
            font-size: 1.5em;
        }

        .card p {
            margin: 0;
            font-size: 1em;
            color: #666;
        }
    </style>
    <!-- Include font awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="card-header">
        <img src="assets/img/logoft.png" alt="Logo">
        <h1>PT. UNION FOODS</h1>
    </div>
    <div class="container">
        <a href="{{route('login')}}" class="card">
            <div class="card-icon"><i class="fas fa-user"></i></div>
            <h3>Karyawan</h3>
            <p>Login sebagai karyawan.</p>
        </a>
        <a href="{{route('login')}}" class="card">
            <div class="card-icon"><i class="fas fa-user-shield"></i></div>
            <h3>Admin</h3>
            <p>Login sebagai admin.</p>
        </a>
        <a href="{{route('login')}}" class="card">
            <div class="card-icon"><i class="fas fa-user-tie"></i></div>
            <h3>HRD</h3>
            <p>Login sebagai HRD.</p>
        </a>
    </div>
</body>

</html>
