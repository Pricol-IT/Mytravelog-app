@extends('user.layouts.app')
@section('title')
{{ __('Add Trip') }}
@endsection
@section('main')
<main id="main" class="main">
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

                    @if ($trip['tripType'] === 'domestic')
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
                    @if ($trip['tripType'] === 'domestic')
                    <div class="service shadow text-center" id="Advance" data-bs-toggle="modal" data-bs-target="#extra-form-modal">
                        <i class='bx bx-rupee'></i>
                        <h5>Advance</h5>
                    </div>
                    @endif
                    @if ($trip['tripType'] === 'international')
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
        <form method="POST" action="{{ route('storetrip') }}">
            @csrf
            @method('PUT')
            @foreach ($tripDetails as $trip)
            <input type="hidden" name="tripid" value="{{ $trip['tripid'] }}">
            <input type="hidden" name="tripname" value="{{ $trip['tripname'] }}">
            <input type="hidden" name="from_date" value="{{ $trip['trip_fromdate'] }}">
            <input type="hidden" name="to_date" value="{{ $trip['trip_todate'] }}">
            <input type="hidden" name="trip_type" value="{{ $trip['tripType'] }}">
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
                                <td>Connectivity</td>
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
                        <input type="submit" name="submit" class="btn btn-primary" value="Send for Approval">
                        <input type="submit" name="submit" class="btn btn-secondary" value="Save My Trip">
                        <a href="{{ route('user.home') }}" class="btn btn-danger">Cancel</a>
                    </center>
                </div>
            </div>
        </form>
    </div>
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

    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });

</script>
@endsection
