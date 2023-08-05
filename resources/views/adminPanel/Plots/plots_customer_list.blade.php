
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
                                        
                                    </div>
                                    <h4 class="page-title">Plots Customers</h4>
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
                                                Customer List
                                            </div>
                                            <div class="col-sm-7">
                                                <div class="text-sm-end">
                                                    <a href="{{ URL::to('/add-customer') }}" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> Add New Customer</a>
                                                </div>
                                            </div><!-- end col-->
                                        </div>
                
                                        <div class="table-responsive">
                                            <table id="scroll-horizontal-datatable" class="table table-centered w-100 nowrap">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>SR</th>
                                                        <th>Plot No#</th>
                                                        <th>Plot Owner</th>
                                                        <th>Customer CNIC</th>
                                                        <th>Customer Name</th>
                                                        <th>Total Price</th>
                                                        <th>Balance</th>
                                                        <th style="width: 85px;">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @isset($custoemr_plot_data)
                                                        @foreach($custoemr_plot_data as $cust_res)
                                                    <tr>
                                                        <td>
                                                            {{ $loop->iteration }}
                                                        </td>
                                                        <td>
                                                            {{ $cust_res->plot_no }}
                                                        </td>
                                                        <td>
                                                            <?php 
                                                                if($cust_res->plot_owner){
                                                                    echo "Yes";
                                                                }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            {{ $cust_res->CNIC }}
                                                        </td>
                                                        <td>
                                                            {{ $cust_res->custfname." ".$cust_res->custlname }}
                                                        </td>
                                                        
                                                        
                                                        <td>
                                                            {{ number_format($cust_res->total_plot_price) }}
                                                        </td>
                                                        <td>
                                                            {{ number_format($cust_res->balance) }}
                                                        </td>
                                                        
                                                        <td class="table-action">
                                                        
                                                            <a href="{{ URL::to('customer-plot-ledeger/'.$cust_res->id.'') }}" class="btn btn-success text-white action-icon"> <i class="mdi mdi-eye"></i></a>
                                                            
                                                        </td>
                                                    </tr>
                                                    
                                                    @endforeach
                                                @endisset

                                                </tbody>
                                            </table>
                                        </div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                     
                        <!-- end row -->

                    </div>
         @endsection

         @section('scripts')
         <script src="{{ asset('public/adminPanel/assets/js/vendor/jquery.dataTables.min.js') }}"></script>
         <script src="{{ asset('public/adminPanel/assets/js/vendor/dataTables.bootstrap5.js') }}"></script>
         
            <script>

                @if(session('success'))
                $(document).ready(function(){
                    $("#success-alert-modal").modal('show');
                })  
                @endif

                @if(session('error'))
                    $(document).ready(function(){
                            $("#error-alert-modal").modal('show');
                    })
                @endif

                $("#scroll-horizontal-datatable").DataTable({scrollX:!0,language:{paginate:{previous:"<i class='mdi mdi-chevron-left'>",next:"<i class='mdi mdi-chevron-right'>"}},drawCallback:function(){$(".dataTables_paginate > .pagination").addClass("pagination-rounded")}})
                console.log('page is load now');
            </script>         
         @endsection
                    <!-- container -->

                