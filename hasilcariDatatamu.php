<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>World Hotel & Resort - Profile</title>
    <style>
        body {
            background-color: #000;
            color: #fff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            height: 100vh;
            justify-content: space-between;
        }
        .container {
            display: flex;
            justify-content: space-around;
            padding: 20px;
            flex-grow: 1;
        }
        .profile, .history {
            display: flex;
            border: 1px solid #fff;
            padding: 20px;
            width: 45%;
            box-sizing: border-box;
            margin: 0 auto;
            flex-direction: column;
        }

        .profile .form-group, .history .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
        }

        .form-inline {
            display: flex;
            align-items: center; /* Align items vertically in the center */
            justify-content: space-between;
        }

        .form-inline .form-group {
            margin-right: 0; /* Ensure no margin on the right side */
        }

        .form-inline .form-group input {
            width: 150px; /* Adjust width as needed */
            margin-right: 10px; /* Add some spacing between the inputs */
        }

        .form-inline .form-group:last-child input {
            margin-right: 0; /* Remove right margin for the last input */
        }


        .profile h2, .history h2 {
            text-align: center;
        }

        /* .profile .form-group, .history .form-group {
            display: flex;
            margin-bottom: 15px;
            width: 615px;
        } */

        .profile .form-group label, .history .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .profile .form-group input, .history .form-group input, .profile .form-group select {
            width: 100%;
            padding: 8px;
            background-color: #333;
            border: 1px solid #fff;
            color: #fff;
        }
        .history .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #333;
            border: 1px solid #fff;
            color: #fff;
            cursor: pointer;
        }
        .footer {
            display: flex;
            justify-content: space-between;
            padding: 10px 20px;
            margin-top: auto;
        }
        .footer a {
            padding: 10px 20px;
            background-color: #333;
            border: 1px solid #fff;
            color: #fff;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
        }
        .logo {
            text-align: center;
            margin: 10px;
            position: relative;
        }
        .logo img {
            width: 50px;
        }
        .logo::after {
            content: "";
            display: block;
            width: 100%;
            height: 2px;
            background-color: #fff;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="logo">
        <img src="logo.jpg" alt="World Hotel & Resort">
        <h1>World Hotel & Resort</h1>
    </div>
    <div class="container">
        <div class="profile">
            <h2>Profile</h2>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" placeholder="xxxx@gmail.com">
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" id="phone" placeholder="xxxxxxxxxx">
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="text" id="dob" placeholder="dd/mm/yyyy">
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select id="gender">
                    <option value="male">MALE</option>
                    <option value="female">FEMALE</option>
                </select>
            </div>
        </div>
        <div class="history">
            <h2>History</h2>
            <div class="form-inline">
                <div class="form-group">
                    <label for="history-date">Date</label>
                    <input type="text" id="history-date" placeholder="dd/mm/yyyy">
                </div>
                <div class="form-group">
                    <label for="room">Type Room</label>
                    <input type="text" id="room" placeholder="">
                </div>
            </div>
        </div>
    </div>

    </div>
    <div class="footer">
        <a href="caridata.php" class="back-button">Back</a>
    </div>
</body>
</html>
