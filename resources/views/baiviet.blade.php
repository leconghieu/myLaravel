<!DOCTYPE html>
<html>
<head>
    <title>Bài viết</title>
    <meta charset="utf-8">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
    <script>
        $(document).ready(function(){
            $('td.xoa').click(function(){
                var tintuc = $(this).prevAll('input.tintuc').val();
                $.ajax({
                    url : "{{route('xoatintuc')}}",
                    type : "get",
                    data : {
                        id : tintuc
                    },
                }).done(function(result){
                    var html = "";
                    $.each(result, function(key, value){
                        html += "<tr>";
                            html += "<td>";
                                html += "<img width='100px' class='img-responsive' src='" + '{{asset('')}}' + value['thumbnail'] + "'>";
                            html += "</td>";
                            html += "<td>";
                                html += value['tieude'];
                            html += "</td>";
                            html += "<td>";
                                html += value['tomtat'];
                            html += "</td>";
                            html += "<td>";
                                html += value['tenloai'];
                            html += "</td>";
                            html += "<td>";
                                html += "Chỉnh sửa";
                            html += "</td>";
                            html += "<td>";
                                html += "Xóa";
                            html += "</td>";
                        html += "</tr>";
                    })
                    $('#table-tintuc').html(html);
                });
                return false;
            });
        })
    </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/tintucStyle.css')}}">
    <style>
        #img{
            width:100px;
            heigth:100px;
        }
    </style>
</head>
<body>
    @include('header')
    <br>
    <div class="body row">
        @include('dashboard')
        <div class="col-md-9">
            <table>
                <thead>
                    <tr>
                        <th>Thumbnail</th>
                        <th>Tiêu Đề</th>
                        <th>Tóm tắt</th>
                        <th>Tên loại</th>
                        <th>Chỉnh sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody id="table-tintuc">
                    @foreach($tintuc as $key)
                        <tr>
                            <input type="hidden" value="{{$key->id_tintuc}}" class="tintuc">
                            <td><img src="{{asset($key->thumbnail)}}" id="img"></td>
                            <td class="tieude">{{$key->tieude}}</td>
                            <td>{{$key->tomtat}}</td>
                            <td><a href="#">{{$key->tenloai}}</a></td>
                            <td><a href="#">Chỉnh sửa</a></td>
                            <td class="xoa">Xóa</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


</body>

</html>