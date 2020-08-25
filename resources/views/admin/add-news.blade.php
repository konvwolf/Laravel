@extends('admin.index')
@section('admin-actions')
    <form action="@if(isset($news)) {{ route('admin.Update-News', $news) }} @else {{ route('admin.Create-News') }} @endif" method="post" class="addNews" enctype="multipart/form-data">
        @csrf
        <div class="input-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text input-group-text_width" id="basic-addon1">Категория новости</span>
                </div>
                <select name="category" id="newsCategory" class="form-control">
                    @forelse ($categories as $category)
                        <option @if ($category['id'] == old('category')) selected @endif value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                    @empty
                        <option value="#">Категорий нет</option>
                    @endforelse
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text input-group-text_width" id="basic-addon1">Заголовок новости</span>
                </div>
                <input type="text" name="news-name" class="form-control" aria-label="Заголовок" aria-describedby="basic-addon1" value="{{ isset($news->title) ? $news->title : old('news-name') }}">
            </div>
            <div class="input-group mb-3 textAreaHeight">
                <div class="input-group-prepend">
                    <span class="input-group-text input-group-text_width">Текст новости</span>
                </div>
                <textarea class="form-control" name="news-text" aria-label="Текст новости">{{ isset($news->text) ? $news->text : old('news-text') }}</textarea>
            </div>
            <div class="input-group mb-3">
                <input type="file" name="newsImage">
            </div>
            <div class="input-group mb-3 form-check">
                <input @if (old('isPrivate') == 1 || isset($news) && $news->isPrivate == 1) checked @endif name="isPrivate" class="form-check-input" type="checkbox" id="newsPrivate">
                <label class="form-check-label" for="newsPrivate">Новость для зарегистрированных пользователей?</label>
            </div>
            <div class="input-group mb-3">
                <button type="submit" class="btn btn-dark">Отправить</button>
            </div>
        </div>
    </form>
@endsection