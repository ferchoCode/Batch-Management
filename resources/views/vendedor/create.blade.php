<form class="form" action="{{ url('vendedor') }}" method="POST" enctype="multipart/form-data" >
    @csrf
    <div class="card-body pb-0 pt-0">
        <div class="row">
            <div class="form-group col-12">
                <div class="row">
                    <div class="form-group col-4">
                        <label>CI
                            <span class="text-danger">*</span></label>

                        <input type="text" class="form-control" 
                            placeholder="ci" name="ci" autocomplete="off"
                            value="{{ old('ci') }}"autofocus />
                    </div>
                    <div class="form-group col-4">
                        <label>nombre
                            <span class="text-danger">*</span></label>

                        <input type="text" class="form-control" 
                            placeholder="nombre" name="nombre" autocomplete="off"
                            value="{{ old('nombre') }}"autofocus />
                    </div>
                    <div class="form-group col-4">
                        <label>apellido
                            <span class="text-danger">*</span></label>
                        <input type="text" step="any" class="form-control" placeholder="Ingrese el direccion"
                            name="apellido" value="{{ old('apellido') }}"
                            autofocus />
                    </div>
                    <div class="form-group col-4">
                        <label>telefono
                            <span class="text-danger">*</span></label>
                        <input type="text" step="any" class="form-control" placeholder="Ingrese el direccion"
                            name="telefono" value="{{ old('telefono') }}"
                            autofocus />
                    </div>
                    <div class="form-group col-4">
                        <label>Direccion
                            <span class="text-danger">*</span></label>
                        <input type="text" step="any" class="form-control" placeholder="Ingrese el direccion"
                            name="direccion" value="{{ old('direccion') }}"
                            autofocus />
                    </div>
                   
                    <div class="form-group col-md-4 d-flex  align-items-end justify-content-end">
                        <button type="submit" class="btn btn-success ml-2">guardar</button>
                    </div>
                </div>

            </div>
        </div>

    </div>

</form>
