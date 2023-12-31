@extends('adminlte::page')
@section('title', 'Cabanas')

@section('content')
    <div class="content-header">
        <div class="container-lg">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center py-2 mb-2">Servicios de la cabaña: {{ $cabana->nombre }} </h1>

                    <div class="card">

                        <div class="card-body">
                            <div class="card">
                                <div class="card-body">
                                    <h5>Servicios agregados a la cabana: </h4>

                                        <div class="row row-cols-5">
                                            @foreach ($cabana->servicios as $servicio)
                                                <div class="col">
                                                    <div class="card ">
                                                        <div class="card-body">
                                                            @can('cabanas.edit')
                                                                <div class="row row-cols-2">
                                                                    <div class="col">
                                                                        <h4 class="card-title">{{ $servicio->nombre }}</h4>
                                                                    </div>
                                                                    <div class="col">
                                                                        <form {{-- action="{{ route('cabanas.servicios.delete', ['cabana' => $cabana->id, 'servicio' => $servicio->id]) }}" --}}
                                                                            action="{{ route('cabanas.servicios.delete') }}"
                                                                            method="POST" style="display: inline;">
                                                                            @csrf
                                                                            <input name="cabana" type="number"
                                                                                value="{{ $cabana->id }}"
                                                                                style="display: none">
                                                                            <input name="servicio" type="number"
                                                                                value="{{ $servicio->id }}"
                                                                                style="display: none">
                                                                            <input name="id" type="number"
                                                                                value="{{ $servicio->id }}"
                                                                                style="display: none">

                                                                            <button type="submit" class="close"
                                                                                data-toggle="tooltip" data-placement="right"
                                                                                title="Eliminar servicio" aria-label="Close">
                                                                                <span aria-hidden="true">
                                                                                    &times;
                                                                                </span>
                                                                            </button>

                                                                        </form>

                                                                    </div>
                                                                </div>
                                                            @endcan
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                </div>
                            </div>


                        </div>
                        <div class="card mt-3">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="servicios" class="table table-hover table-responsive-md">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($servicios as $servicio)
                                                @if (!$cabana->servicios->contains($servicio))
                                                    <tr>
                                                        <td>{{ $servicio->id }}</td>
                                                        <td>{{ $servicio->nombre }}</td>
                                                        <td>
                                                            <form method="POST"
                                                                action="{{ route('cabanas.servicios.store') }}">
                                                                @csrf
                                                                <input name="cabana" type="number"
                                                                    value="{{ $cabana->id }}" style="display: none">
                                                                <input name="servicio" type="number"
                                                                    value="{{ $servicio->id }}" style="display: none">

                                                                <button type="submit" class="btn btn-outline-primary"><i
                                                                        class="fas fa-plus"></i> Agregar</button>

                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="{{ route('cabanas.edit', $cabana->id) }}" type="button"
                                class="btn btn-outline-primary">Regresar</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });

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

@endsection
