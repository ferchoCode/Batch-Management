@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/vistas/tabla.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vistas/maps.css') }}">

    <style>
        .checkboxes {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .column {
            flex-basis: 19%;
        }

        .checkboxes div {
            display: inline-block;
            margin-right:50px;
        }
        .checkbox  {
            display: inline-block;
            margin-right:50px;
        }
        .checkboxes input[type="checkbox"] {
            transform: scale(1.5);
            margin-right: 5px;
        }
    </style>
@endsection
@section('content')
    <section class="section">
        <div class="section-header mb-4  d-flex justify-content-between">
            <h1 class="page__heading">VENTAS </h1>
            <a href="{{ url('venta/create') }}" class="btn btn-primary ml-2">Nuevo</a>
        </div>
        <div class="section-body">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-body">
                            <div class="row ">

                                {{-- <div class="col-12">
                                    <div class="actualizar">
                                        @include('reserva.create')
                                    </div>
                                </div>
                   --}}
                                <div class="col-12">
                                    <div class="tabla">
                                        @include('venta.tabla')
                                    </div>
                                </div> 
                            </div>

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
    <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
    <script>
        $(function() {
            $('#datepicker').datepicker();
        });

        $(document).ready(function() {
            $('#select2_categoria').select2({
                // minimumResultsForSearch: Infinity
                dropdownParent: $("#crear")
            });
            // $('#select2_categoria').val('1').trigger('change.select2');

            $('#select2_area').select2({
                // minimumResultsForSearch: Infinity
                dropdownParent: $("#crear")
            });

            $('#crear').on('hidden.bs.modal', function() {
                $(this).removeData('bs.modal');
            });

        });
    </script>
    <script>
        function confirmEliminar(id) {
            //eliminar(id);
            console.log(id);
            Swal.fire({
                title: 'Esta seguro de anular la reserva?',
                text: "Si Confirma la accion no podra recuperar los datos !!",
                //icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#187DE4',
                cancelButtonColor: '#F64E60',
                confirmButtonText: 'Si, Eliminar !'
            }).then((result) => {

                if (result.value) {
                    //form.submit();
                    $("#eliminar" + id).submit()
                }
            })
        }
    </script>
@endsection
