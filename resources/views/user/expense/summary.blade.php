@extends( (auth()->user()->role) == 'user' ? 'user.layouts.app' : 'accountant.layouts.app')

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
                <div class="d-flex justify-content-between">

                    <h4 class="">Expense Summary</h4>
                    @if ((auth()->user()->role) == 'user')
                    <a href="{{ route('addexpense',$trip->id) }}" class="btn btn-primary text-center"><i class="bi bi-plus-lg"></i> Add Expense</a>
                    @endif

                </div>
                @php
                // $isFlight = any($expense["service"] == "Flight" for $expense in $expense);
                @endphp





                @if (($trip->flight->isNotEmpty()) || ($trip->expense->contains('service', 'Flight')))
                <table class="table">
                    <thead>
                        @if (($trip->flight->isNotEmpty()))
                        <tr>
                            <td colspan="5">
                                <h6 class="text-primary"> <i class="bx bxs-plane-alt"></i> Flight</h6>
                            </td>
                        </tr>
                        @else
                        <tr>
                            <td colspan="5">
                                <h6 class="text-primary"> <i class="bx bxs-plane-alt"></i> Claim Request for Flight</h6>
                            </td>
                        </tr>
                        @endif

                        <tr class="fw-bold">
                            <td>Origin</td>
                            <td>Destination</td>
                            <td>Ticket Cost</td>
                            <td>e-Ticket</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody id="Flightbody">
                        @forelse ($trip->flight as $flight)
                        <tr>
                            <td>{{ $flight->origin }}</td>
                            <td>{{ $flight->destination }}</td>
                            <td>₹8316</td>
                            <td> <span class="badge bg-warning text-dark">Not uploaded</span></td>
                        </tr>
                        @empty
                        @endforelse
                        @if(($trip->flight->isNotEmpty()))
                        <tr>
                            <td colspan="4">
                                <h6 class="text-primary m-0"> Claim Request</h6>
                            </td>
                        </tr>
                        @endif
                        @forelse ($trip->expense as $data)
                        @if ($data->service == 'Flight')
                        <tr>
                            <td>{{ $data->from }}
                            <td>{{ $data->to }}</td>
                            <td>{{ '₹'.$data->cost }}</td>
                            <td><span class="badge bg-success">file uploaded</span></td>
                            {{-- @php $extension = pathinfo($data->ticket, PATHINFO_EXTENSION); @endphp

                            <td>@if($extension == 'pdf')
                                <a href="{{ asset($data->ticket) }}" target="_blank" class="btn btn-success">View </a>

                                @elseif($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png')
                                <a href="{{ asset($data->ticket) }}" target="_blank" class="btn btn-success">View </a>
                                {{-- <img src="{{ asset($data->ticket) }}" alt="{{ $data->ticket }}" class="img-fluid" /> --}}

                                {{-- @endif</td> --}}
                                <td><a href="{{ asset($data->ticket) }}" target="_blank" class="btn btn-primary">View </a></td>
                        </tr>
                        @endif
                        @empty
                        @endforelse
                    </tbody>
                </table>
                @endif







                @if (($trip->train->isNotEmpty()) || ($trip->expense->contains('service', 'Train')))
                <table class="table">
                    <thead>
                        @if (($trip->train->isNotEmpty()))
                        <tr>
                            <td colspan="5">
                                <h6 class="text-primary"> <i class='bx bxs-train'></i> Train</h6>
                            </td>
                        </tr>
                        @else
                        <tr>
                            <td colspan="5">
                                <h6 class="text-primary"> <i class='bx bxs-train'></i> Claim Request for Train</h6>
                            </td>
                        </tr>
                        @endif

                        <tr class="fw-bold">
                            <td>Origin</td>
                            <td>Destination</td>
                            <td>Ticket Cost</td>
                            <td>e-Ticket</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody id="Trainbody">
                        @forelse ($trip->train as $train)
                        <tr>
                            <td>{{ $train->origin }}</td>
                            <td>{{ $train->destination }}</td>
                            <td>₹8316</td>
                            <td> <span class="badge bg-warning text-dark">Not uploaded</span></td>
                                <td><a href="{{ asset($data->ticket) }}" target="_blank" class="btn btn-primary">View </a></td>
                        </tr>
                        @empty
                        @endforelse
                        @if(($trip->train->isNotEmpty()))
                        <tr>
                            <td colspan="5">
                                <h6 class="text-primary m-0"> Claim Request</h6>
                            </td>
                        </tr>
                        @endif
                        @forelse ($trip->expense as $data)
                        @if ($data->service == 'Train')
                        <tr>
                            <td>{{ $data->from }}
                            <td>{{ $data->to }}</td>
                            <td>{{ '₹'.$data->cost }}</td>
                            <td><span class="badge bg-success">file uploaded</span></td>
                                <td><a href="{{ asset($data->ticket) }}" target="_blank" class="btn btn-primary">View </a></td>
                        </tr>
                        @endif
                        @empty
                        @endforelse
                    </tbody>
                </table>
                @endif



                @if (($trip->bus->isNotEmpty()) || ($trip->expense->contains('service', 'Bus')))
                <table class="table">
                    <thead>
                        @if (($trip->bus->isNotEmpty()))
                        <tr>
                            <td colspan="5">
                                <h6 class="text-primary"> <i class='bx bxs-bus'></i> Bus</h6>
                            </td>
                        </tr>
                        @else
                        <tr>
                            <td colspan="5">
                                <h6 class="text-primary"> <i class='bx bxs-bus'></i> Claim Request for Bus</h6>
                            </td>
                        </tr>
                        @endif

                        <tr class="fw-bold">
                            <td>Origin</td>
                            <td>Destination</td>
                            <td>Ticket Cost</td>
                            <td>e-Ticket</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody id="Busbody">
                        @forelse ($trip->bus as $bus)
                        <tr>
                            <td>{{ $bus->origin }}</td>
                            <td>{{ $bus->destination }}</td>
                            <td>₹8316</td>
                            <td> <span class="badge bg-warning text-dark">Not uploaded</span></td>
                                <td><a href="{{ asset($data->ticket) }}" target="_blank" class="btn btn-primary">View </a></td>
                        </tr>
                        @empty
                        @endforelse
                        @if(($trip->bus->isNotEmpty()))
                        <tr>
                            <td colspan="5">
                                <h6 class="text-primary m-0"> Claim Request</h6>
                            </td>
                        </tr>
                        @endif
                        @forelse ($trip->expense as $data)
                        @if ($data->service == 'Bus')
                        <tr>
                            <td>{{ $data->from }}
                            <td>{{ $data->to }}</td>
                            <td>{{ '₹'.$data->cost }}</td>
                            <td><span class="badge bg-success">file uploaded</span></td>
                                <td><a href="{{ asset($data->ticket) }}" target="_blank" class="btn btn-primary">View </a></td>
                        </tr>
                        @endif
                        @empty
                        @endforelse
                    </tbody>
                </table>
                @endif



                {{auth()->user()->role}}

                @if (($trip->taxi->isNotEmpty()) || ($trip->expense->contains('service', 'Taxi')))
                <table class="table">
                    <thead>
                        @if (($trip->taxi->isNotEmpty()))
                        <tr>
                            <td colspan="5">
                                <h6 class="text-primary"> <i class='bx bxs-taxi'></i> Taxi</h6>
                            </td>
                        </tr>
                        @else
                        <tr>
                            <td colspan="5">
                                <h6 class="text-primary"> <i class='bx bxs-taxi'></i> Claim Request for Taxi</h6>
                            </td>
                        </tr>
                        @endif

                        <tr class="fw-bold">
                            <td>Origin</td>
                            <td>Destination</td>
                            <td>Total Cost</td>
                            <td>Invoice</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody id="Taxibody">
                        @forelse ($trip->taxi as $taxi)
                        <tr>
                            <td>{{ $taxi->origin }}</td>
                            <td>{{ $taxi->destination }}</td>
                            <td>₹8316</td>
                            <td> <span class="badge bg-warning text-dark">Not uploaded</span></td>
                                <td><a href="{{ asset($data->ticket) }}" target="_blank" class="btn btn-primary">View </a></td>
                        </tr>
                        @empty
                        @endforelse
                        @if(($trip->taxi->isNotEmpty()))
                        <tr>
                            <td colspan="5">
                                <h6 class="text-primary m-0"> Claim Request</h6>
                            </td>
                        </tr>
                        @endif
                        @forelse ($trip->expense as $data)
                        @if ($data->service == 'Taxi')
                        <tr>
                            <td>{{ $data->from }}
                            <td>{{ $data->to }}</td>
                            <td>{{ '₹'.$data->cost }}</td>
                            <td><span class="badge bg-success">file uploaded</span></td>
                                <td><a href="{{ asset($data->ticket) }}" target="_blank" class="btn btn-primary">View </a></td>
                        </tr>
                        @endif
                        @empty
                        @endforelse
                    </tbody>
                </table>
                @endif


                @if (($trip->accommodation->isNotEmpty()) || ($trip->expense->contains('service', 'Hotel')))
                <table class="table">
                    <thead>
                        @if (($trip->accommodation->isNotEmpty()))
                        <tr>
                            <td colspan="5">
                                <h6 class="text-primary"> <i class='bx bxs-hotel'></i> accommodation</h6>
                            </td>
                        </tr>
                        @else
                        <tr>
                            <td colspan="5">
                                <h6 class="text-primary"> <i class='bx bxs-hotel'></i> Claim Request for accommodation</h6>
                            </td>
                        </tr>
                        @endif

                        <tr class="fw-bold">
                            <td>Location</td>
                            <td>Hotel name</td>
                            <td>Total Cost</td>
                            <td>Invoice</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody id="Hotelbody">
                        @forelse ($trip->accommodation as $accommodation)
                        <tr>
                            <td>{{ $accommodation->origin }}</td>
                            <td>{{ $accommodation->destination }}</td>
                            <td>₹8316</td>
                            <td> <span class="badge bg-warning text-dark">Not uploaded</span></td>
                                <td><a href="{{ asset($data->ticket) }}" target="_blank" class="btn btn-primary">View </a></td>
                        </tr>
                        @empty
                        @endforelse
                        @if(($trip->accommodation->isNotEmpty()))
                        <tr>
                            <td colspan="5">
                                <h6 class="text-primary m-0"> Claim Request</h6>
                            </td>
                        </tr>
                        @endif
                        @forelse ($trip->expense as $data)
                        @if ($data->service == 'Hotel')
                        <tr>
                            <td>{{ $data->from }}
                            <td>{{ $data->to }}</td>
                            <td>{{ '₹'.$data->cost }}</td>
                            <td><span class="badge bg-success">file uploaded</span></td>
                                <td><a href="{{ asset($data->ticket) }}" target="_blank" class="btn btn-primary">View </a></td>
                        </tr>
                        @endif
                        @empty
                        @endforelse
                    </tbody>
                </table>
                @endif



                @if (($trip->connectivity->isNotEmpty()) || ($trip->expense->contains('service', 'Network')))
                <table class="table">
                    <thead>
                        @if (($trip->connectivity->isNotEmpty()))
                        <tr>
                            <td colspan="5">
                                <h6 class="text-primary"> <i class='bx bx-broadcast'></i> Connectivity</h6>
                            </td>
                        </tr>
                        @else
                        <tr>
                            <td colspan="5">
                                <h6 class="text-primary"> <i class='bx bx-broadcast'></i> Claim Request for Connectivity</h6>
                            </td>
                        </tr>
                        @endif

                        <tr class="fw-bold">
                            <td>N0. of Days</td>
                            <td>Mobile number</td>
                            <td>Total Cost</td>
                            <td>Invoice</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody id="Networkbody">
                        @forelse ($trip->connectivity as $connectivity)
                        <tr>
                            <td>{{ $connectivity->origin }}</td>
                            <td>{{ $connectivity->destination }}</td>
                            <td>₹8316</td>
                            <td> <span class="badge bg-warning text-dark">Not uploaded</span></td>
                                <td><a href="{{ asset($data->ticket) }}" target="_blank" class="btn btn-primary">View </a></td>
                        </tr>
                        @empty
                        @endforelse
                        @if(($trip->connectivity->isNotEmpty()))
                        <tr>
                            <td colspan="5">
                                <h6 class="text-primary m-0"> Claim Request</h6>
                            </td>
                        </tr>
                        @endif
                        @forelse ($trip->expense as $data)
                        @if ($data->service == 'Network')
                        <tr>
                            <td>{{ $data->from }}
                            <td>{{ $data->to }}</td>
                            <td>{{ '₹'.$data->cost }}</td>
                            <td><span class="badge bg-success">file uploaded</span></td>
                                <td><a href="{{ asset($data->ticket) }}" target="_blank" class="btn btn-primary">View </a></td>
                        </tr>
                        @endif
                        @empty
                        @endforelse
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
