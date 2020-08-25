@extends('admin.index')
@section('admin-actions')
    <form action="{{ route('admin.Add-News') }}" method="post" class="addNews" enctype="multipart/form-data">
        @csrf
        <div class="input-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text input-group-text_width" id="basic-addon1">Категория новости</span>
                </div>
                <select name="category" id="newsCategory" class="form-control">
                    @forelse ($categories as $category)
                        <option @if ($category->id == old('category')) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                    @empty
                        <option value="#">Категорий нет</option>
                    @endforelse
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text input-group-text_width" id="basic-addon1">Заголовок новости</span>
                </div>
                <input type="text" name="news-name" class="form-control" aria-label="Заголовок" aria-describedby="basic-addon1" value={{ old('news-name') }}>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text input-group-text_width">Текст новости</span>
                </div>
                <textarea class="form-control" name="news-text" aria-label="Текст новости">{{ old('news-text') }}</textarea>
            </div>
            <div class="input-group mb-3">
                <input type="file" name="newsImage">
            </div>
            <div class="input-group mb-3">
                <button type="submit" class="btn btn-dark">Отправить</button>
            </div>
        </div>
    </form>
@endsection