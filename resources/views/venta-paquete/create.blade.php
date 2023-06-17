@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/vistas/tabla.css') }}">
@endsection
@section('content')
    <section class="section">
        <div class="section-header mb-4">
            <h1 class="page__heading">NUEVA VENTA DE PAQUETES-</h1>
        </div>
        <div class="section-body">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-body">
                            <div class="row ">

                                <div class="col-12">
                                    <form class="form" action="{{ url('ventapaquete') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body pb-0 pt-0">
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label>Socio
                                                        <span class="text-danger select2_categoria">*</span></label>
                                                    <select class="form-control" style="width: 100%" name="socio_id"
                                                        id="" value="{{ old('socio_id') }}">
                                                        <option value="">Seleccionar Socio</option>

                                                        @foreach ($socio as $socios)
                                                            <option value="{{ $socios->id }}">
                                                                {{ $socios->nombre }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Paquete
                                                        <span class="text-danger">*</span></label>
                                                    <select class="form-control select2_categoria" style="width: 100%"
                                                        name="paquete_id" id="" onchange="buscarPaquetes(this)"
                                                        value="{{ old('paquete_id') }}">
                                                        <option value="">Seleccionar Paquete</option>

                                                        @foreach ($paquete as $paquetes)
                                                            <option value="{{ $paquetes->id }}">
                                                                {{ $paquetes->nombre }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-4">
                                                    <label>Fecha
                                                        <span class="text-danger">*</span></label>

                                                    <input type="text" class="form-control datepicker"
                                                        placeholder="Ingrese fecha " name="fecha"
                                                        autocomplete="off" value="{{ old('fecha') }}"autofocus />
                                                    @error('fecha')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                </div>

                                               
                                                    <input type="number" step="0.01" class="form-control" id="monto"
                                                        placeholder="monto" name="monto" value="{{ old('monto') }}"
                                                        autofocus  hidden/>
                                            




                                            </div>

                                            <div class="form-group col-md-6 d-flex  ">
                                                <button type="submit" class="btn btn-success ml-2">Termina venta</button>
                                                <a class="btn btn-danger ml-2">Cancelar venta</a>

                                            </div>

                                        </div>
                                    </form>
                                </div>

                                <div class="col-12">
                                    <h5>TOTAL A PAGAR: Bs<label id="montito"></label></h5>
                                    <div class="tabla">
                                        @include('venta-paquete.tabla-paquete')
                                    </div>
                                </div>

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
        </div>
    </section>
    {{-- @include('act_fijo.modal-create') --}}
    {{-- @include('nivel.modal-edit') --}}
@endsection

@section('scripts')
    <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
    <script>
        $(document).ready(function() {
            $.datepicker.regional['es'] = {
                closeText: 'Cerrar',
                prevText: '<Ant',
                nextText: 'Sig>',
                currentText: 'Hoy',
                monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto',
                    'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
                ],
                monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov',
                    'Dic'
                ],
                dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
                dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
                weekHeader: 'Sm',
                dateFormat: 'yy-mm-dd',
                firstDay: 1,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: ''
            };
            $.datepicker.setDefaults($.datepicker.regional['es']);
            $(function() {
                $('.datepicker').datepicker();


            });
            $('.select2_categoria').select2({
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
        var arraypaquetes = [];

        function buscarPaquetes(paquete) {
            console.log(paquete.value)
            $.ajax({
                type: "GET",
                url: "{{ url('tablapaquete') }}",
                data: {
                    id: paquete.value
                },
                success: function(response) {
                    //console.log(response);

                    $('.tabla').html(response.view);
                    console.log(response.paqueteajax);


                    document.getElementById('montito').innerHTML= response.paqueteajax[0].precio;
                    document.getElementById('monto').value= response.paqueteajax[0].precio;


                    // $('#sumatotal').text(response.sumaTotal.montoTotal);
                    // $('#cantidadtotal').text(response.sumaTotal.contadorTotal);

                },
                error: function(xhr, ajaxOptions, thrownError) {}
            });
        }

        function cantidadmonto() {
            var cantidad = document.getElementById('cantidad').value;
            var monto = document.getElementById('monto').value;
            
            let total = cantidad * monto
            document.getElementById('montito').innerHTML= total;
            document.getElementById('monto').value= total;

        }
    </script>

    <script>
        function confirmEliminar(id) {
            //eliminar(id);
            console.log(id);
            Swal.fire({
                title: 'Esta seguro de eliminar este Registro ??',
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
