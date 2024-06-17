@extends('admin.layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Welcome')
@section('content_header_title', 'Sub-Linea')
@section('content_header_subtitle', 'Editar Sub-Linea')


{{-- Content body: main page content --}}

@section('content_body')
    <p>Complete el formulario para editar la sub linea de investigacion</p>
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Datos de la Linea de Investigacion</h3>
                </div>

                <form id="editSubLine-topic" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="InputSubLineName">Nombre</label>
                            <input type="text" class="form-control col-6" name="subLineName" id="InputSubLineName" placeholder="Nombre de la Linea. Ej: Aplicaciones Web" value="{{ $subline_topic[0]->name }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Linea</label>
                            <select class="custom-select rounded-0" name="selectLine" id="SelectSubLine">
                                <option>Seleccione una Opcion</option>   
                                @foreach ($allLines as $line)
                                    <option @php echo $subline_topic[0]->subline==$line->id?'selected':''; @endphp value="{{ $line->id }}">{{ $line->name }}</option>   
                                @endforeach         
                            </select>
                        </div>

                    </div>
                    <input type="hidden" name="subLineId" id="subLineId" value="{{ $subline_topic[0]->id }}">
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Confirmar</button>
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

                        Swal.fire("Actualizado", "Se ha editado la Sub Linea de Investigacion.", "success");

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