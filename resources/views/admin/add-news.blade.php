@extends('admin.index')
@section('admin-actions')
    @if(isset($success))
        <div class="alert alert-success" role="alert">
            {{ $success }}
        </div>
    @elseif(isset($error))
        <div class="alert alert-danger" role="alert">
            {{ $error }}
        </div>
    @endif
    <form action="@if(isset($news)) {{ route('admin.update', $news) }} @else {{ route('admin.store') }} @endif" method="post" class="addNews" enctype="multipart/form-data">
        @csrf
        @if(isset($news))
            @method('PUT')
        <input type="hidden" name="news-id" value="{{ $news->id }}">
        @endif
        <div class="input-group">
            @if ($errors->has('category'))
                <div class="alert alert-danger" role="alert">
                    @foreach ($errors->get('category') as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif
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
            @if ($errors->has('news-name'))
                    <div class="alert alert-danger" role="alert">
                        @foreach($errors->get('news-name') as $error)
                            {{ $error }}
                        @endforeach
                    </div>
            @endif
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text input-group-text_width" id="basic-addon1">Заголовок новости</span>
                </div>
                <input type="text" name="news-name" class="form-control" aria-label="Заголовок" aria-describedby="basic-addon1" value="{{ isset($news->title) ? $news->title : old('news-name') }}">
            </div>
            @if ($errors->has('news-text'))
                    <div class="alert alert-danger" role="alert">
                        @foreach($errors->get('news-text') as $error)
                            {{ $error }}
                        @endforeach
                    </div>
            @endif
            <div class="input-group mb-3 textAreaHeight">
                <div class="input-group-prepend">
                    <span class="input-group-text input-group-text_width">Текст новости</span>
                </div>
                <textarea class="form-control" name="news-text" aria-label="Текст новости">{{ isset($news->text) ? $news->text : old('news-text') }}</textarea>
            </div>
            @if ($errors->has('newsImage'))
                <div class="alert alert-danger" role="alert">
                    @foreach ($errors->get('newsImage') as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif
            <div class="input-group mb-3">
                <input type="file" name="newsImage">
            </div>
            <div class="input-group mb-3 form-check">
                <input @if (old('isPrivate') == 1 || isset($news) && $news->is_private == 1) checked @endif name="isPrivate" class="form-check-input" type="checkbox" id="newsPrivate">
                <label class="form-check-label" for="newsPrivate">Новость для зарегистрированных пользователей?</label>
            </div>
            <div class="input-group mb-3">
                <button type="submit" class="btn btn-dark">Отправить</button>
            </div>
        </div>
    </form>
@endsection