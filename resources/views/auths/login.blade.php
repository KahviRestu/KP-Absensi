<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    </style>
</head>
<body>
<link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
<link href="https://fonts.googleapis.com/css?family=Alex+Brush&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{asset('style/login.css')}}">
    <div class="container">
        <div class="card">
            <div class="row">
                <div class="col-md-5">
                    <h1 class="text-center head">Login Now</h1>
                    <div class="cardform">
                         <form action="/postlogin" method="post" class="flogin mt-3">
                         {{csrf_field()}}
                            <div class="form-group">
                                <input type="email" class="form-control"  placeholder="Enter email" name="email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password" name="password">
                            </div>
                            <button type="submit" class="btn btn-lg btn-block btnsubmit">Login</button>
                         </form>
                    </div>
                </div>
                <div class=" col-md-7">
                    <div class="bgfront"></div>
                </div>
            </div>
        </div>
    </div>
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
</body>
</html>