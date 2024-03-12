@extends('user.layouts.app')
@section('title')
{{ __('My Trip Details') }}
@endsection
@section('main')
<main id="main" class="main">
    <section class="section">
        <div class="row mb-4 tbox rounded">
            <div class="col-lg-4 col-md-6 mb-1">
                <h5><span class="fw-bold text-primary">Trip ID:</span> {{ $trip->tripid }}</h5>
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
        <div class="row mb-4 tbox rounded">
            <div class="col-lg-6 col-md-6 mb-1">
                <h5><span class="fw-bold text-primary">Purpose Of Trip:</span> {{ $trip->purpose }}</h5>
            </div>
            <div class="col-lg-6 col-md-6 mb-1 mdright">
                <h5><span class="text-primary">Status : </span> {{ ucfirst($trip->status) }}</h5>
            </div>
        </div>
        <div class="row" id="request">
            <div class="col-lg-12">
                <div class="d-flex justify-content-between"><h4 class="">Expense Summary</h4><a href="{{ route('addexpense') }}" class="btn btn-primary text-center"><i class="bi bi-plus-lg"></i>   Add Expense</a> </div>

                @if ($trip->flight->isNotEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <td colspan="4">
                                <h6 class="text-primary"> <i class="bx bxs-plane-alt"></i> Flight Request</h6>
                            </td>
                        </tr>
                        <tr class="fw-bold">
                            <td>Origin</td>
                            <td>Destination</td>
                            <td>Date/Time</td>
                            <td>Class</td>
                            <td>Ticket Cost</td>
                        </tr>
                    </thead>
                    <tbody id="Flightbody">
                        @foreach ($trip->flight as $flight)
                        <tr>
                            <td>{{ $flight->origin }}
                            <td>{{ $flight->destination }}</td>
                            <td> {{ split_timestamp($flight->preferred_date)[0] }} /
                                {{ split_timestamp($flight->preferred_date)[1] }}</td>
                            <td>{{ $flight->trip_class }}</td>
                            <td>₹8316</td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
                @endif
                @if ($trip->train->isNotEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <td colspan="4">
                                <h6 class="text-primary"> <i class='bx bxs-train'></i> Train Request</h6>
                            </td>
                        </tr>
                        <tr class="fw-bold">
                            <td>Origin</td>
                            <td>Destination</td>
                            <td>Date/Time</td>
                            <td>Class</td>
                            <td>Ticket Cost</td>
                        </tr>
                    </thead>
                    <tbody id="Trainbody">
                        @foreach ($trip->train as $train)
                        <tr>
                            <td>{{ $train->origin }}</td>
                            <td>{{ $train->destination }}</td>
                            <td>{{ $train->preferred_date }} </td>
                            <td>{{ $train->trip_class }}</td>
                            <td>₹421</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-primary" style="font-size:12px;margin:0;">
                                {{ $train->preferences }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
                @if ($trip->bus->isNotEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <td colspan="4">
                                <h6 class="text-primary"> <i class='bx bxs-bus'></i> Bus Request</h6>
                            </td>
                        </tr>
                        <tr class="fw-bold">
                            <td>Origin</td>
                            <td>Destination</td>
                            <td>Date/Time</td>
                            <td>Class</td>
                            <td>Ticket Cost</td>
                        </tr>
                    </thead>
                    <tbody id="Busbody">
                        @foreach ($trip->bus as $bus)
                        <tr>
                            <td>{{ $bus->origin }}</td>
                            <td>{{ $bus->destination }}</td>
                            <td>{{ $bus->preferred_date }}</td>
                            <td>{{ $bus->trip_class }}</td>
                            <td>₹841</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-primary" style="font-size:12px;margin:0;">
                                {{ $bus->preferences }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
                @if ($trip->taxi->isNotEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <td colspan="6">
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
                            <td>Total Cost</td>
                        </tr>
                    </thead>
                    <tbody id="Taxibody">
                        @foreach ($trip->taxi as $taxi)
                        <tr>
                            <td>{{ $taxi->airport_to_hotel }}</td>
                            <td>{{ $taxi->hotel_to_company }}</td>
                            <td>{{ $taxi->no_of_days }}</td>
                            <td>{{ $taxi->class }}</td>
                            <td>{{ $taxi->pick_date }}</td>
                            <td>{{ $taxi->drop_date }}</td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
                @endif
                @if ($trip->accommodation->isNotEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <td colspan="4">
                                <h6 class="text-primary"> <i class='bx bxs-hotel'></i> Accomadation Request</h6>
                            </td>
                        </tr>
                        <tr class="fw-bold">
                            <td>Location</td>
                            <td>Hotel Name</td>
                            <td>Check-In</td>
                            <td>Check-Out</td>
                            <td>Total Cost</td>
                        </tr>
                    </thead>
                    <tbody id="Hotelbody">
                        @foreach ($trip->accommodation as $accommodation)
                        <tr>
                            <td>{{ $accommodation->location }}</td>
                            <td>{{ $accommodation->hotel_name }}</td>
                            <td>{{ $accommodation->checkin }}</td>
                            <td>{{ $accommodation->checkout }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
                @if ($trip->advance->isNotEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <td colspan="2">
                                <h6 class="text-primary"> <i class='bx bx-rupee'></i> Advance Request</h6>
                            </td>
                        </tr>
                        <tr class="fw-bold">
                            <td>Amount</td>
                            <td>Special Advance</td>
                        </tr>
                    </thead>
                    <tbody id="Advancebody">

                        @foreach ($trip->advance as $advance)
                        <tr>
                            <td>{{ $advance->amount }}</td>
                            <td>{{ $advance->special_amount }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
                @if ($trip->connectivity->isNotEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <td colspan="2">
                                <h6 class="text-primary"><i class='bx bx-broadcast'></i> Connectivity Request</h6>
                            </td>
                        </tr>
                        <tr class="fw-bold">
                            <td>International roaming</td>
                            <td>Mobile Number</td>
                            <td>Total Cost</td>

                        </tr>
                    </thead>
                    <tbody id="Networkbody">
                        @foreach ($trip->connectivity as $connectivity)
                        <tr>
                            <td>{{ $connectivity->international_roaming }}</td>
                            <td>{{ $connectivity->mobile_number }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
                @if ($trip->forex->isNotEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <td colspan="2">
                                <h6 class="text-primary"> <img src="{{ asset('images/cu.svg') }}" style="background:#0072bc;"> Forex Request</h6>
                            </td>
                        </tr>
                        <tr class="fw-bold">
                            <td>Currency</td>
                            <td>Amount</td>
                        </tr>
                    </thead>
                    <tbody id="Forexbody">
                        @foreach ($trip->forex as $forex)
                        <tr>
                            <td>{{ $forex->currency }}</td>
                            <td>{{ $forex->amount }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>

            <div class="col-lg-12">
                <div class="created-log bg-white p-3">
                    <div class="date-log d-flex justify-content-between">
                        <p><span class="text-primary">Created at: </span>{{ formatTime($trip->created_at) }}</p>
                        <p><span class="text-primary">Modified at: </span>{{ formatTime($trip->updated_at) }}</p>
                    </div>
                    @if ($trip->remarks !== null)
                    <div class="remark">
                        <p><b><span class="text-primary">Remarks : </span></b>{{ $trip->remarks }}</p>
                    </div>
                    @endif

                    @if (count($trip->history) !== 0)
                    <div class="remark">
                        <p><b><span class="text-primary">Clarification Messages : </span></b></p>
                    </div>
                    @forelse ($trip->history as $history)
                    <li class="d-inline">
                        <p><span class="text-primary">{{ $history->name }} :</span> {{ $history->remark }}
                        </p>
                        <p style="font-size:12px;">{{ $history->created_at }}</p>
                    </li>
                    @empty
                    <p></p>
                    @endforelse
                    @endif
                </div>
            </div>
            <div class="clarificationform col-lg-6 offset-3 mt-3">
                @if ($trip->status == 'clarification')
                <form action="{{ route('user.clarification') }}" method="post" class="d-flex">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="trip_id" id="trip_id" value="{{ $trip->id }}">
                    <input type="hidden" name="tripid" id="tripid" value="{{ $trip->tripid }}">
                    <input type="hidden" name="status" id="clarificationStatus" value="{{ $trip->tripid }}">
                    {{-- <label> Remark </label> --}}
                    <input type="text" name="remark" placeholder="type your message" class="form-control" required>

                    <input type="submit" name="submit" class="btn btn-primary" value="Reply">


                </form>
                @endif
            </div>

            <div class="col-lg-12 mt-2">
                <center>
                    <a href="{{ route('user.mytrip') }}" class="btn btn-danger text-center">Back</a>
                </center>
            </div>
        </div>

    </section>
</main>
@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script type="text/javascript">
    //$(".clarificationform").hide();

</script>
@endsection
