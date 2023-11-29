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
                  <input type="text" name="tripname" class="form-control" required placeholder="Enter Trip Name">
              </div>
            <div class="col-lg-3 col-md-6 pb-sm-1 pb-lg-0">
                <input type="date" name="tfdate" class="form-control" required placeholder="From Date"> 
            </div>
            <div class="col-lg-3 col-md-6 pb-sm-1 pb-lg-0">
                <input type="date" name="ttdate" required class="form-control">
            </div>
            <div class="col-lg-3 col-md-6 pb-sm-1 pb-lg-0">
                <input type="submit" class="btn form-control btn-primary" name="" value="New Trip">
            </div>  
        </div>
        </form>
        <div class="row">
            <section class="section dashboard">
              
             
              <div class="row">
                <div class="col-lg-6 col-md-6">

                  <div class="card urbox1">
                    <div class="card-body">
                      <h5 class="card-title">Approvals</h5>
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
