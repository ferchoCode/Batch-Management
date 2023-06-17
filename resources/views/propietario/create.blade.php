<form class="form" action="{{ url('propietario') }}" method="POST" enctype="multipart/form-data" >
    @csrf
    <div class="card-body pb-0 pt-0">
        <div class="row">
            <div class="form-group col-12">
                <div class="row">
                    <div class="form-group col-6">
                        <label>nombre
                            <span class="text-danger">*</span></label>

                        <input type="text" class="form-control" 
                            placeholder="nombre" name="nombre" autocomplete="off"
                            value="{{ old('nombre') }}"autofocus />
                    </div>
                    <div class="form-group col-6">
                        <label>apellido
                            <span class="text-danger">*</span></label>
                        <input type="text" step="any" class="form-control" placeholder="Ingrese el direccion"
                            name="apellido" value="{{ old('apellido') }}"
                            autofocus />
                    </div>
                    <div class="form-group col-6">
                        <label>telefono
                            <span class="text-danger">*</span></label>
                        <input type="text" step="any" class="form-control" placeholder="Ingrese el direccion"
                            name="telefono" value="{{ old('telefono') }}"
                            autofocus />
                    </div>
                   
                    <div class="form-group col-md-6 d-flex  align-items-end justify-content-end">
                        <button type="submit" class="btn btn-success ml-2">guardar</button>
                    </div>
                </div>

            </div>
        </div>

    </div>

</form>
