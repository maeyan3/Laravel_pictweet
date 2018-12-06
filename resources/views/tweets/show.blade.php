@extends('layout')

@section('content')
<div class="contents row">
  <div class="content_post" style="background-image: url({{ $tweet->image }});">
    @if(Auth::user()->id == $tweet->user_number)
      <div class="more">
        <span><img src="/images/arrow_top.png"></span>
        <ul class="more_list">
          <li><a href="/tweets/{{ $tweet->id }}/edit">編集</a></li>
          <li><a href="/tweets/{{ $tweet->id }}" onclick="event.preventDefault(); document.getElementById('delete').submit();">削除</a></li>
          {{ Form::open(['url' => "/tweets/{$tweet->id}", 'method' => 'delete', 'id' => 'delete']) }}
          {{ Form::close() }}
        </ul>
      </div>
    @endif

    <p>{{ $tweet->text }}</p>
    <span class="name">
      <a href="#">
        <span>投稿者</span>{{ App\User::find($tweet->user_number)->name }}
      </a>
    </span>
  </div>

  @if (Auth::check())
    <div class="container">
      {{ Form::open(['url' => "/tweets/{$tweet->id}/comments", 'method' => 'post']) }}
        <textarea placeholder="コメントする" cols="30" rows="2" name="text"></textarea>
        <input type="submit" value="SENT">
      {{ Form::close() }}
    </div>
  @endif

  <div class="comments">
    <h4><コメント一覧></h4>
    @foreach($comments as $comment)
      <p>
        <strong><a href="/users/{{ $comment->user_number }}">{{ App\User::find($comment->user_number)->name }}</a>:</strong>
        {{ $comment->text }}
      </p>
    @endforeach
  </div>
</div>
@endsection