<header>
    <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-7 py-4">
                    <h4 class="text-white">О сайте</h4>
                    <p class="text-muted">Добро пожаловать на закрытый сайт клуба ЕЛФ. Этот сайт предназначет для проведения закрытого голосования среди участников и игроков клуба ЕЛФ. Вы можете принять участие в голосовании только в том случае, если вы вступили в клуб.</p>
                </div>
                <div class="col-sm-4 offset-md-1 py-4">
                    <h4 class="text-white">Контакты</h4>
                    <ul class="list-unstyled">
                        <li><a href="https://vk.com/club_elf2008" class="text-white">Like on Vkontakte</a></li>
                        @if(Auth::check())
                        <li><a class="text-white" href="{{ route('account.logout') }}">Выход</a></li>
                        @else
                        <li><a class="text-white" href="{{ route('login') }}">Вход</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a href="#" class="navbar-brand d-flex align-items-center">
                <strong>ЕЛФ</strong>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
    <div id="alr"></div>
</header>
