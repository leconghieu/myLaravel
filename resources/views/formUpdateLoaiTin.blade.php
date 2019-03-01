<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Thêm loại tin</title>
</head>
<body>
@include('header')
<br>
<div class="row">
    @include('dashboard')

    <div class="col-md-9">
        <form action="{{route('updateLoai')}}" method="post">
            {{ csrf_field() }}
            <input type="hidden" value="{{$loaitin->id_loai}}" name="id_loai">
            <div class="form-group">
                <label for="maloai">Mã Loại</label>
                <input type="text" class="form-control" id="maloai" value="{{$loaitin->maloai}}" name="maloai">
            </div>
            <div class="form-group">
                <label for="tenloai">Tên loại</label>
                <input type="text" class="form-control" id="tenloai" value="{{$loaitin->tenloai}}" name="tenloai">
            </div>
            @if ($loaitin->status == 1)
                <input type="radio" name="status" value="1" checked="checked">hiện
                <input type="radio" name="status" value="0">ẩn
            @elseif ($loaitin->status == 0)
                <input type="radio" name="status" value="1">hiện
                <input type="radio" name="status" value="0" checked="checked">ẩn
            @endif
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>
</body>
</html>