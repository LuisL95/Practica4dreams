@extends('layouts.layout')
@section('content')
<script>	
	jQuery(function() {
				jQuery( "#formulario_crear_autor" ).validate(
					{
						rules:
							{
                  			nombre:  
									{
										required: true,
										minlength: 4,
										maxlength: 50
									}
							,apellido:
									{
										required: true,
										minlength: 4,
										maxlength: 50
									} 
							,fechaNacimiento:
									{
										required: true,
										minlength: 4,
										maxlength: 50
									}	
							,nacionalidad:
									{
										required: true,
										minlength: 4,
										maxlength: 50
									}
				  			 }
							
          			 ,messages:
					   		{
							nombre: 
									{
										required: "Este campo es requerido, amig@",
										minlength: $.format("Necesitamos por lo menos {0} caracteres"),
										maxlength: $.format("{0} caracteres son demasiados!"),
										
									}
							,apellido:
									{
										required: "Este campo es requerido, amig@",
										minlength: $.format("Necesitamos por lo menos {0} caracteres"),
										maxlength: $.format("{0} caracteres son demasiados!")
									}
							,fechaNacimiento:
									{
										required:"Este campo es requerido, amig@",
										minlength: $.format("Esto no es una fecha")

									}
							,nacionalidad:
									{
										required: "Este campo es requerido, amig@",
										minlength: $.format("Necesitamos por lo menos {0} caracteres"),
										maxlength: $.format("{0} caracteres son demasiados!")
									}
           					}
							   
					}
					
					

				);
			
				});

				

	</script>

	
<div class="row">
	<section class="content">
		<div class="col-md-12 col-md-offset-2">
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
					<h3 class="panel-title display-4 text-center mb-4">Nuevo autor</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" id="formulario_crear_autor" action="{{ route('autor.store') }}"  role="form">
							{{ csrf_field() }}
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" name="nombre" id="nombre" class="form-control input-sm required" minlenght="4" placeholder="Nombre del autor">
									</div>
								</div>
								<div class=" col-md-6">
									<div class="form-group">
										<input type="text" name="apellido" id="apellido" class="form-control input-sm required" minlenght="4" placeholder="Apellido del autor">
									</div>
								</div>
							</div>
 
								<div class=" col-md-12">
									<div class="form-group">
										<input type="text" name="fechaNacimiento" id="fechaNacimiento" class="form-control input-sm required" minlenght="4" placeholder="Fecha de nacimiento">
									</div>
								</div>
								<div class=" col-md-12">
									<div class="form-group">
										<input type="text" name="nacionalidad" id="nacionaliad" class="form-control input-sm required" minlenght="4" placeholder="Nacionalidad">
									</div>
								</div>
							</div>
							

							<div class="row">
 
								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Guardar" class="btn btn-success btn-block">
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