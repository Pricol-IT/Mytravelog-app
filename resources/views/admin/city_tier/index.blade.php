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
                    <h4 class="card-title p-0">Cities tier table</h4>
                    <div class="button">
                        <a href="{{ route('city_tier.create') }}" class="btn btn-primary"><i class='bx bx-plus'></i>Create New Policy</a>

                    </div>
                </div>
            </div>



            <div class="card-body table-responsive p-0">
                <table class=" table datatable">
                    <thead>
                        <tr>
                            <th>S.no</th>
                            <th>City Id</th>
                            <th>Tiers</th>
                            <th>Cities</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($cities as $city)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$city->id}}</td>
                            <td>{{$city->tier}}</td>
                            <td>{{$city->cities}}</td>


                            <td>
                                <div class="d-flex gap-1">
                                    <a href="{{route('city_tier.show', $city->id)}}" class="btn btn-sm btn-primary">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{route('city_tier.edit',$city->id)}}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form method="post" action="{{ route('city_tier.destroy',$city->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">record not found</td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>

    </div>







</main><!-- End #main -->
@endsection
