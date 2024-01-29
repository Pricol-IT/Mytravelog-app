@extends('admin.layouts.app')
@section('title')
{{ __('New User') }}
@endsection
@section('main')
<main id="main" class="main">
    <div class="content">
        <div class="container-fluid">

            <form action="{{route('international_policy.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title p-0">Create New International policy</h4>
                    </div>
                </div>



                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                policy Details
                            </div>
                            <div class="card-body row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Component Name
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="components" id="components" class="form-control class " value="{{old('components')}}" placeholder="Enter the compontent name">
                                               
                                            </div>
                                        </div>


                                        <div class="card-footer mt-2">
                                            <h4 class="card-title p-0">Junior Management</h4>
                                        </div>
                                        <div class="col-md-3 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    US
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="us[]" id="us" class="form-control class " value="" placeholder="eg: USD 80">
                                            </div>
                                        </div>

                                        <div class="col-md-3 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    UK
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="uk[]" id="uk" class="form-control class " value="" placeholder="eg: USD 80">
                                                
                                            </div>
                                        </div>

                                        <div class="col-md-3 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Europe
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="europe[]" id="europe" class="form-control class " value="" placeholder="eg: USD 80">
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    ASEAN
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="asean[]" id="asean" class="form-control class " value="" placeholder="eg: USD 80">
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Brazil
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="brazil[]" id="brazil" class="form-control class " value="" placeholder="eg: USD 80">
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Mexico
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="mexico[]" id="mexico" class="form-control class " value="" placeholder="eg: USD 80">
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    India
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="india[]" id="india" class="form-control class " value="" placeholder="eg: USD 80">
                                                
                                            </div>
                                        </div>

                                        
                                        <div class="card-footer mt-2">
                                            <h4 class="card-title p-0">Middle Management</h4>
                                        </div>
                                        <div class="col-md-3 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    US
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="us[]" id="us" class="form-control class " value="" placeholder="eg: USD 80">
                                            </div>
                                        </div>

                                        <div class="col-md-3 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    UK
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="uk[]" id="uk" class="form-control class " value="" placeholder="eg: USD 80">
                                                
                                            </div>
                                        </div>

                                        <div class="col-md-3 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Europe
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="europe[]" id="europe" class="form-control class " value="" placeholder="eg: USD 80">
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    ASEAN
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="asean[]" id="asean" class="form-control class " value="" placeholder="eg: USD 80">
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Brazil
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="brazil[]" id="brazil" class="form-control class " value="" placeholder="eg: USD 80">
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Mexico
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="mexico[]" id="mexico" class="form-control class " value="" placeholder="eg: USD 80">
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    India
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="india[]" id="india" class="form-control class " value="" placeholder="eg: USD 80">
                                                
                                            </div>
                                        </div>

                                        
                                        <div class="card-footer mt-2">
                                            <h4 class="card-title p-0">Senior Management</h4>
                                        </div>
                                        <div class="col-md-3 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    US
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="us[]" id="us" class="form-control class " value="" placeholder="eg: USD 80">
                                            </div>
                                        </div>

                                        <div class="col-md-3 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    UK
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="uk[]" id="uk" class="form-control class " value="" placeholder="eg: USD 80">
                                                
                                            </div>
                                        </div>

                                        <div class="col-md-3 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Europe
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="europe[]" id="europe" class="form-control class " value="" placeholder="eg: USD 80">
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    ASEAN
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="asean[]" id="asean" class="form-control class " value="" placeholder="eg: USD 80">
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Brazil
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="brazil[]" id="brazil" class="form-control class " value="" placeholder="eg: USD 80">
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Mexico
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="mexico[]" id="mexico" class="form-control class " value="" placeholder="eg: USD 80">
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    India
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="india[]" id="india" class="form-control class " value="" placeholder="eg: USD 80">
                                                
                                            </div>
                                        </div>

                                        
                                        <div class="card-footer mt-2">
                                            <h4 class="card-title p-0">CXOs & Directors</h4>
                                        </div>
                                        <div class="col-md-3 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    US
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="us[]" id="us" class="form-control class " value="" placeholder="eg: USD 80">
                                            </div>
                                        </div>

                                        <div class="col-md-3 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    UK
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="uk[]" id="uk" class="form-control class " value="" placeholder="eg: USD 80">
                                                
                                            </div>
                                        </div>

                                        <div class="col-md-3 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Europe
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="europe[]" id="europe" class="form-control class " value="" placeholder="eg: USD 80">
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    ASEAN
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="asean[]" id="asean" class="form-control class " value="" placeholder="eg: USD 80">
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Brazil
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="brazil[]" id="brazil" class="form-control class " value="" placeholder="eg: USD 80">
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Mexico
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="mexico[]" id="mexico" class="form-control class " value="" placeholder="eg: USD 80">
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    India
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="india[]" id="india" class="form-control class " value="" placeholder="eg: USD 80">
                                                
                                            </div>
                                        </div>




                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <input type="submit" class="btn btn-primary" value='Submit'>
                    <a href="{{ route('grade.index') }}" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>

</main><!-- End #main -->
@endsection
