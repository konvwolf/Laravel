@extends('layouts.page')
@section('content')
    <h2>
        Новости
    </h2>
    <ul class="newsList">
        @forelse($news as $item)
            <li>
                <a href="{{ route('news.NewsById', $item->id . '---' . Str::slug($item->title)) }}/">{{ $item->title }}</a>
            </li>
        @empty
            <p>
                Мы пока не нашли ни одной хорошей новости
            </p>
        @endforelse
    </ul>
@endsection