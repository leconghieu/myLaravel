<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>LOẠI TIN</title>
    <link rel="stylesheet" href="{{asset('css/loaitinStyle.css')}}">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
    <script>
        $(document).ready(function(){
            $('td.xoa').click(function(){
                var id = $(this).prevAll('input.id-loai').val();
                $.ajax({
                    url:"{{route('xoaloaitin')}}",
                    type:"get",
                    data:{
                        id_loai : id
                    }
                }).done(function(result) {
                    var html ="";
                    $.each(result, function(key, value){
                        html += "<tr>";
                            html += "<input type='hidden' value='" + value['id_loai'] + "'>";
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
                                html += "Chỉnh sửa";
                            html += "</td>";
                            html += "<td>";
                                html += "Xóa";
                            html += "</td>";
                        html += "</tr>";

                    });
                    $('.loaitin').html(html);
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
                        <tbody class="loaitin">
                            @foreach($loaitin as $key)
                                <tr>
                                    <input type="hidden" value="{{$key->id_loai}}" class="id-loai">
                                    <td>{{$key->maloai}}</td>
                                    <td>{{$key->tenloai}}</td>
                                    <td>{{$key->status}}</td>
                                    <td> Chỉnh sửa </td>
                                    <td class="xoa">Xóa</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</body>
</html>