@extends('admin.layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Welcome')



{{-- Content body: main page content --}}

@section('content_body')
<div class="p-4">
    <div class="h3 mb-0 text-gray-dark"><h3>Editar Tema de Sub Linea</h3></div>
    <p>Complete el formulario para editar el tema de la sub linea de investigacion</p>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">Datos del Tema</h3>
                </div>

                <form id="editSubLine-topic" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="subLineName">Nombre</label>
                                <input class="form-control" id="InputSubLineName" type="text" name="subLineName" placeholder="Nombre de la Linea. Ej: Aplicaciones Web" value="{{ $subline_topic[0]->name }}">
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="selectLine">Sub Linea</label>
                                <select class="custom-select rounded-0" name="selectLine" id="SelectSubLine">
                                    <option>Seleccione una Opcion</option>   
                                    @foreach ($allLines as $line)
                                        <option @php echo $subline_topic[0]->subline==$line->id?'selected':''; @endphp value="{{ $line->id }}">{{ $line->name }}</option>   
                                    @endforeach         
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="Submit">Guardar</button>
                    </div>
                    <input type="hidden" name="subLineId" id="subLineId" value="{{ $subline_topic[0]->id }}">

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

        $('#editSubLine-topic').on('submit', function(event) {

            event.preventDefault();

            var Id = $('#subLineId').val();
            let formData = new FormData(this);

            $.ajax({
                url: "{{ url('/admin/update-subline-topic') }}" + "/" + Id,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {

                    if (response.isSuccess == false) {
                        alert(response.Message);
                    } else if (response.isSuccess == true) {

                        Swal.fire("Actualizado", "Se ha editado el tema de la Sub Linea de Investigacion.", "success");

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