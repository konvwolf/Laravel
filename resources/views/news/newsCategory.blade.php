@extends('layouts.page')
@section('content')
    <h2>
        @empty($category)
            Такой категории нет
        @else
            {{ $category->name }}
        @endempty
    </h2>
    <ul class="newsList">
        @forelse($newsList as $item)
            <li>
                <a href="{{ route('news.NewsById', $item['id'] . '---' . Str::slug($item['title'])) }}/"><?= $item['title'] ?></a>
            </li>
        @empty

        @endforelse
    </ul>
    {{ $newsList->links() }}
@endsection