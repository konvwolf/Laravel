@extends('layouts.page')
@section('content')
    <h2>
    @empty($newsText)
            Такой новости у нас нет
        </h2>
        @if($newsText->isPrivate == 1)
            <img src="{{ asset($newsText->image) }}" alt="Image" class="newsImage">
            <h2>
                {{ $newsText->title }}
            </h2>
            <p>
                Зарегистрируйтесь, чтобы прочитать новость
            </p>
        @else
    <p>
            <img src="{{ asset($newsText->image) }}" alt="Image" class="newsImage">
            <h2>
            </h2>
            <p>
                {{ $newsText->text }}
            </p>
        @endif
    @endempty
@endsection