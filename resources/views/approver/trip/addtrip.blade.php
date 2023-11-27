@extends('approver.layouts.app')
@section('title')
    {{__('Add Trip')}}
@endsection
@section('main')
<main id="main" class="main">
    <div class="container">
        
        @foreach($tripDetails as $trip)
        <div class="row mb-4 tbox rounded">
          <div class="col-lg-4 col-md-6 mb-1">
            <h5><span class="text-primary">Trip ID : </span> {{ $trip['tripid'] }}</h5>
          </div>
          <div class="col-lg-4 col-md-6 mb-1 mdright">
            <h5 class="text-primary">{{ $trip['tripname'] }}</h5>
          </div>
          <div class="col-lg-4 d-flex justify-content-between">
            <p><i class="bx bx-calendar text-primary"></i> {{ $trip['trip_fromdate'] }}</p><p><i class="bx bx-refresh fw-bold"></i></p><p><i class="bx bx-calendar text-primary"></i> {{ $trip['trip_todate'] }}</p>
          </div>          
        </div>
        @endforeach
        <div class="row sws mb-4">
          <div class="col-lg-12">
            <h4 class="mb-4">Services</h4>
            <div class="service_card">
                <div class="service shadow text-center" id="Flight" data-bs-toggle="modal" data-bs-target="#form-modal">
                  <i class='bx bxs-plane-alt' ></i>
                  <h5>Book a Flight</h5>
                </div>
                <div class="service shadow text-center" id="Train" data-bs-toggle="modal" data-bs-target="#form-modal">
                    <i class='bx bxs-train'></i>
                    <h5>Book a Train</h5>
                </div>
                <div class="service shadow text-center" id="Bus" data-bs-toggle="modal" data-bs-target="#form-modal">
                  <i class='bx bxs-bus' ></i>
                  <h5>Book a Bus</h5>
                </div>
                <div class="service shadow text-center" id="Taxi" data-bs-toggle="modal" data-bs-target="#form-modal">
                  <i class='bx bxs-taxi' ></i>
                  <h5>Book a Taxi</h5>
                </div>
                <div class="service shadow text-center" id="Hotel" data-bs-toggle="modal" data-bs-target="#extra-form-modal">
                  <i class='bx bxs-hotel' ></i>
                  <h5>Accoummodation</h5>
                </div>
                <div class="service shadow text-center" id="Advance" data-bs-toggle="modal" data-bs-target="#extra-form-modal">
                  <i class='bx bx-rupee' ></i>
                  <h5>Advance</h5>
                </div>
                <div class="service shadow text-center" id="Network" data-bs-toggle="modal"
            data-bs-target="#extra-form-modal">
                  <i class='bx bx-broadcast'></i>
                  <h5>Connectivity</h5>
                </div>
                <div class="service shadow text-center" id="Forex" data-bs-toggle="modal" data-bs-target="#extra-form-modal">
                  <img src="images/cu.svg">
                  <h5>Forex</h5>
                </div>
            </div>
          </div>
        </div>
        <form method="POST" action="{{route('approver.storetrip')}}">
            @csrf
            @method('PUT')
            @foreach($tripDetails as $trip)
            <input type="hidden" name="tripid" value="{{ $trip['tripid'] }}">
            <input type="hidden" name="tripname" value="{{ $trip['tripname'] }}">
            <input type="hidden" name="from_date" value="{{ $trip['trip_fromdate'] }}">
            <input type="hidden" name="to_date" value="{{ $trip['trip_todate'] }}">  
            @endforeach
        <div class="row">
          <div class="col-lg-3"><h4> Purpose Of Trip : </h4></div>
          <div class="col-lg-6"><input type="text" name="purpose" required class=" form-control mb-3" placeholder="Purpose Of Trip"></div>
        </div>
        <div class="row" id="request">
          <div class="col-lg-12">
            <h4 class="mb-4">Request Summary</h4>
            <table class="table rq">
                <thead>
                    <tr>
                       <td class="text-center" colspan="5">
                           <h6 class="headdiv"> <i class="bx bxs-plane-alt"></i> Flight Request</h6>
                       </td> 
                    </tr>
                    <tr>
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
                       <td class="text-center" colspan="5">
                           <h6 class="headdiv"> <i class='bx bxs-train'></i> Train Request</h6>
                       </td> 
                    </tr>
                    <tr>
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
                       <td class="text-center" colspan="5">
                           <h6 class="headdiv"> <i class='bx bxs-bus' ></i> Bus Request</h6>
                       </td> 
                    </tr>
                    <tr>
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
                       <td class="text-center" colspan="5">
                           <h6 class="headdiv"> <i class='bx bxs-taxi' ></i> Taxi Request</h6>
                       </td> 
                    </tr>
                    <tr>
                        <td>Pickup</td>
                        <td>Drop</td>
                        <td>Date/Time</td>
                        <td>Taxi Type</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody id="Taxibody">
                    
                </tbody>
            </table>
            <table class="table rh">
                <thead>
                    <tr>
                       <td class="text-center" colspan="4">
                           <h6 class="headdiv"> <i class='bx bxs-hotel' ></i> Accomadation Request</h6>
                       </td> 
                    </tr>
                    <tr>
                        <td>Location</td>
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
                       <td class="text-center" colspan="4">
                           <h6 class="headdiv"> <i class='bx bx-rupee' ></i> Advance Request</h6>
                       </td> 
                    </tr>
                    <tr>
                        <td>Amount</td>
                        <td>Purpose</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody id="Advancebody">
                    
                </tbody>
            </table>
            <table class="table rc">
                <thead>
                    <tr>
                       <td class="text-center" colspan="4">
                           <h6 class="headdiv"><i class='bx bx-broadcast'></i> Connectivity Request</h6>
                       </td> 
                    </tr>
                    <tr>
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
                       <td class="text-center" colspan="4">
                           <h6 class="headdiv"> <img src="images/cu.svg" style="background:#0072bc;"> Forex Request</h6>
                       </td> 
                    </tr>
                    <tr>
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
                <input type="submit" name="submit" class="btn btn-primary" value="Save">
                <a href="{{route('approver.home')}}" class="btn btn-danger">Cancel</a></center>
          </div>
        </div>
        </form>
    </div>
