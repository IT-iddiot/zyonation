<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload Image to Amazon S3</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>

        label {
            font-size : 1.2rem;
            font-weight : 700;
            color : rgb(238,174,202);
            background : linear-gradient(90deg, rgba(131,58,180,1) 0%, rgba(253,29,29,1) 50%, rgba(252,176,69,1) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .image-upload-window {
            padding : 1rem;
            margin : 2rem auto; 
            border : thin solid lightgray;
            border-radius : 10px;
            background-color : #fff;
        }

        .img-card {
            padding : 0;
            flex-basis : 23%;
            margin-bottom : 1rem;
        }

        .img-card:last-child {
            margin-right : 0;
        }

        

    </style>
</head>
<body>

    @if(\Session::has('error'))
        <div class="alert alert-danger m-2" role="alert">
            {{ \Session::get('error') }}
        </div>
    @elseif(\Session::has('success'))
        <div class="alert alert-success m-2" role="alert">
            {{ \Session::get('success') }}
        </div>
    @endif
    
    <div class="container image-upload-window">
        <form class="form-group" action="/image/store" method="POST" enctype="multipart/form-data">
            @csrf
            <label>Upload Image to Amazon S3</label>
            <input type="file" name="image" class="form-control-file">
            <button type="submit" class="btn btn-primary mt-4 mb-1">
                Submit Me Gua
            </button>
        </form>
    </div>

    <div class="container">
        <div class="row justify-content-between">
            @foreach($images as $image)
                <div class="card img-card">
                    <img class="card-img-top" src="{{ $image->url }}" style="max-height : 150px; object-fit : cover">
                    <div class="card-body">
                        <p>
                            <span class="font-weight-bold">Size : </span>
                            <span>{{ $image->size }}</span>
                        </p>
                        <p>
                            <span class="font-weight-bold">Width : </span>
                            <span>{{ $image->width }}</span>
                        </p>
                        <p>
                            <span class="font-weight-bold">Height : </span>
                            <span>{{ $image->height }}</span>
                        </p>
                        <a class="btn btn-primary" href="{{ $image->url }}" target="_blank"> 
                            View
                        </a> 
                        <a href="/image/download/{{ $image->id }}" class="btn btn-secondary ml-2" >
                            Download
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</body>
</html>