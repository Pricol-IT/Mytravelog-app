@extends('admin.layouts.app')
@section('title')
{{ __('New User') }}
@endsection
@section('main')
<main id="main" class="main">
    <div class="content">
        <div class="container-fluid">

            <form action="{{route('grade.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title p-0">Create New Grade</h4>
                    </div>
                </div>



                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                Tier Details
                            </div>
                            <div class="card-body row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Levels
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="levels" id="levels" class="form-control class " value="{{old('levels')}}" placeholder="eg: L1">
                                                @if ($errors->has('levels'))
                                                <span class="error text-danger">{{ $errors->first('levels') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Category
                                                    <span class="form-label-required text-danger">*</span>
                                                </label>
                                                <select class="form-control" name="category" id="category">
                                                    <option value=""> Select Tier</option>
                                                    <option value="Senior Management" {{old('category')== 'Senior Management' ? 'selected' : ''}}>Senior Management</option>
                                                    <option value="Middle Management" {{old('category')== 'Middle Management' ? 'selected' : ''}}>Middle Management</option>
                                                    <option value="Junior Management" {{old('category')== 'Junior Management' ? 'selected' : ''}}>Junior Management</option>
                                                </select>
                                                @if ($errors->has('category'))
                                                <span class="error text-danger">{{ $errors->first('category') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Designation
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="designation" id="designation" class="form-control class " value="{{old('designation')}}" placeholder="Enter the Designation">
                                                @if ($errors->has('designation'))
                                                <span class="error text-danger">{{ $errors->first('designation') }}</span>
                                                @endif
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
