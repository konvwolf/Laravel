@extends('layouts.page')
@section('content')
    @if(View::hasSection('admin-actions'))
        @yield('admin-actions')
    @else
        <div class="adminActions">
            <p>
                <a href="{{ route('admin.Create-News') }}/">Добавить новость</a>
            </p>
            <p>
                <a href="{{ route('admin.Read-News') }}/">Редактировать или удалить новость</a>
            </p>
        </div>
    @endif
@endsection