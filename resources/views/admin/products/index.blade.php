@extends('layouts.app')
 
@section('title','Listado de Productos Pequitas Lenceria')

@section('body-class','profile-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg')}}')">
</div>

  <div class="main main-raised">
  
  <div class="container">
    <div class="section text-center">
      <h3 class="title">Listado de Productos Disponibles</h3>
      <div class="team">
        <div class="row table-responsive">
          <a href="{{ url('/admin/products/create') }}" class="btn btn-primary btn-round btn-rose">Agregar Producto</a>
            <table class="table table-bordered table-hover table-sm">
              <thead class="table-danger">
                  <tr>
                      <th class="text-center">#</th>
                      <th class="text-center col-sm-1">Cod. Artículo</th>
                      <th class="text-center col-sm-2">Talles Disponibles</th>
                      <th class="text-center col-sm-2">Colores Disponibles</th>
                      <th class="text-center col-sm-2">Precio de Venta</th>
                      <th class="text-center col-sm-2">Precio de Costo</th>
                      <th class="text-center col-sm-1">Categoria</th>
                      <th class="text-center col-sm-1">Proveedor</th>
                      <th class="text-center col-sm-1">Opciones</th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($products as $product)
                  <tr>
                      <td class="text-center">{{ $product->id }}</td>
                      <td>{{ $product->name }}</td>
                      <td>{{ $product->waists}}</td>
                      <td>{{ $product->colours}}</td>
                      <td class="text-center">&#36; {{ $product->price}}</td>
                      <td class="text-center">&#36; {{ $product->cost_price}}</td>
                      <td>{{ $product->category->name}}</td>
                      <td>{{ $product->providers}}</td>
                      <td class="td-actions text-center small">
                          <form method="post" action="{{ url('/admin/products/'.$product->id)}}">
                          <a href="#" data-toggle="tooltip" data-placement="top" title="Ver Producto" class="btn btn-info btn-fab btn-fab-mini btn-round">
                              <i class="material-icons">info</i>
                          </a>
                          <a href="{{ url('/admin/products/'.$product->id.'/edit')}}" data-toggle="tooltip" data-placement="top" title="Editar Producto" class="btn btn-success btn-fab btn-fab-mini btn-round">
                              <i class="material-icons">edit</i>
                          </a>                          
                          <a href="{{ url('/admin/products/'.$product->id.'/images')}}" data-toggle="tooltip" data-placement="top" title="Imagenes del Producto" class="btn btn-warning btn-fab btn-fab-mini btn-round">
                              <i class="material-icons">collections</i>
                          </a>
                           @csrf
                           @method('DELETE')
                          <button type="submit" data-toggle="tooltip" data-placement="top" title="Eliminar Producto" class="btn btn-danger btn-fab btn-fab-mini btn-round">
                              <i class="material-icons">close</i>
                          </button>
                          </form>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
            </table>
        </div>
       {{ $products->links()}}
      </div>
    </div>
</div>

</div>
@include('includes.footer');
@endsection
