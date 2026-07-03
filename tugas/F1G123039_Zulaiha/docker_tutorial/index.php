<?php
// Memulai sesi PHP untuk menampilkan tampilan
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Stylish Display</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #00d2ff, #3a7bd5);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: white;
        }

        .container {
            text-align: center;
            padding: 50px;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            max-width: 600px;
            width: 100%;
        }

        h1 {
            font-size: 3em;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        p {
            font-size: 1.2em;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .highlight {
            font-size: 1.5em;
            color: #ffcc00;
            font-weight: bold;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        }

        .button {
            padding: 15px 30px;
            background-color: #ffcc00;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 1.1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #ff9e00;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Selamat datang!</h1>
        <p>Zulaiha <span class="highlight">"Ini dibuat menggunakan PHP"</span> yang menggunakan desain modern dan responsif.</p>
        <p>PHP memungkinkan Anda untuk mengembangkan aplikasi web dinamis dan menarik seperti yang Anda lihat di sini.</p>
        <button class="button" onclick="alert('Terima kasih telah mengunjungi!')">Klik Saya</button>
    </div>

</body>
</html>