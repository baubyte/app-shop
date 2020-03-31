@extends('layouts.app')

@section('title','Listado de Categorias Pequitas Lenceria')

@section('body-class','profile-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg')}}')">
</div>

  <div class="main main-raised">

  <div class="container">
    <div class="section text-center">
      <h3 class="title">Listado de Categorias Disponibles</h3>
      @include('flash::message')
      <div class="team">
        <div class="row table-responsive">
          <a href="{{ url('/admin/categories/create') }}" class="btn btn-primary btn-round btn-rose">Agregar Categoria</a>
            <table class="table table-bordered table-hover table-sm">
              <thead class="table-danger">
                  <tr>
                      <th class="text-center col-sm-1">#</th>
                      <th class="text-center col-sm-1">Nombre</th>
                      <th class="text-center col-sm-2">Descripción</th>
                      <th class="text-center col-sm-1">Opciones</th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($categories as $key => $category)
                  <tr>
                      <td class="text-center">{{ $key+1 }}</td>
                      <td>{{ $category->name }}</td>
                      <td>{{ $category->description}}</td>
                      <td class="td-actions text-center small">
                          <form method="post" action="{{ url('/admin/categories/'.$category->id)}}">
                          <a href="#" data-toggle="tooltip" data-placement="top" title="Ver Categoria" class="btn btn-info btn-fab btn-fab-mini btn-round">
                              <i class="material-icons">info</i>
                          </a>
                          <a href="{{ url('/admin/categories/'.$category->id.'/edit')}}" data-toggle="tooltip" data-placement="top" title="Editar Categoria" class="btn btn-success btn-fab btn-fab-mini btn-round">
                              <i class="material-icons">edit</i>
                          </a>
                           @csrf
                           @method('DELETE')
                          <button type="submit" data-toggle="tooltip" data-placement="top" title="Eliminar Categoria" class="btn btn-danger btn-fab btn-fab-mini btn-round">
                              <i class="material-icons">close</i>
                          </button>
                          </form>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
            </table>
        </div>
       {{ $categories->links()}}
      </div>
    </div>
</div>

</div>
@include('includes.footer');
@endsection