</main><!-- End #main -->
  <x-modal.requestmodel />
  <x-modal.servicemodel />
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $('.rq,.rt,.rb,.rtx,.rh,.ra,.rc,.rf').hide();
    $('.service').click(function(){
      var service = this.id
      $('.vehicle').val(service);
      $('.extraService').val(service);
      $('.modal-title').text(function(){
        return "Book a " + service
      });
      if (service == 'Train'){
        $('.train-form').show();
        $('.flight-form, .bus-form, .taxi-form').hide();
      }
      else if(service == 'Bus'){
        console.log(this.id)
        $('.bus-form').show();
        $('.flight-form, .train-form, .taxi-form').hide();
      }

      else if(service == 'Flight'){
        console.log(this.id)
        $('.flight-form').show();
        $('.bus-form, .train-form, .taxi-form').hide();
      }

      else if(service == 'Taxi'){
        console.log(this.id)
        $('.taxi-form').show();
        $('.flight-form, .train-form, .bus-form').hide();
      }
      else if (service == 'Hotel') {
        $('.hotel-form').show();
        $('.advance-form, .network-form, .forex-form').hide();
      }

      else if (service == 'Advance') {
        $('.advance-form').show();
        $('.hotel-form, .network-form, .forex-form').hide();
      }

      else if (service == 'Network') {
        $('.network-form').show();
        $('.hotel-form, .advance-form, .forex-form').hide();
      }

      else if (service == 'Forex') {
        $('.forex-form').show();
        $('.hotel-form, .advance-form, .network-form').hide();
      }
    });


    $("#service-form").submit(function (e) {
      e.preventDefault();
    });
    
    $('.single, .round').hide();
     $('#triptype').on('change', function () {
      var type = $(this).val();
      if (type == 'single') {
        $('.single').show();
        $('.round').hide();
      }
      else if (type == 'round') {
        $('.single,.round').show();
      }
      else {
        $('.single').hide();
        $('.round').hide();
      }
    });

$('.closeService').on("click",function(){
  $('#service-form, #extra-service-form ').trigger('reset');
  $('.single, .round').hide();
});

