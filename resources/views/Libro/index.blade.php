
@extends('layouts.layout')
@section('content')
<div class="row">
  <section class="content col-lg-12">
    <div class=" col-md-12 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left "><h3 class="text-center display-3">Lista de Libros</h3></div>
          <div class="pull-right">
            <div class="btn-group pull-right">
              <a href="{{ route('libro.create') }}" class="btn btn-info mb-1 " >Añadir Libro</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordered table-striped col-md-12 mb-5">
             <thead>
               <th class= "text-info ">Nombre</th>
               <th class= "text-info">Resumen</th>
               <th class= "text-info">No. Páginas</th>
               <th class= "text-info">Edicion</th>
               <th class= "text-info">Autor</th>
               <th class="text-info">Genero</th>
               <th class= "text-info">Precio</th>
               <th class= "text-info">Editar</th>
               <th class= "text-info">Eliminar</th>
             </thead>
             <tbody>
              @if($libros->count())  
              @foreach($libros as $libro)  
              <tr  class= "text-secondary">
                <td class= "text-secondary">{{$libro->nombre}}</td>
                <td class= "text-secondary">{{$libro->resumen}}</td>
                <td class= "text-secondary">{{$libro->npagina}}</td>
                <td class= "text-secondary">{{$libro->edicion}}</td>
                <td>{{$libro->autor->nombre}} {{$libro->autor->apellido}}</td>
                
                <td class="text-secondary">{{$libro->genero->nombre}}</td>
                <td class= "text-secondary">{{$libro->precio}}</td>
                <td><a class="btn btn-outline-success btn-lg" href="{{action('LibroController@edit', $libro->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('LibroController@destroy', $libro->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">
 
                   <button class="btn btn-outline-danger btn-lg" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                 </td>
               </tr>
               @endforeach 
               @else
               <tr>
                <td colspan="12" class="text-secondary">No hay registro !!</td>
              </tr>
              @endif
            </tbody>
 
          </table>
        </div>
      </div>

      <div class="pull-left"><h3 class=" text-center display-3">Lista Autores</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('autor.create') }}" class="btn btn-info mb-1" >Añadir Autor</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordered table-striped">
             <thead class= "text-info">
              <th>Id</th>
               <th>Nombre</th>
               <th>Apellido</th> 
               <th>Fecha de nacimiento</th>
               <th>Nacionalidad</th>   
               <th>Editar</th>
               <th>Eliminar</th>
              
             
             </thead>
             <tbody>
              @if($autores->count())  
              @foreach($autores as $autor)  
              <tr class= "text-secondary">
                <td>{{$autor->id}}</td>
                <td>{{$autor->nombre}}</td>
                <td>{{$autor->apellido}}</td>
                <td>{{$autor->fechaNacimiento}}</td>
                <td>{{$autor->nacionalidad}}</td>
               
                <td><a class="btn btn-outline-success btn-lg" href="{{action('AutorController@edit', $autor->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('AutorController@destroy', $autor->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">
 
                   <button class="btn btn-outline-danger btn-lg" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                 </td>
               </tr>
               @endforeach 
               @else
               <tr>
                <td colspan="8">No hay registro !!</td>
              </tr>
              @endif
            </tbody>
 
          </table>
        </div>
      </div>

      {{ $libros->links() }}
    </div>
  </div>
</section>
 
@endsection