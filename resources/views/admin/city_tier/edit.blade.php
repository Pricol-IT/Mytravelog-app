@extends('admin.layouts.app')
@section('title')
{{ __('Edit User') }}
@endsection
@section('main')
<main id="main" class="main">
    <div class="content">
        <div class="container-fluid">

            <form action="{{route('city_tier.update',$cityTier->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title p-0">Create New City Tier</h4>
                    </div>
                </div>



                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                Tier Details
                            </div>
                            <div class="card-body row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Tier
                                                    <span class="form-label-required text-danger">*</span>
                                                </label>
                                                <select class="form-control" name="tier" id="tier">
                                                    <option value=""> Select Tier</option>
                                                    <option value="tier1" {{ $cityTier->tier == 'tier1' ? 'selected' : ''}}>Tier 1</option>
                                                    <option value="tier2" {{ $cityTier->tier == 'tier2' ? 'selected' : ''}}>Tier 2</option>
                                                    <option value="tier3" {{ $cityTier->tier == 'tier3' ? 'selected' : ''}}>Tier 3</option>
                                                </select>
                                                @if ($errors->has('tier'))
                                                <span class="error text-danger">{{ $errors->first('tier') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    City Name
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="cities" id="cities" class="form-control class " value="{{$cityTier->cities}}" placeholder="Enter the City name">
                                                @if ($errors->has('cities'))
                                                <span class="error text-danger">{{ $errors->first('cities') }}</span>
                                                @endif
                                            </div>
                                        </div>


                                    </div>
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
