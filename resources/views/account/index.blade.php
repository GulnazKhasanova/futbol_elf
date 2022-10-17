<h2>{{ AUth::user()->name }}, добро пожаловать на сайт ELF</h2>
<br>
@if(Auth::user()->is_admin)
<a href="{{ route('admin.index') }}" >В админку</a>
<br>
@endif
<a href="{{ route('account.logout') }}" >Выход</a>
