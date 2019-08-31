@extends('layouts.app')

@section('title','Dashboard Pequitas Lenceria')

@section('body-class','profile-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg')}}')">
</div>
  <div class="main main-raised">
  <div class="container">
    <div class="section text-center">
      <h3 class="title">Dashboard</h2>
           @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
          <ul class="nav nav-pills nav-pills-icons" role="tablist">
              <!--
                  color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
              -->
              <li class="nav-item">
                  <a class="nav-link" href="#dashboard-1" role="tab" data-toggle="tab">
                      <i class="material-icons">dashboard</i>
                      Carrito de Compras
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#tasks-1" role="tab" data-toggle="tab">
                      <i class="material-icons">list</i>
                      Pedididos Realizados
                  </a>
              </li>
          </ul>
          <div class="tab-content tab-space">
              <div class="tab-pane active" id="dashboard-1">
                Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits.
                <br><br>
                Dramatically visualize customer directed convergence without revolutionary ROI.
              </div>
              <div class="tab-pane" id="schedule-1">
                Efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for real-time schemas.
                <br><br>Dramatically maintain clicks-and-mortar solutions without functional solutions.
              </div>
              <div class="tab-pane" id="tasks-1">
                  Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas.
                  <br><br>Dynamically innovate resource-leveling customer service for state of the art customer service.
              </div>
          </div>
      </div>
    </div>
</div>

</div>
@include('includes.footer');
@endsection

