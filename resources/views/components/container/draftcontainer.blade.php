<div>
    <!-- It is never too late to be what you might have been. - George Eliot -->
    <div class="container">


        <div class="row mb-4 tbox rounded">
            <div class="col-lg-4 col-md-6 mb-1">
                <h5><span class="text-primary">Trip ID : </span> {{ $trip->tripid }}</h5>
            </div>
            <div class="col-lg-4 col-md-6 mb-1 mdright">
                <h5 class="text-primary">{{ $trip->tripname }}</h5>
            </div>
            <div class="col-lg-4 d-flex justify-content-between">
                <p><i class="bx bx-calendar text-primary"></i> {{ $trip->from_date }}</p>
                <p><i class="bx bx-refresh fw-bold"></i></p>
                <p><i class="bx bx-calendar text-primary"></i> {{ $trip->to_date }}</p>
            </div>
        </div>
        <div class="row sws mb-4">
            <div class="col-lg-12">
                <h4 class="mb-4">Services</h4>
                <div class="service_card">
@if (!in_array(ucfirst($usergrade),['L5','L6','L7','L8']))
                    <div class="service shadow text-center" id="Flight" data-bs-toggle="modal" data-bs-target="#form-modal">
                        <i class='bx bxs-plane-alt'></i>
                        <h5>Book a Flight</h5>
                    </div>
