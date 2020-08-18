@extends('layouts.page')
@section('content')
    <form class="loginForm" method="post" action="{{ route('Login') }}">
        <div class="form-group">
            @csrf
            <label for="exampleInputEmail1">Email</label>
            <input type="email" name="login" class="form-control" id="exampleInputEmail1">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Пароль</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-dark">Отправить</button>
    </form>
@endsection