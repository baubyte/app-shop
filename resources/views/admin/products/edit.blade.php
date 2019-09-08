@extends('layouts.app')
 
@section('title','Agregar Productos Pequitas Lenceria')

@section('body-class','profile-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg')}}')">
</div>
  <div class="main main-raised">
  <div class="container">
    <div class="section text-center">
      <h3 class="title">Editar Productos</h2>
      @if ($errors->any())    
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button  type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
      <div class="team">
        <form method="post" action="{{ url('/admin/products/'.$product->id.'/edit')}}">
            @csrf
          <div class="row">
            <div class="col-sm-6">
              <label for="name">Cod. de Producto</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fa fa-barcode"></i>
                  </span>
                </div>
                <input id="name" name="name" type="text" class="form-control" placeholder="Cod. de Producto" value="{{ $product->name }}">
              </div>
            </div>
            <div class="col-sm-6">
               <label for="price">Precio de Venta del Producto</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fa fa-usd"></i>
                  </span>
                </div>
                <input id="price" name="price" step="0.01" type="number" class="form-control" placeholder="Precio de Venta del Producto" value="{{ $product->price }}">
              </div>
            </div>
            </div>
               </br>
            <div class="row">
            <div class="col-sm-6">
              <label for="waists">Talles Disponibles</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fa fa-align-justify"></i>
                  </span>
                </div>
                <select class="form-control selectpicker" data-style="btn btn-round btn-primary select-with-transition" multiple data-live-search="true" name="waist[]" data-size="6" title="Seleccione los Talles Disponibles">
                @foreach ($waists as $waist)
                  <option data-tokens="{{ $waist->name}}" {{ in_array($waist->name, explode(';',str_replace('; ', ';', $product->waists))) ? 'selected':'' }} value="{{ $waist->name}}">{{ $waist->name}}</option> 
                @endforeach
                 </select>
                <!-- <input id="waists" name="waists" type="text" class="form-control" placeholder="Talles Disponibles" value="{{ $product->waists }}"> -->
              </div>
            </div>
            <div class="col-sm-6">
              <label for="colours">Colores Disponibles</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fa fa-paint-brush"></i>
                  </span>
                </div>
                <select class="form-control selectpicker" data-style="btn btn-round btn-primary select-with-transition" multiple data-live-search="true" name="colour[]" data-size="6" title="Seleccione los Colores Disponibles">
                @foreach ($colours as $colour)
                 <option data-tokens="{{ $colour->name}}"
                {{ in_array($colour->name, explode(';',str_replace('; ', ';', $product->colours))) ? 'selected':'' }} value="{{ $colour->name}}">{{ $colour->name}}</option> 
                @endforeach 
                </select>
                <!-- <input id="colours" name="colours" type="text" class="form-control" placeholder="Colores Disponibles" value="{{ str_replace('; ', ';', $product->colours)}}"> -->
              </div>
            </div>
            </div>
               </br>
            <div class="row">
            <div class="col-sm-6">
              <label for="description">Descripción Corta</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fa fa-file-text"></i>
                  </span>
                </div>
                <input id="description" name="description" type="text" class="form-control" placeholder="Descripción Corta" value="{{ $product->description }}">
              </div>
            </div>
            <div class="col-sm-6">
              <label for="category_id">Marca</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                   <i class="fa fa-registered" aria-hidden="true"></i>
                  </span>
                </div>
              <select id="category_id" name="category_id" class="form-control">
                <option selected disabled="true">Elija una Marca</option>
                @foreach ($categories as $category)
                <option value=" {{ $category->id}}" @if($category->id == old('category_id', $product->category_id)) selected @endif>{{ $category->name}}</option>
                @endforeach
                </select>
              </div>
            </div>
          </div>
             </br>
          <div class="row">
            <div class="col-sm-6">
              <label for="cost_price">Precio de costo del Producto</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fa fa-usd"></i>
                  </span>
                </div>
                <input id="cost_price" step="0.01" name="cost_price" type="number" class="form-control" placeholder="Precio de costo del Producto" value="{{ $product->cost_price }}">
              </div>
            </div>
            <div class="col-sm-6">
              <label for="providers">Proveedores</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fa fa-shopping-bag"></i>
                  </span>
                </div>
                <select id="providers" name="providers" class="form-control">
                <option selected disabled="true">Elija un Proveedor</option>
                @foreach ($providers as $provider)
                <option value="{{ $provider->name}}" @if($provider->name == old('providers', $product->providers)) selected @endif>{{ $provider->name}}</option>
                @endforeach
                </select>
                <!-- <input id="providers" name="providers" type="text" class="form-control" placeholder="Proveedores" value="{{ $product->providers }}"> -->
              </div>
            </div>
            </div>
            <div class="row">
            <div class="col-sm-8">
              <label for="long_description">Descripción Larga</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fa fa-file-text"></i>
                  </span>
                </div>
                <textarea id="long_description" name="long_description" class="form-control" placeholder="Descripción Larga" rows="4">{{ $product->long_description }} </textarea>
              </div>
            </div>
            </div>
          </br>
            <button type="submit" class="btn btn-primary btn-round btn-rose">Guardar Producto</button>
            <a href="{{ url('/admin/products')}}" class="btn btn-primary btn-round btn-primary">Cancelar</a>
        </form>
      </div>
    </div>
</div>

</div>
@include('includes.footer');
@endsection
