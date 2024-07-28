<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Room - World Hotel & Resort</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            width: 80%;
            max-width: 900px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        .header {
            background-color: #000;
            color: #fff;
            padding: 20px;
            display: flex;
            align-items: center;
        }
        .header img {
            height: 40px;
            margin-right: 20px;
        }
        .header h1 {
            font-size: 24px;
            margin: 0;
            flex-grow: 1;
        }
        .header h2 {
            font-size: 18px;
            margin: 0;
        }
        .content {
            padding: 20px;
            display: flex;
        }
        .content img {
            width: 300px;
            height: auto;
            border-radius: 10px;
            margin-right: 20px;
        }
        .content .details {
            flex-grow: 1;
        }
        .content .details h3 {
            margin: 0 0 10px;
            font-size: 20px;
        }
        .content .details p {
            margin: 0 0 10px;
        }
        .content .details ul {
            list-style-type: disc;
            padding-left: 20px;
            margin: 10px 0;
        }
        .buttons {
            display: flex;
            justify-content: space-between;
            padding: 20px;
            background-color: #fff;
        }
        .buttons button {
            padding: 10px 20px;
            background-color: #000;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .buttons button:hover {
            background-color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="logo.jpg" alt="World Hotel & Resort">
            <h1>World Hotel & Resort</h1>
            <h2>Detail Room</h2>
        </div>
        <div class="content">
            <img src="presidential.jpg" alt="suites Room">
            <div class="details">
                <h3>Presidential Room</h3>
                <p>suites Room, facilitated by a larger living room and also
                    has a small kitchen like an apartment.</p>
                <h4>Fasilitas Suite Room:</h4>
                <ul>
                    
                </ul>
                <p><strong>$150</strong></p>
            </div>
        </div>
        <form action="booking room.php" method="post">
            <input type="text" name="id_kamar" id='id_kamar' value='KM001' hidden>
            <div class="buttons">
                <a href="kamar.php"><button type='button'>Back</button></a>
                <button type="submit">Booking</button>
            </div>
        </form>
    </div>
</body>
</html>
