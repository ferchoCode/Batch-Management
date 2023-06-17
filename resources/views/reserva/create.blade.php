@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/vistas/tabla.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vistas/maps.css') }}">

    <style>
        .checkboxes div {
            display: inline-block;
            margin-right: 10px;
        }

        .checkbox {
            display: inline-block;
            margin-right: 20px;
        }

        .checkboxes input[type="checkbox"] {
            transform: scale(1.5);
            margin-right: 5px;
        }
    </style>
@endsection
@section('content')
    <section class="section">

        <div class="section-header mb-4">
            <h1 class="page__heading">CREAR RESERVA</h1>
        </div>
        <div class="section-body">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-body">
                            @if (Session::has('error'))
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert">
                                        <i class="fa fa-times"></i>
                                    </button>
                                    <strong></strong> {{ session('error') }}
                                </div>
                            @endif
                            <div class="row ">

                                <div class="col-6">
                                    <form class="form" action="{{ url('reserva') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="cliente" class="form-label">Cliente:</label>
                                            <input type="text" class="form-control" id="buscador" name="cliente"
                                                placeholder="Ingrese el nombre del cliente">

                                            <input type="text" class="form-control" id="cliente_id" name="cliente_id"
                                                placeholder="id" hidden>
                                        </div>
                                        <label for="lote" class="form-label">Lotes Disponibles:</label>
                                        <div class="checkboxes">
                                            @foreach ($lotes as $lote)
                                                @if ($lote->estado == 'Disponible')
                                                    <div>
                                                        <input type="checkbox" id="{{ $lote->id }}" name="lotes[]"
                                                            value="{{ $lote->id }}">
                                                        <label for="{{ $lote->id }}">{{ $lote->id }}</label>
                                                    </div>
                                                @endif
                                            @endforeach

                                        </div>
                                        <br>
                                        <div class="mb-3">
                                            <label for="monto" class="form-label">Monto:</label>
                                            <br>
                                            <h2 for="mi-checkbox">100$</h2>
                                        </div>


                                        <button type="submit" class="btn btn-primary">Enviar</button>
                                    </form>

                                </div>
                                <div class="col-6">
                                    <div id="map">

                                    </div>
                                </div>
                                </form>

                            </div>

                            {{-- <div class="col-12">
                                    <div class="tabla">
                                        @include('propiedad.tabla')
                                    </div>
                                </div> --}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- @include('act_fijo.modal-create') --}}
    {{-- @include('nivel.modal-edit') --}}
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgNkYnjTUv0x2z2NYMtp9DDKX7Np2Y9sk&callback=initMap">
    </script>
    <script src="{{ asset('assets\js\sacaguazu\maps.js') }}"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: "/api/ajaxgetcliente",
                type: "GET",
                success: function(data) {
                    var nombres = data.map(function(cliente) {
                        $("#cliente").val(cliente.nombre)
                        return {
                            label: cliente.nombre + ' ' + cliente.apellido,
                            value: cliente.id
                        }
                    });
                    console.log(nombres);

                    $("#buscador").autocomplete({
                        source: nombres,
                        select: function(event, ui) {
                            // Obtener el ID del elemento seleccionado
                            var cliente = ui.item.label;
                            var id = ui.item.value;

                            // Asignar el ID al campo de entrada de texto
                            $("#cliente_id").val(id);
                            $("#buscador").val(cliente);
                            event.preventDefault();

                        }
                    });
                }
            });
        });
    </script>
@endsection
