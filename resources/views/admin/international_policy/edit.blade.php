@extends('admin.layouts.app')
@section('title')
{{ __('Edit User') }}
@endsection
@section('main')
<main id="main" class="main">
    <div class="content">
        <div class="container-fluid">

            <form action="{{route('international_policy.update',$internationalpolicies[0]->components)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title p-0">Edit International Policy</h4>
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
                                                <input type="text" name="components" id="components" class="form-control class " value="{{$internationalpolicies[0]->components}}" placeholder="Enter the compontent name">
                                                @if ($errors->has('components'))
                                                <span class="error text-danger">{{ $errors->first('components') }}</span>
                                                @endif
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
                                                <input type="text" name="us[]" id="us" class="form-control class " value="{{$internationalpolicies[0]->us}}" placeholder="eg: USD 80">
                                            </div>
                                        </div>

                                        <div class="col-md-3 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    UK
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="uk[]" id="uk" class="form-control class " value="{{$internationalpolicies[0]->uk}}" placeholder="eg: USD 80">

                                            </div>
                                        </div>

                                        <div class="col-md-3 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Europe
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="europe[]" id="europe" class="form-control class " value="{{$internationalpolicies[0]->europe}}" placeholder="eg: USD 80">

                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    ASEAN
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="asean[]" id="asean" class="form-control class " value="{{$internationalpolicies[0]->asean}}" placeholder="eg: USD 80">

                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Brazil
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="brazil[]" id="brazil" class="form-control class " value="{{$internationalpolicies[0]->brazil}}" placeholder="eg: USD 80">

                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Mexico
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="mexico[]" id="mexico" class="form-control class " value="{{$internationalpolicies[0]->mexico}}" placeholder="eg: USD 80">

                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    India
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="india[]" id="india" class="form-control class " value="{{$internationalpolicies[0]->india}}" placeholder="eg: USD 80">

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
                                                <input type="text" name="us[]" id="us" class="form-control class " value="{{$internationalpolicies[1]->us}}" placeholder="eg: USD 80">
                                            </div>
                                        </div>

                                        <div class="col-md-3 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    UK
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="uk[]" id="uk" class="form-control class " value="{{$internationalpolicies[1]->uk}}" placeholder="eg: USD 80">

                                            </div>
                                        </div>

                                        <div class="col-md-3 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Europe
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="europe[]" id="europe" class="form-control class " value="{{$internationalpolicies[1]->europe}}" placeholder="eg: USD 80">

                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    ASEAN
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="asean[]" id="asean" class="form-control class " value="{{$internationalpolicies[1]->asean}}" placeholder="eg: USD 80">

                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Brazil
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="brazil[]" id="brazil" class="form-control class " value="{{$internationalpolicies[1]->brazil}}" placeholder="eg: USD 80">

                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Mexico
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="mexico[]" id="mexico" class="form-control class " value="{{$internationalpolicies[1]->mexico}}" placeholder="eg: USD 80">

                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    India
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="india[]" id="india" class="form-control class " value="{{$internationalpolicies[1]->india}}" placeholder="eg: USD 80">

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
                                                <input type="text" name="us[]" id="us" class="form-control class " value="{{$internationalpolicies[2]->us}}" placeholder="eg: USD 80">
                                            </div>
                                        </div>

                                        <div class="col-md-3 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    UK
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="uk[]" id="uk" class="form-control class " value="{{$internationalpolicies[2]->uk}}" placeholder="eg: USD 80">

                                            </div>
                                        </div>

                                        <div class="col-md-3 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Europe
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="europe[]" id="europe" class="form-control class " value="{{$internationalpolicies[2]->europe}}" placeholder="eg: USD 80">

                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    ASEAN
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="asean[]" id="asean" class="form-control class " value="{{$internationalpolicies[2]->asean}}" placeholder="eg: USD 80">

                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Brazil
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="brazil[]" id="brazil" class="form-control class " value="{{$internationalpolicies[2]->brazil}}" placeholder="eg: USD 80">

                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Mexico
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="mexico[]" id="mexico" class="form-control class " value="{{$internationalpolicies[2]->mexico}}" placeholder="eg: USD 80">

                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    India
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="india[]" id="india" class="form-control class " value="{{$internationalpolicies[2]->india}}" placeholder="eg: USD 80">

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
                                                <input type="text" name="us[]" id="us" class="form-control class " value="{{$internationalpolicies[3]->us}}" placeholder="eg: USD 80">
                                            </div>
                                        </div>

                                        <div class="col-md-3 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    UK
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="uk[]" id="uk" class="form-control class " value="{{$internationalpolicies[3]->uk}}" placeholder="eg: USD 80">

                                            </div>
                                        </div>

                                        <div class="col-md-3 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Europe
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="europe[]" id="europe" class="form-control class " value="{{$internationalpolicies[3]->europe}}" placeholder="eg: USD 80">

                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    ASEAN
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="asean[]" id="asean" class="form-control class " value="{{$internationalpolicies[3]->asean}}" placeholder="eg: USD 80">

                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Brazil
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="brazil[]" id="brazil" class="form-control class " value="{{$internationalpolicies[3]->brazil}}" placeholder="eg: USD 80">
                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Mexico
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="mexico[]" id="mexico" class="form-control class " value="{{$internationalpolicies[3]->mexico}}" placeholder="eg: USD 80">

                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    India
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="india[]" id="india" class="form-control class " value="{{$internationalpolicies[3]->india}}" placeholder="eg: USD 80">

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
                    <a href="{{ route('international_policy.index') }}" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</main><!-- End #main -->
@endsection
