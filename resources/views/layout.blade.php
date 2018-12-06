<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Laravel Tweet</title>
    <link rel="stylesheet" href="/css/style.css">
  </head>

  <body>
    <header class="header">
      <div class="header__bar row">
        <h1 class="grid-6"><a href="/">Laravel Tweet</a></h1>
        @if(Auth::check())
          <div class="user_nav grid-6">
            <span>
              {{ Auth::user()->name }}
              <ul>
                <li>
                  <a href="/users/{{ Auth::user()->id }}">秘密の部屋</a>
                  {{ Form::open(['url' => "/logout", 'method' => 'post', 'id' => 'logout']) }}
                  {{ Form::close() }}
                  <a href="/logout" onclick="event.preventDefault(); document.getElementById('logout').submit();">9と3/4番線</a>
                </li>
              </ul>
            </span>

            <a href="/tweets/create" class="post">ツイート</a>
          </div>
        @else
          <div class="grid-6">
            <a href="/login" class="post">ログイン</a>
            <a href="/register" class="post">新規登録</a>
          </div>
        @endif
      </div>
    </header>

    @yield('content')
  </body>
</html>