@extends('admin.layouts.app')
@section('title')
{{ __('user profile') }}
@endsection
@section('main')
<main id="main" class="main">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title p-0">internationalpolicies Details</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body row">
                        <div class="col-md-12">

                            <div class="row">
                                <div class="col-md-12 mt-2">
                                    <div class="mt-1 row">
                                        <p class="fw-bold col-6">Component : </p>
                                        <p class="col-6">{{ucfirst($internationalpolicies[0]->components)}}</p>
                                    </div>
                                </div>

                                @foreach ($internationalpolicies as $internationalpolicy)
                                <div class="card-footer mt-2">
                                    <h4 class="card-title p-0">{{$internationalpolicy->level}}</h4>
                                </div>
                                <div class="col-md-3 mt-2">
                                    <div class="mt-1 row">
                                        <p class="fw-bold col-6">US : </p>
                                        <p class="col-6">{{$internationalpolicy->us}}</p>
                                    </div>
                                </div>

                                <div class="col-md-3 mt-2">
                                    <div class="mt-1 row">
                                        <p class="fw-bold col-6">UK : </p>
                                        <p class="col-6">{{$internationalpolicy->uk}}</p>
                                    </div>
                                </div>

                                <div class="col-md-3 mt-2">
                                    <div class="mt-1 row">
                                        <p class="fw-bold col-6">Europe : </p>
                                        <p class="col-6">{{$internationalpolicy->europe}}</p>
                                    </div>
                                </div>
                                <div class="col-md-3 mt-2">
                                    <div class="mt-1 row">
                                        <p class="fw-bold col-6">ASEAN: </p>
                                        <p class="col-6">{{$internationalpolicy->asean}}</p>
                                    </div>
                                </div>
                                <div class="col-md-3 mt-2">
                                    <div class="mt-1 row">
                                        <p class="fw-bold col-6">Brazil : </p>
                                        <p class="col-6">{{$internationalpolicy->brazil}}</p>
                                    </div>
                                </div>
                                <div class="col-md-3 mt-2">
                                    <div class="mt-1 row">
                                        <p class="fw-bold col-6">Mexico : </p>
                                        <p class="col-6">{{$internationalpolicy->mexico}}</p>
                                    </div>
                                </div>
                                <div class="col-md-3 mt-2">
                                    <div class="mt-1 row">
                                        <p class="fw-bold col-6">India : </p>
                                        <p class="col-6">{{$internationalpolicy->india}}</p>
                                    </div>
                                </div>

                                @endforeach



                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <center>
                        <a href="{{ route('international_policy.index') }}" class="btn btn-danger text-center">Back</a>
                    </center>
                </div>
            </div>
        </div>






    </div>

</main><!-- End #main -->
@endsection
