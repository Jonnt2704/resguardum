@extends('admin.layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Welcome')


{{-- Content body: main page content --}}

@section('content_body')
<div class="p-4">
    
    <div class="h3 mb-0 text-gray-dark"><h3>Editar Linea De Investigacion</h3></div>
    <p>Complete el formulario para cambiar la linea de investigacion actual</p>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">Datos de la Linea de Investigacion</h3>
                </div>

                <form id="updateLine-topic" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="LineName">Nombre</label>
                                <input class="form-control" id="InputLineName" type="text" name="LineName" placeholder="Nombre de la Linea. Ej: Desarrollo Web para Moviles" value="{{ $line->name }}">
                            </div>
                        </div>
                        <input type="hidden" name="LineId" id="LineId" value="{{ $line->id }}">

                        <button class="btn btn-primary" type="Submit">Confirmar</button>
                    </div>

            </div>

                </form>
            </div> 
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

        $('#updateLine-topic').on('submit', function(event) {

            event.preventDefault();

            let Id = $('#LineId').val();
            let formData = new FormData(this);

            $.ajax({
                url: "{{ url('/admin/update-line') }}" + "/" + Id,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {

                    if (response.isSuccess == false) {
                        alert(response.Message);
                    } else if (response.isSuccess == true) {

                        Swal.fire("Actualizado", response.Message, "success");

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