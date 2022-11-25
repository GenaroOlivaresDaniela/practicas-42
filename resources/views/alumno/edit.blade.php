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
                
                
            <form action="{{ url('alumno/'.$alumno->id)}}" method="POST" >
            {{csrf_field()}}
                @method("PATCH")
                <input class="form-control" type="text" value="{{$alumno->id}}" aria-label="Disabled input example" disabled>
                <label for=""> Nombre :</label>
                <input class="form-control" type="text"  value='{{$alumno->namea}}' name='namea'>
                <label for=""> Apellido Paterno :</label>
                <input class="form-control" type="text"  value='{{$alumno->surname_p}}' name='surname_p'>
                <label for=""> Apellido Materno :</label>
                <input class="form-control" type="text"  value='{{$alumno->surname_m}}' name='surname_m'>
                <label for=""> Matricula:</label>
                <input class="form-control" type="text"  value='{{$alumno->matricula}}' aria-label="Disabled input example" disabled>
               
                <div class="row">
                <a class="btn btn-danger m-3"  href="/alumno" >Cancelar</a>
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
