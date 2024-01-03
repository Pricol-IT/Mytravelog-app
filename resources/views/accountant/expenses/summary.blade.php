@extends('accountant.layouts.app')
@section('title')
    {{ __('Advance summary details') }}
@endsection
@section('main')
    <main id="main" class="main">
        <section class="section">
            <div class="row mb-4 tbox rounded">
                <div class="col-lg-4 col-md-4 mb-1">
                    <h5><span class=" text-primary">Advance ID:</span> {{ $advance->trip_id }}</h5>
                </div>
                <div class="col-lg-4 col-md-4 mb-1 mdright">
                    <h5><span class="text-primary">Trip ID: </span> {{ $advance->tripid }}</h5>
                </div>
                <div class="col-lg-4 col-md-4 mb-1 mdright">
                    <h5><span class="text-primary">Status : </span> {{ ucfirst($advance->status) }}</h5>
                </div>
            </div>
            <div class="row mb-4 tbox rounded">
                <div class="col-lg-6 col-md-6 mb-1">
                    <h5><span class=" text-primary">Advance amount:</span> {{ $advance->amount }}</h5>
                </div>
                <div class="col-lg-6 col-md-6 mb-1">
                    <h5><span class=" text-primary">Purpose Of Advance:</span> {{ $advance->purpose }}</h5>
                </div>
            </div>
            <center>

                <div type="submit" class="btnStatus btn btn-success text-white"><i class="bi bi-check-circle-fill"></i>
                    Start proceed
                </div>
                {{-- <button type="submit">Start proceed</button> --}}

                <a href="{{ url()->previous() }}" class="btn btn-secondary text-center">Back</a>
            </center>

            <div class="row mt-2 p-2 bg-white">
                <div class="col-lg-6 p-3">
                    <h5><span class="fw-bold"> UPI Id:</span> "sample@upi"</h5>
                    <p>or</p>
                    <p class="fw-bold">Bank Details</p>
                    <h5><span class="fw-bold">Account:</span> 9087644221</h5>
                    <h5><span class="fw-bold">IFSC code:</span> CB09545</h5>
                </div>
                <div class="col-lg-6 p-3">
                    <form action="{{ route('approver.clarification') }}" method="post">
                        @csrf
                        @method('POST')
                        <h5 class="fw-bold">Transaction details</h5>
                        <div class="form-group">
                            <label for="transferStatus">Transaction status</label>
                            <select class="form-control" id="transferStatus">
                                <option></option>
                                <option>Amount transfered</option>
                                <option>Transaction failed</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="transactionId">Transaction id</label>
                            <input type="text" class="form-control" id="transactionID">
                        </div>
                        <div class="form-group">
                            <label for="transactionDate">Transaction date</label>
                            <input type="date" class="form-control" id="transactionDate">
                        </div>
                        <div class="form-group">
                            <label for="transactionTime">Transaction Time</label>
                            <input type="time" class="form-control" id="transactionDate">
                        </div>


                </div>
                <center><input type="submit" name="submit" class="btn btn-primary" value="Submit"></center>
            </div>

        </section>
    </main>
@endsection
