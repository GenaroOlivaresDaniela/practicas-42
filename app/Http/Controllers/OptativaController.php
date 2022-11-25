<?php

namespace App\Http\Controllers;

use App\Models\alumno;
use App\Models\docente;
use App\Models\optativa;
use Illuminate\Http\Request;

class OptativaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
   /* Select * from products (ELOQUEN ORM DE LARAVEL) */
    $optativas = optativa::Select('optativas.id','optativas.materia','alumnos.namea','docentes.name')
   ->join('alumnos','alumnos.id','=','optativas.alumno_id')
   ->join('docentes','docentes.id','=','optativas.maestro_id')->get();




   //$libros = libro::all();
   //return $libros;
   //$carrera = carrera::where('nombre_cteg', "")->get();
   //return $carrera;

   return view('optativa.index'  ,compact('optativas'));
}

/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
public function create()
/* la funcion create es para retornas nuestra vista y pasar valores como llaver foraneas */
    {
    /* Obtenemos todas las categorias  */
        $alumnos= alumno::all('id','namea');
        $docentes= docente::all('id','name');
        //return $categoria;
        return view('optativa.add', compact('alumnos','docentes'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) 
    {
        /* la funcion stores es donde ponemos toda nuestra logica  y obtenemos nuestros datos del formulario para posteriomente guardarlos */
        //
        $validacion = $request->validate([
            'materia' => 'required',
            'alumno_id' => 'required',
            'maestro_id' => 'required'
        ],
            
        [
            'materia.required' =>'El campo esta vacio',
            'alumno_id.required' => 'El campo esta vacio',
            'maestro_id.required' => 'El campo esta vacio'
            
        ]);
        //return $request;
        $optativa=$request->all();
        optativa::create($optativa);
        return redirect('optativa')->with('message','exito');
    }

      /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function show($id)
    {
       
        $optativa = optativa::Select('optativas.id','optativas.materia','alumnos.namea','docentes.name')
        ->join('alumnos','alumnos.id','=','optativas.alumno_id')
        ->join('docentes','docentes.id','=','optativas.maestro_id')
     ->Where('optativas.id', $id)->first();
    //   return $id;
    
    return view('optativa.show', compact('optativa'))->with('optativas', $optativa);
      

    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function edit($id)
{
    $alumnos= alumno::all('id','namea');
    $docentes= docente::all('id','name');
    $optativa =optativa::find($id);
   return view('optativa.edit', compact('alumnos','docentes','optativa'));
}

/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //return $request;
        //
        

        $optativa = optativa::findOrFail($id);
        $input = $request->all();

        //return $input;

        $optativa->update($input);
        return redirect('optativa')->with('se modifico con exito');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $optativa = optativa::findOrFail($id);
        $optativa->delete();
        return redirect('optativa')->with('message','se elimino con exito');

    }
    
}
