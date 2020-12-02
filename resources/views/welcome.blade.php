<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href="https://getbootstrap.com/docs/4.5/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .mt-50 {
                margin-top: 50px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
                <div class="container mt-50" style="text-align: left;">
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Upload Image</h5>
                                    <form method="POST" action="{{ url('mbimage') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="iamge-file">Image File</label>
                                            <input type="file" class="form-control-file" id="iamge-file" name="image" />
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(!empty($images))
                    <div class="row" style="padding-top: 20px">
                        <div class="col-lg-12 text-center">
                            <h1>Uploaded Image</h1>
                        </div>
                        <div class="col-lg-4 text-center">
                            <img src="{{ $images->thumbnail_size }}" class="img-fluid" />
                            <div class="text-center">
                                <a href="{{ $images->thumbnail_size }}" class="btn btn-primary btn-sm" target="_blank">Thumbnail Size</a>
                            </div>
                        </div>
                        <div class="col-lg-4 text-center">
                            <img src="{{ $images->small_size }}" class="img-fluid" />
                            <div class="text-center">
                                <a href="{{ $images->small_size }}" class="btn btn-primary btn-sm" target="_blank">Small Size</a>
                            </div>
                        </div>
                        <div class="col-lg-4 text-center">
                            <img src="{{ $images->full_size }}" class="img-fluid" />
                            <div class="text-center">
                                <a href="{{ $images->full_size }}" class="btn btn-primary btn-sm" target="_blank">Full Size</a>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </body>
</html>
