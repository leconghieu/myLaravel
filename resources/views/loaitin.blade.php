<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>LOẠI TIN</title>
    <link rel="stylesheet" href="{{asset('css/loaitinStyle.css')}}">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
    <style>
        td.xoa{
            cursor:pointer;
        }
        .fade{
            display:none;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('#loaitin').on('click','.xoa', function(){
                var id = $(this).prevAll('input.id-loai').val();
                $.ajax({
                    url:"{{route('xoaloaitin')}}",
                    type:"get",
                    data:{
                        id_loai : id
                    }
                }).done(function(result) {
                    if(result.hasOwnProperty('error')){
                        $('.alert-danger').html(result.error);
                        $('.alert-danger').removeClass('fade');
                    }
                    else{
                        var html ="";
                        $.each(result, function(key, value){
                            html += "<tr>";
                                html += "<input type='hidden' value='" + value['id_loai'] + "' class='id-loai'>";
                                html += "<td>";
                                    html += value['maloai'];
                                html += "</td>";
                                html += "<td>";
                                    html += value['tenloai'];
                                html += "</td>";
                                html += "<td>";
                                    html += value['status'];
                                html += "</td>";
                                html += "<td>";
                                    html += "Xóa";
                                html += "</td>";
                                html += "<td class='xoa'>";
                                html += "</td>";
                            html += "Xóa";
                            html += "</tr>";
                        });
                        $('#loaitin').html(html);
                        $('.alert-danger').addClass('fade');
                    }
                });
            });
        })
    </script>
</head>
<body>
    @include('header')
    <div class="body">
        <div class="container-fluid">
            <div class="row">
                @include('dashboard')
                <div class="col-md-9">
                    <h1>Thể loại</h1>
                    <hr>
                    <table>
                        <thead>
                            <th>Mã loại</th>
                            <th>Tên loại</th>
                            <th>Tình Trạng</th>
                            <th>Chỉnh sửa</th>
                            <th>Xóa</th>
                        </thead>
                        <tbody id="loaitin">
                            @foreach($loaitin as $key)
                                <tr>
                                    <input type="hidden" value="{{$key->id_loai}}" class="id-loai">
                                    <td>{{$key->maloai}}</td>
                                    <td>{{$key->tenloai}}</td>
                                    <td>{{$key->status}}</td>
                                    <td><a href="{{route('updateLoaitin', ['id' => $key->id_loai] )}}">Chỉnh sửa</a></td>
                                    <td class="xoa">Xóa</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="alert alert-danger fade">
            </div>
            <div class="form-update">

            </div>
        </div>
    </div>


</body>
</html>