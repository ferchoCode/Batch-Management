<aside id="sidebar-wrapper">
    <div class="sidebar-brand " style="background-color: #423eff;" >
        {{-- <img class="navbar-brand-full app-header-logo" src="{{ asset('img/logo1.png') }}" width="60"
             alt="Infyom Logo"> --}}
             <div class="d-flex justify-content-center align-items-end">
                 <h5 class="text-white p-3 ">Urbanizacion "SACAGUAZU"</h5>
             </div>
        <a href="{{ url('/') }}"></a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ url('/') }}" class="small-sidebar-text">
            <img class="navbar-brand-full" src="{{ asset('img/cachuchinlogo3.png') }}" width="45px" alt=""/>
        </a>
    </div>
    <ul class="sidebar-menu">
        @include('layouts.menu')
    </ul>
</aside>
