@extends('admin.index')
@section('admin-actions')
    <form action="post" class="addNews">
        <div class="input-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text input-group-text_width" id="basic-addon1">Заголовок новости</span>
                </div>
                <input type="text" class="form-control" aria-label="Заголовок" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text input-group-text_width">Текст новости</span>
                <textarea class="form-control" aria-label="Текст новости"></textarea>
            </div>
            <div class="input-group mb-3">
                <button type="submit" class="btn btn-dark">Отправить</button>
            </div>
        </div>
    </form>
@endsection