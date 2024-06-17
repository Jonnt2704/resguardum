@extends('admin.layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Welcome')
@section('content_header_title', 'Sub-Linea')
@section('content_header_subtitle', 'Agregar Sub-Linea')


{{-- Content body: main page content --}}

@section('content_body')
    <p>Complete el formulario para agregar una nueva sub linea de investigacion</p>
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Datos de la Linea de Investigacion</h3>
                </div>

                <form id="addSubLine-topic" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="InputSubLineName">Nombre</label>
                            <input type="text" class="form-control col-6" name="subLineName" id="InputSubLineName" placeholder="Nombre de la Linea. Ej: Aplicaciones Web">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Linea</label>
                            <select class="custom-select rounded-0" name="selectLine" id="SelectSubLine">
                                <option>Seleccione una Opcion</option>   
                                @foreach ($allLines as $line)
                                    <option value="{{ $line->id }}">{{ $line->name }}</option>   
                                @endforeach         
                            </select>
                        </div>

                    </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Agregar</button>
                    </div>
                </form>
            </div> 
        </div>
    </div>  
@stop

{{-- Push extra CSS --}}

@push('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@endpush

{{-- Push extra scripts --}}

@push('js')
    <script>

        $('#addSubLine-topic').on('submit', function(event) {

            event.preventDefault();

            let formData = new FormData(this);

            $.ajax({
                url: "{{ url('/admin/create-subline-topic') }}",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {

                    if (response.isSuccess == false) {
                        alert(response.Message);
                    } else if (response.isSuccess == true) {

                        Swal.fire("Registrado", "Sub Linea de Investigacion agregada con exito.", "success");

                        setTimeout(function() {
                            window.location.reload();
                        }, 1000);
                    }

                },
                error: function(response, exception, message) {
                    
                    Swal.fire("Ha ocurrido un error", message, "error");

                }
            });
    });

    </script>
@endpush