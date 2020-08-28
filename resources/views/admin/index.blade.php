@extends('layouts.page')
@section('content')
    @if(View::hasSection('admin-actions'))
        @yield('admin-actions')
    @else
        <div class="adminActions">
            <p>
                <a href="{{ route('admin.create') }}" class="adminActions_links">Добавить новость</a>
            </p>
        </div>
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Название</th>
                <th scope="col"></th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
                @forelse ($news as $newsItem)
                    <tr>
                        <th scope="row">{{ $newsItem->id }}</th>
                        <td><a href="{{ route('news.NewsById', $newsItem->id . '---' . Str::slug($newsItem->title)) }}/">{{ $newsItem->title }}</a></td>
                        <td>
                            <a href="{{ route('admin.edit', $newsItem->id) }}" class="newsAdminEdit btn btn-primary">Редактировать</a></td>
                        <td>
                            <form action="{{ route('admin.destroy', $newsItem->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="Удалить">
                            </form>
                        </td>
                    </tr>
                @empty
                    
                @endforelse
            </tbody>
          </table>
          {{ $news->links() }}
    @endif
@endsection