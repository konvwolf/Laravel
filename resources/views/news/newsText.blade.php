@extends('layouts.page')
@section('content')
    <h2>
        @empty($newsText)
            Такой новости у нас нет
        @else
            {{ $newsText['title'] }}
        @endempty
    </h2>
    <p>
        @empty($newsText)
        @else
            {{ $newsText['text'] }}
        @endempty
    </p>
@endsection