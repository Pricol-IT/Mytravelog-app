@extends('approver.layouts.app')
@section('title')
{{ __('Add Trip') }}
@endsection
@section('main')
<main id="main" class="main">

    @php
    $tripDetails[]=[
    'tripid' => $trip->tripid,
    'tripname' => $trip->tripname,
    'trip_fromdate' => $trip->tfdate,
    'trip_todate' => $trip->ttdate,
    'trip_type' => $trip->trip_type
    ]
    @endphp
    <x-container.draftcontainer :trip="$trip" />
</main><!-- End #main -->
<x-modal.requestmodel :tripDetails="$tripDetails" />
<x-modal.servicemodel />
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="{{asset('assets/js/addtripscript.js')}}"></script>
<script type="text/javascript">
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

@endsection
