<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Autor;
use App\Libro;
use App\Genero;
class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $libros=Libro::with('autor','genero')->orderBy('id','DESC')->paginate(4);
       // $libros=Libro::with('autor.nombre')->get();
      
        $autores = Autor::all();
        return view('Libro/index',compact('libros','autores'));  
        
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $autores = Autor::all();
        $generos=  Genero::all();
        return view('Libro.create', compact('generos','autores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request,[ 'nombre'=>'required', 'resumen'=>'required', 
        'npagina'=>'required', 'edicion'=>'required', 'autor_id'=>'required', 'precio'=>'required', 'genero_id'=>'required']);
        Libro::create($request->all());
        return redirect()->route('libro.index')->with('success','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $libros=Libro::with('autor')->find($id);
        return  view('libro.show',compact('libros'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $libro=Libro::find($id);
        $autores = Autor::all();
        $generos = Genero::all();
        return view('libro.edit',compact('libro','autores','generos'));

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
       
        
        $this->validate($request,[ 'nombre'=>'required', 'resumen'=>'required', 'npagina'=>'required', 
        'edicion'=>'required', 'autor_id'=>'required', 'genero_id'=>'required', 'precio'=>'required']);
        

        Libro::with('autor','genero')->find($id)->update($request->all());
        return redirect()->route('libro.index')->with('success','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Libro::find($id)->delete();
        return redirect()->route('libro.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
