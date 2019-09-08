@extends('layouts.app')
 
@section('title','Agregar Productos Pequitas Lenceria')

@section('body-class','profile-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg')}}')">
</div>
  <div class="main main-raised">
  <div class="container">
    <div class="section text-center">
      <h3 class="title">Agregar Productos</h2>
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
        <form method="post" action="{{ url('/admin/products')}}">
            @csrf
          <div class="row">
            <div class="col-sm-6">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fa fa-barcode"></i>
                  </span>
                </div>
                <input id="name" name="name" type="text" class="form-control" placeholder="Cod. de Producto" value="{{ old('name') }}">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fa fa-usd"></i>
                  </span>
                </div>
                <input id="price" name="price" step="0.01" type="number" class="form-control" placeholder="Precio de Venta del Producto" value="{{ old('price') }}">
              </div>
            </div>
            </div>
               </br>
            <div class="row">
            <div class="col-sm-6">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fa fa-align-justify"></i>
                  </span>
                </div>
                <select class="form-control selectpicker" data-style="btn btn-round btn-primary select-with-transition" multiple data-live-search="true" name="waist[]" data-size="6" title="Seleccione los Talles Disponibles">
                @foreach ($waists as $waist)
                  <option data-tokens="{{ $waist->name}}"
                  @if (old('waist')){{ (in_array($waist->name, old('waist')) ? 'selected':'') }}@endif value="{{ $waist->name}}">{{ $waist->name}}</option> 
                @endforeach
                 </select>
                <!-- <input id="waists" name="waists" type="text" class="form-control" placeholder="Talles Disponibles" value="{{ old('waists') }}"> -->
              </div>
            </div>
            <div class="col-sm-6">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fa fa-paint-brush"></i>
                  </span>
                </div>
             <select class="form-control selectpicker" data-style="btn btn-round btn-primary select-with-transition" multiple data-live-search="true" name="colour[]" data-size="6" title="Seleccione los Colores Disponibles">
                @foreach ($colours as $colour)
                <option data-tokens="{{ $colour->name}}"
                @if (old('colour')){{ (in_array($colour->name, old('colour')) ? 'selected':'') }}@endif value="{{ $colour->name}}">{{ $colour->name}}</option> 
                @endforeach 
                </select>
                <!--   <input id="colours" name="colours" type="text" class="form-control" placeholder="Colores Disponibles" value="{{ old('colours') }}">-->
              </div>
            </div>
            </div>
               </br>
            <div class="row">
            <div class="col-sm-6">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fa fa-file-text"></i>
                  </span>
                </div>
                <input id="description" name="description" type="text" class="form-control" placeholder="Descripción Corta" value="{{ old('description') }}">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                   <i class="fa fa-registered" aria-hidden="true"></i>
                  </span>
                </div>
              <select id="category_id" name="category_id" class="form-control">
                <option selected disabled="true">Elija una Marca</option>
                @foreach ($categories as $category)
                <option value="{{$category->id}}" @if($category->id == old('category_id')) selected @endif>{{ $category->name}}</option>
                @endforeach
                </select>
              </div>
            </div>
          </div>
             </br>
          <div class="row">
            <div class="col-sm-6">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fa fa-usd"></i>
                  </span>
                </div>
                <input id="cost_price" name="cost_price" step="0.01" type="number" class="form-control" placeholder="Precio de costo del Producto" value="{{ old('cost_price') }}">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fa fa-shopping-bag"></i>
                  </span>
                </div>
                <select id="providers" name="providers" class="form-control">
                <option selected disabled="true">Elija un Proveedor</option>
                @foreach ($providers as $provider)
                <option @if($provider->name == old('providers')) selected @endif value="{{$provider->name}}">{{$provider->name}}</option>
                @endforeach
                </select>
                <!-- <input id="providers" name="providers" type="text" class="form-control" placeholder="Proveedores" value="{{ old('providers') }}"> -->
              </div>
            </div>
            </div>
            <div class="row">
            <div class="col-sm-8">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fa fa-file-text"></i>
                  </span>
                </div>
                <textarea id="long_description" name="long_description" class="form-control" placeholder="Descripción Larga" rows="4">{{ old('long_description') }}</textarea>
              </div>
            </div>
            </div>
          </br>
            <button type="submit" class="btn btn-round btn-rose">Gurdar Producto</button>
            <a href="{{ url('/admin/products')}}" class="btn btn-primary btn-round">Cancelar</a>
        </form>
      </div>
    </div>
</div>

</div>
@include('includes.footer');
@endsection
