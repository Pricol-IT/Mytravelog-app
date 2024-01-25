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
                                        <p class="fw-bold col-6">Tier: </p>
                                        <p class="col-6">{{$cityTier->tier}}</p>
                                    </div>

                                </div>

                                <div class="col-md-12">
                                    <div class="mt-1 row">
                                        <p class="fw-bold col-8">City Name: </p>
                                        <p class="col-4">{{$cityTier->cities}}</p>
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
