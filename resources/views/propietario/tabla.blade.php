@if (Session::has('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert">
            <i class="fa fa-times"></i>
        </button>
        <strong></strong> {{ session('error') }}
    </div>
@endif
@if (count($propietario) > 0)
{{-- 
    <div class="container">
        <div class="d-flex">
            @foreach ($propiedad as $propiedades)
                <div class="card p-3 m-3" style="background-color:tan; width:300px; height:300px">
                    <div class="d-flex flex-column justify-content-between align-items-stretch">

                        <div class="f">
                            <img src="{{ asset($propiedades->fotografia) }}" alt="" width="100%">
                        </div>
                        <div class="" style="height:50%">
                            <div>
                                <h5>{{ $propiedades->nombre }}</h5>
                            </div>
                            <div>

                                <h3>{{ $propiedades->propietario_id }}</h3>
                                <h3>{{ $propiedades->vendedor_id }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div> --}}
    <div class="datagrid">
        <table>
            <thead>
                <tr >
                    {{-- <th>#</th> --}}
                   
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>TELEFONO</th>
                    <th style="width: 50px; align-content: center;" >ACCIÓN</th>
                </tr>
            </thead>
            <tbody class="border border-1">
                @foreach ($propietario as $propietarios)
                    <tr >
                        {{-- <th scope="row">{{$loop->iteration}}</th>s --}}
                        <td class="border border-1">{{ $propietarios->nombre }}</td>
                        <td class="border border-1">{{ $propietarios->apellido }}</td>
                        <td class="border border-1">{{ $propietarios->telefono }}</td>
                        
                        <td>
                            <form id="eliminar{{ $propietarios->id }}"
                                action="{{ url('propietario/delete/' . $propietarios->id) }}" method="POST">
                                @csrf
                                {{--                
                        <a  href="{{ url('cuota/'.$propiedades->id) }}"  class="btn  btn-icon btn-warning btn-sm mr-2">
                             Cuotas
                        </a> --}}

                                <button type="button" onclick="confirmEliminar({{ $propietarios->id }})"
                                class="btn btn-icon  btn-danger btn-sm mr-2">
                                <i class="fa-solid fa-trash-can"></i>
                        </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            {{-- <tfoot>
            <tr>
                <td colspan="9">
                    <div id="paging">
                        <ul>
                            <li><a href="#"><span>Previous</span></a></li>
                            <li><a href="#" class="active"><span>1</span></a></li>
                            <li><a href="#"><span>2</span></a></li>
                            <li><a href="#"><span>3</span></a></li>
                            <li><a href="#"><span>4</span></a></li>
                            <li><a href="#"><span>5</span></a></li>
                            <li><a href="#"><span>Next</span></a></li>
                        </ul>
                    </div>
            </tr>
        </tfoot> --}}
        </table>

    </div>
@else
    <div class="datagrid">

        <table>
            <thead>
                <tr>
                    {{-- <th>#</th> --}}
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>TELEFONO</th>

                    {{-- <th style="width: 150px; align-content: center;" >ACCIÓN</th> --}}
                </tr>
            </thead>
        </table>
        <div class="alert alert-light  d-flex justify-content-center align-items-center" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path
                        d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                </symbol>
            </svg>

            <svg class="bi flex-shrink-0 mr-2" width="24" height="24" role="img" aria-label="Info:">
                <use xlink:href="#info-fill" />
            </svg>
            <div class="alert-text">No hay datos.</div>
        </div>
    </div>
@endif
