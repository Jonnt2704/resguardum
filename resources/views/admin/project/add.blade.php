@extends('admin.layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Welcome')


{{-- Content body: main page content --}}

@section('content_body')
<div class="p-4">
    
    <div class="h3 mb-0 text-gray-dark"><h3>Agregar Nuevo Proyecto</h3></div>
    <p>Complete el formulario para agregar un nuevo proyecto al Repositorio</p>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">Datos del Proyecto</h3>
                </div>

                <form id="addProject" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="projectName">Titulo</label>
                                <input class="form-control" id="InputProjectName" type="text" name="projectName" placeholder="Titulo de la Tesis de Grado " >
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="projectNote">Nota</label>
                                <input class="form-control" id="InputProjectNote" type="text" name="projectNote" placeholder="Note para el Trabajo de Grado" >
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-12">
                                <label class="small mb-1" for="projectResume">Resumen</label>
                                <textarea class="form-control" id="InputProjectResume" name="projectResume" placeholder="Resumen o Descripcion del Trabajo de Grado" style="max-height: 150px;"></textarea>
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-4">
                                <label class="small mb-1" for="projectName">Autor</label>
                                <select class="custom-select rounded-0" name="selectAutor" id="SelectAutor">
                                    <option>Seleccione una Opcion</option>   
                                    @foreach ($autors as $autor)
                                        <option value="{{ $autor->id }}">{{ $autor->name }} {{ $autor->lastname }}</option>   
                                    @endforeach         
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="small mb-1" for="projectNote">Tutor</label>
                                <select class="custom-select rounded-0" name="selectTutor" id="SelectTutor">
                                    <option>Seleccione una Opcion</option>   
                                    @foreach ($tutors as $tutor)
                                        <option value="{{ $tutor->id }}">{{ $tutor->name }} {{ $tutor->lastname }}</option>   
                                    @endforeach         
                                </select>
                            </div>
                            <div class="col-md-4">
<<<<<<< HEAD
                                <label class="small mb-1" for="projectNote">Tema</label>
=======
                                <label class="small mb-1" for="projectNote">Linea de Investigacion</label>
>>>>>>> ce1107b17ac5d14b0768d5e33b44443823d01e4a
                                <select class="custom-select rounded-0" name="selectLine" id="SelectLine">
                                    <option>Seleccione una Opcion</option>   
                                    @foreach ($lines as $line)
                                        <option value="{{ $line->id }}">{{ $line->name }}</option>   
                                    @endforeach         
                                </select>
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="projectResume">Archivo</label>
                                <input class="form-control" id="InputProjectResume" type="file" name="projectFile" placeholder="Resumen o Descripcion del Trabajo de Grado">
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="projectResume">Fecha Realizada</label>
                                <input class="form-control" id="InputProjectDate" type="date" name="projectCreatedDate">
                            </div>
                        </div>
                        <button class="btn btn-primary" type="Submit">Guardar</button>
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

        $('#addProject').on('submit', function(event) {

            event.preventDefault();

            let formData = new FormData(this);

            $.ajax({
                url: "{{ url('/admin/create-project') }}",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {

                    if (response.isSuccess == false) {
                        alert(response.Message);
                    } else if (response.isSuccess == true) {

                        Swal.fire("Registrado", response.Message, "success");

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