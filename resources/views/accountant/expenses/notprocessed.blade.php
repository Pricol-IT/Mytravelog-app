@extends('accountant.layouts.app')
@section('title')
    {{ __('Not Proceesed Details') }}
@endsection
@section('main')
    <main id="main" class="main">
        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Not Processed List <a href="{{ route('accountant.allrequests') }}"
                                    class="btn btn-danger">Back</a></h5>
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

                                        @forelse ($advances as $advance)
                                            <tr class="card">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $advance->tripid }}</td>
                                                <td>{{ $advance->trip->tripname }}</td>
                                                <td>{{ $advance->trip->from_date }}</td>
                                                <td>{{ $advance->trip->to_date }}</td>
                                                <td>

                                                    <span class="bg-primary badge">Not Processed</span>

                                                </td>

                                                <td>
                                                    {{-- <a href="{{route('approver.summary',$trip->id)}}" class="btn btn-primary text-white"><i class="bi bi-arrow-right-circle"></i></a> --}}
                                                    <a href="#" class="btn btn-primary text-white"><i
                                                            class="bi bi-arrow-right-circle"></i></a>
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
@endsection
