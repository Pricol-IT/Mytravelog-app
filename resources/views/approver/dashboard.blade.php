@extends('approver.layouts.app')
@section('title')
    {{__('Dashboard')}}
@endsection
@section('main')
<main id="main" class="main">
    <div class="container">
        
        <form class="addtrip " action="{{route('approver.addtrip')}}" method="post"> 
            @csrf
            @method('post')
            <div class="row">
              <div class="col-lg-12">
                <h5 class="fw-bold">Create New Trip</h5>
              </div>
            </div>
            <div class="row pb-sm-1 pb-lg-0">
              <div class="col-lg-3 col-md-6 pb-sm-1 pb-lg-0">
                <label class="mt-1 mb-1">Trip Name</label>
                  <input type="text" name="tripname" class="form-control" required placeholder="Enter Trip Name">
              </div>
              <div class="col-lg-3 col-md-6 pb-sm-1 pb-lg-0">
                <label class="mt-1 mb-1">From </label>
                  <input type="date" name="tfdate" class="form-control" required placeholder="From Date"> 
              </div>
              <div class="col-lg-3 col-md-6 pb-sm-1 pb-lg-0">
                <label class="mt-1 mb-1">To </label>
                  <input type="date" name="ttdate" required class="form-control">
              </div>
              <div class="col-lg-3 col-md-6 pb-sm-1 pb-lg-0">
                  <label class="mt-1 mb-1"> </label>
                  <input type="submit" class="btn form-control btn-primary mt-lg-2"  name="" value="New Trip">
              </div>  
            </div>
        </form>
        <div class="row">
            <section class="section dashboard">
              
              <div class="row ">
                <div class="  col-lg-6  col-md-6 ">
                  <div class="urbox-card urbox rounded  shadow text-white mb-3 ">
                    <div class="heading d-flex justify-content-between align-items-center mb-3">
                        <h3>My Planned Trip</h3>
                        <a href="#" class="text-decoration-none text-white" style="cursor: pointer;">View More >>></a>
                    </div>
                    <div class="trip-card rounded text-center mb-3">
                        <div >
                            <h5>Trip Id : 2002020002 </h5>
                            <p>20/05/2023</p>
                            <p>To</p>
                            <p>20/05/2023</p>
                        </div>
                        <div class="vl"></div>
                        <div>
                            <h5>Mumbai to Coimbatore</h5>
                            <p>Mumbai</p>
                            <p>To</p>
                            <p>Coimbatore</p>
                        </div>
                    </div>
                    <div class="heading d-flex justify-content-between mt-1">
                        <p>Air tickets</p>
                        <div class="status d-flex">
                            <div class=" shadow indicator m-2"></div>
                            <p>Booked <i class='bx bxs-chevron-right'></i></p>
                        </div>
     
                    </div>
                    <div class="heading d-flex justify-content-between ">
                        <p>Hotel </p>
                        <div class="status d-flex">
                            <div class="shadow indicator m-2" style="background-color: orange !important;"></div>
                            <p>Pending <i class='bx bxs-chevron-right'></i></p>
                        </div>
                    </div>
                    <div class="heading d-flex justify-content-between ">
                        <p>Taxi</p>
                        <div class="status d-flex">
                            <div class=" shadow indicator m-2"></div>
                            <p>Booked <i class='bx bxs-chevron-right'></i></p>
                        </div>
                    </div>
                  </div>
                    
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="urbox p-3 mb-3 rounded bg-theme shadow">
                        <!-- Default Tabs -->
                        <ul class="nav nav-tabs d-flex bg-theme divch"  id="myTabjustified"
                            role="tablist">
                            <li class="nav-item flex-fill" role="presentation">
                                <button class="nav-link w-100 active" id="Upcoming-tab" data-bs-toggle="tab"
                                    data-bs-target="#Upcoming-justified" type="button" role="tab"
                                    aria-controls="Upcoming" aria-selected="true">Upcoming</button>
                            </li>
                            <li class="nav-item flex-fill" role="presentation">
                                <button class="nav-link w-100" id="Recent-tab" data-bs-toggle="tab"
                                    data-bs-target="#Recent-justified" type="button" role="tab" aria-controls="Recent"
                                    aria-selected="false">Recent</button>
                            </li>
                        </ul>
                        <div class="tab-content pt-2" id="myTabjustifiedContent">
                            <div class="tab-pane fade show active" id="Upcoming-justified" role="tabpanel"
                                aria-labelledby="Upcoming-tab">
                                <div class="tripcard p-2 rounded shadow" style="background-color: #fff; color:#0072BC">
                                    <div class=" d-flex justify-content-between">
                                        <p><b>Trip id</b> : 200020200 </p>
                                        <p><b>Date :</b> 13/02/2023 </p>
                                        <p><b>To :</b> 13/02/2023</p>
                                    </div>
                                    <div class=" d-flex justify-content-between">
                                        <h5>Trip name</h5>
                                        <p>Origin</p>
                                        <p>Destination</p>
                                    </div>
                                </div>
 
                                <div class="tripcard p-2 rounded shadow mt-1"
                                    style="background-color: #fff; color:#0072BC">
                                    <div class=" d-flex justify-content-between">
                                        <p><b>Trip id</b> : 200020200 </p>
                                        <p><b>Date :</b> 13/02/2023 </p>
                                        <p><b>To :</b> 13/02/2023</p>
                                    </div>
                                    <div class=" d-flex justify-content-between">
                                        <h5>Trip name</h5>
                                        <p>Origin</p>
                                        <p>Destination</p>
                                    </div>
                                </div>
 
 
                            </div>
                            <div class="tab-pane fade" id="Recent-justified" role="tabpanel"
                                aria-labelledby="Recent-tab">
                                <div class="tripcard p-2 rounded shadow" style="background-color: #fff; color:#0072BC">
                                    <div class=" d-flex justify-content-between">
                                        <p><b>Trip id</b> : 200020200 </p>
                                        <p><b>Date :</b> 13/02/2023 </p>
                                        <p><b>To :</b> 13/02/2023</p>
                                    </div>
                                    <div class=" d-flex justify-content-between">
                                        <h5>Trip name</h5>
                                        <p>Origin</p>
                                        <p>Destination</p>
                                    </div>
                                </div>
 
                                <div class="tripcard p-2 rounded shadow mt-1"
                                    style="background-color: #fff; color:#0072BC">
                                    <div class=" d-flex justify-content-between">
                                        <p><b>Trip id</b> : 200020200 </p>
                                        <p><b>Date :</b> 13/02/2023 </p>
                                        <p><b>To :</b> 13/02/2023</p>
                                    </div>
                                    <div class=" d-flex justify-content-between">
                                        <h5>Trip name</h5>
                                        <p>Origin</p>
                                        <p>Destination</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
             
              <div class="row">
                <div class="col-lg-6 col-md-6">

                  <div class="card urbox1">
                    <div class="card-body">
                      <h5 class="card-title">Trip - Overall Status</h5>
                      @forelse($trips as $trip)
                      <input type="hidden" id="{{$trip->status}}" value="{{$trip->total}}">
                      @empty
                      @endforelse
                      <!-- Radial Bar Chart -->
                      <div id="radialBarChart"></div>
                      
                      <script>
                        var tot = 0;
                        
                        if(document.getElementById('pending'))
                        { var pending = Number(document.getElementById('pending').value);
                        }
                        else{ var pending = 0; }
                        if(document.getElementById('reject'))
                        { var rejected = Number(document.getElementById('reject').value);
                        }
                        else{ var rejected = 0; }
                        if(document.getElementById('approved'))
                        { var approved = Number(document.getElementById('approved').value);
                        }
                        else{ var approved = 0; }
                        if(document.getElementById('clarification'))
                        { var clarification = Number(document.getElementById('clarification').value);
                        }
                        else{ var clarification = 0; }
                        
                        console.log(clarification)
                        document.addEventListener("DOMContentLoaded", () => {
                          new ApexCharts(document.querySelector("#radialBarChart"), {
                            series: [rejected, clarification, approved, pending],
                            chart: {
                              
                              height: 330,
                               offsetX: 0,
                               offsetY: 0,
                              type: 'radialBar',
                              toolbar: {
                                show: true
                              },

                            },

                            colors: ['#c2a062','#035553', '#E91E63','#0072BC'],
                            plotOptions: {
                              radialBar: {
                                dataLabels: {
                                  enabled: true,
                                  
                                  name: {
                                    fontSize: '22px',
                                  },
                                  value: {
                                    fontSize: '16px',
                                    formatter: function (val) {
                                    return val 
                                  }
                                  },
                                  
                                  
                                  total: {
                                    show: true,
                                    label: 'Total',formatter: function(val) {
                                      // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
                                      let v =val.config.series;
                                      
                                      var sum = v.reduce(function(a, b){
                                          return b + a;
                                      });
                                      return sum;


                                    }
                                  }
                                }
                              }
                            },
                            labels: ['Rejected', 'Clarification', 'Approved', 'Pending'],
                            legend: {
                              show: true,
                               position: 'bottom',
                                offsetX: 0,
                                offsetY: 0,
                              formatter: function(val, opts,) {
                                
                                return val + " - " + opts.w.globals.series[opts.seriesIndex]
                              }
                            },
                          }).render();
                        });
                      </script>
                      <!-- End Radial Bar Chart -->

                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    
                        <div id='calendar' class="card urbox1"></div>
                    
                    
                </div>
                <!-- Left side columns -->
             </div>
             
            </section>
        </div>

    </div>

    

  </main><!-- End #main -->
@endsection
