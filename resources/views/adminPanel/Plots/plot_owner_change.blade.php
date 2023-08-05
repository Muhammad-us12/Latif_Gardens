
@extends('adminPanel/master') 
         @section('style')
            <!-- Quill css -->
            <link href="{{ asset('public/adminPanel/assets/css/vendor/quill.bubble.css') }}" rel="stylesheet" type="text/css" />

            <link href="{{ asset('public/adminPanel/assets/css/vendor/quill.core.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('public/adminPanel/assets/css/vendor/quill.snow.css') }}" rel="stylesheet" type="text/css" />
         @endsection  
         @section('content')        
                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
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

                                @if(session('error'))
                                <div id="error-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content modal-filled bg-danger">
                                            <div class="modal-body p-4">
                                                <div class="text-center">
                                                    <i class="dripicons-wrong h1"></i>
                                                    <h4 class="mt-2">Oh snap!</h4>
                                                    <p class="mt-3">{{ session('error') }}</p>
                                                    <button type="button" class="btn btn-light my-2" data-bs-dismiss="modal">Continue</button>
                                                </div>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                                @endif
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                       
                                    </div>
                                    <h4 class="page-title">Plots</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col-sm-5">
                                                <h4>Plot Owner Change</h4>
                                            </div>
                                            <div class="col-sm-7">
                                                <div class="text-sm-end">
                                                    <a href="{{ URL::to('plots-list') }}" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i>Plots List</a>
                                                </div>
                                            </div><!-- end col-->
                                        </div>
                                        <form action="{{ URL::to('plot-owner-change-submit') }}" method="post">
                                            @csrf
                                            <div class="row mb-2">
                                              
                                                <div class="col-sm-4">
                                                    <div class="mb-3">
                                                        <label for="example-input-normal" class="form-label">Select Customer</label>
                                                        <select class="form-control select2" name="plot_id" id="plot_id" onchange="fetchPlotsCurrentBalance()" data-toggle="select2">
                                                                @isset($all_plosts)
                                                                    @foreach($all_plosts as $plot_res)
                                                                    <option value="{{ $plot_res->id }}">{{ $plot_res->plot_no }}</option>
                                                                    @endforeach
                                                                @endisset
                                                            
                                                        </select>
                                                        @error('customer_id')
                                                                <p class="text-danger mt-2">{{ $message }}</p>
                                                        @enderror 
                                                    </div>
                                                </div>

                                                <div class="col-sm-4">
                                                    <div class="mb-3">
                                                        <label for="example-input-normal" class="form-label">Plot Owner</label>
                                                        <input type="text" class="form-control" readonly name="customer_plot_owner" id="plot_owner_name">
                                                    </div>
                                                </div>

                                                <div class="col-sm-4">
                                                    <div class="mb-3">
                                                        <label for="example-input-normal" class="form-label">Select Customer</label>
                                                        <select class="form-control select2" name="customer_id" data-toggle="select2">
                                                                @isset($Customers_data)
                                                                    @foreach($Customers_data as $cust_res)
                                                                    <option value="{{ $cust_res->id }}">{{ $cust_res->id }} \ {{ $cust_res->custfname." ".$cust_res->custlname }}</option>
                                                                    @endforeach
                                                                @endisset
                                                            
                                                        </select>
                                                        @error('customer_id')
                                                                <p class="text-danger mt-2">{{ $message }}</p>
                                                        @enderror 
                                                    </div>
                                                </div>


                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Sale Price</label>
                                                        <input type="number" readonly class="form-control generatePayInstallment" id="plot_sale_price" name="plot_sale_price" value="{{ old('plot_sale_price') }}" >
                                                        @error('plot_sale_price')
                                                                <p class="text-danger mt-2">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="example-fileinput" class="form-label">Balance</label>
                                                        <input type="number"  id="plot_balance" readonly name="plot_cost_price" value="{{ old('plot_cost_price') }}" class="form-control" placeholder="Purchase Amount">
                                                        @error('plot_cost_price')
                                                                <p class="text-danger mt-2">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>

                                              

                                                <div class="col-sm-12">
                                                    <div class="mb-3">
                                                        <button type="submit" class="btn btn-success">Submit</button>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </form>
                                       

                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                     
                        <!-- end row -->

                    </div>

                

                    <div id="success-alert-marala" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content modal-filled bg-success">
                                <div class="modal-body p-4">
                                    <div class="text-center">
                                        <i class="dripicons-checkmark h1"></i>
                                        <h4 class="mt-2">Well Done!</h4>
                                        <p class="mt-3">Marala is Added Successfully</p>
                                        <button type="button" class="btn btn-light my-2" data-bs-dismiss="modal">Continue</button>
                                    </div>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div>

                    <div id="error-alert-modal_marla" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content modal-filled bg-danger">
                                <div class="modal-body p-4">
                                    <div class="text-center">
                                        <i class="dripicons-wrong h1"></i>
                                        <h4 class="mt-2">Oh snap!</h4>
                                        <p class="mt-3">Something Went Wrong Try Again</p>
                                        <button type="button" class="btn btn-light my-2" data-bs-dismiss="modal">Continue</button>
                                    </div>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div>
         @endsection

         @section('scripts')
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

                fetchPlotsCurrentBalance = ()=>{
                    var plot_id = $('#plot_id').val();
                    $.ajax({
                        url:"{{ URL::to('fetch_plots_balance_data') }}",
                        type:'POST',
                        data:{
                            '_token' : '<?php echo csrf_token() ?>',
                            'plot_id':plot_id,
                        },
                        success:function(data) {
                            console.log(data);
                            $('#plot_owner_name').val(data['plot_data']['custfname']+' '+data['plot_data']['custlname']+' / '+data['plot_data']['CNIC'])
                            $('#plot_sale_price').val(data['plot_data']['total_plot_price'])
                            $('#plot_balance').val(data['plot_data']['balance']);
                        }
                    });
                }

                fetchPlotsCurrentBalance();

               
            </script>
         @endsection
                    <!-- container -->

                