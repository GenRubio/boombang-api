@extends(backpack_view('blank'))

@php
$defaultBreadcrumbs = [
    trans('backpack::crud.admin') => url(config('backpack.base.route_prefix'), 'dashboard'),
    $crud->entity_name_plural => url($crud->route),
    trans('backpack::crud.list') => false,
];

// if breadcrumbs aren't defined in the CrudController, use the default breadcrumbs
$breadcrumbs = $breadcrumbs ?? $defaultBreadcrumbs;
@endphp

@section('header')
    <div class="container-fluid">
        <h2>
            <span class="text-capitalize">{{ trans('translationsystem.multi_edit_laguages.title') }}</span>
        </h2>
    </div>
@endsection

@section('content')
    <!-- Default box -->
    <div class="row">
        <!-- THE ACTUAL CONTENT -->
        @php
            $langFileSelected = null;
        @endphp
        <div class="{{ $crud->getListContentClass() }}" style="margin-bottom: 15px;">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="selected-laguage">{{ trans('translationsystem.multi_edit_laguages.language') }}</label>
                        <select class="form-control" id="selected-laguage"
                            data-route="{{ url($crud->route . '/texts') }}" data-file="{{ $file }}">
                            @foreach ($laguages as $laguage)
                                @if ($laguage->abbr == $lang)
                                    <option value="{{ $laguage->abbr }}" selected="selected">{{ $laguage->name }}
                                    </option>
                                @else
                                    <option value="{{ $laguage->abbr }}">{{ $laguage->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <hr>
            <ul class="nav nav-tabs">
                @if ($file)
                    @foreach ($langFiles as $langFile)
                        @if ($langFile->format_name == $file)
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page">{{ $langFile->name }}</a>
                            </li>
                            @php
                                $langFileSelected = $langFile;
                            @endphp
                        @else
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ url($crud->route . '/texts/' . $lang . '/' . $langFile->format_name) }}">{{ $langFile->name }}</a>
                            </li>
                        @endif
                    @endforeach
                @else
                    @foreach ($langFiles as $key => $langFile)
                        @if ($key == 0)
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page">{{ $langFile->name }}</a>
                            </li>
                            @php
                                $langFileSelected = $langFile;
                            @endphp
                        @else
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ url($crud->route . '/texts/' . $lang . '/' . $langFile->format_name) }}">{{ $langFile->name }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            </ul>
            <div class="p-3" style="background-color: white">
                <form action="{{ backpack_url('lang-translation/update-texts') }}" method="POST">
                    {{ csrf_field() }}
                    @php
                        $langTranslationsWithOutSection = $langFileSelected
                            ->langTranslations()
                            ->where('lang_section_id', null)
                            ->get();
                        $langTranslationsWithSectionIds = $langFileSelected
                            ->langTranslations()
                            ->where('lang_section_id', '!=', null)
                            ->pluck('lang_section_id')
                            ->toArray();
                        $langTranslationsIdsWithSection = $langFileSelected
                            ->langTranslations()
                            ->where('lang_section_id', '!=', null)
                            ->pluck('id')
                            ->toArray();
                        $langSections = \App\Models\LangSection::whereIn('id', $langTranslationsWithSectionIds)->get();
                        foreach ($langSections as $langSection) {
                            $langSection->setTranslations = \App\Models\LangTranslation::where('lang_section_id', $langSection->id)
                                ->whereIn('id', $langTranslationsIdsWithSection)
                                ->get();
                        }
                    @endphp
                    <input type="hidden" name="lang" value="{{ $lang }}">
                    <div class="row">
                        <div class="col-lg-2 mb-3">
                            <h4>{{ trans('translationsystem.multi_edit_laguages.key') }}</h4>
                        </div>
                        <div class="col-lg-5 mb-3">
                            <h4>{{ trans('translationsystem.multi_edit_laguages.text') }}</h4>
                        </div>
                        <div class="col-lg-5 mb-3">
                            <h4>{{ trans('translationsystem.multi_edit_laguages.translation') }}</h4>
                        </div>
                        @foreach ($langTranslationsWithOutSection as $translation)
                            <div class="col-lg-2">
                                {{ $translation->format_name }}
                            </div>
                            <div class="col-lg-5">
                                {{ $translation->value }}
                            </div>
                            <div class="col-lg-5">
                                @php
                                    $oldLocale = app()->getLocale();
                                    app()->setLocale($lang);
                                @endphp
                                <div class="form-group">
                                    <textarea class="form-control" name="translations[{{ $translation->id }}]"
                                        rows="2"> {{ $translation->value }}</textarea>
                                </div>
                                @php
                                    app()->setLocale($oldLocale);
                                @endphp
                            </div>
                        @endforeach
                        @foreach ($langSections as $langSection)
                            <div class="col-lg-2 mb-3">
                                <h5><b>{{ $langSection->name }}</b></h5>
                                <hr>
                            </div>
                            <div class="col-lg-5 mb-3"></div>
                            <div class="col-lg-5 mb-3"></div>
                            @foreach ($langSection->setTranslations as $translation)
                                <div class="col-lg-2">
                                    {{ $translation->format_name }}
                                </div>
                                <div class="col-lg-5">
                                    {{ $translation->value }}
                                </div>
                                <div class="col-lg-5">
                                    @php
                                        $oldLocale = app()->getLocale();
                                        app()->setLocale($lang);
                                    @endphp
                                    <div class="form-group">
                                        <textarea class="form-control" name="translations[{{ $translation->id }}]"
                                            rows="2"> {{ $translation->value }}</textarea>
                                    </div>
                                    @php
                                        app()->setLocale($oldLocale);
                                    @endphp
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                    <hr>
                    <button class="btn btn-primary ladda-button" type="submit">
                        <i class="fa fa-save"></i> {{ trans('translationsystem.multi_edit_laguages.save_changes') }}
                    </button>
                    <a href="javascript:void(0)" onclick="deleteEntry(this)"
                        data-route="{{ backpack_url('lang-translation') }}" class="btn btn-secondary ladda-button"
                        data-button-type="delete">
                        <i class="fa fa-times"></i> {{ trans('translationsystem.multi_edit_laguages.out_not_save') }}
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('after_styles')
    <!-- DATA TABLES -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('packages/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('packages/datatables.net-fixedheader-bs4/css/fixedHeader.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('packages/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">

    <link rel="stylesheet"
        href="{{ asset('packages/backpack/crud/css/crud.css') . '?v=' . config('backpack.base.cachebusting_string') }}">
    <link rel="stylesheet"
        href="{{ asset('packages/backpack/crud/css/form.css') . '?v=' . config('backpack.base.cachebusting_string') }}">
    <link rel="stylesheet"
        href="{{ asset('packages/backpack/crud/css/list.css') . '?v=' . config('backpack.base.cachebusting_string') }}">

    <!-- CRUD LIST CONTENT - crud_list_styles stack -->
    @stack('crud_list_styles')
@endsection

@section('after_scripts')
    <script src="{{ asset('packages/backpack/crud/js/crud.js') . '?v=' . config('backpack.base.cachebusting_string') }}">
    </script>
    <script src="{{ asset('packages/backpack/crud/js/form.js') . '?v=' . config('backpack.base.cachebusting_string') }}">
    </script>
    <script src="{{ asset('packages/backpack/crud/js/list.js') . '?v=' . config('backpack.base.cachebusting_string') }}">
    </script>
    <script>
        $('#selected-laguage').on('change', (ev) => {
            let item = $(ev.currentTarget);
            location.href = item.data('route') + "/" + item.val() + "/" + item.data('file');
        });

        if (typeof deleteEntry != 'function') {
            $("[data-button-type=delete]").unbind('click');

            function deleteEntry(button) {
                // ask for confirmation before deleting an item
                // e.preventDefault();
                var route = $(button).attr('data-route');

                swal({
                    title: "Advertencia",
                    text: "¿Está seguro que desea salir sin guardar?",
                    icon: "warning",
                    buttons: ["Cancelar", "Salir sin guardar"],
                    dangerMode: true,
                }).then((value) => {
                    if (value) {
                        location.href = route;
                    }
                });
            }
        }
    </script>
    <!-- CRUD LIST CONTENT - crud_list_scripts stack -->
    @stack('crud_list_scripts')
@endsection
