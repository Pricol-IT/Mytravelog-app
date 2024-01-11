<div>
    <!-- Order your soul. Reduce your wants. - Augustine -->
    <div class="container">

        @foreach ($tripDetails as $trip)
        <div class="row mb-4 tbox rounded">
            <div class="col-lg-4 col-md-6 mb-1">
                <h5><span class="text-primary">Trip ID : </span> {{ $trip['tripid'] }}</h5>
            </div>
            <div class="col-lg-4 col-md-6 mb-1 mdright">
                <h5 class="text-primary">{{ $trip['tripname'] }}</h5>
            </div>
            <div class="col-lg-4 d-flex justify-content-between">
                <p><i class="bx bx-calendar text-primary"></i> {{ $trip['trip_fromdate'] }}</p>
                <p><i class="bx bx-refresh fw-bold"></i></p>
                <p><i class="bx bx-calendar text-primary"></i> {{ $trip['trip_todate'] }}</p>
            </div>
        </div>
        @endforeach
        <div class="row sws mb-4">
            <div class="col-lg-12">
                <h4 class="mb-4">Services</h4>
                <div class="service_card">

                    <div class="service shadow text-center" id="Flight" data-bs-toggle="modal" data-bs-target="#form-modal">
                        <i class='bx bxs-plane-alt'></i>
                        <h5>Book a Flight</h5>
                    </div>

                    @if ($trip['trip_type'] === 'domestic')
                    <div class="service shadow text-center" id="Train" data-bs-toggle="modal" data-bs-target="#form-modal">
                        <i class='bx bxs-train'></i>
                        <h5>Book a Train</h5>
                    </div>
                    <div class="service shadow text-center" id="Bus" data-bs-toggle="modal" data-bs-target="#form-modal">
                        <i class='bx bxs-bus'></i>
                        <h5>Book a Bus</h5>
                    </div>
                    {{-- <div class="service shadow text-center" id="Taxi" data-bs-toggle="modal" data-bs-target="#form-modal">
                        <i class='bx bxs-taxi'></i>
                        <h5>Book a Taxi</h5>
                    </div> --}}
                    <div class="service shadow text-center" id="Taxi" data-bs-toggle="modal" data-bs-target="#extra-form-modal">
                        <i class='bx bxs-taxi'></i>
                        <h5>Book a Taxi</h5>
                    </div>
                    @endif
                    <div class="service shadow text-center" id="Hotel" data-bs-toggle="modal" data-bs-target="#extra-form-modal">
                        <i class='bx bxs-hotel'></i>
                        <h5>Accommodation</h5>
                    </div>
                    @if ($trip['trip_type'] === 'domestic')
                    <div class="service shadow text-center" id="Advance" data-bs-toggle="modal" data-bs-target="#extra-form-modal">
                        <i class='bx bx-rupee'></i>
                        <h5>Advance</h5>
                    </div>
                    @endif
                    @if ($trip['trip_type'] === 'international')
                    <div class="service shadow text-center" id="Network" data-bs-toggle="modal" data-bs-target="#extra-form-modal">
                        <i class='bx bx-broadcast'></i>
                        <h5>Connectivity</h5>
                    </div>

                    <div class="service shadow text-center" id="Forex" data-bs-toggle="modal" data-bs-target="#extra-form-modal">
                        <img src="{{ asset('images/cu.svg') }} ">
                        <h5>Forex</h5>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <form method="POST" action="{{ route($routeName) }}">
            @csrf
            @method('PUT')
            @foreach ($tripDetails as $trip)
            <input type="hidden" name="tripid" value="{{ $trip['tripid'] }}">
            <input type="hidden" name="tripname" value="{{ $trip['tripname'] }}">
            <input type="hidden" name="from_date" value="{{ $trip['trip_fromdate'] }}">
            <input type="hidden" name="to_date" value="{{ $trip['trip_todate'] }}">
            <input type="hidden" name="trip_type" value="{{ $trip['trip_type'] }}">
            @endforeach
            <div class="row">
                <div class="col-lg-3">
                    <h4> Purpose Of Trip : </h4>
                </div>
                <div class="col-lg-6"><input type="text" name="purpose" required class=" form-control mb-3" placeholder="Purpose Of Trip"></div>
            </div>
            <div class="row" id="request">
                <div class="col-lg-12">
                    <h4 class="mb-4">Request Summary</h4>
                    <table class="table rq">
                        <thead>
                            <tr>
                                <td class="fw-bold" colspan="5">
                                    <h6 class="text-primary"> <i class="bx bxs-plane-alt"></i> Flight Request</h6>
                                </td>
                            </tr>
                            <tr class="fw-bold">
                                <td>Origin</td>
                                <td>Destination</td>
                                <td>Date/Time</td>
                                <td>Class</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody id="Flightbody">

                        </tbody>
                    </table>
                    <table class="table rt">
                        <thead>
                            <tr>
                                <td class="fw-bold" colspan="5">
                                    <h6 class="text-primary"> <i class='bx bxs-train'></i> Train Request</h6>
                                </td>
                            </tr>
                            <tr class="fw-bold">
                                <td>Origin</td>
                                <td>Destination</td>
                                <td>Date/Time</td>
                                <td>Class</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody id="Trainbody">

                        </tbody>
                    </table>
                    <table class="table rb">
                        <thead>
                            <tr>
                                <td class="fw-bold" colspan="5">
                                    <h6 class="text-primary"> <i class='bx bxs-bus'></i> Bus Request</h6>
                                </td>
                            </tr>
                            <tr class="fw-bold">
                                <td>Origin</td>
                                <td>Destination</td>
                                <td>Date/Time</td>
                                <td>Class</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody id="Busbody">

                        </tbody>
                    </table>
                    <table class="table rtx">
                        <thead>
                            <tr>
                                <td class="fw-bold" colspan="7">
                                    <h6 class="text-primary"> <i class='bx bxs-taxi'></i> Taxi Request</h6>
                                </td>
                            </tr>
                            <tr class="fw-bold">
                                <td>Airport To Hotel</td>
                                <td>Hotel To Company</td>
                                <td>No.of.days</td>
                                <td>Class</td>
                                <td>Pickup Date</td>
                                <td>Drop Date</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody id="Taxibody">

                        </tbody>
                    </table>
                    <table class="table rh">
                        <thead>
                            <tr>
                                <td class="fw-bold" colspan="5">
                                    <h6 class="text-primary"> <i class='bx bxs-hotel'></i> Accommodation Request</h6>
                                </td>
                            </tr>
                            <tr class="fw-bold">
                                <td>Location</td>
                                <td>Hotel Name</td>
                                <td>Check-In</td>
                                <td>Check-Out</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody id="Hotelbody">

                        </tbody>
                    </table>
                    <table class="table ra">
                        <thead>
                            <tr>
                                <td class="fw-bold" colspan="4">
                                    <h6 class="text-primary"> <i class='bx bx-rupee'></i> Advance Request</h6>
                                </td>
                            </tr>
                            <tr class="fw-bold">
                                <td>Amount</td>
                                <td>Special Advance</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody id="Advancebody">

                        </tbody>
                    </table>
                    <table class="table rc">
                        <thead>
                            <tr>
                                <td class="fw-bold" colspan="4">
                                    <h6 class="text-primary"><i class='bx bx-broadcast'></i> Connectivity Request</h6>
                                </td>
                            </tr>
                            <tr class="fw-bold">
                                <td>International roaming</td>
                                <td>Mobile Number</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody id="Networkbody">

                        </tbody>
                    </table>
                    <table class="table rf">
                        <thead>
                            <tr>
                                <td class="fw-bold" colspan="4">
                                    <h6 class="text-primary"> <img src="{{ asset('images/cu.svg') }}" style="background:#0072bc;"> Forex Request</h6>
                                </td>
                            </tr>
                            <tr class="fw-bold">
                                <td>Currency</td>
                                <td>Amount</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody id="Forexbody">

                        </tbody>
                    </table>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-12">
                    <center>
                        <input type="submit" name="submit" class="btn btn-primary saveAlert" value="Send for Approval">
                        <input type="submit" name="submit" class="btn btn-secondary" value="Save My Trip">
                        <a href="{{ route($homeRouteName) }}" class="btn btn-danger">Cancel</a>
                    </center>
                </div>
            </div>
        </form>
    </div>
</div>