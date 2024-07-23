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
            align-items: center;
            justify-content: space-between;
            padding: 20px;
            border-bottom: 1px solid white;
        }
        .header .logo{
            display: flex;
            align-items: center;   
            gap: 12px;
        }
        .header img {
            height: 50px;
        }
        .header h1 {
            margin: 0;
            font-size: 18px;
        }
        .search-container {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .search-container input {
            width: 300px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
        }
        .search-container button {
            margin-left: 10px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: white;
            color: black;
            cursor: pointer;
            font-size: 16px;
        }
        .user-list {
            padding: 20px;
        }
        .user-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border: 1px solid white;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }
        .user-item img {
            height: 40px;
            width: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }
        .user-item button {
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: white;
            color: black;
            cursor: pointer;
            font-size: 16px;
        }
        .back-button {
            display: flex;
            justify-content: center;
            padding: 20px;
        }
        .back-button button {
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: white;
            color: black;
            cursor: pointer;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="logo.jpg" alt="World Hotel & Resort">
            <h1>World Hotel & Resort</h1>
        </div>
        <div>
            <svg width="42" height="42" viewBox="0 0 106 106" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <rect width="106" height="106" fill="url(#pattern0_2514_194)"/>
                <defs>
                <pattern id="pattern0_2514_194" patternContentUnits="objectBoundingBox" width="1" height="1">
                <use xlink:href="#image0_2514_194" transform="scale(0.0111111)"/>
                </pattern>
                <image id="image0_2514_194" width="90" height="90" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFoAAABaCAYAAAA4qEECAAAACXBIWXMAAAsTAAALEwEAmpwYAAAEyklEQVR4nO2cXYhVVRiGj2aNWZYSg8xkWnShd1141YVBBckMghIUSYaFolB6JTQGEUF0EVFhZsZcdCNIUBCVkhX9IExlpQmGhTfqZEHWTWXh/xNfs4Y5ePb69p5z1s9x9vfAwMDM7Pddr+us9a2fbaNhGIZhGIZhGIZhGIZRYzD+x4JOhAWdCAs6ERZ0IizoRFypQZ8FngT6A/rsB4bcs4MTyqfWgBgMRfS7JYbhWH6bjcegL6LfvhiGY/ltNh6D/oh+b45hOJbfZuMx2BLR71MxDMfy22w8BmfdWNofuCdLyDYZXsmE6hBaTzGwoJNhPToRFnQiLOhEWNCJsKATYUEnwoJOhAWdCAs6ERZ0IizoRFjQibCgE2FBJ8KCToQFrfMj8DqwDrgLmA/MBaYBs4EFwB3ASuB54BPg76IHWdCtHAWeBha2eaJ0LfAA8G7z+aMFPcEB4H5geqhQgFuANyRwCxp+B9bKcBArDODWugf9IdDbmArQnVwCnonZi5ND93FBqohJ+L8deBzYBRwE/gDOAefd99+7nz0B3BY3Td1ot/XkRyt4vgpYBYy08fwvgYeAGWkSnjDdTQxV8Hsf8FMArR+Ae+oY9DsV6t/hwJoXgefkE1KXoE8AcxSPvcC3EfU/B26qQ9ArS0KWpXZsDkUtJcnP3pLhokpPPg68BAzI4gOYBVwHLAKWAduA0QrPkcm1Z6oGfafibbjCkPNwlQrCVSqywjxZ8swdwUN2BnLyRUl1ofGWNq4rz5VdvfdKSsB7Ow62QDgnjyi9TyvhtnWyapSNKWCr8vzDITevxkVzcVrGUY8nWYxoPbnjpbkLW+vZqzrVuFwwF7sVTyPKpHdjwLbLMPKLR2tfKJ1xsVxsVvYuZJwsYk3Qxo/pyelMEZeCbp+Sj6UeP7JBVMSxGPsTbj742aO5IaRQLno9fmSnrYhXgjW6VfM1j+bOkCI5+FPxI1udRQwEa3Sr5qBH80BIkRyMKn5kD7mIRcEa3aopK8giToUUycERxY/vzdjZwRpdXH0UcSakSA6OKn7+9fxNYc0dKIMbPJqnQ4rk4JTix1fXRjuGAhZ7NI+FFMnBOcWPnPF1y2T4TUiRXPR5/Lzp+f2XgzW6VXO7R3M4pEgulnv8bFC2RK8O1vAJvRnKgmV1SKFcPOvxs8Cd5VXe7euw/es9WuJhfkihv8jDp4qnzzx/M9rOHnRJtfGrR2tPKJ1xsa/Jd1FmnsfTg4m2Sd9XdAY71bhccBP52KiE4FuK4yavTjf+X1Wevz/Gxn+PUlLF5qAvMOBuZawW3m7zKEuGiw9KPmlLgoTr+Y+hcoW9QvEll1s0pBJ5rEo14qqL9cqYPM6RaCfhzsg18lEGvvK9fhDxgvk0Za9YLreUMerOAAfcKu9697XYLUa2KyVcEXuiht2NAHOA70jPXrlX0qgTjN1WGskU9sxGnWBs0t6hnCe2wwU3Jmt8VLueLcjlFnfvolOkhFvi/gF3l/zux3UNe7q7+7FvkuFedBPdYHOdbGFXwF1qlI2ona6Ckbe4zgD/uPJvv7vDt1rKWOU51rNTMYmw6zVBRgxbhheNF6OI1w1gpnvH0cdvuT1OtbCljragY+PeOJAx2YaORvywpWe/4Daj5Eu+7/kPNh4B4JsOv5YAAAAASUVORK5CYII="/>
                </defs>
                </svg>
                
                <svg width="42" height="42" viewBox="0 0 84 82" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <rect width="84" height="82" fill="url(#pattern0_2515_293)"/>
                    <defs>
                    <pattern id="pattern0_2515_293" patternContentUnits="objectBoundingBox" width="1" height="1">
                    <use xlink:href="#image0_2515_293" transform="matrix(0.0108466 0 0 0.0111111 0.0119048 0)"/>
                    </pattern>
                    <image id="image0_2515_293" width="90" height="90" xlink:href="data:image/png;base64,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"/>
                    </defs>
                    </svg>
                    
        </div>
    </div>
    <div class="search-container">
        <input type="text" placeholder="Search Email/Phone number">
        <button>🔍</button>
    </div>
    <div class="user-list">
        <div class="user-item">
            <div>
                <svg width="42" height="41" viewBox="0 0 84 82" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <rect width="84" height="82" fill="url(#pattern0_2514_205)"/>
                    <defs>
                    <pattern id="pattern0_2514_205" patternContentUnits="objectBoundingBox" width="1" height="1">
                    <use xlink:href="#image0_2514_205" transform="matrix(0.0108466 0 0 0.0111111 0.0119048 0)"/>
                    </pattern>
                    <image id="image0_2514_205" width="90" height="90" xlink:href="data:image/png;base64,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"/>
                    </defs>
                    </svg>
                    
                xxxx@gmail.com
            </div>
            <a href="hasilcariDatatamu.html" class="hasilcariDatatamu">
            <button>Detail</button></a>
        </div>
        <div class="user-item">
            <div>
                <svg width="42" height="41" viewBox="0 0 84 82" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <rect width="84" height="82" fill="url(#pattern0_2514_205)"/>
                    <defs>
                    <pattern id="pattern0_2514_205" patternContentUnits="objectBoundingBox" width="1" height="1">
                    <use xlink:href="#image0_2514_205" transform="matrix(0.0108466 0 0 0.0111111 0.0119048 0)"/>
                    </pattern>
                    <image id="image0_2514_205" width="90" height="90" xlink:href="data:image/png;base64,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"/>
                    </defs>
                    </svg>
                xxxx@gmail.com
            </div>
            <a href="hasilcariDatatamu.html" class="hasilcariDatatamu">
            <button>Detail</button></a>
        </div>
        <div class="user-item">
            <div>
                <svg width="42" height="41" viewBox="0 0 84 82" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <rect width="84" height="82" fill="url(#pattern0_2514_205)"/>
                    <defs>
                    <pattern id="pattern0_2514_205" patternContentUnits="objectBoundingBox" width="1" height="1">
                    <use xlink:href="#image0_2514_205" transform="matrix(0.0108466 0 0 0.0111111 0.0119048 0)"/>
                    </pattern>
                    <image id="image0_2514_205" width="90" height="90" xlink:href="data:image/png;base64,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"/>
                    </defs>
                    </svg>
                xxxx@gmail.com
            </div>
            <a href="hasilcariDatatamu.php" class="hasilcariDatatamu">
            <button>Detail</button></a>
        </div>
    </div>
    <div class="back-button">
        <a href="resepsionis.php" class="resepsionis">
        <button>Back</button></a>
    </div>
</body>
</html>