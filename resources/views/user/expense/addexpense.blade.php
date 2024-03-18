@extends('user.layouts.app')
@section('title')
{{ __('Add Trip') }}
@endsection
@section('main')
<main id="main" class="main">

    {{-- @php
    $usergrade = auth()->user()->userdetail->grade;
    $column = explode (",", App\Models\Grade::where('levels',$usergrade)->pluck('select_column')[0]);
    $selectdata = App\Models\DomesticPolicy::select('id',$column[0],$column[1],$column[2])->get();
    $tier1=0;
    $tier2=0;
    $tier3=0;
    // for international
    $level=App\Models\Grade::select('category')->where('levels',$usergrade)->first();
    $internationalstaydata=App\Models\InternationalPolicy::where('level',$level->category)->where('components','Hotel and Stay arrangements')->first();
    $internationalallowancedata=App\Models\InternationalPolicy::where('level',$level->category)->where('components','Per Diem & Incidental Allowance')->first();
    $allowance=[$internationalstaydata,$internationalallowancedata];
    @endphp --}}
    {{-- {{$level}}
    {{$internationalstaydata}}
    {{$internationalallowancedata}} --}}
    {{-- @php
    for ($x = 4; $x<= 9; $x++)
    {
        $dataArray=json_decode($selectdata[$x], true);
        $valuesArray=array_values($dataArray);
        $tier1+=$valuesArray[1];
        $tier2+=$valuesArray[2];
        $tier3+=$valuesArray[3];
        }
        @endphp --}}
    <div class="container">

        <div class="row sws mb-4">
            <div class="col-lg-12">
                <h4 class="mb-4">Services</h4>
                <div class="service_card">
                    {{-- @if ($trip['trip_type'] === 'international')
                    <div class="service shadow text-center" id="Flight" data-bs-toggle="modal" data-bs-target="#form-modal">
                        <i class='bx bxs-plane-alt'></i>
                        <h5>Book a Flight</h5>
                    </div>
                    @elseif(!in_array(ucfirst($usergrade),['L5','L6','L7','L8'])) --}}
                    <div class="service shadow text-center" id="Flight" data-bs-toggle="modal" data-bs-target="#form-modal">
                        <i class='bx bxs-plane-alt'></i>
                        <h5> Flight</h5>
                    </div>
                    {{-- @endif --}}
                    {{--
                    @if ($trip['trip_type'] === 'domestic') --}}
                    <div class="service shadow text-center" id="Train" data-bs-toggle="modal" data-bs-target="#form-modal">
                        <i class='bx bxs-train'></i>
                        <h5> Train</h5>
                    </div>
                    <div class="service shadow text-center" id="Bus" data-bs-toggle="modal" data-bs-target="#form-modal">
                        <i class='bx bxs-bus'></i>
                        <h5> Bus</h5>
                    </div>
                    <div class="service shadow text-center" id="Taxi" data-bs-toggle="modal" data-bs-target="#extra-form-modal">
                        <i class='bx bxs-taxi'></i>
                        <h5> Taxi</h5>
                    </div>
                    {{-- @endif --}}
                    <div class="service shadow text-center" id="Hotel" data-bs-toggle="modal" data-bs-target="#extra-form-modal">
                        <i class='bx bxs-hotel'></i>
                        <h5>Accommodation</h5>
                    </div>
                    {{-- @if ($trip['trip_type'] === 'domestic') --}}
                    {{-- <div class="service shadow text-center" id="Advance" data-bs-toggle="modal" data-bs-target="#extra-form-modal">
                        <i class='bx bx-rupee'></i>
                        <h5>Advance</h5>
                    </div> --}}
                    {{-- @endif --}}
                    {{-- @if ($trip['trip_type'] === 'international') --}}
                    <div class="service shadow text-center" id="Network" data-bs-toggle="modal" data-bs-target="#extra-form-modal">
                        <i class='bx bx-broadcast'></i>
                        <h5>Connectivity</h5>
                    </div>

                    {{-- <div class="service shadow text-center" id="Forex" data-bs-toggle="modal" data-bs-target="#extra-form-modal">
                        <img src="{{ asset('images/cu.svg') }} ">
                    <h5>Forex</h5>
                </div> --}}
                {{-- @endif --}}
            </div>
        </div>
    </div>
    {{-- @php
            $route=getRouteName();
            $homeroute=getHomeRouteName();
        @endphp --}}
    <form method="POST" action="{{route('storeexpense')}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        {{-- @foreach ($tripDetails as $trip)
            <input type="hidden" name="tripid" value="{{ $trip['tripid'] }}">
        <input type="hidden" name="tripname" value="{{ $trip['tripname'] }}">
        <input type="hidden" name="from_date" value="{{ $trip['trip_fromdate'] }}">
        <input type="hidden" name="to_date" value="{{ $trip['trip_todate'] }}">
        <input type="hidden" name="trip_type" value="{{ $trip['trip_type'] }}">
        @endforeach --}}
        <input type="hidden" name="tripid" value="{{ $tripid }}">
        <div class="row" id="request">
            <div class="col-lg-12">
                <h4 class="mb-4">Added Expenses</h4>
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
                            <td>Ticket Cost</td>
                            <td>E-ticket</td>
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
                            <td>Ticket Cost</td>
                            <td>E-ticket</td>
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
                            <td>Ticket Cost</td>
                            <td>E-ticket</td>
                            <td></td>
                        </tr>
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
                            <td>Origin</td>
                            <td>Destination</td>
                            <td>Total cost</td>
                            <td>Invoice</td>
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
                            <td>Total Cost</td>
                            <td>Invoice</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody id="Hotelbody">

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
                            <td>International roaming days</td>
                            <td>Mobile number</td>
                            <td>Total Cost</td>
                            <td>Invoice</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody id="Networkbody">

                    </tbody>
                </table>

            </div>

        </div>
        <div class="row">
            <div class="col-lg-12">
                <center>
                    <input type="submit" name="submit" class="btn btn-primary" value="View">
                    <a href="#" class="btn btn-danger">Cancel</a>
                </center>
            </div>
        </div>
    </form>


