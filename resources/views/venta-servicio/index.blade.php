@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/vistas/tabla.css') }}">
@endsection
@section('content')
    <section class="section">
        <div class="section-header mb-4  d-flex justify-content-between">
            <h1 class="page__heading">VENTA DE SERVICIOS </h1>
            <a href="{{url('ventaservicio/create')}}" class="btn btn-primary ml-2">Nuevo</a>
        </div>
        <div class="section-body">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-body">
                            <div class="row ">

                                {{-- <div class="col-12">
                                    <div class="actualizar">
                                        @include('paquete.create')
                                    </div>
                                </div> --}}

                                <div class="col-12">
                                    <div class="tabla">
                                        @include('venta-servicio.tabla')
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
                dateFormat: 'dd/mm/yy',
                firstDay: 1,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: ''
            };
            $.datepicker.setDefaults($.datepicker.regional['es']);
            $(function() {
                $('.datepicker').datepicker();


            });
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
        var arrayprecio=[]
        var micheckbox = document.getElementById('mielemetocheck');
        micheckbox.addEventListener('click',function(){
            if(micheckbox.checked){
                console.log("hola")
            }
        })
        function sumPrec(servicios)
        {
            arrayprecio.push(servicios)

            let total=arrayprecio.reduce((a,b)=> a + b,0)
            document.getElementById('precio_recom').innerHTML = total;

        }



        function calcularMontoMensual() {
            var plazo = document.getElementById('plazo').value;
            var monto_credito = document.getElementById('monto').value;
            var interes = document.getElementById('interes').value;
            var iva = 13
            plazo = (isNaN(parseFloat(plazo))) ? 0 : parseFloat(plazo);
            monto_credito = (isNaN(parseFloat(monto_credito))) ? 0 : parseFloat(monto_credito);
            interes = (isNaN(parseFloat(interes))) ? 0 : parseFloat(interes);

            if (monto_credito <= 0 | plazo <= 0 | interes <= 0 | monto_credito == "" | plazo == "" | interes == "") {
                calcularCuotaMensual = 0.00;
            } else {

                calcularCuotaMensual = parseFloat((monto_credito / plazo + (monto_credito / plazo) * interes / 100)) * .13 +
                    parseFloat((monto_credito / plazo + (monto_credito / plazo) * interes / 100));
            }
            calcularCuotaMensual = (isNaN(parseFloat(calcularCuotaMensual))) ? 0 : parseFloat(calcularCuotaMensual);

            document.getElementById('monto_mensual').innerHTML = calcularCuotaMensual.toFixed(2);
            document.getElementById('cuota_mensual').value = calcularCuotaMensual.toFixed(2);

            document.getElementById('monto_credito').innerHTML = monto_credito;
            document.getElementById('iva').innerHTML = iva;
            document.getElementById('interes_credito').innerHTML = interes;
            document.getElementById('plazo_credito').innerHTML = plazo;
        }

        function LimpiezaDatos() {
            // VARIABLES GLOBALES
            calcularCuotaMensual = 0;
            plazo = 0;
            interes = 0;
            monto_credito = 0;
            iva = 0;
            // FORMULARIO DE CREDITOS
            document.getElementById("ingreso-datos-credito").reset();

            document.getElementById('monto_mensual').innerHTML = calcularCuotaMensual.toFixed(2);
            document.getElementById('monto_credito').innerHTML = monto_credito;
            document.getElementById('iva').innerHTML = iva;
            document.getElementById('interes_credito').innerHTML = interes
            document.getElementById('plazo_credito').innerHTML = plazo
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