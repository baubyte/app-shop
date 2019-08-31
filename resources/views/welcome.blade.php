@extends('layouts.app')
 
@section('title','Bienvenido a Pequitas Lenceria')

@section('body-class','landing-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg')}}')">
  
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1 class="title">Tu historia comienza con nosotros.</h1>
        <!--<h4>Esto recién empieza .. Ayudame a construir esta historia juntos.</h4>-->
        <br>
        <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" class="btn btn-danger btn-raised btn-lg">
          <i class="fa fa-play"></i> ¿Como funciona?
        </a>
      </div>
    </div>
  </div>
</div>

  <div class="main main-raised">
  
  <div class="container">
    <div class="section text-center">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <h2 class="title">Hablemos de Nosotros</h2>
          <h5 class="description">Pequitas Lenceria !! Esto recién empieza .. Ayudame a construir esta historia juntos.</h5>
        </div>
      </div>
      <div class="features">
        <div class="row">
          <div class="col-md-4">
            <div class="info">
              <div class="icon icon-rose">
                <i class="material-icons">verified_user</i>
              </div>
              <h4 class="info-title">Misión</h4>
              <p>Poner a tu alcance los artículos de lencería que mas te gustan, haciendo todo lo posible para conseguirlos !!</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="info">
              <div class="icon icon-rose">
                <i class="material-icons">visibility</i>
              </div>
              <h4 class="info-title">Visión</h4>
              <p>Poder ganar tu confianza así construir una buena relación de negocios !!</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="info">
              <div class="icon icon-rose">
                <i class="material-icons">account_circle</i>
              </div>
              <h4 class="info-title">Simple</h4>
              <p>Solo te registras y haces tu pedido.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section text-center">
      <h2 class="title">Productos Disponibles</h2>
      <div class="team">
        <div class="row">
          @foreach ($products as $product)
          <div class="col-md-4">
            <div class="team-player">
              <div class="card card-plain">
                <div class="col-md-6 ml-auto mr-auto">
                  <img src="{{ $product->featured_image_url }}" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
                </div>
                <h4 class="card-title">{{ $product->name }}
                  <br>
                  <small class="card-description text-muted">{{ $product->category->name }}</small>
                </h4>
                <div class="card-body">
                  <p class="card-description">{{ $product->description }}</p>
                </div>
                <div class="card-footer justify-content-center">
                  <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-twitter"></i></a>
                  <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-instagram"></i></a>
                  <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-facebook-square"></i></a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    <div class="section section-contacts">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <h2 class="text-center title">Contacto</h2>
          <h4 class="text-center description">Dejanos tu comentario.</h4>
          <form class="contact-form">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Nombre</label>
                  <input type="email" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Correo Electronico</label>
                  <input type="email" class="form-control">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleMessage" class="bmd-label-floating">Mensaje</label>
              <textarea type="email" class="form-control" rows="4" id="exampleMessage"></textarea>
            </div>
            <div class="row">
              <div class="col-md-4 ml-auto mr-auto text-center">
                <button class="btn btn-primary btn-rose">
                  Enviar Mensaje
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>

</div>
@include('includes.footer');
@endsection
