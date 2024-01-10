@extends('user.layouts.app')
@section('title')
{{ __('Add Trip') }}
@endsection
@section('main')
<main id="main" class="main">
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


        <form method="POST" action="{{ route('storedraft', $trip->id) }}">

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
                    <table class="table rtx">
                        <thead>
                            <tr>
                                <td class="fw-bold" colspan="5">
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
                                <td class="fw-bold" colspan="4">
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
                                <td><input type="hidden" name="splAdvance[]" value="{{ $advance->special_amount }}">{{ $advance->special_amount }}</td>
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
                                <td><input type="hidden" name="forex_amount[]" value="{{ $forex->currency }}">{{ $forex->amount }}
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
                        <a href="{{ route('user.home') }}" class="btn btn-danger">Cancel</a>
                    </center>
                </div>
            </div>
        </form>
    </div>
    @php
    $tripDetails[]=[
    'tripid' => $trip->tripid,
    'tripname' => $trip->tripname,
    'trip_fromdate' => $trip->tfdate,
    'trip_todate' => $trip->ttdate,
    'tripType' => $trip->tripType
    ]
    @endphp
</main><!-- End #main -->
<x-modal.requestmodel :tripDetails="$tripDetails" />
<x-modal.servicemodel />
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $('.rq,.rt,.rb,.rtx,.rh,.ra,.rc,.rf').hide();
    $('.service').click(function() {
        var service = this.id
        $('.vehicle').val(service);
        $('.extraService').val(service);
        $('.modal-title').text(function() {

            return "Book a " + service;
        });

        $('.onward-form').hide();
        $('.return-form').hide();
        $('.multicity-form').hide();
        $('.preferences').hide();

        $('input[name="tripmode"]').change(function() {
            if ($(this).val() === 'onward') {

                $('.onward-form').show();
                $('.return-form').hide();
                $('.multicity-form').hide();
                $('.preferences').show();

            } else if ($(this).val() === 'return') {

                $('.return-form').show();
                $('.onward-form').hide();
                $('.preferences').show();
                $('.multicity-form').hide();

            } else if ($(this).val() === 'multicity') {
                $('.return-form').hide();
                $('.onward-form').hide();
                $('.preferences').show();
                $('.multicity-form').show();
            }
        });

        var currentNumber = 0
        $("#addButton").click(function() {
            var clonedSection = $(".multicity-section:first").clone();

            var currentNumber = $(".multicity-section").length + 1;
            clonedSection.find("h6 span").text(currentNumber);

            clonedSection.find("input").val("");
            $(".multicity-area").append(clonedSection);

            if (currentNumber >= 6) {
                $("#addButton").hide()
            } else {
                $("#addButton").show()
            }
            // console.log(currentNumber);

        });



        $(".multicity-area").on("click", ".removeCloneButton", function() {
            $(this).closest(".multicity-section").remove();

            $(".multicity-section").each(function(index) {
                $(this).find("h6 span").text(index + 1);
            });
            $("#addButton").show()

        });


        $('#carRental').change(function() {
            if ($(this).is(':checked')) {
                $('.carRentalSection').show();
            } else {
                $('.carRentalSection').hide();
            }
        });

        $('#specialApproval').change(function() {
            if ($(this).is(':checked')) {
                $('.specialApprovalForm').show();
            } else {
                $('.specialApprovalForm').hide();
            }
        });
        // console.log(service);
        if (service == 'Train') {
            $('.train-form').show();
            $('.flight-form, .bus-form').hide();
        } else if (service == 'Bus') {
            $('.bus-form').show();
            $('.flight-form, .train-form').hide();
        } else if (service == 'Flight') {
            $('.flight-form').show();
            $('.bus-form, .train-form').hide();
        } else if (service == 'Taxi') {
            $('.taxi-form').show();
            $('.carRentalSection').hide();
            $('.advance-form, .network-form, .forex-form, .hotel-form').hide();
        } else if (service == 'Hotel') {
            $('.hotel-form').show();
            $('.advance-form, .network-form, .forex-form,.taxi-form').hide();
        } else if (service == 'Advance') {
            $('.advance-form').show();
            $('.specialApprovalForm').hide();
            $('.hotel-form, .network-form, .forex-form,.taxi-form').hide();
        } else if (service == 'Network') {
            $('.network-form').show();
            $('.hotel-form, .advance-form, .forex-form,.taxi-form').hide();
        } else if (service == 'Forex') {
            $('.forex-form').show();
            $('.hotel-form, .advance-form, .network-form,.taxi-form').hide();
        }
    });


    $("#service-form").submit(function(e) {
        e.preventDefault();
    });


    $('.closeService').on("click", function() {
        $('#service-form, #extra-service-form ').trigger('reset');

    });

    $('.addService').on("click", function() {

        var vehicle = $('.vehicle').val();

        var from = [];
        $('.from').each(function() {
            var inputValue = $(this).val();
            from.push(inputValue);
        });

        var to = [];
        $('.to').each(function() {
            var inputValue = $(this).val();
            to.push(inputValue);
        });

        var sdate = [];
        var date = [];
        var time = [];
        $('.date').each(function() {
            var inputValue = $(this).val();
            sdate.push(inputValue);
            date.push(inputValue.split('T')[0]);
            time.push(inputValue.split('T')[1]);
        });

        var fl_class = [];
        $('.fl_class').each(function() {
            var inputValue = $(this).val();
            fl_class.push(inputValue);
        });

        var tr_class = [];
        $('.tr_class').each(function() {
            var inputValue = $(this).val();
            tr_class.push(inputValue);
        });

        var bs_class = [];
        $('.bs_class').each(function() {
            var inputValue = $(this).val();
            bs_class.push(inputValue);
        });

        var preferences = $('#preferences').val();



        // extra service section
        var extra_service = $('.extraService').val();

        if ($('#airportToHotel').is(':checked')) {
            var airportToHotel = 'yes';
        } else {
            var airportToHotel = 'no';
        }

        if ($('#hotelToCompany').is(':checked')) {
            var hotelToCompany = 'yes';
        } else {
            var hotelToCompany = 'no';
        }

        if ($('#carRental').is(':checked')) {
            var carRental = 'yes';
        } else {
            var carRental = 'no';
        }

        var noOfDays = $('#noOfDays').val();

        var tx_class = $('#tx_class').val();

        var pickupDate = $('#pickupDate').val();
        var pickupDateDate = pickupDate.split('T')[0];
        var pickupDateTime = pickupDate.split('T')[1];

        var dropDate = $('#dropDate').val();
        var dropDateDate = dropDate.split('T')[0];
        var dropDateTime = dropDate.split('T')[1];



        var location = $('#location').val();

        var hotelName = $('#hotelName').val();

        var checkIn = $('#checkIn').val();
        var checkIndate = checkIn.split('T')[0];
        var checkIntime = checkIn.split('T')[1];

        var checkOut = $('#checkOut').val();
        var checkOutdate = checkOut.split('T')[0];
        var checkOuttime = checkOut.split('T')[1];



        var amount = $('#amount').val();
        if ($('#specialApproval').is(':checked')) {
            var specialApproval = 'yes';
        } else {
            var specialApproval = 'no';
        }
        var splAdvance = $('#splAdvance').val();


        var network = $('#network').val();
        var phoneno = $('#phoneno').val();


        var currency = $('#currency').val();

        var forex_amount = $('#forex_amount').val();

        if (vehicle != '') {
            switch (vehicle) {
                case 'Flight':
                    for (var i = 0; i < fl_class.length; i++) {
                        if ((from[i] != '') && (to[i] != '') && (sdate[i] != '') && (fl_class[i] != '')) {
                            $('.rq').show();
                            $('#Flightbody').append('<tr><td><input type="hidden" name="flightfrom[]" value="' + from[i] +
                                '" >' + from[i] + '</td><td><input type="hidden" name="flightto[]" value="' + to[i] + '" >' +
                                to[i] + '</td><td><input type="hidden" name="flightdate[]" value="' + sdate[i] + '" >' +
                                date[i] + '/' + time[i] + '</td><td><input type="hidden" name="flightclass[]" value="' +
                                fl_class[i] + '" >' + fl_class[i] +
                                '</td><td><button class="btn btn-danger remove"><i class="bx bx-trash"></i></button></td></tr><tr><td colspan="5 "><p class="text-primary preference" style="font-size:12px;margin:0;">' +
                                preferences + '</p> <input name="preferences[]" type="hidden" value="' + preferences +
                                '"></td></tr>');
                            $("[data-bs-dismiss=modal]").trigger({
                                type: "click"
                            });
                            $('#service-form').trigger('reset');

                        }
                    }
                    break;

                case 'Train':
                    for (var i = 0; i < tr_class.length; i++) {
                        if ((from[i] != '') && (to[i] != '') && (sdate[i] != '') && (tr_class[i] !=
                                '')) {
                            $('.rt').show();
                            $('#Trainbody').append('<tr><td><input type="hidden" name="trainfrom[]" value="' + from[i] +
                                '" >' + from[i] + '</td><td><input type="hidden" name="trainto[]" value="' + to[i] + '" >' +
                                to[i] + '</td><td><input type="hidden" name="traindate[]" value="' + sdate[i] + '" >' + date[i] +
                                '/' + time[i] + '</td><td><input type="hidden" name="trainclass[]" value="' + tr_class[i] +
                                '" >' + tr_class[i] +
                                '</td><td><button class="btn btn-danger remove"><i class="bx bx-trash"></i></button></td></tr><tr><td colspan="5 "><p class="text-primary" style="font-size:12px;margin:0;">' +
                                preferences + '</p> <input name="preferences[]" type="hidden" value="' + preferences +
                                '"></td></tr>');
                            $("[data-bs-dismiss=modal]").trigger({
                                type: "click"
                            });
                            $('#service-form').trigger('reset');

                        }
                    }
                    break;

                case 'Bus':
                    for (var i = 0; i < bs_class.length; i++) {
                        if ((from[i] != '') && (to[i] != '') && (sdate[i] != '') && (bs_class[i] != '')) {
                            $('.rb').show();
                            $('#Busbody').append('<tr><td><input type="hidden" name="busfrom[]" value="' + from[i] + '" >' +
                                from[i] + '</td><td><input type="hidden" name="busto[]" value="' + to[i] + '" >' + to[i] +
                                '</td><td><input type="hidden" name="busdate[]" value="' + sdate[i] + '" >' + date[i] + '/' +
                                time[i] + '</td><td><input type="hidden" name="busclass[]" value="' + bs_class[i] + '" >' +
                                bs_class[i] +
                                '</td><td><button class="btn btn-danger remove"><i class="bx bx-trash"></i></button></td></tr><tr><td colspan="5 "><p class="text-primary" style="font-size:12px;margin:0;">' +
                                preferences + '</p> <input name="preferences[]" type="hidden" value="' + preferences +
                                '"></td></tr>');
                            $("[data-bs-dismiss=modal]").trigger({
                                type: "click"
                            });
                            $('#service-form').trigger('reset');

                        }
                    }
                    break;
            }
        }



        if (extra_service != '') {
            switch (extra_service) {
                case 'Taxi':
                    $('.rtx').show();
                    if (carRental != 'yes') {
                        $('#Taxibody').append('<tr><td><input type="hidden" name="taxiRequest[]" value="' + extra_service + '" ><input type="hidden" name="airportToHotel[]" value="' + airportToHotel + '" >' + airportToHotel + '</td><td><input type="hidden" name="hotelToCompany[]" value="' + hotelToCompany + '" >' + hotelToCompany + '</td><td> <input type="hidden" name="noOfDays[]" value="' + noOfDays + '" >' + "-" + '</td><td> <input type="hidden" name="tx_class[]" value="' + tx_class + '" >' + "-" + '</td><td><input type="hidden" name="pickupDate[]" value="' + pickupDate + '" >' + "-" + '</td><td> <input type="hidden" name="dropDate[]" value="' + dropDate + '" >' + "-" + '</td><td><button class="btn btn-danger remove"><i class="bx bx-trash"></i></button></td></tr>');
                    } else {
                        $('#Taxibody').append('<tr><td><input type="hidden" name="taxiRequest[]" value="' + extra_service + '" ><input type="hidden" name="airportToHotel[]" value="' + airportToHotel + '" >' + airportToHotel + '</td><td><input type="hidden" name="hotelToCompany[]" value="' + hotelToCompany + '" >' + hotelToCompany + '</td><td> <input type="hidden" name="noOfDays[]" value="' + noOfDays + '" >' + noOfDays + '</td><td> <input type="hidden" name="tx_class[]" value="' + tx_class + '" >' + tx_class + '</td><td><input type="hidden" name="pickupDate[]" value="' + pickupDate + '" >' + pickupDateDate + '/' + pickupDateTime + '</td><td> <input type="hidden" name="dropDate[]" value="' + dropDate + '" >' + dropDateDate + '/' + dropDateTime + '</td><td><button class="btn btn-danger remove"><i class="bx bx-trash"></i></button></td></tr>');
                    }
                    $("[data-bs-dismiss=modal]").trigger({
                        type: "click"
                    });
                    $('#service-form').trigger('reset');

                case 'Hotel':
                    if ((location != '') && (checkIn != '') && (checkOut != '')) {
                        $('.rh').show();
                        $('#Hotelbody').append('<tr><td><input type="hidden" name="location[]" value="' +
                            location + '" >' + location +
                            '</td><td><input type="hidden" name="hotelName[]" value="' +
                            hotelName + '" >' + hotelName +
                            '</td><td><input type="hidden" name="checkin[]" value="' + checkIn + '" >' +
                            checkIndate + " / " + checkIntime +
                            '</td><td><input type="hidden" name="checkout[]" value="' + checkOut + '" >' +
                            checkOutdate + " / " + checkOuttime +
                            '</td><td><button class="btn btn-danger remove"><i class="bx bx-trash"></i></button></td></tr>'
                        );
                        $("[data-bs-dismiss=modal]").trigger({
                            type: "click"
                        });
                        $('#extra-service-form').trigger('reset');
                        // console.log('passed')
                    }
                    break;

                case 'Advance':
                    if ((amount != '')) {
                        $('.ra').show();
                        if (specialApproval != 'no') {
                            $('#Advancebody').append('<tr><td><input type="hidden" name="specialApproval[]" value="' + specialApproval + '" ><input type="hidden" name="amount[]" value="' +
                                amount + '" >' + amount +
                                '</td><td><input type="hidden" name="splAdvance[]" value="' + splAdvance + '" >' +
                                splAdvance +
                                '</td><td><button class="btn btn-danger remove"><i class="bx bx-trash"></i></button></td></tr>'
                            );
                        } else {
                            $('#Advancebody').append('<tr><td><input type="hidden" name="specialApproval[]" value="' + specialApproval + '" ><input type="hidden" name="amount[]" value="' +
                                amount + '" >' + amount +
                                '</td><td><input type="hidden" name="splAdvance[]" value="' + 0 + '" >' +
                                "-" +
                                '</td><td><button class="btn btn-danger remove"><i class="bx bx-trash"></i></button></td></tr>'
                            );
                        }
                        $("[data-bs-dismiss=modal]").trigger({
                            type: "click"
                        });
                        $('#extra-service-form').trigger('reset');
                        // console.log('passed')
                    }
                    break;

                case 'Network':
                    if ((network != '')) {
                        $('.rc').show();
                        $('#Networkbody').append('<tr><td><input type="hidden" name="network[]" value="' +
                            network + '" >' + network +
                            '</td><td><input type="hidden" name="phoneno[]" value="' +
                                phoneno + '" >' + phoneno +
                            '</td><td><button class="btn btn-danger remove"><i class="bx bx-trash"></i></button></td></tr>'
                        );
                        $("[data-bs-dismiss=modal]").trigger({
                            type: "click"
                        });
                        $('#extra-service-form').trigger('reset');
                        // console.log('passed')
                    }
                    break;

                case 'Forex':
                    if ((currency != '') && (forex_amount != '')) {
                        $('.rf').show();
                        $('#Forexbody').append('<tr><td><input type="hidden" name="currency[]" value="' +
                            currency + '" >' + currency +
                            '</td><td><input type="hidden" name="forex_amount[]" value="' + forex_amount +
                            '" >' + forex_amount +
                            '</td><td><button class="btn btn-danger remove"><i class="bx bx-trash"></i></button></td></tr>'
                        );
                        $("[data-bs-dismiss=modal]").trigger({
                            type: "click"
                        });
                        $('#extra-service-form').trigger('reset');
                        // console.log('passed')
                    }
                    break;


                default:
                    // alert('Select Trip Type');
                    break;
            }
        }

    });

    $("body").on("click", ".remove", function() {
        alert('Are you sure for delete this request ?');
        $(this).closest("tr").next("tr").remove();
        $(this).closest("tr").remove();

    });

    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });

    $("body").on("click", ".saveAlert", function() {
        alert(
            'All requests will now be forwarded to the approver for review. Edit options are no longer available.'
        );

    });

    if (($('#flightcount').val()) > 0) {
        $('.rq').show();

    }

    if (($('#traincount').val()) > 0) {
        $('.rt').show();
    }

    if (($('#buscount').val()) > 0) {
        $('.rb').show();
    }

    if (($('#taxicount').val()) > 0) {
        $('.rtx').show();
    }

    if (($('#hotelcount').val()) > 0) {
        $('.rh').show();
    }

    if (($('#advancecount').val()) > 0) {
        $('.ra').show();
    }

    if (($('#networkcount').val()) > 0) {
        $('.rc').show();
    }

    if (($('#forexcount').val()) > 0) {
        $('.rf').show();
    }