$('.addService').on("click", function () {
    
    var triptype = $('#triptype').val();

    var vehicle = $('.vehicle').val();
      
    var from = $('#from').val();

    var to = $('#to').val();

    var sdate = $('#date').val();

    var date = sdate.split('T')[0];

    var time = sdate.split('T')[1];

    var tr_class = $('#tr_class').val();


    var fl_class = $('#fl_class').val();

    var bs_class = $('#bs_class').val();

    var tx_class = $('#tx_class').val();

    var r_from = $('#r_from').val()

    var r_to = $('#r_to').val();

    var rs_date = $('#r_date').val();

    var r_date = rs_date.split('T')[0];

    var r_time = rs_date.split('T')[1];

    var tr_r_class = $('#tr_r_class').val();

    var fl_r_class = $('#fl_r_class').val();

    var bs_r_class = $('#bs_r_class').val();

    var tx_r_class = $('#tx_r_class').val();

    var extra_service = $('.extraService').val()

      var location = $('#location').val();

      var checkIn = $('#checkIn').val();

      var checkOut = $('#checkOut').val();

      var amount = $('#amount').val();

      var purpose = $('#purpose').val();

      var network = $('#network').val();

      var currency = $('#currency').val();

      var forex_amount = $('#forex_amount').val();

    if (triptype == 'single') {
        if((vehicle == 'Flight') && (from != '') && (to != '') && (sdate != '') && (fl_class != ''))
        {   
            $('.rq').show();
            $('#Flightbody').append('<tr><td><input type="hidden" name="flightfrom[]" value="'+ from +'" >'+ from +'</td><td><input type="hidden" name="flightto[]" value="'+ to +'" >'+ to +'</td><td><input type="hidden" name="flightdate[]" value="'+ sdate +'" >'+ date +'/'+ time +'</td><td><input type="hidden" name="flightclass[]" value="'+ fl_class +'" >'+ fl_class +'</td><td><button class="btn btn-danger remove"><i class="bx bx-trash"></i></button></td></tr>');
            $("[data-bs-dismiss=modal]").trigger({ type: "click" });
            $('#service-form').trigger('reset');
            $('.single, .round').hide();

        }else if ((vehicle == 'Train') && (from != '') && (to != '') && (sdate != '') && (tr_class != ''))
        {

          $('.rt').show();
            $('#Trainbody').append('<tr><td><input type="hidden" name="trainfrom[]" value="'+ from +'" >'+ from +'</td><td><input type="hidden" name="trainto[]" value="'+ to +'" >'+ to +'</td><td><input type="hidden" name="traindate[]" value="'+ sdate +'" >'+ date +'/'+ time +'</td><td><input type="hidden" name="trainclass[]" value="'+ tr_class +'" >'+ tr_class +'</td><td><button class="btn btn-danger remove"><i class="bx bx-trash"></i></button></td></tr>');
            $("[data-bs-dismiss=modal]").trigger({ type: "click" });
            $('#service-form').trigger('reset');
            $('.single, .round').hide();

        }else if ((vehicle == 'Bus') && (from != '') && (to != '') && (sdate != '') && (bs_class != ''))
        {
          $('.rb').show();
            $('#Busbody').append('<tr><td><input type="hidden" name="busfrom[]" value="'+ from +'" >'+ from +'</td><td><input type="hidden" name="busto[]" value="'+ to +'" >'+ to +'</td><td><input type="hidden" name="busdate[]" value="'+ sdate +'" >'+ date +'/'+ time +'</td><td><input type="hidden" name="busclass[]" value="'+ bs_class +'" >'+ bs_class +'</td><td><button class="btn btn-danger remove"><i class="bx bx-trash"></i></button></td></tr>');
            $("[data-bs-dismiss=modal]").trigger({ type: "click" });
            $('#service-form').trigger('reset');
            $('.single, .round').hide();

        }else if ((vehicle == 'Taxi') && (from != '') && (to != '') && (sdate != '') && (tx_class != ''))
        {
          $('.rtx').show();
          $('#Taxibody').append('<tr><td><input type="hidden" name="taxifrom[]" value="'+ from +'" >'+ from +'</td><td><input type="hidden" name="taxito[]" value="'+ to +'" >'+ to +'</td><td><input type="hidden" name="taxidate[]" value="'+ sdate +'" >'+ date +'/'+ time +'</td><td><input type="hidden" name="taxiclass[]" value="'+ tx_class +'" >'+ tx_class +'</td><td><button class="btn btn-danger remove"><i class="bx bx-trash"></i></button></td></tr>');
            $("[data-bs-dismiss=modal]").trigger({ type: "click" });
            $('#service-form').trigger('reset');
            $('.single, .round').hide();
        }else{
            alert('Please Select All Field');
        }
    }
    else if(triptype == 'round')
    {

        if((vehicle == 'Flight') && (from != '') && (to != '') && (sdate != '') && (fl_class != '') && (r_from != '') && (r_to != '') && (rs_date != '') && (fl_r_class != ''))
        {   
            $('.rq').show();
            $('#Flightbody').append('<tr><td><input type="hidden" name="flightfrom[]" value="'+ from +'" >'+ from +'</td><td><input type="hidden" name="flightto[]" value="'+ to +'" >'+ to +'</td><td><input type="hidden" name="flightdate[]" value="'+ sdate +'" >'+ date +'/'+ time +'</td><td><input type="hidden" name="flightclass[]" value="'+ fl_class +'" >'+ fl_class +'</td><td><button class="btn btn-danger remove"><i class="bx bx-trash"></i></button></td></tr><tr><td><input type="hidden" name="flightfrom[]" value="'+ r_from +'" >'+ r_from +'</td><td><input type="hidden" name="flightto[]" value="'+ r_to +'" >'+ r_to +'</td><td><input type="hidden" name="flightdate[]" value="'+ rs_date +'" >'+ r_date +'/'+ r_time +'</td><td><input type="hidden" name="flightclass[]" value="'+ fl_r_class +'" >'+ fl_r_class +'</td><td><button class="btn btn-danger remove"><i class="bx bx-trash"></i></button></td></tr>');
            $("[data-bs-dismiss=modal]").trigger({ type: "click" });
            $('#service-form').trigger('reset');
            $('.single, .round').hide();

        }else if ((vehicle == 'Train') && (from != '') && (to != '') && (sdate != '') && (tr_class != '') && (r_from != '') && (r_to != '') && (rs_date != '') && (tr_r_class != ''))
        {
            $('.rt').show();
            $('#Trainbody').append('<tr><td><input type="hidden" name="trainfrom[]" value="'+ from +'" >'+ from +'</td><td><input type="hidden" name="trainto[]" value="'+ to +'" >'+ to +'</td><td><input type="hidden" name="traindate[]" value="'+ sdate +'" >'+ date +'/'+ time +'</td><td><input type="hidden" name="trainclass[]" value="'+ tr_class +'" >'+ tr_class +'</td><td><button class="btn btn-danger remove"><i class="bx bx-trash"></i></button></td></tr><tr><td><input type="hidden" name="trainfrom[]" value="'+ r_from +'" >'+ r_from +'</td><td><input type="hidden" name="trainto[]" value="'+ r_to +'" >'+ r_to +'</td><td><input type="hidden" name="traindate[]" value="'+ rs_date +'" >'+ r_date +'/'+ r_time +'</td><td><input type="hidden" name="trainclass[]" value="'+ tr_r_class +'" >'+ tr_r_class +'</td><td><button class="btn btn-danger remove"><i class="bx bx-trash"></i></button></td></tr>');
            $("[data-bs-dismiss=modal]").trigger({ type: "click" });
            $('#service-form').trigger('reset');
            $('.single, .round').hide();
        }else if ((vehicle == 'Bus') && (from != '') && (to != '') && (sdate != '') && (bs_class != '') && (r_from != '') && (r_to != '') && (rs_date != '') && (bs_r_class != ''))
        {
          $('.rb').show();
            $('#Busbody').append('<tr><td><input type="hidden" name="busfrom[]" value="'+ from +'" >'+ from +'</td><td><input type="hidden" name="busto[]" value="'+ to +'" >'+ to +'</td><td><input type="hidden" name="busdate[]" value="'+ sdate +'" >'+ date +'/'+ time +'</td><td><input type="hidden" name="busclass[]" value="'+ bs_class +'" >'+ bs_class +'</td><td><button class="btn btn-danger remove"><i class="bx bx-trash"></i></button></td></tr><tr><td><input type="hidden" name="busfrom[]" value="'+ r_from +'" >'+ r_from +'</td><td><input type="hidden" name="busto[]" value="'+ r_to +'" >'+ r_to +'</td><td><input type="hidden" name="busdate[]" value="'+ rs_date +'" >'+ r_date +'/'+ r_time +'</td><td><input type="hidden" name="busclass[]" value="'+ bs_r_class +'" >'+ bs_r_class +'</td><td><button class="btn btn-danger remove"><i class="bx bx-trash"></i></button></td></tr>');
            $("[data-bs-dismiss=modal]").trigger({ type: "click" });
            $('#service-form').trigger('reset');
            $('.single, .round').hide();

        }else if ((vehicle == 'Taxi') && (from != '') && (to != '') && (sdate != '') && (tx_class != '') && (r_from != '') && (r_to != '') && (rs_date != '') && (tx_r_class != ''))
        {
          $('.rtx').show();
            $('#Taxibody').append('<tr><td><input type="hidden" name="taxifrom[]" value="'+ from +'" >'+ from +'</td><td><input type="hidden" name="taxito[]" value="'+ to +'" >'+ to +'</td><td><input type="hidden" name="taxidate[]" value="'+ sdate +'" >'+ date +'/'+ time +'</td><td><input type="hidden" name="taxiclass[]" value="'+ tx_class +'" >'+ tx_class +'</td><td><button class="btn btn-danger remove"><i class="bx bx-trash"></i></button></td></tr><tr><td><input type="hidden" name="taxifrom[]" value="'+ r_from +'" >'+ r_from +'</td><td><input type="hidden" name="taxito[]" value="'+ r_to +'" >'+ r_to +'</td><td><input type="hidden" name="taxidate[]" value="'+ rs_date +'" >'+ r_date +'/'+ r_time +'</td><td><input type="hidden" name="taxiclass[]" value="'+ tx_r_class +'" >'+ tx_r_class +'</td><td><button class="btn btn-danger remove"><i class="bx bx-trash"></i></button></td></tr>');
            $("[data-bs-dismiss=modal]").trigger({ type: "click" });
            $('#service-form').trigger('reset');
            $('.single, .round').hide();
        }else{
          alert('Please Select All Field');
        }
    }
    else
    {
        switch (extra_service) {
        case 'Hotel':
          if ((location != '') && (checkIn != '') && (checkOut != '')) {
            $('.rh').show();
            $('#Hotelbody').append('<tr><td><input type="hidden" name="location[]" value="'+ location +'" >'+ location +'</td><td><input type="hidden" name="checkin[]" value="'+ checkIn +'" >'+ checkIn +'</td><td><input type="hidden" name="checkout[]" value="'+ checkOut +'" >'+ checkOut +'</td><td><button class="btn btn-danger remove"><i class="bx bx-trash"></i></button></td></tr>');
            $("[data-bs-dismiss=modal]").trigger({ type: "click" });
            $('#extra-service-form').trigger('reset');
            // console.log('passed')
          }
          break;

        case 'Advance':
          if ((amount != '') && (purpose != '')) {
            $('.ra').show();
            $('#Advancebody').append('<tr><td><input type="hidden" name="amount[]" value="'+ amount +'" >'+ amount +'</td><td><input type="hidden" name="apurpose[]" value="'+ purpose +'" >'+ purpose +'</td><td><button class="btn btn-danger remove"><i class="bx bx-trash"></i></button></td></tr>');
            $("[data-bs-dismiss=modal]").trigger({ type: "click" });
            $('#extra-service-form').trigger('reset');
            // console.log('passed')
          }
          break;

        case 'Network':
          if ( (network != '')) {
            $('.rc').show();
            $('#Networkbody').append('<tr><td><input type="hidden" name="network[]" value="'+ network +'" >'+ network +'</td><td><button class="btn btn-danger remove"><i class="bx bx-trash"></i></button></td></tr>');
            $("[data-bs-dismiss=modal]").trigger({ type: "click" });
            $('#extra-service-form').trigger('reset');
            // console.log('passed')
          }
          break;

        case 'Forex':
          if ((currency != '') && (forex_amount != '')) {
            $('.rf').show();
            $('#Forexbody').append('<tr><td><input type="hidden" name="currency[]" value="'+ currency +'" >'+ currency +'</td><td><input type="hidden" name="forex_amount[]" value="'+ forex_amount +'" >'+ forex_amount +'</td><td><button class="btn btn-danger remove"><i class="bx bx-trash"></i></button></td></tr>');
            $("[data-bs-dismiss=modal]").trigger({ type: "click" });
            $('#extra-service-form').trigger('reset');
            // console.log('passed')
          }
          break;


        default:
          alert('Select Trip Type');
          break;
      }
    }


    



});

 $("body").on("click",".remove",function(){
          $(this).closest("tr").remove();
        });

</script>
@endsection