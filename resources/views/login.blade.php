@extends('layouts.index')
@section('content')
    <div class="registration_auth">
        <div class="wrapper">
            <div class="reg-auth__container">
                <h3 class="h2-title">Войти</h3>

                <form action="{{route('signin')}}" method="post">
                    @csrf
                    <input type="text" class="reg-input" placeholder="email" name="email">
                    <p class="error">  @error('email'){{$message}}@enderror</p>
                    <input type="password" class="reg-input" placeholder="Пароль" name="password">
                    <p class="error">  @error('password'){{$message}}@enderror</p>
                    <p>@error(''){{$message}}@enderror</p>
                    <button class="reg-button">Войти</button>

                </form>

            </div>

            <div class="line"></div>

            <div class="reg-auth__container">
                <h3 class="h2-title">Регистрация</h3>

                <form action="{{route('signup')}}" method="post">
                    @csrf
                    <input type="text" class="reg-input" placeholder="Ваше имя" name="name">
                    <p class="error">  @error('name'){{$message}}@enderror</p>
                    <input type="text" class="reg-input" placeholder="Ваш email" name="email">
                    <p class="error">  @error('email'){{$message}}@enderror</p>
                    <input type="password" class="reg-input" placeholder="Пароль" name="pass">
                    <p class="error">  @error('pass'){{$message}}@enderror</p>
                    <input type="password" class="reg-input" placeholder="Повторите пароль" name="re_pass">
                    <p class="error">  @error('re_pass'){{$message}}@enderror</p>
                    <input type="submit" class="reg-button" value="Регистрация"></input>
                </form>

            </div>
        </div>

    </div>
@endsection

