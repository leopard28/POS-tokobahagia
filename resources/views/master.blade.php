@extends('layouts.blank')

@section('title')
	Toko Bahagia | Master
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
                  <h3>Master Dasboard</h3>
                </div>
                <div class="title_right">
                  <div class="pull-right">
                    <section class="content-header">
                      <ol class="breadcrumb">
                      <li class="active"><a href="{{ url('master') }}"><i class="fa fa-home"></i>Master</a></li>
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
                            <h2>Welcome To Master Dasboard</h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                              <li><a href="{{ url('master') }}"><i class="fa fa-repeat"></i></a></li>
                              <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                            </ul>
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">

                            <div class="animated homewidget col-md-2">
                                 <a href="{{ url('location') }}" class="bttn btn-default bttn-lg">
                                     <i class="fa fa-map-marker" style="margin-right: 7px;"></i>Location
                                 </a>
                            </div>
                            <div class="animated homewidget col-md-2">
                                 <a href="{{ url('product') }}" class="bttn btn-default bttn-lg">
                                     <i class="fa fa-glass" style="margin-right: 7px;"></i>Product
                                 </a>
                            </div>
                            <div class="animated homewidget col-md-2">
                                 <a href="{{ url('category') }}" class="bttn btn-default bttn-lg">
                                     <i class="fa fa-tags" style="margin-right: 7px;"></i>Category
                                 </a>
                            </div>
                            <div class="animated homewidget col-md-2">
                                 <a href="{{ url('customer') }}" class="bttn btn-default bttn-lg">
                                     <i class="fa fa-users" style="margin-right: 7px;"></i>Customers
                                 </a>
                            </div>
                            <div class="animated homewidget col-md-2">
                                 <a href="{{ url('supplier') }}" class="bttn btn-default bttn-lg">
                                     <i class="fa fa-user" style="margin-right: 7px;"></i>Suppliers
                                 </a>
                            </div>
                            <div class="animated homewidget col-md-2">
                                 <a href="{{ url('user') }}" class="bttn btn-default bttn-lg">
                                     <i class="fa fa-home" style="margin-right: 7px;"></i>Employee
                                 </a>
                            </div>
                                
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