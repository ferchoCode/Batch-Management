@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Reportes</h3>

        </div>
        <div class="row">
            <div class="form-group col-xl-6 col-md-6" hidden>
                <div class="input-group">
                    <input id="search" type="text" class="form-control" placeholder="Texto a buscar..." />
                    <div class="input-group-append">

                    </div>
                </div>

            </div>



        </div>

        <div id="reporte">
            <div class="row">
                <div class=" form-group col-md-3">
                    <label for="monto" class="form-label">Tipo de Venta:</label>
                    <select class="form-control" style="width: 100%" id="mySelect">
                        <option value="">Todos</option>
                        <option value="Activa">Activa</option>
                        <option value="Propietario">Propietario</option>

                    </select>
                </div>
                <div class="form-group col-3">
                    <label>Fecha
                        <span class="text-danger">*</span></label>

                    <input type="date" class="form-control" id="buscar_fecha" placeholder="Ingrese fecha " name="fecha"
                        autocomplete="off" />
                </div>
            </div>

            <div>
                @include('reporte.tabla')
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        $('#mySelect').change(function() {
            var valor = $(this).val();
            $('#tabla tbody tr').show(); // Mostrar todas las filas
            if (valor !== "") {
                $('#tabla tbody tr').filter(function() {
                    return $(this).text().indexOf(valor) === -1;
                }).hide(); // Ocultar las filas que no coinciden con el valor
            }
        });
    </script>


    <script>
        // Write on keyup event of keyword input element
        $(document).on('change', '#grupos', function(event) {
            // let text = $("#grupos option:selected").text();
            // let search =  $('#search').val(text);
            let text = $(this).val();
            let search = $('#search').val(text);
            console.log(text);
            // Show only matching TR, hide rest of them
            $.each($("#mytable tbody tr"), function() {
                if ($(this).text().toLowerCase().indexOf($(search).val().toLowerCase()) === -1)
                    $(this).hide();
                else
                    $(this).show();
            });
        });
    </script>
    <script>
        function buscarFecha(fecha) {
            var fechaFormateada = fecha.split("/").reverse().join("-");
            console.log(fechaFormateada);
            $('#tabla tbody tr').show(); // Mostrar todas las filas
            if (fechaFormateada !== "") { // Si se ha seleccionado una fecha
                $('#tabla tbody tr').filter(function() {
                    return $(this).find('td:nth-child(5)').text() !== fechaFormateada;
                }).hide(); // Ocultar las filas que no coinciden con la fecha
            }
        }

        $(function() {
            buscarFecha($('#buscar_fecha').val());
            $('#buscar_fecha').change(function() {
                buscarFecha($(this).val());
            });
        });
    </script>
@endsection
