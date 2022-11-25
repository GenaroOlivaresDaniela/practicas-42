<?php

namespace App\Http\Controllers;

use App\Models\alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function index()
    {
       /* Select * from products (ELOQUEN ORM DE LARAVEL) */
       $alumnos = alumno::all();
       return view('alumno.index', compact('alumnos'));
    }
    
    /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
    public function create()
        {
            return view('alumno.add');
        }
        
        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            //
            $validacion = $request->validate([
                'namea' => 'required',
                'surname_p' => 'required',
                'surname_m' => 'required',
                'matricula' => 'required',
            ],
            [
                'namea.required' =>'El campo esta vacio',
                'surname_p.required' =>'El campo esta vacio',
                'surname_m.required' =>'El campo esta vacio',
                'matricula.required' =>'El campo esta vacio'
                
            ]);
            
        //return $request;
            $alumno=$request->all();
            
            alumno::create($alumno);

            return redirect('alumno')->with('message','exito');
        }
    
          /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            $alumno = alumno::find($id);
            return view('alumno.show', compact('alumno'));
    
        }
    
         /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
    public function edit($id)
    {
        $alumno = alumno::findOrFail($id);
       
       return view('alumno.edit', compact('alumno'));
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
            //
            $alumno = alumno::findOrFail($id);
            $input = $request->all();
            $alumno->update($input);
            return redirect('alumno')->with('se modifico con exito');
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
            $alumno = alumno::findOrFail($id);
            $alumno->delete();
            return redirect('alumno')->with('se elimino correctamente');
        }
    
    
       
        
    
    }
