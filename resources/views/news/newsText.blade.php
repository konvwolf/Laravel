@extends('layouts.page')
@section('content')
    <img src="{{ asset($newsText->image) }}" alt="Image" class="newsImage">
    <h2>
        @empty($newsText)
            Такой новости у нас нет
        @else
            {{ $newsText->title }}
        @endempty
    </h2>
    <p>
        @empty($newsText)
        @else
            {{ $newsText->text }}
        @endempty
    </p>
@endsection