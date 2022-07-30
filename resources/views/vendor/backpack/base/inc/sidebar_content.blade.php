<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-group"></i> Authentication</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('user') }}'><i class='nav-icon la la-question'></i> Users</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('data-user') }}'><i class='nav-icon la la-question'></i> Users data</a></li>
    </ul>
</li>
<li class="nav-title">ESCENARIOS</li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('scenery') }}'><i class='nav-icon la la-question'></i> Escenarios</a></li>
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class='nav-icon la la-question'></i> Tipos</a>
    <ul class="nav-dropdown-items">
    </ul>
</li>
<li class="nav-title">CATALAGO</li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('game-object') }}'><i class='nav-icon la la-question'></i> Objetos</a></li>
<li class="nav-title">TABLAS PARAMETRICAS</li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('parametric-table') }}'><i class='nav-icon la la-question'></i> Tablas</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('parametric-table-value') }}'><i class='nav-icon la la-question'></i> Valores</a></li>