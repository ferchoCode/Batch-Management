<li class="side-menus {{ Request::is('reporte') ? 'active' : '' }} {{ Request::is('reporte/*') ? 'active' : '' }}" 
aria-haspopup="true" data-menu-toggle="hover">
    <a class="menu-link menu-toggle "  href="{{ url('reporte') }}">
        <i class="fas fa-flag"></i><span>- Reportes</span>
    </a>
</li>



<li class="side-menus {{ Request::is('lote') ? 'active' : '' }}{{ Request::is('lote/*') ? 'active' : '' }}"
    aria-haspopup="true" data-menu-toggle="hover">
    <a class="menu-link menu-toggle" href="{{ url('lote') }}">
        <i class=" fas fa-user"></i><span>-Plano General de lotes</span>
    </a>
   
</li>
<li class="side-menus {{ Request::is('cliente') ? 'active' : '' }}{{ Request::is('cliente/*') ? 'active' : '' }}"
    aria-haspopup="true" data-menu-toggle="hover">
    <a class="menu-link menu-toggle" href="{{ url('cliente') }}">
        <i class=" fas fa-user"></i><span>-Cliente</span>
    </a>
   
</li>
<li class="side-menus {{ Request::is('reserva') ? 'active' : '' }}{{ Request::is('reserva/*') ? 'active' : '' }}"
    aria-haspopup="true" data-menu-toggle="hover">
    <a class="menu-link menu-toggle" href="{{ url('reserva') }}">
        <i class=" fas fa-user"></i><span>-Reserva</span>
    </a>
   
</li>
<li class="side-menus {{ Request::is('venta') ? 'active' : '' }}{{ Request::is('reserva/*') ? 'active' : '' }}"
    aria-haspopup="true" data-menu-toggle="hover">
    <a class="menu-link menu-toggle" href="{{ url('venta') }}">
        <i class=" fas fa-user"></i><span>-Ventas</span>
    </a>
   
</li>


{{--
<li class="side-menus {{ Request::is('nivel') ? 'active' : '' }}{{ Request::is('nivel/*') ? 'active' : '' }}"
    aria-haspopup="true" data-menu-toggle="hover">
    <a class="menu-link menu-toggle" href="{{ url('nivel') }}">
        <i class=" fas fa-user"></i><span>-Nivel</span>
    </a>
</li>

<li class="side-menus {{ Request::is('inscripcion') ? 'active' : '' }}{{ Request::is('inscripcion/*') ? 'active' : '' }}"
    aria-haspopup="true" data-menu-toggle="hover">
    <a class="menu-link menu-toggle" href="{{ url('inscripcion') }}">
        <i class=" fas fa-user"></i><span>-Inscripcion</span>
    </a>
</li>
<li class="side-menus {{ Request::is('curso') ? 'active' : '' }}{{ Request::is('curso/*') ? 'active' : '' }}"
    aria-haspopup="true" data-menu-toggle="hover">
    <a class="menu-link menu-toggle" href="{{ url('curso') }}">
        <i class=" fas fa-user"></i><span>-Cu   rso</span>
    </a>
    
</li>


 --}}
