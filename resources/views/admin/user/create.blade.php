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
                                        <input type="text" name="name" id="name" class="form-control class " value placeholder="Enter your full name" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label class="class mb-2" for="for">
                                            Employee Id
                                            <span class="form-label-required text-danger">*</span>
                                        </label>
                                        <input type="text" name="empid" id="empid" class="form-control class " value placeholder="Emp id" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label class="class mb-2" for="for">
                                            Role
                                            <span class="form-label-required text-danger">*</span>
                                        </label>
                                        <select class="form-control" required name="role" id="role" required>
                                            <option value=""> Select Role</option>
                                            <option value="user">User</option>
                                            <option value="approver">Approver</option>
                                            <option value="travels">Travel Desk</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label class="class mb-2" for="for">
                                            Email
                                            <span class="form-label-required text-danger">*</span>
                                        </label>
                                        <input type="email" name="email" id="email" class="form-control class " value placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label class="class mb-2" for="for">
                                            Password
                                            <span class="form-label-required text-danger">*</span>
                                        </label>

                                        <input type="password" name="password" id="password" class="form-control class " value placeholder="Password" required>
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
                                            Designation
                                            <span class="form-label-required text-danger">*</span>
                                        </label>
                                        <input type="text" name="designation" id="designation" class="form-control class " value placeholder="designation">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="class mb-2" for="for">
                                            Department
                                        </label>
                                        <input type="text" name="department" id="department" class="form-control class " value placeholder="department">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="class mb-2" for="for">
                                            Grade
                                            <span class="form-label-required text-danger">*</span>
                                        </label>
                                        <input type="text" name="grade" id="grade" class="form-control class " value placeholder="Grade">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="class mb-2" for="for">
                                            Company
                                        </label>
                                        <input type="text" name="company" id="company" class="form-control class " value placeholder="Company">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="class mb-2" for="for">
                                            Reporting To
                                        </label>
                                        <input type="text" name="repostingto" id="repostingto" class="form-control class " value placeholder="Reporting To">
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
                                                <input type="text" name="location" id="location" class="form-control class " value placeholder="location">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Date of Birth
                                                </label>
                                                <input type="date" name="dob" id="dob" class="form-control class " value placeholder="dob">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Gender
                                                </label>
                                                <input type="text" name="gender" id="id" class="form-control class " value placeholder="gender">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Aadhar No
                                                </label>
                                                <input type="text" name="aadharno" id="aadharno" class="form-control class " value placeholder="aadhar">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Mobile No
                                                </label>
                                                <input type="text" name="mobilenumber" id="mobilenumber" class="form-control class " value placeholder="Mobile No">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Passport No
                                                </label>
                                                <input type="text" name="passportno" id="passportno" class="form-control class " value placeholder="Passport No">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Passport Expiry Date
                                                </label>
                                                <input type="text" name="passport_dxpiry_date" id="id" class="form-control class " value placeholder="Passport Expiry Date">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Present Address
                                                </label>
                                                <input type="text" name="present_address" id="id" class="form-control class " value placeholder="Present Address">
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
