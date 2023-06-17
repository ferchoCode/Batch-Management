{{-- <p>{{ dd($curso) }}</p> --}}

<table class="table hover rounded table-bordered" id="tabla">
    <thead>
        <tr>
            <th>#</th>
            <th>NOMBRE COMPLETO</th>
            <th>CI</th>
            <th>CANTIDAD</th>
            <th>FECHA</th>
            <th>ESTADO</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($reportes as $reporte)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $reporte->nombre }} {{ $reporte->apellido }}</td>
                <td>{{ $reporte->ci }}</td>
                <td>{{ $reporte->cantidad }}</td>
                <td>{{ $reporte->fecha }}</td>
                <td>{{ $reporte->estado }}</td>
            </tr>
        @endforeach




    </tbody>
</table>
