@extends('layouts.page')
@section('content')
    <h2>
        Категории
    </h2>
    <ul class="newsCategories">
        @forelse($categories as $item)
            <li>
                <a href="{{ route('news-categories.CategoryByName', $item['slug']) }}/">{{ $item['name'] }}</a>
            </li>
        @empty
            Здесь пока нет ни одной категории
        @endforelse
    </ul>
@endsection