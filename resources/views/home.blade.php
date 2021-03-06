@extends('layouts.blank')

@section('title')
	Toko Bahagia | Home
@endsection

@push('stylesheets')
        <!-- Animate -->
      <link href="{{ asset("assets/animate.css/animate.min.css")}}" rel="stylesheet" type="text/css"/>
      <!-- PNotify -->
      <link href="{{ asset("assets/pnotify/dist/pnotify.css") }}" rel="stylesheet">
      <link href="{{ asset("assets/pnotify/dist/pnotify.buttons.css") }}" rel="stylesheet">
      <link href="{{ asset("assets/pnotify/dist/pnotify.nonblock.css") }}" rel="stylesheet">
      <!-- Sweetalert -->
      <link href="{{ asset("css/sweetalert2/sweetalert2.min.css") }}" rel="stylesheet">
      <!-- Custom Theme Style -->
      <link href="{{ asset("build/css/action-icon.css") }}" rel="stylesheet"> 
      <link href="{{ asset("build/css/custom.min2.css") }}" rel="stylesheet">  
@endpush

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
      
            <section class="page-title">
                <div class="title_left">
                  <h3>Home Dasboard</h3>
                </div>
                <div class="title_right">
                  <div class="pull-right">
                    <section class="content-header">
                      <ol class="breadcrumb">
                      <li class="active"><a href="{{ url('home') }}"><i class="fa fa-home"></i>Home</a></li>
                    </ol>  
                    </section>
                  </div>
                </div>
          </section>

            <div class="x_content">
                <div class="row">
                    
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2>Welcome To Home Dasboard</h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                              <li><a href="{{ url('home') }}"><i class="fa fa-repeat"></i></a></li>
                              <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                            </ul>
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">

                                @if(Sentinel::getUser()->roles()->first()->slug == 'admin')
                                    {{-- @include('includes.home_admin') --}}
                                <div class="animated homewidget col-md-2">
                                     <a href="{{ url('home') }}" class="bttn btn-default bttn-lg">
                                         <i class="fa fa-home" style="margin-right: 7px;"></i>Home
                                     </a>
                                </div>
                                <div class="animated homewidget col-md-2">
                                     <a href="{{ url('inventory') }}" class="bttn btn-default bttn-lg">
                                         <i class="fa fa-home" style="margin-right: 7px;"></i>Inventory
                                     </a>
                                </div>
                                <div class="animated homewidget col-md-2">
                                     <a href="{{ url('purchase/create') }}" class="bttn btn-default bttn-lg">
                                         <i class="fa fa-shopping-cart" style="margin-right: 7px;"></i>Purchase
                                     </a>
                                </div>
                                <div class="animated homewidget col-md-2">
                                     <a href="{{ url('order/create') }}" class="bttn btn-default bttn-lg">
                                         <i class="fa fa-inbox" style="margin-right: 7px;"></i>Order
                                     </a>
                                </div>
                                <div class="animated homewidget col-md-2">
                                     <a href="{{ url('service/create') }}" class="bttn btn-default bttn-lg">
                                         <i class="fa fa-wrench" style="margin-right: 7px;"></i>Service
                                     </a>
                                </div>
                                <div class="animated homewidget col-md-2">
                                     <a href="{{ url('transaction/create') }}" class="bttn btn-default bttn-lg">
                                         <i class="fa fa-credit-card" style="margin-right: 7px;"></i>Transaction
                                     </a>
                                </div>
                                <div class="animated homewidget col-md-2">
                                     <a href="{{ url('income') }}" class="bttn btn-default bttn-lg">
                                         <i class="fa fa-plus-square" style="margin-right: 7px;"></i>Income
                                     </a>
                                </div>
                                <div class="animated homewidget col-md-2">
                                     <a href="{{ url('outcome') }}" class="bttn btn-default bttn-lg">
                                         <i class="fa fa-minus-square" style="margin-right: 7px;"></i>Outcome
                                     </a>
                                </div>

                                @else
                                    @include('includes.home_employee')
                                @endif

                                
                          </div>
                        </div>
                      </div>

                </div>
            </div>

        </div>
    </div>
    <!-- /page content -->

    <!-- footer content -->
    @include('includes.footer')
    <!-- /footer content -->

    @push('scripts')

        <!-- PNotify -->
        <script src="{{ asset("assets/pnotify/dist/pnotify.js") }}"></script>
        <script src="{{ asset("assets/pnotify/dist/pnotify.animate.js") }}"></script>
        <script src="{{ asset("assets/pnotify/dist/pnotify.buttons.js") }}"></script>
        <script src="{{ asset("assets/pnotify/dist/pnotify.nonblock.js") }}"></script>
        <!-- Sweetalert -->
        <script src="{{ asset("js/sweetalert2/sweetalert2.min.js") }}"></script>
        <!-- Custom Theme Scripts -->
        <script src="{{ asset("build/js/custom.min2.js") }}"></script>

        <!-- Include Scripts -->
        @include('javascript.pnotify')
        @include('javascript.sweetalert')

    @endpush

@endsection