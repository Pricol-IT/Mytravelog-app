@extends('admin.layouts.app')
@section('title')
{{ __('user profile') }}
@endsection
@section('main')
<main id="main" class="main">
    <div class="container">
        <div class="row">

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Grade Details
                    </div>
                    <div class="card-body row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mt-1 row">
                                        <p class="fw-bold col-6">Levels : </p>
                                        <p class="col-6">{{$grade->levels}}</p>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="mt-1 row">
                                        <p class="fw-bold col-6">Category: </p>
                                        <p class="col-6">{{$grade->category}}</p>
                                    </div>

                                </div>

                                <div class="col-md-12">
                                    <div class="mt-1 row">
                                        <p class="fw-bold col-6">Designation: </p>
                                        <p class="col-6">{{$grade->designation}}</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <center>
                        <a href="{{ route('grade.index') }}" class="btn btn-danger text-center">Back</a>
                    </center>
                </div>
            </div>
        </div>






    </div>

</main><!-- End #main -->
@endsection
