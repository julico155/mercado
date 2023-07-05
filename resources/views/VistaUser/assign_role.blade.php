@extends('dashboard')

@section('usuario')

<h2 class="text-center font-bold text-2xl">Asignar Rol a {{ $user->name }}</h2>

<form action="{{ route('user.update_role', $user->id) }}" method="POST" class="flex flex-col items-center">
    @csrf
    @method('PUT')

    <label for="role" class="mb-2">Seleccionar Rol:</label>
    <select name="role" id="role" class="rounded-md">
        @foreach($roles as $role)
            <option value="{{ $role->name }}">{{ $role->name }}</option>
        @endforeach
    </select>

    <button type="submit" class="bg-green-500 text-white rounded-md py-2 px-4 mt-4">Asignar Rol</button>
</form>

@endsection
