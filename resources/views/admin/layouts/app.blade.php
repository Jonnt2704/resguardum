@extends('adminlte::page')

{{-- Extend and customize the browser title --}}

@section('title')
    {{ config('adminlte.title') }}
    @hasSection('subtitle') | @yield('subtitle') @endif
@stop

{{-- Extend and customize the page content header --}}


@section('content_header')
    @hasSection('content_header_title')
        <h1 class="text-muted">
            @yield('content_header_title')

            @hasSection('content_header_subtitle')
                <small class="text-dark">
                    <i class="fas fa-xs fa-angle-right text-muted"></i>
                    @yield('content_header_subtitle')
                </small>
            @endif
        </h1>
    @endif
@stop

{{-- Rename section content to content_body --}}

@section('content')
    @yield('content_body')
@stop

{{-- Create a common footer --}}

@section('footer')
    <div class="float-right">
        Version: {{ config('app.version', '1.0.0') }}
    </div>

    <strong>
        <a href="{{ config('app.company_url', 'https://portalunimar.unimar.edu.ve/') }}">
            ResguardUM © Copyright 2001-2024 Universidad de Margarita
        </a>
    </strong>
@stop

{{-- Add common Javascript/Jquery code --}}

@push('js')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.1/dist/sweetalert2.all.min.js"></script>

<script>

    $(document).ready(function() {
        // Add your common script logic here...
    });

</script>
@endpush

{{-- Add common CSS customizations --}}

@push('css')

<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.1/dist/sweetalert2.min.css" rel="stylesheet">

<style type="text/css">

    {{-- You can add AdminLTE customizations here --}}
    /*
    .card-header {
        border-bottom: none;
    }
    .card-title {
        font-weight: 600;
    }
    */

    .bootstrap-tagsinput {
    display: flow-root !important;
    width: 100%;
}

.bootstrap-tagsinput .tag {
    margin-right: 2px;
    color: #fff;
    background: #0f4d98 !important;
    border-radius: 0.15rem !important;
    padding: .15rem !important;
}

.btn.btn-default {
    background-color: #fff;
}

.d-none.d-xl-inline-block.btn.btn-sm.btn-navbar.shadow-sm.navbar-blue-u {
    background-color: #004b9a;
    color: #fff;
}

.sidebar-blue-color{
    background-color: #004b9a;
}

.nav-pills .nav-link.active,
.nav-pills .show>.nav-link {
    color: #ffffff;
    background-color: #007bff;
}

#btn-nav {
    background-color: transparent;
    box-shadow: none;
    color: #000000;
}

#btn-nav:hover,
#btn-nav:hover:focus,
#btn-nav i:hover:focus {
    background-color: #004b9a;
    color: #ffffff;
}

#pubtitle{
    color: #000000;
}

.grape {
    color:#004b9a;
}

.grape:hover{
    color:#ffffff;
}

.navbar-blue-u{
    background-color: #004b9a;
    color: #ffffff;
}

.modal-header,
.modal-footer {
    background: #0f4d98 !important;
    color: var(--white);
    font-weight: 600;
    font-size: 1rem;
    letter-spacing: .2rem;
}

.mb-3,
.my-3 {
    margin-bottom: 1rem !important;
}

.thead-blue{
    background-color: #004b9a;
    color: #ffffff;
}

.portal-title, .portal-title:visited, .portal-title:active{
    text-decoration:none;
    width: 150px;
    margin-top: -6px;
}

</style>
@endpush