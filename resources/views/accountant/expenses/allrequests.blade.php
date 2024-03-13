@extends('accountant.layouts.app')
@section('title')
{{ __('All requests Details') }}
@endsection
@section('main')
<main id="main" class="main">
    <section class="section">
        <div class="row">
            <div class="col-lg-4">
                <a href="{{ route('accountant.notprocessed') }}">
                    <div class="card ">
                        <div class="card-body">
                            <h5 class="card-title">Not Processed List</h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="p-2 rounded-circle border border-primary text-primary">
                                    <i class="bx bx-trip fs-4"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ App\Models\Advance::where('status', 'not processed')->whereHas('trip', function ($query) {
                                                $query->where('status', 'approved');
                                            })->count() }}
                                    </h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-4">
                <a href="{{ route('accountant.inprogress') }}">
                    <div class="card ">
                        <div class="card-body">
                            <h5 class="card-title">In-progress</h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="p-2 rounded-circle border border-warning text-warning">
                                    <i class="bx bx-trip fs-4"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ App\Models\Advance::where('status', 'inprogress')->whereHas('trip', function ($query) {
                                                $query->where('status', 'approved');
                                            })->count() }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-4">
                <a href="{{ route('accountant.completed') }}">
                    <div class="card ">
                        <div class="card-body">
                            <h5 class="card-title">Completed</h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="p-2 rounded-circle border border-success text-success">
                                    <i class="bx bx-trip fs-4"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ App\Models\Advance::where('status', 'completed')->whereHas('trip', function ($query) {
                                                $query->where('status', 'approved');
                                            })->count() }}
                                    </h6>
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
                        <h5 class="card-title">All Requests Details</h5>
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
                                {{-- {{ $advances[0]->advance }} --}}
                                <tbody>
@php
    $i=1;
@endphp
                                    @forelse ($expenses as $expense)
                                    @if($expense->expense->isNotEmpty())


                                    <tr class="card">
                                        <td>{{ $i }}</td>
                                        <td>{{ $expense->tripid }}</td>
                                        <td>{{ $expense->user->name }}</td>
                                        <td>{{ $expense->tripname }}</td>
                                        <td>{{ $expense->from_date }}</td>
                                        <td>{{ $expense->to_date }}</td>
                                        <td>
                                            @if ($expense->status == 'not processed')
                                            <span class="bg-primary badge">Not Processed</span>
                                            @elseif($expense->status == 'completed')
                                            <span class="bg-success badge">Completed</span>
                                            @elseif($expense->status == 'inprogress')
                                            <span class="bg-warning badge">In-progress</span>
                                            @endif
                                        </td>


                                        <td>
                                            <a href="{{ route('accountant.expenses_summary', $expense->id) }}" class="btn btn-primary text-white"><i class="bi bi-arrow-right-circle"></i></a>
                                            {{-- <a href="#" class="btn btn-primary text-white"><i
                                                            class="bi bi-arrow-right-circle"></i></a> --}}

                                        </td>
                                    </tr>
                                    @php
                                        $i++
                                    @endphp
                                    @endif
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
