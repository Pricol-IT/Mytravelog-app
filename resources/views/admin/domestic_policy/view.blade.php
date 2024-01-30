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
                        policy Details
                    </div>
                    <div class="card-body row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mt-1 row">
                                        <p class="fw-bold col-6">Component Name: </p>
                                        <p class="col-6">{{$domesticpolicy->components}}</p>
                                    </div>

                                </div>

                                <div class="col-md-4">
                                    <div class="mt-1 row">
                                        <p class="fw-bold col-8">Junior Management Tier -1 </p>
                                        <p class="col-4">{{$domesticpolicy->junior_tier1}}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mt-1 row">
                                        <p class="fw-bold col-8">Junior Management Tier -2 </p>
                                        <p class="col-4">{{$domesticpolicy->junior_tier2}}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mt-1 row">
                                        <p class="fw-bold col-8">Junior Management Tier -3 </p>
                                        <p class="col-4">{{$domesticpolicy->junior_tier3}}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mt-1 row">
                                        <p class="fw-bold col-8">Middle Management Tier -1 </p>
                                        <p class="col-4">{{$domesticpolicy->middle_tier1}}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mt-1 row">
                                        <p class="fw-bold col-8">Middle Management Tier -2 </p>
                                        <p class="col-4">{{$domesticpolicy->middle_tier2}}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mt-1 row">
                                        <p class="fw-bold col-8">Middle Management Tier -3 </p>
                                        <p class="col-4">{{$domesticpolicy->middle_tier3}}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mt-1 row">
                                        <p class="fw-bold col-8">Senior Management Tier -1 </p>
                                        <p class="col-4">{{$domesticpolicy->senior_tier1}}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mt-1 row">
                                        <p class="fw-bold col-8">Senior Management Tier -2 </p>
                                        <p class="col-4">{{$domesticpolicy->senior_tier2}}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mt-1 row">
                                        <p class="fw-bold col-8">Senior Management Tier -3 </p>
                                        <p class="col-4">{{$domesticpolicy->senior_tier3}}</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <center>
                        <a href="{{ route('domestic_policy.index') }}" class="btn btn-danger text-center">Back</a>
                    </center>
                </div>
            </div>
        </div>






    </div>

</main><!-- End #main -->
@endsection
