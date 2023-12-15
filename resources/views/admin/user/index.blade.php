@extends('admin.layouts.app')
@section('title')
    {{ __('all users') }}
@endsection
@section('main')
    <main id="main" class="main">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <div class=" d-flex justify-content-between">
                        <h4 class="card-title p-0">All Users List</h4>
                        <a href="{{ route('user.create') }}" class="btn btn-primary"><i class='bx bx-plus'></i>New User</a>
                    </div>
                </div>

                <form id="formSubmit" action="#" method="GET" onchange="this.submit();">
                    <div class="card-body border-bottom row p-3">
                        <div class="col-lg-4 col-md-6 col-12">

                            <label>Search</label>
                            <input type="text" class="form-control" id="searchbar" placeholder="Enter mail or username">
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 ">
                            <label>Sort By</label>
                            <select name="sort_by" class="form-control select2bs4 w-100-p">
                                <option selected value="latest" selected>
                                    Latest
                                </option>
                                <option value="oldest">
                                    Oldest
                                </option>
                            </select>
                        </div>
                    </div>
                </form>

                <div class="card-body table-responsive p-0">
                    <table class="ll-table table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>Emp Id</th>
                                <th>User</th>
                                <th>Role/Position</th>
                                <th>Account Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>

        </div>







    </main><!-- End #main -->
@endsection
