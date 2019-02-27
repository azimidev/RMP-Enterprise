<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to the task</title>
    <style>
        @import url(//fonts.googleapis.com/css?family=Lato:700);

        body {
            margin: 0;
            font-family: 'Lato', sans-serif;
            color: #999;
        }

        .instructions {
            width: 780px;
            position: absolute;
            left: 50%;
            top: 10%;
            margin-left: -390px;
            margin-top: -100px;
            margin-bottom: 20px;
        }

        a, a:visited {
            text-decoration: none;
            color: #999;
        }

        h1 {
            font-size: 32px;
            margin: 16px 0 0 0;
        }
    </style>
</head>

<body>
<div class="instructions">

    <img src="/images/logo.png" alt="Logo" title="logo">

    {!! $content !!}

    <p><a href="{{url('view')}}" title="task">Click here to take on the challenge</a></p>
</div>
</body>

</html>
