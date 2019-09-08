@extends('layouts.app')

@section('title','Detalles del Producto Pequitas Lenceria')

@section('body-class','profile-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/city-profile.jpg') }}');"></div>

<div class="main main-raised">
    <div class="profile-content">
      <div class="container">
        <div class="row">
          <div class="col-md-6 ml-auto mr-auto">
            <div class="profile">
              <div class="avatar">
                <img src="{{ $product->featured_image_url }}" alt="Imagen Destacada" class="img-raised rounded-circle img-fluid">
              </div>
              <div class="name">
                <h3 class="title">{{ $product->name }}</h3>
                <h6>{{ $product->category->name }}</h6>
              </div>
            @if (session('notification'))
              <div class="alert alert-success">
                {{ session('notification') }}
              </div>
            @endif
            </div>
          </div>
        </div>
        <div class="description text-center">
          <p>{{ $product->description }}</p>
        </div>
        <div class="text-center">
          @if (auth()->check())
            <button class="btn btn-rose btn-round" data-toggle="modal" data-target="#modalAddToCart">
              <i class="material-icons">add_shopping_cart</i> Añadir a Mis Pedidos
            </button>
          @else
            <a href="{{ url('/login?redirect_to='.url()->current()) }}" class="btn btn-rose btn-round">
              <i class="material-icons">add_shopping_cart</i> Añadir a Mis Pedidos
            </a>
          @endif
        </div> 
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <div class="profile-tabs">
              <!-- <ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" href="#images" role="tab" data-toggle="tab">
                    <i class="material-icons">camera</i> Imagenes
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#colourswaists" role="tab" data-toggle="tab">
                    <i class="material-icons">palette</i> Colores y Talles
                  </a>
                </li>
              </ul> -->
				<ul class="nav nav-pills nav-pills-primary justify-content-center" role="tablist">
				    <li class="nav-item">
				        <a class="nav-link active" data-toggle="tab" href="#images" role="tablist" aria-expanded="true">
				          <i class="material-icons">camera</i> Imagenes
				        </a>
				    </li>
				    <li class="nav-item">
				        <a class="nav-link" data-toggle="tab" href="#colourswaists" role="tablist" aria-expanded="false">
				          <i class="material-icons">palette</i> Colores y Talles
				        </a>
				    </li>
				</ul>
            </div>
          </div>
        </div>
        <div class="tab-content tab-space">
          <div class="tab-pane active text-center gallery" id="images">
            <div class="row">
              <div class="col-md-3 ml-auto">
                @foreach ($imagesLeft as $image)
                 <img data-zoom-image="{{ $image->url }}" src="{{ $image->url }}" class="rounded"/>
                @endforeach
              </div>
              <div class="col-md-3 mr-auto">
	            @foreach ($imagesRight as $image)
	              <img src="{{ $image->url }}" class="rounded" />
	            @endforeach
              </div>
            </div>
          </div>
          <div class="tab-pane text-center gallery" id="colourswaists">
            <div class="row">
              <div class="col-md-6 ml-auto">
              	<h6>Colores Disponibles</h6>
            	<p>{{ $product->colours }}</p>
              </div>
              <div class="col-md-6 mr-auto">
              	<h6>Talles Disponibles</h6>
            	<p>{{ $product->waists }}</p>
              </div>
            </div>
          </div>
      </div>
    
    </div>
  
  </div>
 </div>
 <div class="modal fade" id="modalAddToCart" tabindex="-1" role="">
    <div class="modal-dialog modal-login" role="document">
        <div class="modal-content">
            <div class="card card-signup card-plain">
                <div class="modal-header">
                  <div class="card-header card-header-primary text-center">
                    <h5 class="card-title">Añadir a mis Pedidos</h5>
                  </div>
                </div>
                <div class="modal-body">
                    <form class="form" method="post" action="">
                    	@csrf
                    	<input type="hidden" name="product_id" value="{{ $product->id }}">
                        <p class="description text-center">Complete los Detalles de su Pedido</p>
                        <div class="card-body">
                            <div class="form-group bmd-form-group">
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="material-icons">add</i></div>
                                  </div>
                                  <input name="quantity" type="number" class="form-control" placeholder="Cantidad" value="1">
                                </div>
                            </div>

                            <div class="form-group bmd-form-group">
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="material-icons">palette</i></div>
                                  </div>
  								 <select class="form-control" name="colour" data-size="2" required>
  								 <option disabled selected>Seleccione Color</option>
  								  @foreach (explode(';',str_replace('; ', ';', $product->colours)) as $colour)
  								   <option value="{{$colour}}">
  								   	{{$colour}}
  								  </option> 
  								  @endforeach 
  								 </select>
                                </div>
                            </div>

                            <div class="form-group bmd-form-group">
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="material-icons">palette</i></div>
                                  </div>
  								 <select class="form-control" name="colour" data-size="2" required>
  								 <option disabled selected>Seleccione Color Opcional</option>
  								  @foreach (explode(';',str_replace('; ', ';', $product->colours)) as $colour)
  								   <option value="{{$colour}}">
  								   	{{$colour}}
  								  </option> 
  								  @endforeach 
  								 </select>
                                </div>
                            </div>

                            <div class="form-group bmd-form-group">
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="material-icons">square_foot</i></div>
                                  </div>
 									<input name="waist" type="text" class="form-control" placeholder="Talle" required>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-center">
                	<a data-dismiss="modal" class="btn btn-primary btn-link btn-wd btn-lg">Cancelar</a>
                    <button type="submit" class="btn btn-primary btn-link btn-wd btn-lg">Añadir</button>
                </div>
               </form>
            </div>
        </div>
    </div>
</div>
@include('includes.footer');
@endsection
