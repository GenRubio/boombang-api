<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-group"></i> Authentication</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('user') }}'><i class='nav-icon la la-question'></i> Users</a></li>
    </ul>
</li>
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-cogs"></i>Ajustes</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-globe"></i>
                {{ trans('translationsystem.translations_nav') }}</a>
            <ul class="nav-dropdown-items">
                <li class='nav-item'><a class='nav-link' href='{{ backpack_url('language') }}'><i
                            class='nav-icon la la-flag-checkered'></i> {{ trans('translationsystem.languages_nav') }}</a></li>
                <li class='nav-item'><a class='nav-link' href='{{ backpack_url('lang-file') }}'><i
                            class="nav-icon lar la-file-alt"></i> {{ trans('translationsystem.lang_files_nav') }}</a></li>
                <li class='nav-item'><a class='nav-link' href='{{ backpack_url('lang-section') }}'><i
                            class="nav-icon las la-list"></i> {{ trans('translationsystem.lang_sections_nav') }}</a></li>
                <li class='nav-item'><a class='nav-link' href='{{ backpack_url('lang-translation') }}'><i
                            class="nav-icon las la-language"></i> {{ trans('translationsystem.lang_texts_nav') }}</a></li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ backpack_url('elfinder') }}">
               <i class="nav-icon la la-files-o"></i> <span>{{ trans('backpack::crud.file_manager') }}</span>
            </a>
        </li>
    </ul>
</li>
<li class="nav-title">USUARIOS</li>
<li class="nav-title">ESCENARIOS</li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('scenery') }}'><i class='nav-icon la la-question'></i> Escenarios</a></li>
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class='nav-icon la la-question'></i> Tipos</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('public-scenery') }}'><i class='nav-icon la la-question'></i> Publicos</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('private-scenery') }}'><i class='nav-icon la la-question'></i> Privados</a></li>
    </ul>
</li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('item') }}'><i class='nav-icon la la-question'></i> Items</a></li>
<li class="nav-title">NPC's</li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('npc') }}'><i class='nav-icon la la-question'></i> Npc's</a></li>
<li class="nav-title">CATALAGO</li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('catalogue-game-object') }}'><i class='nav-icon la la-question'></i> Catalogo</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('game-object') }}'><i class='nav-icon la la-question'></i> Objetos</a></li>
<li class="nav-title">TABLAS PARAMETRICAS</li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('parametric-table') }}'><i class='nav-icon la la-question'></i> Tablas</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('parametric-table-value') }}'><i class='nav-icon la la-question'></i> Valores</a></li>