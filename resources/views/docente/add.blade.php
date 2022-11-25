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
                <h6 class="m-0 font-weight-bold text-primary">ALTA</h6>
            </div>
            <div class="card-body">
            @if($errors->any())

            @endif

            <form action="{{ url('docente') }}" method="POST" >
            {{csrf_field()}}
                <label for=""> Nombre :</label>
                <input class="form-control" type="text"  name="name" value="{{old('name')}}" class="@error('nanme') is-invalid @enderror">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                <label for=""> Apellido Paterno:</label>
                <input class="form-control" type="phone"  name="surname_p" value="{{old('surname_p')}}" class="@error('surname_p') is-invalid @enderror">
                @error('surname_p')
                <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                <label for=""> Apellido Materno:</label>
                <input class="form-control" type="phone"  name="surname_m" value="{{old('surname_m')}}" class="@error('surname_m') is-invalid @enderror">
                @error('surname_m')
                <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                <label for=""> Matricula:</label>
                <input class="form-control" type="numberBetween"  name="matricula" value="{{old('matricula')}}" class="@error('matricula') is-invalid @enderror">
                @error('matricula')
                <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
              
                <div class="row">
                <a class="btn btn-danger m-3"  href="/docente" >Cancelar</a>
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