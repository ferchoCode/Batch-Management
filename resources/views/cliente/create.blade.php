@extends('layouts.app')

@section('content')
    <section class="section">

        <div class="section-header mb-4">
            <h1 class="page__heading">NUEVO CLIENTE</h1>
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
                                <div class="col-12">
                                    <form class="form" action="{{ url('cliente') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="cliente" class="form-label">Nro de Carnet: <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="ci"
                                                placeholder="Ingrese un nro de carnet">

                                        </div>
                                        <div class="mb-3">
                                            <label for="cliente" class="form-label">Nombre: <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="nombre"
                                                placeholder="Ingrese el nombre" value="{{ old('nombre') }}" autofocus>


                                        </div>
                                        <div class="mb-3">
                                            <label for="cliente" class="form-label">Apellido: <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="apellido"
                                                placeholder="Ingrese el apellido" value="{{ old('apellido') }}" autofocus>

                                        </div>

                                        <div class="mb-3">
                                            <label for="cliente" class="form-label">Telefono: <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="telefono"
                                                placeholder="Ingrese el telefono">

                                        </div>
                                        <div class="mb-3">
                                            <label for="cliente" class="form-label">Telefono_ref: <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="telefono_ref"
                                                placeholder="Ingrese el telefono de referencia">

                                        </div>


                                        <div class="mb-3 d-flex  align-items-end ">
                                            <button type="submit" class="btn btn-success">Registrar</button>
                                        </div>



                                    </form>
                                </div>

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
