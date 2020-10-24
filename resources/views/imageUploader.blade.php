<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload Image to Amazon S3</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
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

        .btn-link i {
            color : black;
        }

    </style>
</head>
<body>
    <div id="app">
        @if(\Session::has('error'))
            <div class="alert alert-danger m-2" role="alert">
                {{ \Session::get('error') }}
            </div>
        @elseif(\Session::has('success'))
            <div class="alert alert-success m-2" role="alert">
                {{ \Session::get('success') }}
            </div>
        @endif
            
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($$errors->all() as $error)
                    <li> {{ $error }} </li>
                    @endforeach
                </ul>
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
                        <img class="card-img-top" src="{{ $image->s3_webp_url }}" style="height : 150px; object-fit : cover">
                        <div class="card-body">
                            <p>
                                <span class="font-weight-bold">Size : </span>
                                <span>{{ $image->size }} KB</span>
                            </p>
                            <p>
                                <span class="font-weight-bold">Width : </span>
                                <span>{{ $image->width }}</span>
                            </p>
                            <p>
                                <span class="font-weight-bold">Height : </span>
                                <span>{{ $image->height }}</span>
                            </p>
                            <div class="d-flex">
                                <a class="btn btn-link" href="{{ $image->s3_webp_url }}" target="_blank" data-toggle="tooltip" data-placement="top" title="View"> 
                                    <i class="far fa-eye"></i>
                                </a> 
                                <form action="/image/download/{{ $image->id }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-link" data-toggle="tooltip" data-placement="top" title="Download">
                                        <i class="fas fa-cloud-download-alt"></i>
                                    </button>
                                </form>
                                <form action="/image/delete/{{ $image->id }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-link" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
</body>
</html>