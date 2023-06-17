<form class="form" action="{{ url('propiedad') }}" method="POST" enctype="multipart/form-data" >
    @csrf
    <div class="card-body pb-0 pt-0">
        <div class="row">
            <div class="form-group col-12">
                <div class="row">
                    <div class="form-group col-4">
                        <label>codigo
                            <span class="text-danger">*</span></label>

                        <input type="text" class="form-control" 
                            placeholder="codigo" name="cod" autocomplete="off"
                            value="{{ old('cod') }}"autofocus />
                    </div>
                    <div class="form-group col-4">
                        <label>nombre
                            <span class="text-danger">*</span></label>

                        <input type="text" class="form-control" 
                            placeholder="nombre" name="nombre" autocomplete="off"
                            value="{{ old('nombre') }}"autofocus />
                    </div>
                    <div class="form-group col-4">
                        <label>precio
                            <span class="text-danger">*</span></label>
                        <input type="number" step="0.01" class="form-control"
                            placeholder="precio"
                            name="precio" value="{{ old('precio') }}" autofocus />
                    </div>
                    <div class="form-group col-6">
                        <label>Direccion
                            <span class="text-danger">*</span></label>
                        <input type="text" step="any" class="form-control" placeholder="Ingrese el direccion"
                            name="direccion" value="{{ old('direccion') }}"
                            autofocus />
                    </div>
                   
                    <div class="form-group col-6">
                        <label for="featured">fotografia
                            <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" 
                            name="featured" value="{{ old('fotografia') }}"
                            autofocus />
                    </div>
                    <div class="form-group col-md-4">
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
                    </div>
                    <div class="form-group col-md-4 d-flex  align-items-end justify-content-end">
                        <button type="submit" class="btn btn-success ml-2">guardar propiedad</button>
                    </div>
                </div>

            </div>
        </div>

    </div>

</form>
