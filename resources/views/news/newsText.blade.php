@extends('layouts.page')
@section('content')
    @empty($newsText)
        <h2>
            Такой новости у нас нет
        </h2>
    @else
        @if($newsText->is_private == 1)
            <img src="{{ asset($newsText->image) }}" alt="Image" class="newsImage">
            <h2>
                {{ $newsText->title }}
            </h2>
            <p>
                Зарегистрируйтесь, чтобы прочитать новость
            </p>
        @else
            <img src="{{ asset($newsText->image) }}" alt="Image" class="newsImage">
            <h2>
                {{ $newsText->title }}
            </h2>
            <p>
                {{ $newsText->text }}
            </p>
        @endif
    @endempty
@endsection