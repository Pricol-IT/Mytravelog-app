@extends('admin.layouts.app')
@section('title')
{{ __('user profile') }}
@endsection
@section('main')
<main id="main" class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Account Details
                    </div>
                    <div class="card-body">

                        <div class="mt-1 row">
                            <p class="fw-bold col-4">Name: </p>
                            <p class="col-8">{{$user->name}}</p>
                        </div>

                        <div class="row">
                            <p class="fw-bold col-4">Employee Id: </p>
                            <p class="col-8">{{$user->emp_id}}</p>
                        </div>

                        <div class="row">
                            <p class="fw-bold col-4">Role: </p>
                            <p class="col-8">{{$user->role}}</p>
                        </div>

                        <div class="row">
                            <p class="fw-bold col-4">Email: </p>
                            <p class="col-8">{{$user->email}}</p>
                        </div>

                    </div>
                </div>
            </div>


            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Work Details
                    </div>
                    <div class="card-body">

                        <div class=" mt-1  row">
                            <p class="fw-bold col-6">Department: </p>
                            <p class="col-6">{{$user->userdetail->department}}</p>
                        </div>

                        <div class=" row">
                            <p class="fw-bold col-6">Designation: </p>
                            <p class="col-6">{{$user->userdetail->designation}}</p>
                        </div>

                        <div class=" row">
                            <p class="fw-bold col-6">Company: </p>
                            <p class="col-6">{{$user->userdetail->company}}</p>
                        </div>
                        <div class=" row">
                            <p class="fw-bold col-6">Grade: </p>
                            <p class="col-6">{{$user->userdetail->grade}}</p>
                        </div>
                        <div class=" row">
                            <p class="fw-bold col-6">Reporting To: </p>
                            <p class="col-6">{{$user->userdetail->repostingto}}</p>
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
                                    <div class="mt-1 row">
                                        <p class="fw-bold col-6">Location: </p>
                                        <p class="col-6">{{$user->userdetail->location}}</p>
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="mt-1 row">
                                        <p class="fw-bold col-6">Date of Birth: </p>
                                        <p class="col-6">{{$user->userdetail->dob}}</p>
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="mt-1 row">
                                        <p class="fw-bold col-6">Gender: </p>
                                        <p class="col-6"></p>
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class=" row">
                                        <p class="fw-bold col-6">Aadhar No: </p>
                                        <p class="col-6">{{$user->userdetail->aadharno}}</p>
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class=" row">
                                        <p class="fw-bold col-6">Mobile No: </p>
                                        <p class="col-6">{{$user->userdetail->mobilenumber}}</p>
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class=" row">
                                        <p class="fw-bold col-6">Passport No: </p>
                                        <p class="col-6">{{$user->userdetail->passportno}}</p>
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class=" row">
                                        <p class="fw-bold col-6">Passport Expiry Date: </p>
                                        <p class="col-6"></p>
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <p class="fw-bold col-6">Present Address: </p>
                                        <p class="col-6"></p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>






    </div>

</main><!-- End #main -->
@endsection
