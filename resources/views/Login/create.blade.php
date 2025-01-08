@extends('layouts.main')
@section('content')
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <img src="{{Vite::asset('resources/images/login.jpg')}}" alt="login" class="login-card-img">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <div class="brand-wrapper">
                                <img src="{{Vite::asset('resources/images/logo.svg')}}" alt="logo" class="logo">
                            </div>
                            <p class="login-card-description">Войдите в свой аккаунт</p>
                            <form action="{{route('login.store')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="email" class="sr-only">Email</label>
                                    <input type="email" name="email" id="email"
                                           class="form-control"
                                           placeholder="Email адрес">
                                    @if($errors->has('email'))
                                        <div class="mt-2 text-sm text-danger">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                                <div class="form-group mb-4">
                                    <label for="password" class="sr-only">Пароль</label>
                                    <input type="password" name="password" id="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           placeholder="Введите свой пароль">
                                    @if($errors->has('password'))
                                        <div class="mt-2 text-sm text-danger">
                                            {{$errors->first('password')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-check m-md-3">
                                    <input class="form-check-input" type="checkbox" name="remember"
                                           id="remember">
                                    <label class="form-check-label" for="remember">
                                        Запомнить меня
                                    </label>
                                </div>

                                <button name="login" id="login" class="btn btn-block login-btn mb-4" type="submit"
                                >Вход
                                </button>
                            </form>
                            <a href="#!" class="forgot-password-link">Забыли пароль?</a>
                            <p class="login-card-footer-text">Нет аккаунта? |
                                <a href="{{route('register.create')}}" class="text-reset">Зарегистрируйтесь
                                    здесь</a></p>
                            <nav class="login-card-footer-nav">
                                <a href="#!">Условия эксплуатации.</a>
                                <a href="#!">`</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection



