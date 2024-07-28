<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>World Hotel & Resort</title>
    <style>
        body {
            background-color: black;
            color: white;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            border-bottom: 1px solid white;
        }
        .header-left, .header-right {
            display: flex;
            align-items: center;
        }
        .header img {
            width: 50px;
            height: 50px;
        }
        .header h1 {
            font-size: 24px;
            margin: 0;
            display: flex;
            align-items: center;
        }
        .header h1 img {
            margin-right: 10px;
        }
        .content {
            padding: 20px;
        }
        .content h2 {
            font-size: 24px;
        }
        .room {
            display: flex;
            align-items: center;
            margin-top: 20px;
        }
        .room img {
            width: 200px;
            height: auto;
            border-radius: 10px;
        }
        .room-info {
            margin-left: 20px;
        }
        .room-info div {
            margin-bottom: 20px;
        }
        .room-info input {
            width: 200px;
            padding: 10px;
            border: 1px solid white;
            border-radius: 5px;
            background-color: black;
            color: white;
            text-align: center;
        }
        .button-back {
            display: inline-block;
            padding: 10px 20px;
            border: 1px solid white;
            border-radius: 5px;
            text-decoration: none;
            color: white;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="header-left">
            <h1>
                <img src="logo.jpg" alt="Logo"> World Hotel & Resort
            </h1>
        </div>
        <h1>Detail Ketersediaan Kamar</h1>
        <div class="header-right">
            <svg width="60" height="60" viewBox="0 0 90 90" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <rect width="90" height="90" fill="url(#pattern0_2515_586)"/>
                <defs>
                <pattern id="pattern0_2515_586" patternContentUnits="objectBoundingBox" width="1" height="1">
                <use xlink:href="#image0_2515_586" transform="scale(0.0111111)"/>
                </pattern>
                <image id="image0_2515_586" width="90" height="90" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFoAAABaCAYAAAA4qEECAAAACXBIWXMAAAsTAAALEwEAmpwYAAAE0klEQVR4nO2cS49URRSADyaOAsOCEV9bY3Qh0URR1GhkQUATDejvmIHZKa4MMdENOAO6NQSfTGKMJhhjCKgRH6wV3KBCEHGA2bhgRuJ85qQPptPeqnt76Ln16PqS3nTf1D11uu6pU+dxRQqFQqFQKBQKhUKh8H+A1cBWYBdwAPgeOA3MAQv2mbPvvrNr9NotwKqKIQvXAG4DJoGvTZFLZcHG2Klj/neDYQd4EvgEuMrg+dvGfkKGFeAp4Cva40v9U2VYAO4ADgKLhGEGuF1yBnjBNrHQzAHbJTeAEWC6z1V8HngPmDBv4m5gLXCjfdbad/rbDrv2jz7GV1ne0LEkB4BR4IuGk58FpoCHruN+G+xPvdjwnp+rjJIywC3AiQaTPQOMAysHeO+V9jScbXD/H1RWSRE9OADfNnC/ppdzRZnCXwHma2Q5kdzKNptcZy5+Au5rUab1wMkGZiQdm22r1McHIY7KdI726t752CspADxX4128CdwQUL4VwB6PfCr785LAYcTnJ++TSAD2e+S8HHWcBHinxlwEW8m9qCw1ZuSARBy7cJmMH2MMX9Lx8U85ZF6MMhjlCRDNt+ld9Atwvycse1RiAnjM8wjulsgBXvPIH8+qtpiv68Q3sNPeMrt95xxz+FgiyozoCa+KcUkEOtmdKnRut8Ys4GwKq7knZOAKRE1IaCw/V8WUJAawzzGXYzHYNteO/aAkBvCwx3MK93Ra0L2K85IgdI7nFxxz2hxSsJcdQr0riULnBFvFiyGF0sKVODePJWL1IFW8LaGwKqEqtkiiAE875nQ8pFC/OoS6SxKFTsK3il9CCqXhxCrGJO08ZxUXQwrlcu1GJFHopOGqmA8pVI6Kvskxp4WQQuVoOtY55nQ5pFDDtBmeidG92yqJAjzjmNM3MR5Ydkii4I5GHgwplLYzVPG+JArwoWNOu0IKpX0mVWhgZoXkFVTaFDpY7nLxNkhiABs9WZbVsQb+pyUxcBfVHIk52jUbYy1HzdN5KdrcZ01ydiKT5OydEnm5wdkUVjWdlNzvjjkckljQIhPcvCqRA7yeRAGNYn18rsTmeokU4AGP5xR+E3R0wLqKHE8Gd48qANYAPztk1rk8KjFijZouZiIs2/0oubJdRTtSawrR90skAG955NSKpXUSM8CzGbRWbJcUsI5UaszIaCCb7DMX6TQLKdZCrK1kPk5pEXjL3oVr4+vmsKazJLEj7fGGDZ1rllmOJg2d3egiuVkSS91r+28d5yxmsmrACp70nPiyW9mjDcxI926vpbOPLCWebRvdRovCuQJEWStbbfbePl8jccEKDndamdY99uqIEfuMAffab5OWGfmzj/EXTabDWSlbAbZ5ShTaRJ+cbV11HFkqe8w2wH8Iw0xvT4o9Ia4IZJobZE/E7yjtccQXu8h2ZV8DeFxbzDzJg+tBxzzUNNSZvbK7SrH0jTHH+vR5e7lqq3d8KZmRoVB2z1tjNgMvaaW9vcnmtG2kC7ZSNXj1m1YQWdRQa0w2DSIc21DZn2Wh7NBkvUHGRlF2+8r+tKzsFijKbpGi7BYpym4Rc/3UtSuuXyTKTu7tDqkq+68Ua8RTVPaVmOpYclZ2uCb9zJU9ZebiisVn0npzb0pYzrLY5UKhUCgUCoVCQZaXfwHTxUWk6obW8wAAAABJRU5ErkJggg=="/>
                </defs>
            </svg>
            <svg width="60" height="60" viewBox="0 0 90 90" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <rect width="90" height="90" fill="url(#pattern0_2515_587)"/>
                <defs>
                <pattern id="pattern0_2515_587" patternContentUnits="objectBoundingBox" width="1" height="1">
                <use xlink:href="#image0_2515_587" transform="scale(0.0111111)"/>
                </pattern>
                <image id="image0_2515_587" width="90" height="90" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFoAAABaCAYAAAA4qEECAAAACXBIWXMAAAsTAAALEwEAmpwYAAACzElEQVR4nO2dPW4TUQAGVwJyIRoOwH0ooaRz+L8HB4CC6wSQECigpB8UkioiztqZz9/aedNn9L7R+rmxNtM0GAwGg8FgcG8BHgJPgOfAJ+A38BVYAUft8x1S2DNuZtU+794APAAeA8+Aj8Ap8/nePv+hPLFL4+LKOl7klbXnYW/ieN+vgn2hd2UBj4A3wJ/AsDMWRjP0OznsZ+DF1bVzcf0simboH3c49znwBXgJPP3flw0Lo1N58xDnt4W9oz/ObqpuHmLjsNdhYUwt1pzp3x0b9Fdwqokh0v4W1i4tRNrfwtqlhUj7W1i7tBBpfwtrlxYi7W9h7dJCpP0trF1aiLS/hbVLC5H2t7B2aSHS/hbWLi1E2t/C2qWFSPtbWLu0EGl/C2uXFiLtb2Ht0kKk/S2sXVqItL+FtUsLkfa3sHZpIdL+FtYuLUTa38LapYVI+1tYu7QQaX8La5cWIu1vYe3SQqT9LaxdWoi0v4W1SwuR9rewdmkhZv7tEfAK+HbTj71ZGLGQM2JtfSAuw679sTcLIxZyRqytD8Tlk7z2x94sjFjIGbG2PhCX18V1Tub4W8RCzohlXx2rOf4WsZAzYt31y/D46skeX4ap0HNgYUwt0gdiYVi7tBBpfwtrlxYi7W9h7dJCpP0trF1aiLS/hbVLC5H2t7B2aSHS/hbWLi1E2t/C2qWFSPtbWLu0EGl/C2uXFiLtb2Ht0kKk/S2sXVqItL+FtUsLkfa3sHZpIdL+FtYuLUTa38LapYVI+1tYu7QQaX8La5cWIu1vYe3SQqT9LaxdWoi0v4W1SwuR9rewdmkh0v4W1i4zxHgdm8ktD8B4waDFhp+88/HKzO1Dj5fA7gLgLR5n47XG61/U/Xq8qHtH3JNXz59MS+NA/5nCalo67Hf45f57kHD4X+3z7y1sFv59+7yHHP4U+Al82MuP8GAwGAwGg8G0K/4CvsCyVvn6OkQAAAAASUVORK5CYII="/>
                </defs>
                </svg>
                
                
                    </pattern>
                    
                </defs>
            </svg>
        </div>
    </div>
    <div class="content">
        
    <h2>Suites Room</h2>
        <div class="room">
            <img src="SUITES ROOM.JPG" alt="Room Image">
            <div class="room-info">
                <div>
                    <h3>Jumlah Kamar Terisi</h3>
                    <input type="text" value="XXXXXXXX" readonly>
                </div>
                <div>
                    <h3>Jumlah Kamar Kosong</h3>
                    <input type="text" value="XXXXXXXX" readonly>
                </div>
            </div>
        </div>
       
        <a href="KamarResepsionis.php" class="button-back">Back</a>
    </div>
</body>
</html>