</main><!-- End #main -->
{{--
<x-modal.requestmodel :tripDetails="$tripDetails" :usergrade="$usergrade" />
<x-modal.servicemodel :tier="[$tier3,$tier2,$tier1]" :allowance="$allowance"/> --}}
<div class="modal fade fmodal" id="form-modal" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-expense-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id='service-form' action="#">
                    <div class=" row">

                        <input type="hidden" value="" class="vehicle">

                        <div class="row">
                            <div class="col-6">
                                <label>From</label>
                                <input type="text" required class="form-control from" name="from" id="from" placeholder="Origin">
                            </div>
                            <div class="col-6">
                                <label>To</label>
                                <input type="text" required class="form-control to" name="to" id="to" placeholder="Destination">
                            </div>


                            <div class="col-12 mb-2">
                                <label>Total Ticket Cost</label>
                                <input type="number" required class="form-control cost" min="0" name="cost" id="cost" placeholder="price">
                            </div>

                            <div class="col-12">
                                <label>Choose payment method</label>
                                <select class="form-control" required name="payment" id="payment">
                                    <option value=""> Select method</option>
                                    <option value="Economy">Company Card</option>
                                    <option value="Economy">Self Paid</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br>
                    <center>
                        <button type="button" class="btn btn-secondary closeService" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary addExpense">Add</button>

                    </center>
                    <br>
                </form>

            </div>

        </div>
    </div>
</div>




<div class="modal fade fmodal" id="extra-form-modal" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-expense-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id='extra-service-form' action="#">
                    <input type="hidden" value="" class="extraService">


                    <div class="row">
                        <div class="row taxi-form">
                            <div class="col-6">
                                <label>From</label>
                                <input type="text" required class="form-control from" name="from" id="efrom" placeholder="Origin">
                            </div>
                            <div class="col-6">
                                <label>To</label>
                                <input type="text" required class="form-control to" name="to" id="eto" placeholder="Destination">
                            </div>
                        </div>





                        <div class="row hotel-form">
                            <div class="col-6">
                                <label>Location</label>
                                <input type="text" required class="form-control location" name="location" id="location" placeholder="preferred location">
                            </div>
                            <div class="col-6">
                                <label>Hotel name</label>
                                <input type="text" required class="form-control hotelName" name="hotelName" id="hotelName" placeholder="preferred hotel name">
                            </div>
                        </div>




                        <div class="col-6 mb-2 network-form">
                            <label>International roaming</label>
                            <input type="number" required class="form-control" name="network" id="network" placeholder="Enter the no.of.days">
                        </div>

                        <div class="col-6 mb-2 network-form">
                            <label>Mobile Number</label>
                            <input type="text" required class="form-control" name="mobile" id="mobile" placeholder="Enter the mobile number">
                        </div>

                        <div class="col-12 mb-2">
                            <label>Total Ticket Cost</label>
                            <input type="number" required class="form-control cost" min="0" name="cost" id="ecost" placeholder="price">
                        </div>

                        <div class="col-12">
                            <label>Choose payment method</label>
                            <select class="form-control" required name="payment" id="payment">
                                <option value=""> Select method</option>
                                <option value="Economy">Company Card</option>
                                <option value="Economy">Self Paid</option>
                            </select>
                        </div>




                    </div>

                    <br>
                    <center>
                        <button type="button" class="btn btn-secondary closeService" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary addExpense">Add</button>
                    </center>
                    <br>
                </form>
            </div>

        </div>
    </div>
</div>




@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="{{asset('assets/js/addtripscript.js')}}"></script>


@endsection
