@extends('admin.layouts.app')
@section('title')
{{ __('New User') }}
@endsection
@section('main')
<main id="main" class="main">
    <div class="content">
        <div class="container-fluid">

            <form action="{{route('user.import')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title p-0">upload New Users</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <div class="offset-3">
                                    upload file
                                </div>
                            </div>
                            <div class="card-body row">

                                <div class="col-md-6 mb-2 offset-3">
                                    <div class="form-group">
                                        <label class="class mb-2" for="for">
                                            Upload file
                                            <span class="form-label-required text-danger">*</span>
                                        </label>
                                        <input type="file" name="uploadfile" id="uploadfile" class="form-control class " value="{{old('uploadfile')}}" placeholder="only xlxs">
                                        @if ($errors->has('uploadfile'))
                                        <span class="error text-danger">{{ $errors->first('uploadfile') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div>
                        <input type="submit" class="btn btn-primary" value='Submit'>
                        <a href="{{ route('user.index') }}" class="btn btn-danger">Cancel</a>
                    </div>
            </form>
        </div>
    </div>

</main><!-- End #main -->
@endsection
