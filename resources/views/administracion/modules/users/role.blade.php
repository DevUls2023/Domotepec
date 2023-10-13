@extends('adminlte::page')
@section('title', 'Roles')

@section('content')
    <div class="container py-4">
        <h1 class="text-center">Edicion de roles de usuarios</h1> <br>
        <div class="card">
            <div class="card-body">
                <h2 class="text-center">Datos de usuario:</h2>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <form>
                                <div class="form-group">
                                    <div class="row justify-content-center align-items-center g-2">
                                        <div class="col">
                                            <label for="name-{{ $user->id }}">Nombre:</label>
                                            <input id="name-{{ $user->id }}" type="text"
                                                name="name-{{ $user->id }}" class="form-control"
                                                value="{{ $user->name }}" disabled>
                                        </div>
                                        <div class="col"> <label for="email-{{ $user->id }}">Email:</label>
                                            <input id="email-{{ $user->id }}" type="email"
                                                name="email-{{ $user->id }}" class="form-control"
                                                value="{{ $user->email }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                {{-- {{ route('users.update', $user->id) }} --}}
                            </form>
                            {!! Form::model($user, [
                                'route' => ['users.update', $user->id],
                                'method' => 'PUT',
                            ]) !!}
                            <div class="col-12">
                                <label for="rol-{{ $user->id }}">Rol:</label>
                                @if (Auth::user()->id === $user->id)
                                <div>
                                    {!! Form::select('roles[]', $roles->pluck('name', 'id'), null, [
                                        'class' => 'form-control',
                                        'disabled' => 'disabled',
                                    ]) !!}
                                </div>
                                @else
                                <div>
                                    {!! Form::select('roles[]', $roles->pluck('name', 'id'), null, [
                                        'class' => 'form-control', 
                                    ]) !!}
                                </div>
                                @endif 
                            </div>
                            {!! Form::close() !!}
                            <form action="" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <div class="row justify-content-center align-items-center g-2">
                                        <div class="col">
                                            <label for="">Permisos:</label>
                                            <div class="row row-cols-3"> 
                                                {!! Form::model($user, [
                                                    'route' => ['users.update', $user->id],
                                                    'method' => 'PUT',
                                                ]) !!}
                                                @foreach ($permisos as $permiso)
                                                    <div class="col ">
                                                        <div class="form-check">
                                                            {!! Form::checkbox('permisos[]', $permiso->id, null, [
                                                                'class' => 'form-check-input',
                                                                'id' => "permiso-$permiso->id",
                                                            ]) !!}
                                                            {!! Form::label("permiso-$permiso->id", $permiso->name, ['class' => 'form-check-label']) !!}
                                                        </div>
                                                    </div>
                                                @endforeach
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                        @if (Auth::user()->id === $user->id)
                                        @else
                                        @endif
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="{{ route('users.index') }}" type="button"
                                        class="btn btn-outline-danger">Cancelar</a>
                                    <button type="submit" class="btn btn-outline-primary">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
