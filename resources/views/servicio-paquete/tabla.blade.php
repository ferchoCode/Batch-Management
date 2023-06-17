@if (Session::has('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert">
            <i class="fa fa-times"></i>
        </button>
        <strong></strong> {{ session('error') }}
    </div>
@endif



<article class="cards">
    @foreach ($serviciopaquete as $serviciopaquetes)
    <a class="card">
        <div class="title">{{$serviciopaquetes->nombre}}</div>
        <div class="text">{{$serviciopaquetes->descripcion}}</div>
    </a>
    @endforeach
</article>
 

