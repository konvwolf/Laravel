@extends('admin.index')
@section('admin-actions')
<ul class="newsList">
    @forelse($news as $item)
        <li>
            <a href="{{ route('news.NewsById', $item->id . '---' . Str::slug($item->title)) }}/">{{ $item->title }}</a> — <a href="{{ route('admin.Update-News', $item->id) }}/" class="newsAdminEdit">Редактировать</a> — <a href="{{ route('admin.Delete-News', $item->id) }}/" class="newsAdminDelete">Удалить</a>
        </li>
    @empty
        <p>
            Новостей пока никаких нет
        </p>
    @endforelse
</ul>
{{ $news->links() }}
@endsection