@endif

                    @if ($trip['trip_type'] === 'domestic')
                    <div class="service shadow text-center" id="Train" data-bs-toggle="modal" data-bs-target="#form-modal">
                        <i class='bx bxs-train'></i>
                        <h5>Book a Train</h5>
                    </div>
                    <div class="service shadow text-center" id="Bus" data-bs-toggle="modal" data-bs-target="#form-modal">
                        <i class='bx bxs-bus'></i>
                        <h5>Book a Bus</h5>
                    </div>

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


        <form method="POST" action="{{ route($routeName, $trip->id) }}">

            @csrf
            @method('PUT')

            <input type="hidden" name="tripid" value="{{ $trip->tripid }}">
            <input type="hidden" name="tripname" value="{{ $trip->tripname }}">
            <input type="hidden" name="from_date" value="{{ $trip->trip_fromdate }}">
            <input type="hidden" name="to_date" value="{{ $trip->trip_todate }}">
            <div class="row">
                <div class="col-lg-3">
                    <h4> Purpose Of Trip : </h4>
                </div>
                <div class="col-lg-6"><input type="text" name="purpose" required class=" form-control mb-3" placeholder="Purpose Of Trip" value="{{ $trip->purpose }}"></div>
            </div>
            <div class="row" id="request">
                <div class="col-lg-12">
                    <h4 class="mb-4">Request Summary</h4>
                    <table class="table rq">
                        <thead>
                            <tr>
                                <td class="fw-bold" colspan="6">
                                    <h6 class="text-primary"> <i class="bx bxs-plane-alt"></i> Flight Request</h6>
                                </td>
                            </tr>
                            <tr class="fw-bold">
                                <td>Origin</td>
                                <td>Destination</td>
                                <td>Date/Time</td>
                                <td>Class</td>
                                <td><input type="hidden" id="flightcount" value="{{ $trip->flight != '' ? count($trip->flight) : 0 }}"></td>
                            </tr>
                            @forelse($trip->flight as $flight)
                            <tr>
                                <td><input type="hidden" name="flightfrom[]" value="{{ $flight->origin }}">{{ $flight->origin }}</td>
                                <td><input type="hidden" name="flightto[]" value="{{ $flight->destination }}">{{ $flight->destination }}</td>
                                <td><input type="hidden" name="flightdate[]" value="{{ $flight->preferred_date }}">{{ $flight->preferred_date }}</td>
                                <td><input type="hidden" name="flightclass[]" value="{{ $flight->trip_class }}">{{ $flight->trip_class }}</td>
                                <td><button class="btn btn-danger remove"><i class="bx bx-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5 ">
                                    <p class="text-primary preference" style="font-size:12px;margin:0;">
                                        {{ $flight->preferences }}</p> <input name="preferences[]" type="hidden" value=" {{ $flight->preferences }}">
                                </td>
                            </tr>
                            @empty
                            <p></p>
                            @endforelse

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
                                <td><input type="hidden" id="traincount" value="{{ $trip->train != '' ? count($trip->train) : 0 }}"></td>
                            </tr>
                            @forelse($trip->train as $train)
                            <tr>
                                <td><input type="hidden" name="trainfrom[]" value="{{ $train->origin }}">{{ $train->origin }}</td>
                                <td><input type="hidden" name="trainto[]" value="{{ $train->destination }}">{{ $train->destination }}</td>
                                <td><input type="hidden" name="traindate[]" value="{{ $train->preferred_date }}">{{ $train->preferred_date }}</td>
                                <td><input type="hidden" name="trainclass[]" value="{{ $train->trip_class }}">{{ $train->trip_class }}</td>
                                <td><button class="btn btn-danger remove"><i class="bx bx-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5 ">
                                    <p class="text-primary" style="font-size:12px;margin:0;">
                                        {{ $train->preferences }}</p>
                                    <input name="preferences[]" type="hidden" value="{{ $train->preferences }}">
                                </td>
                            </tr>
                            @empty
                            <p></p>
                            @endforelse

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
                                <td><input type="hidden" id="buscount" value="{{ $trip->bus != '' ? count($trip->bus) : 0 }}"></td>
                            </tr>

                            @forelse($trip->bus as $bus)
                            <tr>
                                <td><input type="hidden" name="busfrom[]" value="{{ $bus->origin }}">{{ $bus->origin }}</td>
                                <td><input type="hidden" name="busto[]" value="{{ $bus->destination }}">{{ $bus->destination }}</td>
                                <td><input type="hidden" name="busdate[]" value="{{ $bus->preferred_date }}">{{ $bus->preferred_date }}</td>
                                <td><input type="hidden" name="busclass[]" value="{{ $bus->trip_class }}">{{ $bus->trip_class }}
                                </td>
                                <td><button class="btn btn-danger remove"><i class="bx bx-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5 ">
                                    <p class="text-primary" style="font-size:12px;margin:0;">
                                        {{ $bus->preferences }}</p> <input name="preferences[]" type="hidden" value="{{ $bus->preferences }}">
                                </td>
                            </tr>

                            @empty
                            <p></p>
                            @endforelse

                        </thead>
                        <tbody id="Busbody">

                        </tbody>
                    </table>
                    {{-- {{$trip->taxi}} --}}
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
                                <td><input type="hidden" id="taxicount" value="{{ $trip->taxi != '' ? count($trip->taxi) : 0 }}"></td>
                            </tr>
                            @forelse($trip->taxi as $taxi)

                            <tr>
                                <td><input type="hidden" name="airportToHotel[]" value="{{ $taxi->airport_to_hotel }}">{{ $taxi->airport_to_hotel }}</td>
                                <td><input type="hidden" name="hotelToCompany[]" value="{{ $taxi->hotel_to_company }}">{{ $taxi->hotel_to_company }}</td>
                                <td> <input type="hidden" name="noOfDays[]" value="{{ $taxi->no_of_days }}">{{ $taxi->no_of_days }}</td>
                                <td> <input type="hidden" name="tx_class[]" value="{{ $taxi->class }}">{{ $taxi->class }}</td>
                                <td><input type="hidden" name="pickupDate[]" value="{{ $taxi->pick_date }}'">{{ $taxi->pick_date }}</td>
                                <td> <input type="hidden" name="dropDate[]" value="{{ $taxi->drop_date }}">{{ $taxi->drop_date }}</td>
                                <td><button class="btn btn-danger remove"><i class="bx bx-trash"></i></button></td>
                            </tr>


                            @empty
                            <p></p>
                            @endforelse
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
                                <td><input type="hidden" id="hotelcount" value="{{ $trip->accommodation != '' ? count($trip->accommodation) : 0 }}">
                                </td>
                            </tr>
                            @forelse($trip->accommodation as $accommodation)
                            <tr>
                                <td><input type="hidden" name="location[]" value="{{ $accommodation->location }}">{{ $accommodation->location }}
                                </td>
                                <td><input type="hidden" name="hotelName[]" value="{{ $accommodation->hotel_name }}">{{ $accommodation->hotel_name }}
                                </td>
                                <td><input type="hidden" name="checkin[]" value="{{ $accommodation->checkin }}">{{ $accommodation->checkin }}</td>
                                <td><input type="hidden" name="checkout[]" value="{{ $accommodation->checkout }}">{{ $accommodation->checkout }}
                                </td>
                                <td><button class="btn btn-danger remove"><i class="bx bx-trash"></i></button>
                                </td>
                            </tr>

                            @empty
                            <p></p>
                            @endforelse
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
                                <td><input type="hidden" id="advancecount" value="{{ $trip->advance != '' ? count($trip->advance) : 0 }}">
                                </td>
                            </tr>
                            @forelse($trip->advance as $advance)
                            <tr>
                                <td><input type="hidden" name="amount[]" value="{{ $advance->amount }}">{{ $advance->amount }}
                                </td>
                                <td><input type="hidden" name="specialApproval[]" value="{{ $advance->special_approval }}"><input type="hidden" name="splAdvance[]" value="{{ $advance->special_amount }}">{{ $advance->special_amount }}</td>
                                <td><button class="btn btn-danger remove"><i class="bx bx-trash"></i></button>
                                </td>
                            </tr>

                            @empty
                            <p></p>
                            @endforelse
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
                                <td><input type="hidden" id="networkcount" value="{{ $trip->connectivity != '' ? count($trip->connectivity) : 0 }}">
                                </td>
                            </tr>
                            @forelse($trip->connectivity as $network)
                            <tr>
                                <td><input type="hidden" name="network[]" value="{{ $network->international_roaming }}">{{ $network->international_roaming }}
                                </td>
                                <td><input type="hidden" name="phoneno[]" value="{{ $network->mobile_number }}">{{ $network->mobile_number }}
                                </td>
                                <td><button class="btn btn-danger remove"><i class="bx bx-trash"></i></button>
                                </td>
                            </tr>

                            @empty
                            <p></p>
                            @endforelse
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
                                <td><input type="hidden" id="forexcount" value="{{ $trip->forex != '' ? count($trip->forex) : 0 }}">
                                </td>
                            </tr>
                            @forelse($trip->forex as $forex)
                            <tr>
                                <td><input type="hidden" name="currency[]" value="{{ $forex->currency }}">{{ $forex->currency }}
                                </td>
                                <td><input type="hidden" name="forex_amount[]" value="{{ $forex->amount }}">{{ $forex->amount }}
                                </td>
                                <td><button class="btn btn-danger remove"><i class="bx bx-trash"></i></button>
                                </td>
                            </tr>

                            @empty
                            <p></p>
                            @endforelse
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
