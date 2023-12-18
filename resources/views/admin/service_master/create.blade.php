@extends('admin.layouts.app')
@section('title')
    {{ __('create service') }}
@endsection
@section('main')
    <main id="main" class="main">
        <div class="container">
            <div class="container-fluid">

                <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title p-0">Create New Service</h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    Service Details
                                </div>
                                <div class="card-body row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="class mb-2" for="for">
                                                Name
                                                <span class="form-label-required text-danger">*</span>
                                            </label>
                                            <input type="text" name="name" id="name" class="form-control class "
                                                value placeholder="Service name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="class mb-2" for="for">
                                                Form id
                                                <span class="form-label-required text-danger">*</span>
                                            </label>
                                            <input type="text" name="formid" id="formid" class="form-control class "
                                                value placeholder="Form id">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="class mb-2" for="for">
                                                Image
                                            </label>
                                            <input type="file" name="image" id="image" class="form-control class "
                                                value placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="class mb-2" for="for">
                                                Icon
                                            </label>
                                            <input type="file" name="icon" id="icon" class="form-control class "
                                                value placeholder="icon">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                    <div>
                        <div class="btn btn-primary">Submit</div>
                        <a href="{{ route('service_master.index') }}" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
            </div>
        </div>

    </main>
@endsection
