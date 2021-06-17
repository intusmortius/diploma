<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        html,
        body {
            height: 100%;
            // font-family: 'Open Sans', sans-serif;
            font-family: 'Nunito', sans-serif;
            font-size: 400px;
            font-size: 14px;
        }


        body {
            display: flex;
            flex-direction: column;
        }

        .mail-header {
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #656BEA;


        }

        .container {
            max-width: 800px;
            margin: auto;
            padding: 15px;
        }

        .mail-heade-text {
            color: #fff;
            font-size: 26px;
        }

        .mail-text {
            margin-bottom: 10px;
            font-size: 16px;
        }

        .mail-footer {
            margin-top: auto;
            background-color: #444c56;
            color: #fff;
            height: 70px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

    </style>
</head>

<body>
    <header class="mail-header">
        <div class="mail-heade-text">
            <svg width="66" height="70" viewBox="0 0 66 70" fill="none" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink">
                <rect width="65.2703" height="70" fill="url(#pattern0)" />
                <defs>
                    <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                        <use xlink:href="#image0" transform="translate(-0.0362319) scale(0.00536232 0.005)" />
                    </pattern>
                    <image id="image0" width="200" height="200"
                        xlink:href="data:image/png;base64,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" />
                </defs>
            </svg>

        </div>
    </header>
    <main class="mail-main">
        <div class="container">
            <div class="mail-text">
                Send by: {{ $sendBy }}
            </div>
            <div class="mail-text">
                Message: {{ $bodyMessage }}
            </div>
        </div>
    </main>
    <footer class="mail-footer">
        <div class="footer-text">
            © 2021 Mutual Help. All rights reserved.
        </div>
    </footer>
</body>

</html>