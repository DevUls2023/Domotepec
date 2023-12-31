@extends('layouts.app')
@section('title', 'Servicios')
@section('css')
    <link rel="stylesheet" href="{{ asset('/css/admin/app.css') }}">
@endsection

@section('content-admin')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center mt-3">Modulo Servicios</h1>

                {{-- <a href="{{ route('users.create') }}" class="btn btn-primary" data-toggle="modal" 
                    <a href="{{ route('users.create') }}" class="btn btn-primary" data-toggle="modal" data-target="#modal-create">Crear Usuario</a> --}}
                {{-- <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create">
                    Crear Usuario
                </a> --}}
                @can('servicios.create')
                @endcan
                <a href="{{ route('servicios.create') }}" class="btn btn-outline-primary"><i class="fas fa-user"></i> Crear
                    Servicio</a>

                <div class="card mt-3">
                    <div class="card-body ">
                        <div class="table-responsive">
                            <table id="servicios" class="table table-hover table-responsive-md"
                                style=" border-radius: 5px; overflow: hidden;">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Imagen</th>
                                        <th>Nombre</th>
                                        <th>Sucursal</th>
                                        <th>Empresa</th>
                                        <th>Costo</th>
                                        <th>Stock</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($servicios as $servicio)
                                        <tr>
                                            <td>{{ $servicio->id }}</td>
                                            <td>
                                                @if ($servicio->imagen)
                                                    <img src="{{ asset('img/servicios/' . $servicio->imagen) }}"
                                                        alt="Imagen de la cabana"
                                                        style="max-width: 100px;  border-radius: 5px; overflow: hidden;">
                                                @else
                                                    <img src="{{ asset('img/servicios/img.png') }}" alt="No hay imagen"
                                                        style="max-width: 50px;  border-radius: 5px; overflow: hidden;">
                                                @endif
                                            </td>
                                            <td>{{ $servicio->nombre }}</td>
                                            @foreach ($sucursales as $sucursal)
                                                @if ($servicio->sucursal === $sucursal->id)
                                                    <td>{{ $sucursal->nombre }}</td>
                                                @endif
                                            @endforeach
                                            @foreach ($empresas as $empresa)
                                                @if ($servicio->empresa === $empresa->id)
                                                    <td>{{ $empresa->nombre }}</td>
                                                @endif
                                            @endforeach
                                            <td>${{ number_format($servicio->costo, 2, '.', ',') }}</td>
                                            <td>{{ $servicio->stock }}</td>

                                            <td
                                                @if (auth()->user()->can('servicios.edit') &&
                                                        auth()->user()->can('servicios.destroy')) style="width: 200px;" @else style="width: 100px;" @endif>




                                                @can('servicios.edit')
                                                    <a type="button" href="{{ route('servicios.edit', $servicio->id) }}"
                                                        class="btn btn-outline-primary">
                                                        <i class="fas fa-pen"></i> Editar
                                                    </a>
                                                @endcan
                                                @can('servicios.destroy')
                                                    <a type="button" class="btn btn-outline-danger" data-toggle="modal"
                                                        data-target="#modal-eliminar-{{ $servicio->id }}">
                                                        <i class="fas fa-trash"></i> Eliminar
                                                    </a>
                                                    @include('administracion.modules.servicios.delete')
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@section('js')
    <script>
        @if (session('success'))
            {
                alertify.notify("{{ session('success') }}", 'success', 5);
            }
        @endif
        @if (session('error'))
            {
                alertify.error("{{ session('error') }}", 'error', 5);
            }
        @endif
        @if (session('info'))
            {
                alertify.notify("{{ session('info') }}", 'custom', 5);
            }
        @endif
    </script>
    <script>
        new DataTable('#servicios', {
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando del _START_ al _END_ de un total de _TOTAL_ servicios",
                "infoEmpty": "",
                "infoFiltered": "(_MAX_ servicios filtrados)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ servicios",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "No se encontraron coincidencias",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            lengthMenu: [
                [5, 10, 50, -1],
                [5, 10, 50, "Todos"]
            ]
        });
    </script>

@endsection
@endsection
