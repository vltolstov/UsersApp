@extends('.layouts.main')

@section('content')
    <p>Просмотр и редактирование своих данных</p>

    <form action="{{route('users.update', $user->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>Имя</label>
            @error('name')
            {{ $message }}
            @enderror
            <input name="name" type="text" value="{{$user->name}}">
        </div>
        <div>
            <button type="submit">Сохранить</button>
        </div>
    </form>
    <div>
        <p>Удалить учетную запись?</p>
        <form action="{{route('users.destroy', $user->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Удалить</button>
        </form>
    </div>

    @can('extended-user-information')
        <p>Расширенная информация для разработчика:</p>
        <p>id - {{$user->id}}</p>
        <p>name - {{$user->name}}</p>
        <p>email - {{$user->email}}</p>
    @endcan
@endsection
