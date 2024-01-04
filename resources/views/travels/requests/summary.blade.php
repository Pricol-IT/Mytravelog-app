@extends('travels.layouts.app')
@section('title')
    {{ __('Travels summary details') }}
@endsection
@section('main')
    <main id="main" class="main">
        <section class="section">
            <div class="row mb-4 tbox rounded">
                {{-- <div class="col-lg-6 col-md-4 mb-1">
                    <h5><span class=" text-primary">Travel ID:</span> {{ $advance->trip_id }}</h5>
                </div> --}}
                <div class="col-lg-6 col-md-4 mb-1 mdright">
                    <h5><span class="text-primary">Trip ID: </span> {{ $trip->tripid }}</h5>
                </div>
                <div class="col-lg-6 col-md-4 mb-1 mdright">
                    <h5><span class="text-primary">Status : </span> Not Proceeded </h5>
                    {{-- {{ ucfirst($trip->status) }} --}}
                </div>
            </div>
            {{-- <div class="row mb-4 tbox rounded">
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
                </div> --}}
            {{-- <button type="submit">Start proceed</button> --}}
            {{-- 
                <a href="{{ url()->previous() }}" class="btn btn-secondary text-center">Back</a>
            </center> --}}

            <div class="row" id="request">
                <h4 class="mb-4">Request Summary</h4>
                <div class="col-lg-12">

                    @if ($trip->flight->isNotEmpty())
                        <h6 class="text-primary p-2 "> <i class="bx bxs-plane-alt"></i> Flight Request</h6>
                        <div class="row p-3 mb-3 bg-white ">
                            @foreach ($trip->flight as $flight)
                                <div class="col-md-6 col-lg-4 ">
                                    <p><span class="fw-bold"> Flight request id:</span> {{ $flight->id }}</p>
                                    <p><span class="fw-bold"> Class:</span> {{ $flight->trip_class }}</p>
                                </div>
                                <div class="col-md-6 col-lg-4 ">
                                    <p><span class="fw-bold"> Origin:</span> {{ $flight->origin }}</p>
                                    <p><span class="fw-bold"> Preferred Date:</span> {{ $flight->preferred_date }}</p>
                                </div>
                                <div class="col-md-6 col-lg-4 ">
                                    <p><span class="fw-bold"> Destination:</span> {{ $flight->destination }}</p>
                                    <p><span class="fw-bold"> Status:</span> {{ $flight->status }}</p>
                                </div>
                                <div class="col-lg-6">
                                    <label for="formFile" class="form-label">Upload Ticket:</label>
                                    <input class="form-control" type="file" id="formFile">
                                </div>
                                <div class="col-lg-3">
                                    <label for="invoice" class="form-label">Invoice no:</label>
                                    <input class="form-control" type="text" id="invoice">
                                </div>
                                <div class="col-lg-3">
                                    <label for="ticketcost" class="form-label">Ticket Cost:</label>
                                    <input class="form-control" type="text" id="ticketcost">
                                </div>
<center>
                                <div class="mt-3">
                                    <div class="btn btn-primary">Submit</div>
                                </div>
                            </center>
                            @endforeach
                        </div>
                    @endif

                    @if ($trip->train->isNotEmpty())
                        <h6 class="text-primary"> <i class='bx bxs-train'></i> Train Request</h6>
                        <div class="row p-3 mb-3 bg-white">
                            @foreach ($trip->train as $train)
                                <div class="col-md-6 col-lg-4 ">
                                    <p><span class="fw-bold"> Train request id:</span> {{ $train->id }}</p>
                                    <p><span class="fw-bold"> Class:</span> {{ $train->trip_class }}</p>
                                </div>
                                <div class="col-md-6 col-lg-4 ">
                                    <p><span class="fw-bold"> Origin:</span> {{ $train->origin }}</p>
                                    <p><span class="fw-bold"> Preferred Date:</span> {{ $train->preferred_date }}</p>
                                </div>
                                <div class="col-md-6 col-lg-4 ">
                                    <p><span class="fw-bold"> Destination:</span> {{ $train->destination }}</p>
                                    <p><span class="fw-bold"> Status:</span> {{ $train->status }}</p>
                                </div>
                                <div class="col-lg-6">
                                    <label for="formFile" class="form-label">Upload Ticket:</label>
                                    <input class="form-control" type="file" id="formFile">
                                </div>
                                <div class="col-lg-3">
                                    <label for="invoice" class="form-label">Invoice no:</label>
                                    <input class="form-control" type="text" id="invoice">
                                </div>
                                <div class="col-lg-3">
                                    <label for="ticketcost" class="form-label">Ticket Cost:</label>
                                    <input class="form-control" type="text" id="ticketcost">
                                </div>
<center>
                                <div class="mt-3">
                                    <div class="btn btn-primary">Submit</div>
                                </div>
                            </center>
                            @endforeach
                        </div>
                    @endif

                    @if ($trip->bus->isNotEmpty())
                        <h6 class="text-primary"> <i class='bx bxs-bus'></i> Bus Request</h6>
                        <div class="row p-3 mb-3 bg-white">
                            @foreach ($trip->bus as $bus)
                                <div class="col-md-6 col-lg-4 ">
                                    <p><span class="fw-bold"> Bus request id:</span> {{ $bus->id }}</p>
                                    <p><span class="fw-bold"> Class:</span> {{ $bus->trip_class }}</p>
                                </div>
                                <div class="col-md-6 col-lg-4 ">
                                    <p><span class="fw-bold"> Origin:</span> {{ $bus->origin }}</p>
                                    <p><span class="fw-bold"> Preferred Date:</span> {{ $bus->preferred_date }}</p>
                                </div>
                                <div class="col-md-6 col-lg-4 ">
                                    <p><span class="fw-bold"> Destination:</span> {{ $bus->destination }}</p>
                                    <p><span class="fw-bold"> Status:</span> {{ $bus->status }}</p>
                                </div>
                                <div class="col-lg-6">
                                    <label for="formFile" class="form-label">Upload Ticket:</label>
                                    <input class="form-control" type="file" id="formFile">
                                </div>
                                <div class="col-lg-3">
                                    <label for="invoice" class="form-label">Invoice no:</label>
                                    <input class="form-control" type="text" id="invoice">
                                </div>
                                <div class="col-lg-3">
                                    <label for="ticketcost" class="form-label">Ticket Cost:</label>
                                    <input class="form-control" type="text" id="ticketcost">
                                </div>
<center>
                                <div class="mt-3">
                                    <div class="btn btn-primary">Submit</div>
                                </div>
                            </center>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </section>
    </main>
@endsection
