@extends('approver.layouts.app')
@section('title')
    {{__('All Trip Details')}}
@endsection
@section('main')
  <main id="main" class="main">
    <section class="section">
      <div class="row">
      <div class="col-lg-3">
        <a href="{{ route('approver.pendingtrip')}}">
        <div class="card ">
          <div class="card-body">
            <h5 class="card-title">Pending</h5>
            <div class="d-flex justify-content-between align-items-center">
              <div class="p-2 rounded-circle border border-primary text-primary">
                <i class="bx bx-trip fs-4"></i>
              </div>
              <div class="ps-3">
                <h6>{{ App\Models\Trip::where('status','pending')->count(); }}</h6>
              </div>
            </div>
          </div>
        </div>
        </a>
      </div>
      
      <div class="col-lg-3">
        <a href="{{ route('approver.clarificationtrip')}}">
        <div class="card ">
          <div class="card-body">
            <h5 class="card-title">Clarification</h5>
            <div class="d-flex justify-content-between align-items-center">
              <div class="p-2 rounded-circle border border-warning text-warning">
                <i class="bx bx-trip fs-4"></i>
              </div>
              <div class="ps-3">
                <h6>{{ App\Models\Trip::where('status','clarification')->count(); }}</h6>
              </div>
            </div>
          </div>
        </div>
        </a>
      </div>
      <div class="col-lg-3">
        <a href="{{ route('approver.approvedtrip')}}">
        <div class="card ">
          <div class="card-body">
            <h5 class="card-title">Approved</h5>
            <div class="d-flex justify-content-between align-items-center">
              <div class="p-2 rounded-circle border border-success text-success">
                <i class="bx bx-trip fs-4"></i>
              </div>
              <div class="ps-3">
                <h6>{{ App\Models\Trip::where('status','approved')->count(); }}</h6>
              </div>
            </div>
          </div>
        </div>
        </a>
      </div>
      <div class="col-lg-3">
        <a href="{{ route('approver.rejecttrip')}}">
        <div class="card ">
          <div class="card-body">
            <h5 class="card-title">Rejected</h5>
            <div class="d-flex justify-content-between align-items-center">
              <div class="p-2 rounded-circle border border-danger text-danger">
                <i class="bx bx-trip fs-4"></i>
              </div>
              <div class="ps-3">
                <h6>{{ App\Models\Trip::where('status','reject')->count(); }}</h6>
              </div>
            </div>
          </div>
        </div>
        </a>
      </div>
    </div>

      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">All Trip Details</h5>
              <!-- Table with stripped rows -->
              <div class="table-responsive">
                <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Trip ID</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Trip Name</th>
                    <th scope="col">From Date</th>
                    <th scope="col">To Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>

                    @forelse ($trips as $trip)
                  <tr class="card">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$trip->tripid}}</td>
                    <td>{{$trip->user->name}}</td>
                    <td>{{$trip->tripname}}</td>
                    <td>{{$trip->from_date}}</td>
                    <td>{{$trip->to_date}}</td>
                    <td>
                        @if($trip->status == 'pending')
                        <span class="bg-primary badge">Pending</span>
                        @elseif($trip->status == 'approved')
                        <span class="bg-success badge">Approved</span>
                        @elseif($trip->status == 'reject')
                        <span class="bg-danger badge ">Rejected</span>
                        @elseif($trip->status == 'clarification')
                        <span class="bg-warning badge">Clarification</span>
                        @endif
                    </td>
                    
                    <td> 
                        <a href="{{route('approver.summary',$trip->id)}}" class="btn btn-primary text-white"><i class="bi bi-arrow-right-circle"></i></a>
                        
                     </td>
                  </tr>
                  @empty
                  <tr>
                      
                      <td colspan="8"> No Data Found</td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
              </div>
              <!-- End Table with stripped rows -->
            </div>
          </div>

        </div>
      </div>
    </section>
  </main>
  
@endsection
