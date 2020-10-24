<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{$landingpage_name}}</title>
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>
    <script>
        let is_unique = false;
        const lp_uid = {!! json_encode($landingpage_id) !!};
        const pathName = window.location.pathname;
        const currentTimestamp = Math.round(new Date().getTime() / 1000);
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        console.log('path name is ' + pathName, currentTimestamp, Cookies.get('hs_uid'))
        if(!Cookies.get('hs_uid')) {
            is_unique = true;
            console.log("cookie not present", is_unique)
            Cookies.set('hs_uid', currentTimestamp, { expires : 1/1440, path : pathName}) 
        }
        fetch('/landingpage/pageviewIncrement', {
            method : 'POST',
            headers : {
                'Content-type' : 'application/json',
                "X-CSRF-TOKEN": token
            },
            body : JSON.stringify({
                landing_id : lp_uid,
                is_unique : is_unique
            })
        })

    </script>
</head>
<body>
    
    <div id="app">
        <landing-page id="{{ $landingpage_id }}" name="{{$landingpage_name}}"></landing-page>
    </div>

<script src="{{mix('js/app.js')}}"></script>

</body>
</html>