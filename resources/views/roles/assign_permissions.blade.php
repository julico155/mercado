@extends('dashboard')

@section('usuario')


<h2 style="text-align: center; font-weight: bold; font-size: 24px;">Asignar Permisos a {{ $role->name }}</h2>

<form action="{{ route('rol.update_permissions', $role->id) }}" method="POST" style="display: flex; flex-direction: column; align-items: center;">
    @csrf
    @method('PUT')

    <h3>Permisos disponibles:</h3>
    <ul style="list-style: none; padding: 0;">
        @foreach($permissions as $permission)
            <li style="margin-bottom: 10px;">
                <label>
                    <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" {{ $role->hasPermissionTo($permission) ? 'checked' : '' }}>
                    {{ $permission->name }}
                </label>
            </li>
        @endforeach
    </ul>

    <button type="submit" style="background-color: green; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Guardar Permisos</button>
</form>

@endsection
