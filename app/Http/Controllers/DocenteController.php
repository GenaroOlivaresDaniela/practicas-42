<?php

namespace App\Http\Controllers;

use App\Models\docente;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    public function index()
    {
       /* Select * from products (ELOQUEN ORM DE LARAVEL) */
       $docentes = docente::all();
       return view('docente.index', compact('docentes'));
    }
    
    /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
    public function create()
        {
            return view('docente.add');
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
                'name' => 'required',
                'surname_p' => 'required',
                'surname_m' => 'required',
                'matricula' => 'required',
            ],
            [
                'name.required' =>'El campo esta vacio',
                'surname_p.required' =>'El campo esta vacio',
                'surname_m.required' =>'El campo esta vacio',
                'matricula.required' =>'El campo esta vacio'
                
            ]);
            
        //return $request;
            $docente=$request->all();
            
            docente::create($docente);

            return redirect('docente')->with('message','exito');
        }
    
          /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            $docente = docente::find($id);
            return view('docente.show', compact('docente'));
    
        }
    
         /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
    public function edit($id)
    {
        $docente = docente::findOrFail($id);
       
       return view('docente.edit', compact('docente'));
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
            $docente = docente::findOrFail($id);
            $input = $request->all();
            $docente->update($input);
            return redirect('docente')->with('se modifico con exito');
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
            $docente = docente::findOrFail($id);
            $docente->delete();
            return redirect('docente')->with('se elimino correctamente');
        }
    
}
