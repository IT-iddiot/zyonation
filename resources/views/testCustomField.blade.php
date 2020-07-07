<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-171613644-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-171613644-1');
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zyonation</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <style>
        p {
            height : 500px;
            margin : 30px;
        }
    </style>
</head>
<body>
    
    <div id="app">
        <p id="showCookie">

        </p>
        <example-component></example-component>
    </div>

<script src="{{asset('js/app.js')}}"></script>
<script>
    document.cookie = "name=DarrenTer;expires=" + new Date(2030, 0, 30).toUTCString();
    document.getElementById('showCookie').innerText = document.cookie.split('; ');
</script>
</body>
</html>