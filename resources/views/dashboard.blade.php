<div class="col-md-3">
    <form class="form-inline">
        <div class="form-group mx-sm-3 mb-2">
            <label for="inputPassword2" class="sr-only">Password</label>
            <input type="password" class="form-control" id="inputPassword2" placeholder="Search..">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Search</button>
    </form>
    <ul class="list-controll">
        <li class="dropdown">
            <a class=" dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Thể loại
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <li class="dropdown-item">
                    <a href="{{route('xemds')}}">
                        Danh sách
                    </a>
                </li>
                <li class="dropdown-item">
                    <a href="{{route('themds')}}">
                        Thêm
                    </a>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a class=" dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Bài viết
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <li class="dropdown-item">
                    <a href="{{route('xemtt')}}">
                        Danh sách
                    </a>
                </li>
                <li class="dropdown-item">
                    <a href="{{route('themtt')}}">
                        Thêm
                    </a>
                </li>
            </ul>
        </li>
        <li>User</li>
    </ul>
</div>