@extends('admin.layouts.app')
@section('title')
{{ __('Edit User') }}
@endsection
@section('main')
<main id="main" class="main">
    <div class="content">
        <div class="container-fluid">

            <form action="{{route('domestic_policy.update',$domesticpolicy->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title p-0">Create New Domestic Policy</h4>
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
                                                <input type="text" name="components" id="components" class="form-control class " value="{{$domesticpolicy->components}}" placeholder="Enter the compontent name">
                                                @if ($errors->has('components'))
                                                <span class="error text-danger">{{ $errors->first('components') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Junior Management Tier -1
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="junior_tier1" id="junior_tier1" class="form-control class " value="{{$domesticpolicy->junior_tier1}}" placeholder="eg: Bus,Train">
                                                @if ($errors->has('junior_tier1'))
                                                <span class="error text-danger">{{ $errors->first('junior_tier1') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-4 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Junior Management Tier -2
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="junior_tier2" id="junior_tier2" class="form-control class " value="{{$domesticpolicy->junior_tier2}}" placeholder="eg: Bus,Train">
                                                @if ($errors->has('junior_tier2'))
                                                <span class="error text-danger">{{ $errors->first('junior_tier2') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-4 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Junior Management Tier -3
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="junior_tier3" id="junior_tier3" class="form-control class " value="{{$domesticpolicy->junior_tier3}}" placeholder="eg: Bus,Train">
                                                @if ($errors->has('junior_tier3'))
                                                <span class="error text-danger">{{ $errors->first('junior_tier3') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-4 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Middle Management Tier -1
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="middle_tier1" id="middle_tier1" class="form-control class " value="{{$domesticpolicy->middle_tier1}}" placeholder="eg: Bus,Train">
                                                @if ($errors->has('middle_tier1'))
                                                <span class="error text-danger">{{ $errors->first('middle_tier1') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-4 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Middle Management Tier -2
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="middle_tier2" id="middle_tier2" class="form-control class " value="{{$domesticpolicy->middle_tier2}}" placeholder="eg: Bus,Train">
                                                @if ($errors->has('middle_tier2'))
                                                <span class="error text-danger">{{ $errors->first('middle_tier2') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-4 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Middle Management Tier -3
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="middle_tier3" id="middle_tier3" class="form-control class " value="{{$domesticpolicy->middle_tier3}}" placeholder="eg: Bus,Train">
                                                @if ($errors->has('middle_tier3'))
                                                <span class="error text-danger">{{ $errors->first('middle_tier3') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-4 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Senior Management Tier -1
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="senior_tier1" id="senior_tier1" class="form-control class " value="{{$domesticpolicy->senior_tier1}}" placeholder="eg: Bus,Train">
                                                @if ($errors->has('senior_tier1'))
                                                <span class="error text-danger">{{ $errors->first('senior_tier1') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-4 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Senior Management Tier -2
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="senior_tier2" id="senior_tier2" class="form-control class " value="{{$domesticpolicy->senior_tier2}}" placeholder="eg: Bus,Train">
                                                @if ($errors->has('senior_tier2'))
                                                <span class="error text-danger">{{ $errors->first('senior_tier2') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-4 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Senior Management Tier -3
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="senior_tier3" id="senior_tier3" class="form-control class " value="{{$domesticpolicy->senior_tier3}}" placeholder="eg: Bus,Train">
                                                @if ($errors->has('senior_tier3'))
                                                <span class="error text-danger">{{ $errors->first('senior_tier3') }}</span>
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
                    <a href="{{ route('user.index') }}" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</main><!-- End #main -->
    @endsection
