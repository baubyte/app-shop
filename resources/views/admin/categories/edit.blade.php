@extends('layouts.app')

@section('title','Agregar Productos Pequitas Lenceria')

@section('body-class','profile-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg')}}')">
</div>
  <div class="main main-raised">
  <div class="container">
    <div class="section text-center">
      <h3 class="title">Editar Categoria</h2>
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
        <form method="post" action="{{ url('/admin/categories/'.$category->id.'/edit')}}" enctype="multipart/form-data">
            @csrf
          <div class="row">
            <div class="col-sm-6">
              <label for="name">Nombre Categoria/Marca</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fa fa-barcode"></i>
                  </span>
                </div>
                <input id="name" name="name" type="text" class="form-control" placeholder="Cod. de Producto" value="{{ $category->name }}">
              </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group form-file-upload form-file-multiple">
                    <input type="file" name="image" class="inputFileHidden">
                    <div class="input-group">
                        <input type="text" class="form-control inputFileVisible" placeholder="Seleccionar Imagen">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-fab btn-round btn-primary">
                                <i class="material-icons">attach_file</i>
                            </button>
                        </span>
                    </div>
                  </div>
                </div>
            </div>
             </br>
            <div class="row">
            <div class="col-sm-6">
              <label for="long_description">Descripción</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fa fa-file-text"></i>
                  </span>
                </div>
                <textarea id="description" name="description" class="form-control" placeholder="Descripción" rows="4">{{ $category->description }} </textarea>
              </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="input-group">
                        <p class="help-block">Subir Imagen Solo si Queres Cambiarla.
                            <a href="{{$category->url}}" target="_blank">Imagen Actual</a>
                        </p>
                    </div>
                  </div>
                </div>
            </div>
            </div>
          </br>
            <button type="submit" class="btn btn-primary btn-round btn-rose">Guardar Categoria</button>
            <a href="{{ url('/admin/categories')}}" class="btn btn-primary btn-round btn-primary">Cancelar</a>
        </form>
      </div>
    </div>
</div>

</div>
@include('includes.footer');
@endsection