</script>
{{-- <script type="text/javascript">
    $('.rq,.rt,.rb,.rtx,.rh,.ra,.rc,.rf').hide();

    $('.service').click(function() {
        var service = this.id
        $('.vehicle').val(service);
        $('.extraService').val(service);
        $('.modal-title').text(function() {

            return "Book a " + service;
        });
        if (service == 'Train') {
            $('.train-form').show();
            $('.flight-form, .bus-form, .taxi-form').hide();
        } else if (service == 'Bus') {
            $('.bus-form').show();
            $('.flight-form, .train-form, .taxi-form').hide();
        } else if (service == 'Flight') {
            $('.flight-form').show();
            $('.bus-form, .train-form, .taxi-form').hide();
        } else if (service == 'Taxi') {
            // $('.taxi-form').show();
            $('.flight-form, .train-form, .bus-form').hide();
        } else if (service == 'Hotel') {
            $('.hotel-form').show();
            $('.advance-form, .network-form, .forex-form').hide();
        } else if (service == 'Advance') {
            $('.advance-form').show();
            $('.hotel-form, .network-form, .forex-form').hide();
        } else if (service == 'Network') {
            $('.network-form').show();
            $('.hotel-form, .advance-form, .forex-form').hide();
        } else if (service == 'Forex') {
            $('.forex-form').show();
            $('.hotel-form, .advance-form, .network-form').hide();
        }
    });


    $("#service-form").submit(function(e) {
        e.preventDefault();
    });


    $('.closeService').on("click", function() {
        $('#service-form, #extra-service-form ').trigger('reset');

    });

    $('.addService').on("click", function() {



        var vehicle = $('.vehicle').val();

        

        var from = $('#from').val();

        var to = $('#to').val();

        var preferences = $('#preferences').val();

        var sdate = $('#date').val();

        var date = sdate.split('T')[0];

        var time = sdate.split('T')[1];

        var tr_class = $('#tr_class').val();


        var fl_class = $('#fl_class').val();

        var bs_class = $('#bs_class').val();

        var tx_class = $('#tx_class').val();

        var extra_service = $('.extraService').val()

        var location = $('#location').val();

        var checkIn = $('#checkIn').val();

        var checkOut = $('#checkOut').val();

        var checkOutdate = checkOut.split('T')[0];
        var checkOuttime = checkOut.split('T')[1];

        var checkIndate = checkIn.split('T')[0];
        var checkIntime = checkIn.split('T')[1];

        var amount = $('#amount').val();

        var purpose = $('#purpose').val();

        var network = $('#network').val();

        var currency = $('#currency').val();

        var forex_amount = $('#forex_amount').val();

        if (from != '') {
            if ((vehicle == 'Flight') && (from != '') && (to != '') && (sdate != '') && (fl_class != '')) {
                $('.rq').show();
                $('#Flightbody').append('<tr><td><input type="hidden" name="flightfrom[]" value="' + from +
                    '" >' + from + '</td><td><input type="hidden" name="flightto[]" value="' + to + '" >' +
                    to + '</td><td><input type="hidden" name="flightdate[]" value="' + sdate + '" >' +
                    date + '/' + time + '</td><td><input type="hidden" name="flightclass[]" value="' +
                    fl_class + '" >' + fl_class +
                    '</td><td><button class="btn btn-danger remove"><i class="bx bx-trash"></i></button></td></tr><tr><td colspan="5 "><p class="text-primary preference" style="font-size:12px;margin:0;">' +
                    preferences + '</p> <input name="preferences[]" type="hidden" value="' + preferences +
                    '"></td></tr>');
                $("[data-bs-dismiss=modal]").trigger({
                    type: "click"
                });
                $('#service-form').trigger('reset');

            } else if ((vehicle == 'Train') && (from != '') && (to != '') && (sdate != '') && (tr_class !=
                    '')) {

                $('.rt').show();
                $('#Trainbody').append('<tr><td><input type="hidden" name="trainfrom[]" value="' + from +
                    '" >' + from + '</td><td><input type="hidden" name="trainto[]" value="' + to + '" >' +
                    to + '</td><td><input type="hidden" name="traindate[]" value="' + sdate + '" >' + date +
                    '/' + time + '</td><td><input type="hidden" name="trainclass[]" value="' + tr_class +
                    '" >' + tr_class +
                    '</td><td><button class="btn btn-danger remove"><i class="bx bx-trash"></i></button></td></tr><tr><td colspan="5 "><p class="text-primary" style="font-size:12px;margin:0;">' +
                    preferences + '</p> <input name="preferences[]" type="hidden" value="' + preferences +
                    '"></td></tr>');
                $("[data-bs-dismiss=modal]").trigger({
                    type: "click"
                });
                $('#service-form').trigger('reset');

            } else if ((vehicle == 'Bus') && (from != '') && (to != '') && (sdate != '') && (bs_class != '')) {
                $('.rb').show();
                $('#Busbody').append('<tr><td><input type="hidden" name="busfrom[]" value="' + from + '" >' +
                    from + '</td><td><input type="hidden" name="busto[]" value="' + to + '" >' + to +
                    '</td><td><input type="hidden" name="busdate[]" value="' + sdate + '" >' + date + '/' +
                    time + '</td><td><input type="hidden" name="busclass[]" value="' + bs_class + '" >' +
                    bs_class +
                    '</td><td><button class="btn btn-danger remove"><i class="bx bx-trash"></i></button></td></tr><tr><td colspan="5 "><p class="text-primary" style="font-size:12px;margin:0;">' +
                    preferences + '</p> <input name="preferences[]" type="hidden" value="' + preferences +
                    '"></td></tr>');
                $("[data-bs-dismiss=modal]").trigger({
                    type: "click"
                });
                $('#service-form').trigger('reset');

            } else if ((vehicle == 'Taxi') && (from != '') && (to != '') && (sdate != '') && (tx_class != '')) {
                $('.rtx').show();
                $('#Taxibody').append('<tr><td><input type="hidden" name="taxifrom[]" value="' + from + '" >' +
                    from + '</td><td><input type="hidden" name="taxito[]" value="' + to + '" >' + to +
                    '</td><td><input type="hidden" name="taxidate[]" value="' + sdate + '" >' + date + '/' +
                    time +
                    '</td><td><button class="btn btn-danger remove"><i class="bx bx-trash"></i></button></td></tr><tr><td colspan="5 "><p class="text-primary" style="font-size:12px;margin:0;">' +
                    preferences + '</p> <input name="preferences[]" type="hidden" value="' + preferences +
                    '"></td></tr>');
                $("[data-bs-dismiss=modal]").trigger({
                    type: "click"
                });
                $('#service-form').trigger('reset');
            }
        }
        if (extra_service != '') {
            switch (extra_service) {
                case 'Hotel':
                    if ((location != '') && (checkIn != '') && (checkOut != '')) {
                        $('.rh').show();
                        $('#Hotelbody').append('<tr><td><input type="hidden" name="location[]" value="' +
                            location + '" >' + location +
                            '</td><td><input type="hidden" name="checkin[]" value="' + checkIn + '" >' +
                            checkIndate + " / " + checkIntime +
                            '</td><td><input type="hidden" name="checkout[]" value="' + checkOut + '" >' +
                            checkOutdate + " / " + checkOuttime +
                            '</td><td><button class="btn btn-danger remove"><i class="bx bx-trash"></i></button></td></tr>'
                        );
                        $("[data-bs-dismiss=modal]").trigger({
                            type: "click"
                        });
                        $('#extra-service-form').trigger('reset');
                        // console.log('passed')
                    }
                    break;

                case 'Advance':
                    if ((amount != '') && (purpose != '')) {
                        $('.ra').show();
                        $('#Advancebody').append('<tr><td><input type="hidden" name="amount[]" value="' +
                            amount + '" >' + amount +
                            '</td><td><input type="hidden" name="apurpose[]" value="' + purpose + '" >' +
                            purpose +
                            '</td><td><button class="btn btn-danger remove"><i class="bx bx-trash"></i></button></td></tr>'
                        );
                        $("[data-bs-dismiss=modal]").trigger({
                            type: "click"
                        });
                        $('#extra-service-form').trigger('reset');
                        // console.log('passed')
                    }
                    break;

                case 'Network':
                    if ((network != '')) {
                        $('.rc').show();
                        $('#Networkbody').append('<tr><td><input type="hidden" name="network[]" value="' +
                            network + '" >' + network +
                            '</td><td><button class="btn btn-danger remove"><i class="bx bx-trash"></i></button></td></tr>'
                        );
                        $("[data-bs-dismiss=modal]").trigger({
                            type: "click"
                        });
                        $('#extra-service-form').trigger('reset');
                        // console.log('passed')
                    }
                    break;

                case 'Forex':
                    if ((currency != '') && (forex_amount != '')) {
                        $('.rf').show();
                        $('#Forexbody').append('<tr><td><input type="hidden" name="currency[]" value="' +
                            currency + '" >' + currency +
                            '</td><td><input type="hidden" name="forex_amount[]" value="' + forex_amount +
                            '" >' + forex_amount +
                            '</td><td><button class="btn btn-danger remove"><i class="bx bx-trash"></i></button></td></tr>'
                        );
                        $("[data-bs-dismiss=modal]").trigger({
                            type: "click"
                        });
                        $('#extra-service-form').trigger('reset');
                        // console.log('passed')
                    }
                    break;


                default:
                    // alert('Select Trip Type');
                    break;
            }
        }

    });

    $("body").on("click", ".remove", function() {
        alert('Are you sure for delete this request ?');
        $(this).closest("tr").next("tr").remove();
        $(this).closest("tr").remove();

    });

    $("body").on("click", ".saveAlert", function() {
        alert(
            'All requests will now be forwarded to the approver for review. Edit options are no longer available.'
        );

    });

    if (($('#flightcount').val()) > 0) {
        $('.rq').show();

    }

    if (($('#traincount').val()) > 0) {
        $('.rt').show();
    }

    if (($('#buscount').val()) > 0) {
        $('.rb').show();
    }

    if (($('#taxicount').val()) > 0) {
        $('.rtx').show();
    }

    if (($('#hotelcount').val()) > 0) {
        $('.rh').show();
    }

    if (($('#advancecount').val()) > 0) {
        $('.ra').show();
    }

    if (($('#networkcount').val()) > 0) {
        $('.rc').show();
    }

    if (($('#forexcount').val()) > 0) {
        $('.rf').show();
    }

</script> --}}
@endsection
