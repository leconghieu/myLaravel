<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Thêm tin tức</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    @include('header')
    <br>
    <div class="row">
        @include('dashboard')
        <div class="col-md-9">
            <form action="{{route('addTintuc')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="tieude">Tiêu đề</label>
                    <input type="text" class="form-control" id="tieude" placeholder="Tiêu Đề..." name="tieude">
                </div>
                <div class="form-group">
                    <label for="tomtat">Nội dung tóm tắt</label>
                    <input type="text" class="form-control" id="tomtat" placeholder="Tóm tắt..." name="tomtat">
                </div>
                <div class="form-group">
                    <label for="noidung">Nội dung</label>
                    <textarea name="noidung" id="noidung" rows="10" cols="80">Nội dung</textarea>
                </div>
                <select class="custom-select" name="loaitin">

                    @foreach($loaitin as $key)
                        <option value="{{$key->id_loai}}">
                            {{$key->tenloai}}
                        </option>
                    @endforeach
                </select>
                <div class="form-group">
                    <label for="thumbnail">Thumbnail</label>
                    <input type="file" class="form-control" id="thumbnail" name="pic">
                </div>
                <button type="submit" class="btn btn-primary">Thêm</button>
            </form>

        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif



    <script src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace('noidung');
    </script>


</body>
</html>