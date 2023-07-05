@extends('dashboard')

@section('usuario')


<h2>Asignar Permisos a {{ $role->name }}</h2>

<form action="{{ route('rol.update_permissions', $role->id) }}" method="POST">
    @csrf
    @method('PUT')

    <h3>Permisos disponibles:</h3>
    <ul>
        @foreach($permissions as $permission)
            <li>
                <label>
                    <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                        {{ $role->hasPermissionTo($permission) ? 'checked' : '' }}>
                    {{ $permission->name }}
                </label>
            </li>
        @endforeach
    </ul>

    <button type="submit">Guardar Permisos</button>
</form>

@endsection
