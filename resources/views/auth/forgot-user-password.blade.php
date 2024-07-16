@extends('layouts.main')

@section('content')
    <div>
        <form action="{{route('forgot-password-process')}}" method="POST">
            @csrf
            <div>
                <label>Ваш E-mail</label>
                @error('forgot-password-error')
                {{$message}}
                @enderror
                <input type="email" name="email" placeholder="e-mail">
            </div>
            <div>
                <button type="submit">Отправить</button>
            </div>
        </form>
    </div>
@endsection
