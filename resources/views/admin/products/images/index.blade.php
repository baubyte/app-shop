@extends('layouts.app')
 
@section('title','Imagenes de Productos Pequitas Lenceria')

@section('body-class','profile-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg')}}')">
</div>

  <div class="main main-raised">
  
  <div class="container">
    <div class="section text-center">
      <h3 class="title">Imágenes del Producto "{{ $product->name}}"</h3>

      	<form method="post" action="" enctype="multipart/form-data">
      		@csrf			
			  <div class="form-group form-file-upload form-file-multiple">
			    <input type="file" name="photo" class="inputFileHidden" required>
			    <div class="input-group">
			        <input type="text" class="form-control inputFileVisible" placeholder="Seleccionar Imagen">
			        <span class="input-group-btn">
			            <button type="button" class="btn btn-fab btn-round btn-primary">
			                <i class="material-icons">attach_file</i>
			            </button>
			        </span>
			    </div>
			  </div>
			<button type="submit" class="btn btn-primary btn-round btn-rose">Subir Nueva Imagen</button>
      	</form>
      	<hr>
         <a href="{{ url('/admin/products')}}" class="btn btn-primary btn-round">Volver al Listado de Productos</a>
      <div class="team">
      	<div class="row">
	      	@foreach ($images as $image)
	      	<div class="col-md-4">
			   <div class="card">
			    <img class="card-img-top" src="{{ $image->url}}" alt="Imagen del Producto" style="width:200; height: 200;">
			    <div class="card-body">
			    	<form method="post" action="">
			    	@csrf
			    	@method('DELETE')
			    	<input type="hidden" name="image_id" value="{{ $image->id}}">
	                <button type="submit" data-toggle="tooltip" data-placement="top" title="Eliminar Imagen" class="btn btn-danger btn-fab btn-fab-mini btn-round">
	                      <i class="material-icons">close</i>
	                  </button>
	               	</form>
			    </div>
			  </div>
			</div>
			 @endforeach
		 </div>
		</div>
      </div>
    </div>
</div>

</div>
@include('includes.footer');
@endsection
