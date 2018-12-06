@extends('layout')

@section('content')
<div class="contents row">
  @foreach($tweets as $tweet)
    <div class="content_post" style="background-image: url({{ $tweet->image }});">
      <div class="more">
        <span><img src="/images/arrow_top.png"></span>
        <ul class="more_list">
          <li><a href="/tweets/{{ $tweet->id }}">詳細</a></li>
          @if(Auth::check() && Auth::user()->id == $tweet->user_number)
            <li><a href="/tweets/{{ $tweet->id }}/edit">編集</a></li>
            <li><a href="/tweets/{{ $tweet->id }}" onclick="event.preventDefault(); document.getElementById('delete').submit();">削除</a></li>
            {{ Form::open(['url' => "/tweets/{$tweet->id}", 'method' => 'delete', 'id' => 'delete']) }}
            {{ Form::close() }}
          @endif
        </ul>
      </div>

      <p>{{ $tweet->text }}</p>
      <span class="name">
        <a href="/users/{{ $tweet->user_number }}">
          <span>投稿者</span>{{ App\User::find($tweet->user_number)->name }}
        </a>
      </span>
    </div>
  @endforeach

  {{ $tweets->links() }}
</div>
@endsection