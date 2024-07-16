@extends('.layouts.main')

@section('content')
    <div>
        <form method="post" action="{{ route('registration_process') }}">
            @csrf
            <div class="form-block">
                <label>Имя</label>
                <input type="text" name="name" placeholder="Имя">
                @error('name')
                <p>{{$message}}</p>
                @enderror
            </div>
            <div class="form-block">
                <label>Почта</label>
                <input type="email" name="email" placeholder="Почта">
                @error('email')
                <p>{{$message}}</p>
                @enderror
            </div>
            <div class="form-block">
                <label>Пароль</label>
                <input type="password" name="password" placeholder="Пароль">
                @error('password')
                <p>{{$message}}</p>
                @enderror
            </div>
            <div class="form-block">
                <button type="submit">Отправить</button>
            </div>
        </form>
    </div>
@endsection
