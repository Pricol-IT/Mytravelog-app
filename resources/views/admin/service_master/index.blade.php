@extends('admin.layouts.app')
@section('title')
    {{ __('all Services') }}
@endsection
@section('main')
    <main id="main" class="main">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <div class=" d-flex justify-content-between">
                        <h4 class="card-title p-0">All Services</h4>
                        <a href="{{ route('service_master.create') }}" class="btn btn-primary"><i class='bx bx-plus'></i>New
                            service</a>
                    </div>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="ll-table table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>Service Id</th>
                                <th>Image</th>
                                <th>Icon</th>
                                <th>Name</th>
                                <th>Form id</th>
                                <th>Active/Inacive</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>

        </div>

    </main>
@endsection
