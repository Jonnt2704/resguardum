@extends('admin.layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Welcome')


{{-- Content body: main page content --}}

@section('content_body')
<div class="p-4">
    
    <div class="h3 mb-0 text-gray-dark"><h3>Actualizar Proyecto</h3></div>
    <p>Complete el formulario para cambiar un proyecto del Repositorio</p>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">Datos del Proyecto</h3>
                </div>

                <form id="editProject" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="projectName">Titulo</label>
                                <input class="form-control" id="InputProjectName" type="text" name="projectName" value="{{ $project[0]->title }}" placeholder="Titulo de la Tesis de Grado " >
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="projectNote">Nota</label>
                                <input class="form-control" id="InputProjectNote" type="text" name="projectNote" value="{{ $project[0]->note }}" placeholder="Note para el Trabajo de Grado" >
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-12">
                                <label class="small mb-1" for="projectResume">Resumen</label>
                                <textarea class="form-control" id="InputProjectResume" name="projectResume" placeholder="Resumen o Descripcion del Trabajo de Grado" style="max-height: 150px;">{{ $project[0]->resume }}</textarea>
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-4">
                                <label class="small mb-1" for="projectName">Autor</label>
                                <select class="custom-select rounded-0" name="selectAutor" id="SelectAutor">
                                    <option>Seleccione una Opcion</option>   
                                    @foreach ($autors as $autor)
                                        <option @php echo $project[0]->autor==$autor->id?'selected':''; @endphp value="{{ $autor->id }}">{{ $autor->name }} {{ $autor->lastname }}</option>   
                                    @endforeach         
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="small mb-1" for="projectNote">Tutor</label>
                                <select class="custom-select rounded-0" name="selectTutor" id="SelectTutor">
                                    <option>Seleccione una Opcion</option>   
                                    @foreach ($tutors as $tutor)
                                        <option @php echo $project[0]->tutor==$tutor->id?'selected':''; @endphp value="{{ $tutor->id }}">{{ $tutor->name }} {{ $tutor->lastname }}</option>   
                                    @endforeach         
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="small mb-1" for="projectNote">Linea de Investigacion</label>
                                <select class="custom-select rounded-0" name="selectLine" id="SelectLine">
                                    <option>Seleccione una Opcion</option>   
                                    @foreach ($lines as $line)
                                        <option @php echo $project[0]->line==$line->id?'selected':''; @endphp value="{{ $line->id }}">{{ $line->name }}</option>   
                                    @endforeach         
                                </select>
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="projectFile">Archivo</label>
                                <input class="form-control" id="InputProjectFile" type="file" name="projectFile" placeholder="">
                                <a class="removeDoc float-right p-2" style="cursor: pointer;" target="_blank" title="Borrar este Projecto"><span style="color: red; font-size: 18px;">@php echo substr($project[0]->path, 10) @endphp <i class="fa fa-trash"></i></span></a>
                                <input type="hidden" name="current_project_file" id="current_project" value="{{ $project[0]->path }}">
                                        
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="projectResume">Fecha Realizada</label>
                                <input class="form-control" id="InputProjectDate" type="date" value="{{ $project[0]->create_date }}" name="projectCreatedDate">
                            </div>
                        </div>
                        <input type="hidden" name="projectId" id="projectId" value="{{ $project[0]->id }}">

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

        $(".removeDoc").click(function(){

            $(this).next().val('');
            $(this).hide();

        });

        $('#editProject').on('submit', function(event) {

            event.preventDefault();

            let formData = new FormData(this);
            let Id = $('#projectId').val();

            $.ajax({
                url: "{{ url('/admin/update-project') }}" + "/" + Id,
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