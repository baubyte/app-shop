@extends('layouts.app')

@section('title','Registrarme Pequitas Lenceria')
 
@section('body-class','login-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" style="background-image: url('{{ asset('img/bg7.jpg')}}'); background-size: cover; background-position: top center;">
<div class="container">
  <div class="row">
    <div class="col-lg-4 col-md-6 ml-auto mr-auto">
      <div class="card card-login">
        <form class="form" method="POST" action="{{ route('register') }}">
            @csrf
          <div class="card-header card-header-primary text-center">
            <h4 class="card-title">Registrarme</h4>
            <!--<div class="social-line">
              <a href="#" class="btn btn-just-icon btn-link">
                <i class="fa fa-facebook-square"></i>
              </a>
              <a href="#" class="btn btn-just-icon btn-link">
                <i class="fa fa-twitter"></i>
              </a>
              <a href="#" class="btn btn-just-icon btn-link">
                <i class="fa fa-google-plus"></i>
              </a>
            </div>-->
          </div>
          <p class="description text-center">Complete los Datos</p>
          <div class="card-body">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="material-icons">face</i>
                </span>
              </div>
              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nombre y Apellido...">
            </div>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="material-icons">mail</i>
                </span>
              </div>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email...">
            </div>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="material-icons">lock_outline</i>
                </span>
              </div>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-passord" placeholder="Contraseña...">
            </div>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="material-icons">lock_outline</i>
                </span>
              </div>
            <input id="password-confirm" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-passord" placeholder="Confirmar Contraseña...">
            </div>
          </div>
          <div class="footer text-center">
            <button type="submit" class="btn btn-primary btn-link btn-wd btn-lg">Registrarme</button>
          </div>
            <!--@if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif-->
        </form>
      </div>
    </div>
  </div>
</div>
</div>
@include('includes.footer');
@endsection
