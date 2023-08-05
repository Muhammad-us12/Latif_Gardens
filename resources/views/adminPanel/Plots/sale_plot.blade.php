
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
                                                <h4>Sale Plot</h4>
                                            </div>
                                            <div class="col-sm-7">
                                                <div class="text-sm-end">
                                                    <a href="{{ URL::to('plots-list') }}" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i>Plots List</a>
                                                </div>
                                            </div><!-- end col-->
                                        </div>
                                        <form action="{{ URL::to('plot-sale-submit') }}" method="post">
                                            @csrf
                                            <div class="row mb-2">
                                              
                                                <div class="col-sm-12">
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

                                                <div class="col-sm-3">
                                                    <div class="mb-3">
                                                        <label for="example-input-normal" class="form-label">Select Location</label>
                                                        <select class="form-control select2" name="location_id" onchange="fetchLocatonsSocities()" id="file_location" data-toggle="select2">
                                                            @isset($Location_data)
                                                                @foreach($Location_data as $location_res)
                                                                <option value="{{ $location_res->id }}">{{ $location_res->location_name }}</option>
                                                                @endforeach
                                                            @endisset
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-3">
                                                    <div class="mb-3">
                                                        <label for="example-input-normal" class="form-label">Select Society</label>
                                                        <select class="form-control select2" id="societies" name="society_id" onchange="fetchSocitiesBlocks()" data-toggle="select2">
                                                        
                                                        </select>
                                                        @error('society_id')
                                                                <p class="text-danger mt-2">{{ $message }}</p>
                                                        @enderror 
                                                    </div>
                                                </div>

                                                <div class="col-sm-3">
                                                    <div class="mb-3">
                                                        <label for="example-input-normal" class="form-label">Select Block</label>
                                                        <select class="form-control select2" id="block" name="block_id" onchange="fetchBlockPlots()" data-toggle="select2">
                                                        
                                                        </select>
                                                        @error('block_id')
                                                                <p class="text-danger mt-2">{{ $message }}</p>
                                                        @enderror 
                                                    </div>
                                                </div>

                                                <div class="col-sm-3">
                                                    <div class="mb-3">
                                                        <label for="example-input-normal" class="form-label">Select Plot</label>
                                                        <select class="form-control select2" id="plot" name="plot_id" onchange="getPlotData()" data-toggle="select2">
                                                        
                                                        </select>
                                                        @error('plot_id')
                                                                <p class="text-danger mt-2">{{ $message }}</p>
                                                        @enderror 
                                                    </div>
                                                </div>

                                                <div class="col-sm-4">
                                                    <div class="mb-3">
                                                        <label for="example-fileinput" class="form-label">Cost Price</label>
                                                        <input type="number"  id="plot_cost" readonly name="plot_cost_price" value="{{ old('plot_cost_price') }}" class="form-control" placeholder="Purchase Amount">
                                                        @error('plot_cost_price')
                                                                <p class="text-danger mt-2">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-sm-4">
                                                    <div class="mb-3">
                                                        <label class="form-label">Demand Price</label>
                                                        <input type="number" class="form-control date" id="plot_demand" readonly name="plot_demand" value="{{ old('plot_demand') }}" >
                                                        @error('plot_demand')
                                                                <p class="text-danger mt-2">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-sm-4">
                                                    <div class="mb-3">
                                                        <label class="form-label">Sale Price</label>
                                                        <input type="number" class="form-control generatePayInstallment" id="plot_sale_price" name="plot_sale_price" value="{{ old('plot_sale_price') }}" >
                                                        @error('plot_sale_price')
                                                                <p class="text-danger mt-2">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-sm-4">
                                                    <div class="mb-3">
                                                        <label for="example-input-normal" class="form-label">Select Customer</label>
                                                        <select class="form-control select2" name="agent_id" data-toggle="select2">
                                                                <option value="-1">Select Agent</option>
                                                                @isset($agents_data)
                                                                    @foreach($agents_data as $agnet_res)
                                                                    <option value="{{ $agnet_res->id }}">{{ $agnet_res->id }} \ {{ $agnet_res->fname." ".$cust_res->lname }}</option>
                                                                    @endforeach
                                                                @endisset
                                                            
                                                        </select>
                                                        
                                                    </div>
                                                </div>

                                                <div class="col-sm-4">
                                                    <div class="mb-3">
                                                        <label class="form-label">Commission %</label>
                                                        <input type="number" class="form-control agent_commission_calc" id="commission_perc" name="commission_perc" value="{{ old('commission_perc') }}" >
                                                        
                                                    </div>
                                                </div>

                                                <div class="col-sm-4">
                                                    <div class="mb-3">
                                                        <label class="form-label">Commission Amount</label>
                                                        <input type="number" class="form-control agent_commission_calc" id="commission_amount" name="commission_amount" value="{{ old('commission_amount') }}" >
                                                        
                                                    </div>
                                                </div>
                                                

                                                <div class="col-md-12">
                                                    <hr>
                                                    <h5>Make Payments Installment</h5>
                                                </div>

                                                <div class="col-sm-4 mt-3">
                                                    <div class="mb-3">
                                                        <label class="form-label">At Booking (%)</label>
                                                        <input type="number" class="form-control generatePayInstallment" id="at_booking_perc"  name="at_booking_perc" value="{{ old('at_booking_perc') }}" >
                                                        @error('at_booking_perc')
                                                                <p class="text-danger mt-2">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-sm-4 mt-3">
                                                    <div class="mb-3">
                                                        <label class="form-label">Complete In Years</label>
                                                        <input type="number" class="form-control generatePayInstallment" id="complete_in_years"  name="complete_in_years" value="{{ old('complete_in_years') }}" >
                                                        @error('complete_in_years')
                                                                <p class="text-danger mt-2">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-sm-4 mt-3">
                                                    <div class="mb-3">
                                                        <label class="form-label">6 Month Installment (Price)</label>
                                                        <input type="number" class="form-control generatePayInstallment" id="6th_month_inst"  name="sixth_month_inst" value="{{ old('6th_month_inst') }}" >
                                                        @error('6th_month_inst')
                                                                <p class="text-danger mt-2">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-sm-3">
                                                    <div class="mb-3">
                                                        <label class="form-label">At Booking Price</label>
                                                        <input type="number" class="form-control" readonly id="at_booking_price" name="at_booking_price" value="{{ old('at_booking_price') }}" >
                                                        @error('at_booking_price')
                                                                <p class="text-danger mt-2">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-sm-3">
                                                    <div class="mb-3">
                                                        <label class="form-label">No. of 6 Month Instal..</label>
                                                        <input type="number" class="form-control" readonly id="no_of_6_month_inst" name="no_of_6_month_inst" value="{{ old('no_of_6_month_inst') }}" >
                                                        @error('no_of_6_month_inst')
                                                                <p class="text-danger mt-2">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-sm-3">
                                                    <div class="mb-3">
                                                        <label class="form-label">No. of Monthly Instal..</label>
                                                        <input type="number" class="form-control" readonly id="no_of_monthly_inst" name="no_of_monthly_inst" value="{{ old('no_of_monthly_inst') }}" >
                                                        @error('no_of_monthly_inst')
                                                                <p class="text-danger mt-2">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-sm-3">
                                                    <div class="mb-3">
                                                        <label class="form-label">Monthly Installment (Pirce)</label>
                                                        <input type="number" class="form-control" id="monthly_inst_price" readonly name="monthly_inst_price" value="{{ old('monthly_inst_price') }}" >
                                                        @error('monthly_inst_price')
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

                    <div id="standard-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="standard-modalLabel">Add Marala Type</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                </div>
                               
                                    <div class="modal-body">
                                
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Add Marala</label>
                                            <input type="text" class="form-control" name="marala" id="marala" aria-describedby="emailHelp" placeholder="Enter Marala">
                                        </div>
                                        
                                    
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                        <button type="button" onclick="addMaralaType()" class="btn btn-primary">Save changes</button>
                                    </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->

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

                addMaralaType = ()=>{
                    $.ajax({
                        url:"{{ URL::to('add_marala_type') }}",
                        type:'POST',
                        data:{
                            '_token' : '<?php echo csrf_token() ?>',
                            'marala':$('#marala').val()
                        },
                        success:function(data) {
                            $('#standard-modal').modal('hide');
                            
                            if(data){
                                $('#success-alert-marala').modal('show');
                            }else{
                                $('#error-alert-modal_marla').modal('show');
                            }

                            fetchMaralaTypes();
                        }
                    });
                    // $('#category_id').val(catId);
                }

                fetchMaralaTypes = ()=>{
                    $.ajax({
                        url:"{{ URL::to('fetch_marala_type') }}",
                        type:'POST',
                        data:{
                            '_token' : '<?php echo csrf_token() ?>',
                            'marala':$('#marala').val()
                        },
                        success:function(data) {
                            let maralsHtml = ``;
                            data.forEach((marala)=>{
                                maralsHtml += `<option value="${marala['id']}">${marala['marala']}</option>`
                                
                            });

                            $('#select_marala').html(maralsHtml);
                        }
                    });
                }

                fetchMaralaTypes();

                fetchLocatonsSocities = ()=>{
                    $.ajax({
                        url:"{{ URL::to('fetch_socities_wi_location') }}",
                        type:'POST',
                        data:{
                            '_token' : '<?php echo csrf_token() ?>',
                            'location_id':$('#file_location').val()
                        },
                        success:function(data) {
                            console.log(data);
                            let socititesHtml = ``;
                            data.forEach((scoities)=>{
                                socititesHtml += `<option value="${scoities['id']}">${scoities['society_name']}</option>`
                                
                            });

                            $('#societies').html(socititesHtml);
                            fetchSocitiesBlocks();
                        }
                    });
                }

                fetchSocitiesBlocks = ()=>{
                    $.ajax({
                        url:"{{ URL::to('fetch_blocks_wi_scotites') }}",
                        type:'POST',
                        data:{
                            '_token' : '<?php echo csrf_token() ?>',
                            'scoitiy_id':$('#societies').val()
                        },
                        success:function(data) {
                            console.log(data);
                            let blocksHtml = ``;
                            data.forEach((blocks)=>{
                                blocksHtml += `<option value="${blocks['id']}">${blocks['block_name']}</option>`
                                
                            });

                            $('#block').html(blocksHtml);
                            fetchBlockPlots();
                        }
                    });
                }

                fetchLocatonsSocities();

                fetchBlockPlots = ()=>{
                    $.ajax({
                        url:"{{ URL::to('fetch_plots_wi_block') }}",
                        type:'POST',
                        data:{
                            '_token' : '<?php echo csrf_token() ?>',
                            'block_id':$('#block').val(),
                            'status':'Not Sale'
                        },
                        success:function(data) {
                            console.log(data);
                            let plotHtml = ``;
                            
                            data.forEach((blocks)=>{
                                plotHtml += `<option value='${JSON.stringify(blocks)}'>${blocks['id']} / ${blocks['plot_no']}</option>`
                                
                            });

                            $('#plot').html(plotHtml);
                            getPlotData();
                        }
                    });
                }

                getPlotData = ()=>{
                    var plot_data = $('#plot').val();
                    plot_data = JSON.parse(plot_data);

                    $('#plot_cost').val(plot_data['plot_cost_price']);
                    $('#plot_demand').val(plot_data['plot_sale_price']);
                    console.log(plot_data);
                }

                $('.generatePayInstallment').on('keyup change',function(){
                    generatePaymentInstallment();
                })

                generatePaymentInstallment = ()=> {
                    console.log('payment function call');
                    var sale_price = $('#plot_sale_price').val();
                    var at_booking_perc = $('#at_booking_perc').val();
                    var complete_in_years = $('#complete_in_years').val();
                    var month_6th_inst_price = $('#6th_month_inst').val();
                    var big_installment = 6;

                    var at_booking_price = (sale_price * at_booking_perc) / 100;
                    

                    var perYearBigInstall = 12 / big_installment;

                    var totalBigInstall = perYearBigInstall * complete_in_years;
                    var totalMonthlyInstall = 12 * complete_in_years;
                    var RemaningMonthlyInstall = totalMonthlyInstall - totalBigInstall;
                    var totalBigInstalPrice = totalBigInstall * month_6th_inst_price;

                    var afterBigInstallPrice = (sale_price - at_booking_price) - totalBigInstalPrice;
                    var monthlyInstallPrice = afterBigInstallPrice / RemaningMonthlyInstall;
                    monthlyInstallPrice = monthlyInstallPrice.toFixed(2);

                    $('#at_booking_price').val(at_booking_price);
                    $('#no_of_6_month_inst').val(totalBigInstall);
                    $('#no_of_monthly_inst').val(RemaningMonthlyInstall);
                    $('#monthly_inst_price').val(monthlyInstallPrice);

                    console.log(sale_price);
                }

                $('.agent_commission_calc').on('keyup change',function(){
                    calculateAgentCommission();
                })

                calculateAgentCommission = () => {
                    var sale_price = $('#plot_sale_price').val();
                    var commission_perc = $('#commission_perc').val();

                    var commission_amount = (sale_price * commission_perc) / 100;
                    commission_amount = commission_amount.toFixed(2);
                    $('#commission_amount').val(commission_amount);
                    
                }

                $(document).ready(function() {
                    $('#summernote').summernote({
                        placeholder: 'Hello stand alone ui',
                        tabsize: 2,
                        height: 150,
                        toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'underline', 'clear']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['table', ['table']],
                        ['insert', ['link', 'picture', 'video']],
                        ['view', ['fullscreen', 'codeview', 'help']]
                        ]
                    });
                });
            </script>
         @endsection
                    <!-- container -->

                