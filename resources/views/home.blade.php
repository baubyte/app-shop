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
        @include('flash::message')
          <ul class="nav nav-pills nav-pills-icons" role="tablist">
              <!--
                  color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
              -->
              <li class="nav-item">
                  <a class="nav-link active" href="#dashboard-1" role="tab" data-toggle="tab">
                      <i class="material-icons">dashboard</i>
                      Carrito de Compras
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#tasks-1" role="tab" data-toggle="tab">
                      <i class="material-icons">list</i>
                      Pedidos Realizados
                  </a>
              </li>
          </ul>
          <div class="tab-content tab-space">
            <p>Tenes {{auth()->user()->cart->details->count()}} productos en tu Carrito.</p>
              <div class="tab-pane active" id="dashboard-1">
                  <table class="table table-bordered table-hover table-sm">
                    <thead class="table-danger">
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center col-sm-1">Cod. Artículo</th>
                            <th class="text-center col-sm-2">Talle</th>
                            <th class="text-center col-sm-2">Color</th>
                            <th class="text-center col-sm-2">Color Opcional</th>
                            <th class="text-center col-sm-1">Cantidad</th>
                            <th class="text-center col-sm-2">Precio</th>
                            <th class="text-center col-sm-1">Descuento</th>
                            <th class="text-center col-sm-2">Subtotal</th>
                            <th class="text-center col-sm-1">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach (auth()->user()->cart->details as $detail)
                        <tr>
                            <td class="text-center">
                                <img src="{{ $detail->product->featured_image_url }}" height="50">
                            </td>
                            <td> <a href="{{ url('/products/'.$detail->product->id) }}" target="_blank">{{ $detail->product->name }}</a></td>
                            <td>{{ $detail->waists}}</td>
                            <td>{{ $detail->colours}}</td>
                            <td>{{ $detail->opcional_colours}}</td>
                            <td>{{ $detail->quantity}}</td>
                            <td class="text-center">&#36; {{ $detail->price}}</td>
                            <td class="text-center">{{ $detail->discount}} &#37;</td>
                            <td class="text-center">&#36; {{ ($detail->price * $detail->quantity) }} </td>
                            <td class="td-actions text-center">
                                <form method="post" action="{{ url('/cart')}}">
                                <a href="{{ url('/products/'.$detail->product->id) }}" target="_blank" data-toggle="tooltip" data-placement="top" title="Ver Producto" class="btn btn-info btn-fab btn-fab-mini btn-round">
                                    <i class="material-icons">info</i>
                                </a>
                                 @csrf
                                 @method('DELETE')
                                 <input type="hidden" name="cart_detail_id" value="{{$detail->id}}">
                                <button type="submit" data-toggle="tooltip" data-placement="top" title="Eliminar Producto" class="btn btn-danger btn-fab btn-fab-mini btn-round">
                                    <i class="material-icons">close</i>
                                </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                  <div class="text-right">
                    <h3>Importe Total a Pagar: $ {{auth()->user()->cart->total}}</h3>
                  </div>
                  <div class="text-center">
                      <form method="POST" action="{{ url('/order') }}">
                      @csrf
                      <button class="btn btn-rose btn-round" type="submit">
                        <i class="material-icons">done</i> Realizar Pedido
                      </button>
                    </form>
                  </div>
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

