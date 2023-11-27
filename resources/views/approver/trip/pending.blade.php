@extends('approver.layouts.app')
@section('title')
    {{__('Pending Trip Details')}}
@endsection
@section('main')
  <main id="main" class="main">
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Pending Trip Details <a href="{{route('approver.alltrip')}}" class="btn btn-danger">Back</a></h5>
              <!-- Table with stripped rows -->
              <div class="table-responsive">
                <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Trip ID</th>
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
                    <td>{{$trip->tripname}}</td>
                    <td>{{$trip->from_date}}</td>
                    <td>{{$trip->to_date}}</td>
                    <td>
                        @if($trip->status == 'pending')
                        <span class="text-danger">Pending</span>
                        @elseif($trip->status == 'approved')
                        <span class="text-success">Approved</span>
                        @else
                        <span class="text-warning">Clarification</span>
                        @endif
                    </td>
                    
                    <td><a href="{{route('approver.summary',$trip->id)}}" class="btn btn-warning text-white"><i class="bx bxs-file-blank"></i></a>
                      <a href="{{route('approver.approve',$trip->id)}}"  class="btn btn-success text-white"><i class="bi bi-check-circle-fill"></i></a>
                        <a href="{{route('approver.reject',$trip->id)}}" class="btn btn-danger text-white"><i class="bi bi-x-circle-fill"></i></a>
                        <button type="button" class="remark btn btn-primary" data="{{$trip->id}}"><i class="bx bx-chat"></i></button>
                    </td>
                  </tr>
                  @empty
                  <tr>
                      
                      <td colspan="7"> No Data Found</td>
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
<x-modal.clarificationmodel />
@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script type="text/javascript">
  

  $("body").on("click",".remark",function(){
          var tripid = $(this).attr("data");
          $('#tripid').val(tripid);
          $('#basicModal').modal('show');
        });
</script>
@endsection    