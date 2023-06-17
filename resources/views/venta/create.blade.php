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
            <h1 class="page__heading">CREAR VENTAS</h1>
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
                                    <form class="form" id="formulario_venta" action="{{ url('venta') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="cliente" class="form-label">Cliente:</label>
                                            <input type="text" class="form-control" id="buscador" name="cliente"
                                                placeholder="Ingrese el nombre del cliente">

                                            <input type="text" class="form-control" id="cliente_id" name="cliente_id"
                                                placeholder="id" hidden>
                                        </div>
                                        <div class="mb-3">
                                            <label for="cliente" class="form-label">nro Lote:</label>
                                            <input type="text" class="form-control" name="lote_id"
                                                placeholder="Ingrese el nro del lote" readonly>
                                        </div>



                                        <div class="mb-3">
                                            <label for="monto" class="form-label">Monto:</label>
                                            <input type="text" class="form-control" name="monto"
                                                placeholder="Ingrese el monto" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="cliente" class="form-label">Fecha:</label>
                                            <input type="text" class="form-control datepicker"
                                                placeholder="Ingrese fecha " name="fecha" autocomplete="off"
                                                value="{{ old('fecha') }}"autofocus readonly />

                                        </div>
                                        <div class="mb-3">
                                            <label for="monto" class="form-label">Tipo de Venta:</label>
                                            <select class="form-control" style="width: 100%" name="tipo_vent"
                                                id="tipo_venta">
                                                <option value="">Seleccion el tipo de venta</option>
                                                <option value="Contado">Contado</option>
                                                <option value="Credito">Credito</option>

                                            </select>
                                        </div>

                                        <div class="mb-3" id="input-oculto_descripcion" style="display:none;">
                                            <label for="cliente" class="form-label">Descripcion:</label>
                                            <input type="text" class="form-control" name="descripcion"
                                                placeholder="Ingrese el monto" autocomplete="off"
                                                value="{{ old('fecha') }}"autofocus />
                                        </div>

                                        <div class="mb-3" id="input-oculto_descuento" style="display:none;">
                                            <label for="cliente" class="form-label">Descuento:</label>
                                            <input type="number" class="form-control" name="descuento"
                                                placeholder="Ingrese el monto" autocomplete="off"
                                                value="{{ old('descripcion') }}"autofocus />

                                        </div>


                                        <button id="input-oculto_btn" type="submit" class="btn btn-primary"
                                            style="display:none;">Realizar Venta</button>
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
        var datos = JSON.parse('<?php echo isset($lote_reservas) ? $lote_reservas: 0; ?>');
        console.log(datos[0])
        var form_venta = document.getElementById("formulario_venta");
        var lote_id = form_venta.elements["lote_id"];
        var monto = form_venta.elements["monto"];
        var fecha = form_venta.elements["fecha"];
        var cliente = form_venta.elements["cliente"];
        var cliente_id = form_venta.elements["cliente_id"];


        var fecha_actual = new Date();

        lote_id.value = datos[0].id;
        monto.value = datos[0].precio;
        cliente.value = datos[0].nombre_completo;
        cliente_id.value = datos[0].cliente_id;


        fecha_formato = fecha_actual.toLocaleDateString();

        var partes = fecha_formato.split("/");

        var dia = partes[0];
        var mes = partes[1];
        var anio = partes[2];
        if (mes.length === 1) {
            mes = "0" + mes;
        }
        var fechaFormateada = anio + "-" + mes + "-" + dia;
        fecha.value = fechaFormateada;
    </script>
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
    <script>
        var opcion = document.getElementById("tipo_venta");
        var inputOculto_descripcion = document.getElementById("input-oculto_descripcion");
        var inputOculto_descuento = document.getElementById("input-oculto_descuento");
        var inputOculto_btn = document.getElementById("input-oculto_btn");


        opcion.addEventListener("change", function() {
            if (opcion.value == "Credito") {
                inputOculto_descripcion.style.display = "none";
                inputOculto_descuento.style.display = "none";
                inputOculto_btn.style.display = "none";


            } else {
                inputOculto_descripcion.style.display = "block";
                inputOculto_descuento.style.display = "block";
                inputOculto_btn.style.display = "block";

            }
        });
    </script>
@endsection
