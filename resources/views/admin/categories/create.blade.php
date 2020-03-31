@extends('layouts.app')

@section('title','Agregar Categorias Pequitas Lenceria')

@section('body-class','profile-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg')}}')">
</div>
  <div class="main main-raised">
  <div class="container">
    <div class="section text-center">
      <h3 class="title">Agregar Categorias</h2>
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
        <form method="post" action="{{ url('/admin/categories')}}">
            @csrf
          <div class="row">
            <div class="col-sm-8">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fa fa-barcode"></i>
                  </span>
                </div>
                <input id="name" name="name" type="text" class="form-control" placeholder="Categoria / Marca" value="{{ old('name') }}">
              </div>
            </div>
            </div>
             </br>
            <div class="row">
            <div class="col-sm-8">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fa fa-file-text"></i>
                  </span>
                </div>
                <textarea id="description" name="description" class="form-control" placeholder="Descripción" rows="4">{{ old('description') }}</textarea>
              </div>
            </div>
            </div>
          </br>
            <button type="submit" class="btn btn-round btn-rose">Guardar Categoria</button>
            <a href="{{ url('/admin/categories')}}" class="btn btn-primary btn-round">Cancelar</a>
        </form>
      </div>
    </div>
</div>

</div>
@include('includes.footer');
@endsection
