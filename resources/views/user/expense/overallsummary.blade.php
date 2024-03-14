@extends('user.layouts.app')
@section('title')
{{ __('Expense summary details') }}
@endsection
@section('main')
<main id="main" class="main">
    <section class="section">
        <div class="row mb-4 tbox rounded">
            {{-- <div class="col-lg-4 col-md-4 mb-1">
                    <h5><span class=" text-primary">Advance ID:</span> {{ $advance->trip_id }}</h5>
        </div> --}}
        <div class="col-lg-4 col-md-4 mb-1 mdright">
            <h5><span class="text-primary">Trip ID: </span> {{ $expenses->tripid }}</h5>
        </div>
        <div class="col-lg-4 col-md-4 mb-1 mdright">
            <h5><span class="text-primary">Status : </span> {{ ucfirst($expenses->status) }}</h5>
        </div>
        </div>
        {{-- <div class="row mb-4 tbox rounded">
                <div class="col-lg-6 col-md-6 mb-1">
                    <h5><span class=" text-primary">Advance amount:</span> {{ $advance->amount }}</h5>
        </div>
        <div class="col-lg-6 col-md-6 mb-1">
            <h5><span class=" text-primary">Purpose Of Advance:</span> {{ $advance->purpose }}</h5>
        </div>
        </div> --}}


        <div class="row mt-2 p-2 bg-white">
            <div class="col-lg-6 p-3">
                <h5><span class="fw-bold"> Company Paid Expenses</span> </h5>

                <p class="fw-bold">Ticket Booking Cost</p>
                <div class="d-flex justify-content-between">
                    <h6 class="fw-bold">flight</h6>
                    <h6>- 12000</h6>
                </div>
                <div class="d-flex justify-content-between">
                    <h6 class="fw-bold">train</h6>
                    <h6>- 12000</h6>
                </div>
                <div class="d-flex justify-content-between">
                    <h6 class="fw-bold">bus</h6>
                    <h6>- 12000</h6>
                </div>
                <div class="d-flex justify-content-between">
                    <h6 class="fw-bold">Taxi</h6>
                    <h6>- 12000</h6>
                </div>


                <p class="fw-bold">Accommodation Cost</p>
                <div class="d-flex justify-content-between">
                    <h6 class="fw-bold">Hotel</h6>
                    <h6>- 12000</h6>
                </div>
                <div class="d-flex justify-content-between">
                    <h6 class="fw-bold">Food</h6>
                    <h6>- 12000</h6>
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <h6 class="fw-bold">Total</h6>
                    <h6>- 12000</h6>
                </div>

            </div>
            <div class="col-lg-6 p-3">
                <div class="d-flex justify-content-between">
                    <h5><span class="fw-bold"> My Expenses</span> </h5>
                    <a href="{{ route('addexpense',$expenses->id) }}" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Add Expense </a>
                </div>
                @php
                $total=0;
                @endphp
                <p class="fw-bold">By Company Card</p>
                @forelse ($expenses->expense as $expense)
                @php
                $total+=$expense->servicecost;
                @endphp
                @if(($expense->service != 'Hotel') && ($expense->service != 'Network'))
                <div class="d-flex justify-content-between">
                    <h6 class="fw-bold">{{$expense->service}} x{{$expense->countcost}}</h6>
                    <h6> {{'₹ '.$expense->servicecost}}</h6>
                </div>
                @endif

                @empty

                @endforelse



                <p class="fw-bold">By Self Paid</p>
                @forelse ($expenses->expense as $expense)

                @if(($expense->service == 'Hotel') || ($expense->service == 'Network'))

                <div class="d-flex justify-content-between">
                    <h6 class="fw-bold">{{$expense->service}} x{{$expense->countcost}}</h6>
                    <h6> {{'₹ '.$expense->servicecost}}</h6>
                </div>
                @endif

                @empty

                @endforelse

                <hr>
                <div class="d-flex justify-content-between">
                    <h6 class="fw-bold">Total</h6>
                    <h6>{{'₹ '.$total}}</h6>
                </div>
                <div class="d-flex justify-content-between">
                    <h6 class="fw-bold">Advance</h6>
                    <h6>{{$expenses->advance->isNotEmpty() ? '₹ '.$expenses->advance[0]->amount : 0}}</h6>
                </div>
                @php
                $advance=$expenses->advance->isNotEmpty() ? $expenses->advance[0]->amount : 0
                @endphp
                <hr>
                <div class="d-flex justify-content-between">
                    <h6 class="fw-bold">Grand Total</h6>
                    <h6>{{'₹ '.($advance-$total)}}</h6>
                </div>


            </div>
            <center>
                <a href="{{ route('user.mytripexpenses') }}" class="btn btn-primary text-center saveAlert">Send for approval</a>
                <a href="{{ route('user.mytripexpenses') }}" class="btn btn-danger text-center">Back</a></center>
        </div>

    </section>
</main>
@endsection
