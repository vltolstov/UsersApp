@extends('.layouts.main')

@section('content')

    @if (session('password-changed'))
        {{ __('messages.password-changed') }}
    @endif

    <div>
        <form method="POST" action="{{route('login_process')}}">
            @csrf
            @error('login-message')
            <p>{{$message}}</p>
            @enderror
            <div>
                <label>Почта</label>
                <input type="email" name="email" placeholder="Почта" value="{{ old('email') }}">
            </div>
            <div>
                <label>Пароль</label>
                <input type="password" name="password" placeholder="Пароль">
                @error('password')
                <p>{{$message}}</p>
                @enderror
            </div>
            <div>
                <button type="submit">Отправить</button>
            </div>
        </form>
        <div>
            <p>Забыли пароль? - <a href="{{route('forgot-password')}}">Восстановить</a></p>
        </div>
    </div>

@endsection
