@extends('admin.layouts.app')
@section('title')
{{ __('New User') }}
@endsection
@section('main')
<main id="main" class="main">
    <div class="content">
        <div class="container-fluid">

            <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title p-0">Create New User</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                Account Details
                            </div>
                            <div class="card-body row">

                                <div class="col-md-12 mb-2">
                                    <div class="form-group">
                                        <label class="class mb-2" for="for">
                                            Name
                                            <span class="form-label-required text-danger">*</span>
                                        </label>
                                        <input type="text" name="name" id="name" class="form-control class " value="{{old('name')}}" placeholder="Enter your full name">
                                        @if ($errors->has('name'))
                                        <span class="error text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>


                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label class="class mb-2" for="for">
                                            Employee Id
                                            <span class="form-label-required text-danger">*</span>
                                        </label>
                                        <input type="text" name="empid" id="empid" class="form-control class " value="{{old('empid')}}" placeholder="Emp id">
                                        @if ($errors->has('empid'))
                                        <span class="error text-danger">{{ $errors->first('empid') }}</span>
                                        @endif
                                    </div>
                                </div>


                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label class="class mb-2" for="for">
                                            Role
                                            <span class="form-label-required text-danger">*</span>
                                        </label>
                                        <select class="form-control" name="role" id="role">
                                            <option value=""> Select Role</option>
                                            <option value="user" {{old('role')== 'user' ? 'selected' : ''}}>User</option>
                                            <option value="approver" {{old('role')== 'approver' ? 'selected' : ''}}>Approver</option>
                                            <option value="travels" {{old('role')== 'travels' ? 'selected' : ''}}>Travel Desk</option>
                                            <option value="accountant" {{old('role')== 'accountant' ? 'selected' : ''}}>Accountant</option>
                                        </select>
                                        @if ($errors->has('role'))
                                        <span class="error text-danger">{{ $errors->first('role') }}</span>
                                        @endif
                                    </div>
                                </div>


                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label class="class mb-2" for="for">
                                            Email
                                            <span class="form-label-required text-danger">*</span>
                                        </label>
                                        <input type="email" name="email" id="email" class="form-control class " value="{{old('email')}}" placeholder="Email">
                                        @if ($errors->has('email'))
                                        <span class="error text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>


                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label class="class mb-2" for="for">
                                            Password
                                            <span class="form-label-required text-danger">*</span>
                                        </label>
                                        <input type="password" name="password" id="password" class="form-control class " value="{{old('password')}}" placeholder="Password">
                                        @if ($errors->has('password'))
                                        <span class="error text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                Work Details
                            </div>
                            <div class="card-body row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="class mb-2" for="for">
                                            Department
                                        </label>
                                        <input type="text" name="department" id="department" class="form-control class " value="{{old('department')}}" placeholder="department">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="class mb-2" for="for">
                                            Designation
                                            <span class="form-label-required text-danger">*</span>
                                        </label>
                                        <input type="text" name="designation" id="designation" class="form-control class " value="{{old('designation')}}" placeholder="designation">
                                        @if ($errors->has('designation'))
                                        <span class="error text-danger">{{ $errors->first('designation') }}</span>
                                        @endif
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="class mb-2" for="for">
                                            Company
                                        </label>
                                        <input type="text" name="company" id="company" class="form-control class " value="{{old('company')}}" placeholder="Company">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="class mb-2" for="for">
                                            Grade
                                            <span class="form-label-required text-danger">*</span>
                                        </label>
                                        <input type="text" name="grade" id="grade" class="form-control class " value="{{old('grade')}}" placeholder="Grade">
                                        @if ($errors->has('grade'))
                                        <span class="error text-danger">{{ $errors->first('grade') }}</span>
                                        @endif
                                    </div>
                                </div>





                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="class mb-2" for="for">
                                            Reporting To
                                        </label>
                                        <span class="form-label-required text-danger">*</span>
                                        <input type="text" name="repostingto" id="repostingto" class="form-control class " value="{{old('repostingto')}}" placeholder="Reporting To">
                                        @if ($errors->has('repostingto'))
                                        <span class="error text-danger">{{ $errors->first('repostingto') }}</span>
                                        @endif
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                Additional Details
                            </div>
                            <div class="card-body row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Location
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="location" id="location" class="form-control class " value="{{old('location')}}" placeholder="location">
                                                @if ($errors->has('location'))
                                                <span class="error text-danger">{{ $errors->first('location') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Date of Birth
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="date" name="dob" id="dob" class="form-control class " value="{{old('dob')}}" placeholder="dob">
                                                @if ($errors->has('dob'))
                                                <span class="error text-danger">{{ $errors->first('dob') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Gender
                                                </label>
                                                <input type="text" name="gender" id="id" class="form-control class " value="{{old('gender')}}" placeholder="gender">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Aadhar No
                                                </label>
                                                <input type="text" name="aadharno" id="aadharno" class="form-control class " value="{{old('aadharno')}}" placeholder="aadhar">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Mobile No
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="mobilenumber" id="mobilenumber" class="form-control class " value="{{old('mobilenumber')}}" placeholder="Mobile No">
                                                @if ($errors->has('mobilenumber'))
                                                <span class="error text-danger">{{ $errors->first('mobilenumber') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Passport No
                                                </label>
                                                <input type="text" name="passportno" id="passportno" class="form-control class " value="{{old('passportno')}}" placeholder="Passport No">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Passport Expiry Date
                                                </label>
                                                <input type="text" name="passport_expiry_date" id="id" class="form-control class " value="{{old('passport_expiry_date')}}" placeholder="Passport Expiry Date">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Present Address
                                                </label>
                                                <input type="text" name="present_address" id="id" class="form-control class " value="{{old('present_address')}}" placeholder="Present Address">
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
