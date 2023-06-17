@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/vistas/tabla.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vistas/maps.css') }}">
@endsection
@section('content')
    <section class="section">
        <div class="section-header mb-2  d-flex justify-content-between">
            
        </div>
        <div class="section-body">

            {{-- <div class="tabla" id="tabla-lotes">
                @include('lote.tabla')
            </div> --}}
            <div id="map">

            </div>

        </div>
    </section>

    {{-- @include('act_fijo.modal-create') --}}
    {{-- @include('nivel.modal-edit') --}}
@endsection
@section('scripts')
    <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgNkYnjTUv0x2z2NYMtp9DDKX7Np2Y9sk&callback=initMap">
    </script>
    <script src="{{ asset('assets\js\sacaguazu\maps.js') }}"></script>

    {{-- <script>
        window.myAppData = @json($lote);

    </script> --}}
@endsection
