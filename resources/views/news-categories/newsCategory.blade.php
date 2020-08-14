@extends('layouts.page')
@section('content')
    <h2>
        @empty($category)
            Такой категории нет
        @else
            {{ $category['name'] }}
        @endempty
    </h2>
    <ul class="newsList">
        @forelse($newsList as $item)
            <li>
                <a href="{{ route('news.NewsById', $item[0] . '---' . Str::slug($item[1])) }}/"><?= $item[1] ?></a>
            </li>
        @empty

        @endforelse
    </ul>
@endsection