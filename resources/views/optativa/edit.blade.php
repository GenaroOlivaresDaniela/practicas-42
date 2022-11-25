@include('Layouts.header')
@include('Layouts.menu')


@section('header')

@endsection


<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   
    
</div>


<!-- Content Row -->



<!-- Content Row -->
<div class="row">

    <!-- Content Column -->
    <div class="col-lg-12 mb-4">

        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">EDITAR</h6>
            </div>
            <div class="card-body">
                
                
            <form action="{{ url('optativa/'.$optativa->id)}}" method="POST" >
            {{csrf_field()}}
                @method("PATCH")
                <input class="form-control" type="text" value="{{$optativa->id}}" aria-label="Disabled input example" disabled>
                <label for=""> Materia :</label>
                <input class="form-control" type="text"  value='{{$optativa->materia}}' name='materia'>
                
                <label for=""> Alumno:</label>
                <select class="form-control form-select" aria-label="Default select example" name="alumno_id">
                <option selected>Seleciona los alumnos</option>
                    @foreach($alumnos as $alumno)
                    <option value={{$alumno->id}}>{{$alumno->namea}}</option>
                    @endforeach
                </select>

                <label for=""> Docente:</label>
                <select class="form-control form-select" aria-label="Default select example" name="maestro_id">
                <option selected>Seleciona al docente</option>
                    @foreach($docentes as $docente)
                    <option value={{$docente->id}}>{{$docente->name}}</option>
                    @endforeach
                </select>
               
                <div class="row">
                <a class="btn btn-danger m-3"  href="/optativa" >Cancelar</a>
                    <button type="submit" class="btn btn-primary m-3">Guadar</button>

                </div>
            </form>
            </div>
        </div>

       

    </div>

  
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

@include('Layouts.footer')
