@extends('user.layouts.app')
@section('title')
    {{__('My Trip Details')}}
@endsection
@section('main')
  <main id="main" class="main">
    <section class="section">
      <div class="row mb-4 tbox rounded">
        <div class="col-lg-4 col-md-6 mb-1">
          <h5><span class="fw-bold text-primary">Trip ID:</span> {{$trip->tripid}}</h5>
        </div>
        <div class="col-lg-4 col-md-6 mb-1 mdright">
          <h5 class="text-primary">{{$trip->tripname}}</h5>
        </div>
        <div class="col-lg-4 d-flex justify-content-between">
          <p><i class="bx bx-calendar text-primary"></i> {{$trip->from_date}}</p><p><i class="bx bx-refresh fw-bold"></i></p><p><i class="bx bx-calendar text-primary"></i> {{$trip->to_date}}</p>
        </div>          
      </div>
      <div class="row mb-4 tbox rounded">
        <div class="col-lg-6 col-md-6 mb-1">
          <h5><span class="fw-bold text-primary">Purpose Of Trip:</span> {{$trip->purpose}}</h5>
        </div>
        <div class="col-lg-6 col-md-6 mb-1 mdright">
          <h5 ><span class="text-primary">Status : </span> {{ucfirst($trip->status)}}</h5>
        </div>
      </div>
      <div class="row" id="request">
          <div class="col-lg-12">
            <h4 class="mb-4">Request Summary</h4>
            @if($trip->flight->isNotEmpty())
            <table class="table">
                <thead>
                    <tr>
                       <td  colspan="4">
                           <h6 class="text-primary"> <i class="bx bxs-plane-alt"></i> Flight Request</h6>
                       </td> 
                    </tr>
                    <tr>
                        <td>Origin</td>
                        <td>Destination</td>
                        <td>Date/Time</td>
                        <td>Class</td>
                    </tr>
                </thead>
                <tbody id="Flightbody">
                    @foreach ($trip->flight as $flight)
                        <tr><td>{{ $flight->origin }}<td>{{ $flight->destination }}</td><td> {{ split_timestamp($flight->preferred_date)[0]; }} / {{ split_timestamp($flight->preferred_date)[1]; }}</td><td>{{ $flight->trip_class }}</td></tr>
                    @endforeach
                </tbody>
            </table>
            @endif
            @if($trip->train->isNotEmpty())
            <table class="table">
                <thead>
                    <tr>
                       <td  colspan="4">
                           <h6 class="text-primary"> <i class='bx bxs-train'></i> Train Request</h6>
                       </td> 
                    </tr>
                    <tr>
                        <td>Origin</td>
                        <td>Destination</td>
                        <td>Date/Time</td>
                        <td>Class</td>
                    </tr>
                </thead>
                <tbody id="Trainbody">
                    @foreach ($trip->train as $train)
                    <tr><td>{{ $train->origin }}</td><td>{{ $train->destination }}</td><td>{{ $train->preferred_date }} </td><td>{{ $train->trip_class }}</td></tr>
                    @endforeach
                </tbody>
            </table>
            @endif
            @if($trip->bus->isNotEmpty())
            <table class="table">
                <thead>
                    <tr>
                       <td  colspan="4">
                           <h6 class="text-primary"> <i class='bx bxs-bus' ></i> Bus Request</h6>
                       </td> 
                    </tr>
                    <tr>
                        <td>Origin</td>
                        <td>Destination</td>
                        <td>Date/Time</td>
                        <td>Class</td>
                    </tr>
                </thead>
                <tbody id="Busbody">
                    @foreach ($trip->bus as $bus)
                    <tr><td>{{ $bus->origin }}</td><td>{{ $bus->destination }}</td><td>{{ $bus->preferred_date }}</td><td>{{ $bus->trip_class }}</td></tr>
                    @endforeach
                </tbody>
            </table>
            @endif
            @if($trip->taxi->isNotEmpty())
            <table class="table">
                <thead>
                    <tr>
                       <td  colspan="4">
                           <h6 class="text-primary"> <i class='bx bxs-taxi' ></i> Taxi Request</h6>
                       </td> 
                    </tr>
                    <tr>
                        <td>Pickup</td>
                        <td>Drop</td>
                        <td>Date/Time</td>
                        <td>Taxi Type</td>
                    </tr>
                </thead>
                <tbody id="Taxibody">
                    @foreach ($trip->taxi as $taxi)
                    <tr><td>{{ $taxi->origin }}</td><td>{{ $taxi->destination }}</td><td>{{ $taxi->preferred_date }}</td><td>{{ $taxi->trip_taxi }}</td></tr>
                    @endforeach
                </tbody>
            </table>
            @endif
            @if($trip->accommodation->isNotEmpty())
            <table class="table">
                <thead>
                    <tr>
                       <td  colspan="3">
                           <h6 class="text-primary"> <i class='bx bxs-hotel' ></i> Accomadation Request</h6>
                       </td> 
                    </tr>
                    <tr>
                        <td>Location</td>
                        <td>Check-In</td>
                        <td>Check-Out</td>
                    </tr>
                </thead>
                <tbody id="Hotelbody">
                    @foreach ($trip->accommodation as $accommodation)
                    <tr><td>{{ $accommodation->location }}</td><td>{{ $accommodation->checkin }}</td><td>{{ $accommodation->checkout }}</td></tr>
                    @endforeach
                </tbody>
            </table>
            @endif
            @if($trip->advance->isNotEmpty())
            <table class="table">
                <thead>
                    <tr>
                       <td  colspan="2">
                           <h6 class="text-primary"> <i class='bx bx-rupee' ></i> Advance Request</h6>
                       </td> 
                    </tr>
                    <tr>
                        <td>Amount</td>
                        <td>Purpose</td>
                    </tr>
                </thead>
                <tbody id="Advancebody">

                    @foreach ($trip->advance as $advance)
                    <tr><td>{{ $advance->amount }}</td><td>{{ $advance->purpose }}</td></tr>
                    @endforeach
                </tbody>
            </table>
            @endif
            @if($trip->connectivity->isNotEmpty())
            <table class="table">
                <thead>
                    <tr>
                       <td class="text-center">
                           <h6 class="headdiv"><i class='bx bx-broadcast'></i> Connectivity Request</h6>
                       </td> 
                    </tr>
                    <tr>
                        <td>Connectivity</td>
                        
                    </tr>
                </thead>
                <tbody id="Networkbody">
                    @foreach ($trip->connectivity as $connectivity)
                    <tr ><td>{{ $connectivity->connection }}</td></tr>
                    @endforeach
                </tbody>
            </table>
            @endif
            @if($trip->forex->isNotEmpty())
            <table class="table">
                <thead>
                    <tr>
                       <td colspan="2">
                           <h6 class="text-primary"> <img src="{{asset('images/cu.svg')}}" style="background:#0072bc;"> Forex Request</h6>
                       </td> 
                    </tr>
                    <tr>
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
              <center><a href="{{route('user.mytrip')}}" class="btn btn-danger text-center">Back</a></center>
          </div>
        </div>

    </section>
  </main>
@endsection

