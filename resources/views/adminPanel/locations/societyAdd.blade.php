
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
                            </div>
                        </div>
                        <!-- end page title -->
                        <form action="{{ URL::to('society-submit') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col-sm-5">
                                                <h4>Add Society</h4>
                                            </div>
                                            <div class="col-sm-7">
                                                <div class="text-sm-end">
                                                    <a href="javascript:void(0);" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i>Blogs List</a>
                                                </div>
                                            </div><!-- end col-->
                                        </div>
<?php
                                    
                                        
                                        ?>
                                        <div class="row mb-2">
                                            <div class="col-sm-12">
                                                <div class="mb-3">
                                                    <label for="example-input-normal" class="form-label">Name</label>
                                                    <input type="text" id="example-input-normal" name="society_name" class="form-control" placeholder="Enter Society Name">
                                                    @error('society_name')
                                                                <p class="text-danger mt-2">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label for="example-input-normal" class="form-label">Select Location</label>
                                                    <select class="form-select" name="location" id="example-select">
                                                        @foreach($Location_data as $location_res)
                                                            <option value="{{ $location_res->id }}">{{ $location_res->location_name }}</option>
                                                        @endforeach
                                                     
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="mb-3">
                                                    <label for="example-fileinput" class="form-label">Chose Picture</label>
                                                    <input type="file" id="example-fileinput" name="picture" class="form-control">
                                                    @error('picture')
                                                            <p class="text-danger mt-2">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="mb-3" style="margin-top:2rem;">
                                                    <div class="form-check form-checkbox-success mb-2">
                                                        <input type="checkbox" class="form-check-input" name="display_on_web" value="1" id="customCheckcolor2" checked>
                                                        <label class="form-check-label" for="customCheckcolor2">Display on Web</label>
                                                    </div>
                                                </div>
                                            </div>
                                            

                                            <div class="col-sm-12">
                                                <div class="mb-3">
                                                    <label for="example-textarea" class="form-label">Add Description</label>
                                                    <textarea id="summernote" name="description"></textarea>
                                                        @error('description')
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

                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        </form>
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

                @if(session('error'))
                    $(document).ready(function(){
                            $("#error-alert-modal").modal('show');
                    })
                @endif

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

                