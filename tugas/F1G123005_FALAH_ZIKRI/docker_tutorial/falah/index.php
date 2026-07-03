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
            background: linear-gradient(135deg, #ff9a9e, #fad0c4);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        .container {
            text-align: center;
            padding: 50px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 15px;
            box-shadow: 0 6px 30px rgba(0, 0, 0, 0.2);
            max-width: 600px;
            width: 100%;
        }

        h1 {
            font-size: 3em;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #d6336c;
        }

        p {
            font-size: 1.2em;
            line-height: 1.6;
            margin-bottom: 30px;
            color: #555;
        }

        .highlight {
            font-size: 1.5em;
            color: #d6336c;
            font-weight: bold;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
        }

        .button {
            padding: 15px 30px;
            background-color: #d6336c;
            color: #fff;
            border: none;
            border-radius: 10px;
            font-size: 1.1em;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .button:hover {
            background-color: #e85d75;
            transform: scale(1.05);
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Selamat datang!</h1>
        <p>Ini adalah contoh tampilan web <span class="highlight">"FALAH ZIKRI"</span> yang menggunakan desain modern dan responsif.</p>
        <p>PHP memungkinkan Anda untuk mengembangkan aplikasi web dinamis dan menarik seperti yang Anda lihat di sini.</p>
        <button class="button" onclick="alert('Terima kasih telah mengunjungi!')">Masuk</button>
    </div>

</body>
</html>