<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404</title>
    <style>
        html, body {
            height: 100%;
            overflow: hidden;
        }
        .error-page {
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            height: 100%;
            font-family: Arial,"Helvetica Neue",Helvetica,sans-serif;
        }
  
        h1 {
            font-size: 30vh;
            font-weight: bold;
            position: relative;
            margin: -8vh 0 0;
            padding: 0;
        }
            
        h1:after {
            content: attr(data-h1);
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            color: transparent;
            background: -webkit-repeating-linear-gradient(-45deg, #71b7e6, #69a6ce, #b98acc, #ee8176, #b98acc, #69a6ce, #9b59b6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-size: 400%;
            text-shadow: 1px 1px 2px transparentize(#fff, .75);
            animation: animateTextBackground 10s ease-in-out infinite;
        }
        p{
            color: #d6d6d6;
            font-size: 8vh;
            font-weight: bold;
            line-height: 10vh;
            max-width: 600px;
            position: relative;
        }
            
        p:after {
                content: attr(data-p);
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                color: transparent;
                text-shadow: 1px 1px 2px transparentize(#fff, .5);
                -webkit-background-clip: text;
                -moz-background-clip: text;
                background-clip: text;
        }
        @keyframes animateTextBackground {
            0% {
                background-position: 0 0
            }
            25%{
                background-position: 100% 0;
            }
            50% {
                background-position: 100% 100%;
            }
            75% {
                background-position: 0 100%;
            }
            100% {
                background-position: 0 0;
            }
        }
    </style>
</head>
<body>
    <div class="error-page">
        <div>
            <h1 data-h1="404">404</h1>
            <p data-p="NOT FOUND">NOT FOUND</p>
        </div>
    </div>
</body>
</html>