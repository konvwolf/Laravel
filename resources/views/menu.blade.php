<div class="login">
    <a href="{{ route('Login') }}/">Авторизоваться</a>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto mainMenu">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('Home') }}">Главная <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('About') }}/">О нас</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('news.News') }}/">Новости</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('news.Categories') }}/">Категории</a>
        </li>
        @if($userAdmin = 1) {{-- Имитирую, что админ залогинен --}}
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.Admin') }}/">Админка</a>
            </li>
        @endif
      </ul>
    </div>
</nav>