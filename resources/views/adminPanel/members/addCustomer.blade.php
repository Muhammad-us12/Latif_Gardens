
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
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                       
                                    </div>
                                    <h4 class="page-title">Customers</h4>
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
                                                <h4>Add Customer</h4>
                                            </div>
                                            <div class="col-sm-7">
                                                <div class="text-sm-end">
                                                    <a href="{{ URL::to('customers-list') }}" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i>Customers List</a>
                                                </div>
                                            </div><!-- end col-->
                                        </div>
                                        <form action="{{ URL::to('customer-submit') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row mb-2">
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label for="example-input-normal" class="form-label">First Name</label>
                                                    <input type="text" id="example-input-normal" name="custfname" value="{{ old('custfname') }}" class="form-control" placeholder="First Name">
                                                    @error('custfname')
                                                                <p class="text-danger mt-2">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label for="example-input-normal" class="form-label">Last Name</label>
                                                    <input type="text" id="example-input-normal" name="custlname" value="{{ old('custlname') }}" class="form-control" placeholder="Last Name">
                                                    @error('custlname')
                                                                <p class="text-danger mt-2">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="mb-3">
                                                    <label for="example-input-normal" class="form-label">E mail</label>
                                                    <input type="email" id="example-input-normal" name="email" value="{{ old('email') }}" class="form-control" placeholder="email">
                                                    @error('email')
                                                                <p class="text-danger mt-2">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="mb-3">
                                                    <label for="example-input-normal" class="form-label">CNIC</label>
                                                    <input type="text" id="example-input-normal" name="CNIC" value="{{ old('CNIC') }}" class="form-control" placeholder="Enter CNIC">
                                                    @error('CNIC')
                                                                <p class="text-danger mt-2">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-4">
                                                    <label for="example-input-normal" class="form-label">Customer Type</label>
                                                    <select class="form-control select2" name="customer_type" data-toggle="select2">
                                                        <option value="Customer" >Customer</option>
                                                        <option value="Property Dealer" >Property Dealer</option>
                                                          
                                                    </select>
                                            </div>

                                            

                                            <div class="col-sm-3">
                                                <div class="mb-3">
                                                    <label for="example-fileinput" class="form-label">Chose Picture</label>
                                                    <input type="file" id="example-fileinput" name="picture" class="form-control">
                                                    @error('picture')
                                                                <p class="text-danger mt-2">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                          
                                            <div class="col-sm-3">
                                                <div class="mb-3">
                                                    <label for="example-input-normal" class="form-label">Select Country</label>
                                                    <select class="form-control select2" name="country" data-toggle="select2">
                                                           @foreach($countriesList as $county_res)
                                                            <option value="{{ $county_res->name }}" @if($county_res->name == 'PAKISTAN') selected @endif>{{ $county_res->name }}</option>
                                                          
                                                            @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="mb-3">
                                                    <label for="example-input-normal" class="form-label">Select City</label>
                                                    <input type="text" id="example-input-normal" name="city" value="{{ old('fname') }}" class="form-control" placeholder="Enter City">
                                                    @error('city')
                                                                <p class="text-danger mt-2">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="mb-3">
                                                    <label for="example-input-normal" class="form-label">Contact No.</label>
                                                    <input type="text" id="example-input-normal" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="Contact No.">
                                                    @error('phone')
                                                                <p class="text-danger mt-2">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="mb-3">
                                                    <label for="example-input-normal" class="form-label">Address</label>
                                                    <input type="text" id="example-input-normal" name="address" value="{{ old('address') }}" class="form-control" placeholder="Enter Address">
                                                    @error('address')
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
         @endsection

       
         @section('scripts')
         <script src="{{ asset('public/adminPanel/assets/js/vendor/quill.min.js') }}"></script>
         <script src="{{ asset('public/adminPanel/assets/js/pages/demo.quilljs.js') }}"></script>
           
         @endsection
                    <!-- container -->

                