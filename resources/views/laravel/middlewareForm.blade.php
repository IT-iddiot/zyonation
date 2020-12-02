<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Middleware</title>
</head>
<body>
    
    <form action="/check/age" method="post">
        @csrf
        <input type="number" name="age" class="form-control" placeholder="Enter your age">
        <button type="submit" class="btn btn-primary">
            I am over 18 years old 
        </button>
    </form>

</body>
</html>