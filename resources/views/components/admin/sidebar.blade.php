<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.index')) active @endif" aria-current="page" href="{{ route('admin.index') }}">
                    <span data-feather="home"></span>
                    Панель управления
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.news.*')) active @endif" href="{{ route('admin.news.index') }}">
                    <span data-feather="file"></span>
                    Список игроков
                </a>
            </li>
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="#">--}}
{{--                    <span data-feather="file"></span>--}}
{{--                    Список пользователей--}}
{{--                </a>--}}
{{--            </li>--}}
            <li class="nav-item">
                <a class="nav-link" @if(request()->routeIs('admin.vote.*')) active @endif" href="{{ route('admin.vote.index') }}">
                    <span data-feather="users"></span>
                    Голосования
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" @if(request()->routeIs('admin.logs.*')) active @endif" href="{{ route('admin.logs.index') }}">
                    <span data-feather="layers"></span>
                    Логи
                </a>
            </li>
        </ul>
    </div>
</nav>
