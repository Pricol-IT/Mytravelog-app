@extends('user.layouts.app')
@section('title')
{{ __('Add Trip') }}
@endsection
@section('main')
<main id="main" class="main">

    <x-container.addtripcontainer :tripDetails="$tripDetails" />

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
