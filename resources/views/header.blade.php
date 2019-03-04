<div class="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{route('home')}}">HOME</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('xemtt')}}">Bài Viết<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('xemds')}}">Loại tin</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                @if (session()->has('user'))
                    <li class="nav-item">
                        <a href="{{route('dangxuat')}}" class="nav-link">Đăng xuất</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{route('formdangnhap')}}" class="nav-link">Đăng nhập</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('formdangky')}}" class="nav-link">Đăng ký</a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
</div>