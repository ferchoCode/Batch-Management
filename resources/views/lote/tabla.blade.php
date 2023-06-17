@if (Session::has('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert">
            <i class="fa fa-times"></i>
        </button>
        <strong></strong> {{ session('error') }}
    </div>
@endif
@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert">
            <i class="fa fa-times"></i>
        </button>
        <strong></strong> {{ session('success') }}
    </div>
@endif


<div class="datagrid">
    <table>
        <thead>
            <tr>
                {{-- <th>#</th> --}}
        
                <th>NRO</th>
                <th>coord_A_lat</th>
                <th>coord_A_long</th>
                <th>coord_B_lat</th>
                <th>coord_B_long</th>

                <th>coord_C_long</th>
                <th>coord_D_lat</th>
                <th>coord_D_lat</th>
                <th>PRECIO</th>
                <th>DIMENSION</th>
                <th>ESTADO</th>
            </tr>
        </thead>
        <tbody class="border border-1">

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
