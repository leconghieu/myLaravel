<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Sửa tin tức</title>

</head>
<body>
@include('header')
<br>
<div class="row">
    @include('dashboard')

    <div class="col-md-9">
        <form action="{{route('updateLoai')}}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="tieude">Tiêu đề</label>
                <input type="text" class="form-control" id="tieude" name="tieude" value="{{$tintuc->tieude}}">
            </div>
            <div class="form-group">
                <label for="tomtat">Nội dung tóm tắt</label>
                <input type="text" class="form-control" id="tomtat" name="tomtat" value="{{$tintuc->tomtat}}">
            </div>
            <div class="form-group">
                <label for="noidung">Nội dung</label>
                <textarea name="noidung" id="noidung" rows="10" cols="80" >
                    {{$tintuc->noidung}}
                </textarea>
            </div>
            <select class="custom-select" name="loaitin">
                @foreach($loaitin as $key)
                    @if ($key->id_loai == $tintuc->id_loai)
                        <option value="{{$key->id_loai}}" selected='true'>
                            {{$key->tenloai}}
                        </option>
                    @else
                        <option value="{{$key->id_loai}}">
                            {{$key->tenloai}}
                        </option>
                    @endif

                @endforeach
            </select>
            <div class="form-group">
                <label for="thumbnail">Thumbnail</label>
                <input type="file" class="form-control" id="thumbnail" name="pic">
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
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
<script src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
<script>
    CKEDITOR.replace('noidung');
</script>
</body>
</html>