@extends('layouts.page')
@section('content')
    @if(View::hasSection('admin-actions'))
        @yield('admin-actions')
    @else
        <div class="adminActions">
            <p>
                <a href="{{ route('admin.Add-News') }}/">Добавить новость</a>
            </p>
        </div>
    @endif
@endsection