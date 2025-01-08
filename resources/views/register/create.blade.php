<div>
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
                                @if(session('success'))
                                    <div class=" alert alert-success">{{session('success')}}</div>

                                @endif
                                <p class="login-card-description">Регистрацция аккаунта</p>

                                <form action="{{route('register.store')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name" class="sr-only">Имя</label>
                                        <input type="text" name="name" id="name" value="{{old('name')}}"
                                               class="form-control @error('name') is-invalid @enderror"
                                               placeholder="Введите имя">
                                        @if($errors->has('name'))
                                            <div class="mt-2 text-sm text-danger">
                                                {{$errors->first('name')}}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="sr-only">Email</label>
                                        <input type="email" name="email" id="email"
                                               value="{{old('email')}}"
                                               class="form-control  @error('email') is-invalid @enderror"
                                               placeholder="Email адрес">
                                        @if($errors->has('email'))
                                            <div class="mt-2 text-sm text-danger">
                                                {{$errors->first('email')}}
                                            </div>
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
                                    <Button name="login" id="login" class="btn btn-block login-btn mb-4" type="submit">
                                        Регистрация
                                    </Button>

                                </form>
                                <a href="#!" class="forgot-password-link">Забыли пароль?</a>
                                <p class="login-card-footer-text">Уже есть аккаунт? <a href="{{route('login')}}"
                                                                                       class="text-reset">|
                                        Вход</a></p>
                                <nav class="login-card-footer-nav">
                                    <a href="#!">Условия эксплуатации.</a>
                                    <a href="#!">Политика конфиденциальности</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
</div>
@endsection
