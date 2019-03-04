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
    <br>
    <div class="row">
        @include('dashboard')
        <div class="col-md-9">
            <div class="box-form">
                <h2>Đăng nhập</h2>
                <form action="{{route('checkdangnhap')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="username">User name</label>
                        <input type="text" class="form-control" id="username" placeholder="User name" name="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">Nhớ mật khẩu</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Đăng nhập</button>
                </form>
            </div>


        </div>
    </div>



</body>

</html>
