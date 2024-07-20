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
            <img src="kamar3.jpg" alt="Suite Room">
            <div class="details">
                <h3>Suites Room</h3>
                <p>Suite Room, facilitated by a larger living room and also
                    has a small kitchen like an apartment.</p>
                <h4>Fasilitas Suite Room:</h4>
                <ul>
                    <li>separate living room</li>
                    <li>dining table</li>
                    <li>AC</li>
                    <li>IDD telephone line</li>
                    <li>TV LCD 42”</li>
                    <li>Pool view</li>
                    <li>Storage box for valuables</li>
                    <li>Coffee and tea making facilities</li>
                    <li>I-Pod docking port</li>
                    <li>All suites are non-smoking</li>
                    <li>Internet access</li>
                    <li>Mini fridge</li>
                    <li>Hair dryer</li>
                </ul>
                <p><strong>$125</strong></p>
            </div>
        </div>
        <form action="booking room.php" method="post">
            <input type="text" name="id_kamar" id='id_kamar' value='KM004' hidden>
            <div class="buttons">
                <a href="kamar.php">
                    <button type='button'>Back</button></a>
                <a href="booking room.php">
                <button>Booking</button></a>
            </div>
        </form>
    </div>
</body>
</html>
