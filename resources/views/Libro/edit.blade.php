@extends('layouts.layout')
@section('content')

	<script>	jQuery(function() {
				jQuery( "#Formulario_editor" ).validate(
					{
						rules:
							{
                  			nombre:  
									{
										required: true,
										minlength: 4,
										maxlength: 20
									}
							,npagina:
									{
										required: true
									} 
							,edicion:
									{
										required: true
									}	
							,precio:
									{
										required: true
									}
				  			 }
							
          			 ,messages:
					   		{
							nombre: 
									{
										required: "Este campo es requerido, amig@",
										minlength: $.format("Necesitamos por lo menos {0} caracteres"),
										maxlength: $.format("{0} caracteres son demasiados!")
									}
							,npagina:
									{
										required:"Este campo es requerido, amig@"
									}
							,edicion:
									{
										required:"Este campo es requerido, amig@"
									}
							,precio:
									{
										required:"Este campo es requerido, amig@"
									}
           					}
					}
					
				);
				});

				
	</script>
<div class="row">
	<section class="content">
		<div class="col-md-8 col-md-offset-2">
			@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Error!</strong> Revise los campos obligatorios.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			@if(Session::has('success'))
			<div class="alert alert-info">
				{{Session::get('success')}}
			</div>
			@endif
 
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Editar Libro</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form id="Formulario_editor" method="POST" action="{{ route('libro.update',$libro->id) }}"  role="form">
							{{ csrf_field() }}
							<input name="_method" type="hidden" value="PATCH">
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="nombre" id="nombre" class="form-control input-sm required" minlenght="4" value="{{$libro->nombre}}">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="npagina" id="npagina" class="form-control input-sm required"  value="{{$libro->npagina}}">
									</div>
								</div>
							</div>
 
							<div class="form-group">
								<textarea name="resumen" class="form-control input-sm"  placeholder="Resumen">{{$libro->resumen}}</textarea>
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="edicion" id="edicion" class="form-control input-sm required"  value="{{$libro->edicion}}">
										
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="precio" id="precio" class="form-control input-sm required"  value="{{$libro->precio}}">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<select class="form-control required"   name="autor_id" id="autor_id">
											<option value="" selected disabled >{{$libro->autor->nombre}} {{$libro->autor->apellido}}</option>
											@foreach ($autores as $autor)
											<option value="{{$autor->id}}">{{$autor->nombre}} {{$autor->apellido}}</option>
											@endforeach
											</select>
									</div>
								</div>
								
									<div class="col-xs-6 col-sm-6 col-md-6">
										<select class="form-control required"   name="genero_id" id="genero_id">
											<option value="" selected disabled >{{$libro->genero->nombre}}</option>
											@foreach ($generos as $genero)
											<option value="{{$genero->id}}">{{$genero->nombre}} </option>
											@endforeach
											</select>
									</div>
							</div>
							<div class="row">
 
								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Actualizar" class="btn btn-success btn-block">
									<a href="{{ route('libro.index') }}" class="btn btn-info btn-block" >Atrás</a>
								</div>	
 
							</div>
							
						</form>
					</div>
				</div>
 
			</div>
		</div>

	</section>
	
	

	@endsection

	
