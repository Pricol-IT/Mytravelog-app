@extends('accountant.layouts.app')
@section('title')
    {{ __('Advance summary details') }}
@endsection
@section('main')
    <main id="main" class="main">
        <section class="section">
            <div class="row mb-4 tbox rounded">
                {{-- <div class="col-lg-4 col-md-4 mb-1">
                    <h5><span class=" text-primary">Advance ID:</span> {{ $advance->trip_id }}</h5>
                </div> --}}
                <div class="col-lg-4 col-md-4 mb-1 mdright">
                    <h5><span class="text-primary">Trip ID: </span> {{ $advance->tripid }}</h5>
                </div>
                <div class="col-lg-4 col-md-4 mb-1 mdright">
                    <h5><span class="text-primary">Status : </span> {{ ucfirst($advance->status) }}</h5>
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
                    <h5><span class="fw-bold"> Internal ( Pricol) Expenses</span> </h5>
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
                    <div class="d-flex justify-content-between"><h5><span class="fw-bold"> External (User) Expensess</span> </h5>
                        <a href="#" class="btn btn-primary">Proofs</a></div>
                    
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

                    <p class="fw-bold">Others</p>
                    <div class="d-flex justify-content-between">
                        <h6 class="fw-bold">Toll</h6>
                        <h6>- 12000</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="fw-bold">Telephone</h6>
                        <h6>- 12000</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="fw-bold">Fuel Change</h6>
                        <h6>- 12000</h6>
                    </div>
                    
                    <hr>
                    <div class="d-flex justify-content-between">
                        <h6 class="fw-bold">Total</h6>
                        <h6>- 12000</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="fw-bold">Advance</h6>
                        <h6>- 12000</h6>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <h6 class="fw-bold">Grand Total</h6>
                        <h6>- 12000</h6>
                    </div>
                    

                </div>
                <center><input type="submit" name="submit" class="btn btn-primary" value="Submit"></center>
            </div>

        </section>
    </main>
@endsection
