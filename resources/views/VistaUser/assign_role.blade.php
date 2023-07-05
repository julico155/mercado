@extends('dashboard')

@section('usuario')

<h2>Asignar Rol a {{ $user->name }}</h2>

<form action="{{ route('user.update_role', $user->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="role">Seleccionar Rol:</label>
    <select name="role" id="role">
        @foreach($roles as $role)
            <option value="{{ $role->name }}">{{ $role->name }}</option>
        @endforeach
    </select>

    <button type="submit">Asignar Rol</button>
</form>

@endsection
