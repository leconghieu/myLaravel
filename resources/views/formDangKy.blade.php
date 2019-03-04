<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Đăng nhập</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        .box-form{
            width:80%;
            margin:0 auto;
        }
        .box-form h2{
            text-align:center;
        }
    </style>
</head>
<body>
@include('header')
<div class="row">
    @include('dashboard')
    <div class="col-md-9">
        <div class="box-form">
            <h2>Đăng ký</h2>
            <form action="{{route('checkdangky')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="username">User name</label>
                    <input type="text" class="form-control" id="username" placeholder="User name" name="name">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" placeholder="Email" name="email">
                </div>
                <button type="submit" class="btn btn-primary">Đăng nhập</button>

            </form>
        </div>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>

</body>

</html>
