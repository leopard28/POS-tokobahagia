@extends('layouts.blank')

@section('title')
    Toko Bahagia | Supplier
@endsection
@section('contentheader_title')
  Supplier
@endsection
@section('contentheader_description')
  List
@endsection
@section('contentheader_sub')
  Supplier
@endsection

@push('stylesheets')

      <!-- Datatables -->
      <link href="{{ asset("assets/datatables.net-bs/css/dataTables.bootstrap.min.css") }}" rel="stylesheet">
      <link href="{{ asset("assets/datatables.net-buttons-bs/css/buttons.bootstrap.min.css")}}" rel="stylesheet">
      <link href="{{ asset("assets/datatables.net-responsive-bs/css/responsive.bootstrap.min.css") }}" rel="stylesheet">
      <link href="{{ asset("assets/datatables.net-scroller-bs/css/scroller.bootstrap.min.css") }}" rel="stylesheet">
      <!-- PNotify -->
      <link href="{{ asset("assets/pnotify/dist/pnotify.css") }}" rel="stylesheet">
      <link href="{{ asset("assets/pnotify/dist/pnotify.buttons.css") }}" rel="stylesheet">
      <link href="{{ asset("assets/pnotify/dist/pnotify.nonblock.css") }}" rel="stylesheet">
      <!-- Sweetalert -->
      <link href="{{ asset("css/sweetalert2/sweetalert2.min.css") }}" rel="stylesheet">
      <!-- Custom Theme Style -->
      <link href="{{ asset("build/css/action-icon.css") }}" rel="stylesheet"> 
      <link href="{{ asset("build/css/custom.min.css") }}" rel="stylesheet"> 

@endpush

@section('main_container')
     <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            
            @include('includes.contentheader')

            <div class="clearfix"></div>

            <div class="row">
             
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Supplier List <small>
                      <a href="{{ url('supplier/create') }}" class="btn btn-primary btn-xs">
                        <i class="fa fa-plus-square" style="margin-right: 6px;"></i>New Supplier
                      </a></small>
                    </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.
                    </p>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Supplier name</th>
                          <th>Contact</th>
                          <th>Fax</th>
                          <th>Address</th>
                          {{-- <th>Postal code</th> --}}
                          <th>City</th>
                          {{-- <th>Province</th> --}}
                          {{-- <th>Country</th> --}}
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($data as $index => $supplier)
                        <tr>
                          <td>{{ $index +1 }}</td>
                          <td>{{ $supplier->supplier_name }}</td>
                          <td>{{ $supplier->contact_title }} {{ $supplier->contact_name }}</td>
                          {{-- <td>{{ $supplier->contact_name }}</td> --}}
                          <td>{{ $supplier->fax }}</td>
                          <td>{{ $supplier->address }}</td>
                          {{-- <td>{{ $supplier->postal_code }}</td> --}}
                          <td>{{ $supplier->city }}</td>
                          {{-- <td>{{ $supplier->province }}</td> --}}
                          {{-- <td>{{ $supplier->country }}</td> --}}
                          <td>
                          <center>
                            <div class="btn-group">
                              <a href="{{ url('supplier/'.$supplier->id) }}" class="btn btn-primary btn-xs" class="tooltip-top" title="" data-tooltip="View detail"><i class="fa fa-eye"></i></a>
                            </div>
                            <div class="btn-group">
                              <a href="{{ url('supplier/'.$supplier->id.'/edit') }}" class="btn btn-success btn-xs" class="tooltip-top" title="" data-tooltip="Edit"><i class="fa fa-pencil"></i></a>
                            </div>
                            <div class="btn-group">
                              <form id="delete-currency" action="{{ url('supplier/'.$supplier->id) }}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">
                                <button id="delete" type="submit" class="btn btn-danger btn-xs" class="tooltip-top" title="" data-tooltip="Delete"><i class="fa fa-trash"></i></button>
                              </form>
                            </div>
                          </center>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
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

    <script src="{{ asset("assets/datatables.net/js/jquery.dataTables.min.js") }}"></script>
    <script src="{{ asset("assets/datatables.net-bs/js/dataTables.bootstrap.min.js") }}"></script>
    <script src="{{ asset("assets/datatables.net-buttons/js/dataTables.buttons.min.js") }}"></script>
    <script src="{{ asset("assets/datatables.net-buttons-bs/js/buttons.bootstrap.min.js") }}"></script>
    <script src="{{ asset("assets/datatables.net-buttons/js/buttons.flash.min.js") }}"></script>
    <script src="{{ asset("assets/datatables.net-buttons/js/buttons.html5.min.js") }}"></script>
    <script src="{{ asset("assets/datatables.net-buttons/js/buttons.print.min.js") }}"></script>
    <script src="{{ asset("assets/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js") }}"></script>
    <script src="{{ asset("assets/datatables.net-keytable/js/dataTables.keyTable.min.js") }}"></script>
    <script src="{{ asset("assets/datatables.net-responsive/js/dataTables.responsive.min.js") }}"></script>
    <script src="{{ asset("assets/datatables.net-responsive-bs/js/responsive.bootstrap.js") }}"></script>
    <script src="{{ asset("assets/datatables.net-scroller/js/dataTables.scroller.min.js") }}"></script>
    <script src="{{ asset("assets/jszip/dist/jszip.min.js") }}"></script>
    <script src="{{ asset("assets/pdfmake/build/pdfmake.min.js") }}"></script>
    <script src="{{ asset("assets/pdfmake/build/vfs_fonts.js") }}"></script>

    <!-- PNotify -->
    <script src="{{ asset("assets/pnotify/dist/pnotify.js") }}"></script>
    <script src="{{ asset("assets/pnotify/dist/pnotify.buttons.js") }}"></script>
    <script src="{{ asset("assets/pnotify/dist/pnotify.nonblock.js") }}"></script>
    <!-- Sweetalert -->
    <script src="{{ asset("js/sweetalert2/sweetalert2.min.js") }}"></script>
    <!-- Custom Theme Scripts -->
    <script src="{{ asset("build/js/custom.min.js") }}"></script>

    <!-- Include Scripts -->
    @include('javascript.pnotify')
    @include('javascript.sweetalert')
    
    @endpush
@endsection