
@extends('adminPanel/master')   
         @section('style')
            <link href="{{ asset('public/adminPanel/assets/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
         @endsection
         @section('content')        
                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <form class="d-flex">
                                            <div class="input-group">
                                                <input type="text" class="form-control form-control-light" id="dash-daterange">
                                                <span class="input-group-text bg-primary border-primary text-white">
                                                    <i class="mdi mdi-calendar-range font-13"></i>
                                                </span>
                                            </div>
                                            <a href="javascript: void(0);" class="btn btn-primary ms-2">
                                                <i class="mdi mdi-autorenew"></i>
                                            </a>
                                            <a href="javascript: void(0);" class="btn btn-primary ms-1">
                                                <i class="mdi mdi-filter-variant"></i>
                                            </a>
                                        </form>
                                    </div>
                                    <h4 class="page-title">Plots</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                            @if(session('success'))
                            <div id="success-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content modal-filled bg-success">
                                        <div class="modal-body p-4">
                                            <div class="text-center">
                                                <i class="dripicons-checkmark h1"></i>
                                                <h4 class="mt-2">Well Done!</h4>
                                                <p class="mt-3">{{ session('success') }}</p>
                                                <button type="button" class="btn btn-light my-2" data-bs-dismiss="modal">Continue</button>
                                            </div>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div>
                            @endif
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col-sm-5">
                                                Plots List
                                            </div>
                                            <div class="col-sm-7">
                                                <div class="text-sm-end">
                                                    <a href="{{ URL::to('add-plot') }}" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> Add Plot</a>
                                                </div>
                                            </div><!-- end col-->
                                        </div>
                
                                        <div class="table-responsive">
                                            <table id="scroll-horizontal-datatable" class="table table-centered w-100 nowrap">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Plot No.</th>
                                                        <th>Location</th>
                                                        <th>Society</th>
                                                        <th>Block</th>
                                                        <th>Marla</th>
                                                        <th>Status</th>
                                                        <th>Cost Price</th>
                                                        <th>Sale Price</th>
                                                        <th>State Type</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @isset($all_plosts)
                                                    @foreach($all_plosts as $plot_res)
                                                           
                                                        <tr>
                                                            <td>
                                                                 {{ $plot_res->id }}
                                                            </td>
                                                            <td>
                                                                {{ $plot_res->plot_no }}
                                                            </td>
                                                            </td>
                                                            <td>
                                                                {{ $plot_res->Plotlocation->location_name }}
                                                            </td>
                                                            <td>
                                                                {{ $plot_res->PlotSociety->society_name }}
                                                            </td>
                                                            <td>
                                                                {{ $plot_res->PlotBlock->block_name }}
                                                            </td>
                                                            <td>
                                                                {{ $plot_res->PlotMaral->marala }}
                                                            </td>
                                                            <td>
                                                                @php
                                                                    $not_sale = false;
                                                                    $sale = false;
                                                                     if($plot_res->status == 'Not Sale'){
                                                                        $not_sale = true;
                                                                     }

                                                                     if($plot_res->status == 'Sale Progress'){
                                                                        $sale = true;
                                                                     }
                                                                
                                                                @endphp
                                                                    <span @class([
                                                                        'badge',
                                                                        'bg-success' => $sale,
                                                                        'bg-danger' => $not_sale,
                                                                    ])>{{ $plot_res->status  }}</span> 
                                                            </td>
                                                            <td>
                                                                {{ number_format($plot_res->plot_cost_price) }}
                                                            </td>
                                                            <td>
                                                                {{ number_format($plot_res->plot_sale_price) }}
                                                            </td>
                                                            <td>
                                                                {{ $plot_res->state_type }}
                                                            </td>
                                                            
                                                        </tr>
                                                    @endforeach
                                                @endisset
                                                </tbody>
                                            </table>
                                            {!! $all_plosts->links() !!}
                                                
                                        </div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                     
                        <!-- end row -->

                    </div>
         @endsection

         @section('scripts')
            <script>
                @if(session('success'))
                    $(document).ready(function(){
                        $("#success-alert-modal").modal('show');
                    })  
                @endif
            </script>
         <script src="{{ asset('public/adminPanel/assets/js/vendor/jquery.dataTables.min.js') }}"></script>
         <script src="{{ asset('public/adminPanel/assets/js/vendor/dataTables.bootstrap5.js') }}"></script>
         
            <script>
                $("#scroll-horizontal-datatable").DataTable({scrollX:!0,language:{paginate:{previous:"<i class='mdi mdi-chevron-left'>",next:"<i class='mdi mdi-chevron-right'>"}},drawCallback:function(){$(".dataTables_paginate > .pagination").addClass("pagination-rounded")}})
                console.log('page is load now');
            </script>         
         @endsection
                    <!-- container -->

                