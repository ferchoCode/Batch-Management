
@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header mb-4">
            <h1 class="page__heading">CREAR NUEVO PAQUETE</h1>
        </div>
        <div class="section-body">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-body">
                            <div class="row ">

                                <div class="col-12">
                                    <form class="form" action="{{ url('paquete') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body pb-0 pt-0">
                                            <div class="row">
                                                <div class="form-group col-3">
                                                    <h2 class="text-start">servicios</h2>
                                                    @foreach ($servicio as $servicios)
                                                        <div class="form-check ">
                                                            <input class="form-check-input" type="checkbox" id="mielemetocheck" name="arrayservicios[]"
                                                                onclick="sumPrec({{ $servicios->precio }})" value="{{ $servicios->id }}">
                                                            <label class="form-check-label" for="flexCheckDefault">
                                                                {{ $servicios->nombre }}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                    
                                                </div>
                                    
                                                <div class="form-group col-9">
                                                    <div class="row">
                                                        
                                                        <div class="form-group col-4">
                                                            <label>nombre
                                                                <span class="text-danger">*</span></label>
                                    
                                                            <input type="text" class="form-control" placeholder="nombre" name="nombre"
                                                                autocomplete="off" value="{{ old('nombre') }}"autofocus />
                                                        </div>
                                                      
                                                        <div class="form-group col-4">
                                                            <label>precio
                                                                <span class="text-danger">*</span></label>
                                                            <input type="number" step="0.01" class="form-control" placeholder="precio" name="precio"
                                                                value="{{ old('precio') }}" autofocus />

                                                           
                                                        </div>
                                    
                                    
                                                        <div class="form-group col-8">
                                                            <label>Descripcion
                                                                <span class="text-danger">*</span></label>
                                                            <textarea rows="4" cols="50" style="height: 150px" class="form-control" placeholder="Ingrese una descripcion"
                                                                name="descripcion" value="{{ old('descripcion') }}"></textarea>
                                                        </div>
                                    
                                                        <div class="form-group col-4">
                                                            <label>Fecha Incio
                                                                <span class="text-danger">*</span></label>
                                    
                                                            <input type="text" class="form-control datepicker" placeholder="Ingrese fecha inicio"
                                                                name="fecha_inicio" autocomplete="off" value="{{ old('fecha_inicio') }}"autofocus />
                                                            @error('fecha_inicio')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                            
                                                            <label>Fecha expiracion
                                                                <span class="text-danger">*</span></label>
                                    
                                                            <input type="text" class="form-control datepicker" placeholder="Ingrese fecha expiracion "
                                                                name="fecha_fin" autocomplete="off" value="{{ old('fecha_fin') }}"autofocus />
                                                            @error('fecha_fin')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                         

                                                                
                                                        </div>
                                                           
                                                        </div>
                                                        {{-- <div class="form-group col-md-4">
                                                            <label>propietario
                                                                <span class="text-danger">*</span></label>
                                                            <select class="form-control"  name="propietario"
                                                                id="select2_categoria" value="{{ old('propietario') }}">
                                                                <option value="">Seleccione el propitario</option>
                                    
                                                                @foreach ($propietario as $propietarios)
                                                                    <option value="{{ $propietarios->id }}">
                                                                        {{ $propietarios->nombre }} {{ $propietarios->apellido }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label>vendedor
                                                                <span class="text-danger">*</span></label>
                                                            <select class="form-control"  name="vendedor"
                                                                id="select2_categoria" value="{{ old('vendedor') }}">
                                                                <option value="">Seleccione el vendedor</option>
                                    
                                                                @foreach ($vendedor as $vendedores)
                                                                    <option value="{{ $vendedores->id }}">
                                                                        {{ $vendedores->nombre }} {{ $vendedores->apellido }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div> --}}
                                                        <div class="form-group col-md-6">
                                                            
                                                            <h6>Precio Recomendado: <label for="" id="precio_recom"></label></h6>
                                                        </div>
                                                        <div class="form-group col-md-6 d-flex  align-items-end justify-content-end">
                                                            <button type="submit" class="btn btn-success ml-2">Registrar</button>
                                                        </div>
                                                    </div>
                                    
                                                </div>
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