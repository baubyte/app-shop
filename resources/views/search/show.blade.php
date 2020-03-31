@extends('layouts.app')

@section('title','Resultados de Búsqueda Pequitas Lenceria')

@section('style')
    <style>
        .team {
            padding-bottom: 50px;
        }
    </style>
@endsection

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
                <img src="/img/search.png" alt="Imagen de Busqueda" class="img-raised rounded-circle img-fluid">
              </div>
              <div class="name">
                <h3 class="title">Resultados de Búsqueda</h3>
                @include('flash::message')
              </div>
            </div>
          </div>
        </div>
        <div class="description text-center">
          <p>Se Encontraron {{$products->count()}} con el Término {{$query}}.</p>
        </div>
        <div class="team text-center">
            <div class="row">
              @foreach ($products as $product)
              <div class="col-md-4">
                <div class="team-player">
                  <div class="card card-plain">
                    <div class="col-md-6 ml-auto mr-auto">
                      <img src="{{ $product->featured_image_url }}" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
                    </div>
                    <h4 class="card-title">
                      <a href="{{ url('/products/'.$product->id)}}">{{ $product->name }}</a>
                    </h4>
                    <div class="card-body">
                      <p class="card-description">{{ $product->description }}</p>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
            <nav class="justify-content-center">
              {{ $products->links()}}
             </nav>
          </div>
        </div>

    </div>

  </div>
 </div>
@include('includes.footer');
@endsection
