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
                    <h4 class="card-title p-0">Domestic Policy table</h4>
                    @if(auth('admin')->user()->role == "super admin")
                    <div class="button">
                        <a href="{{ route('domestic_policy.create') }}" class="btn btn-primary"><i class='bx bx-plus'></i>Create New Policy</a>
                        
                    </div>
                    @endif
                </div>
            </div>

            
            <div class="card-body table-responsive p-0">
                <table class=" table datatable">
                    <thead>
                        <tr>
                            <th>S.no</th>
                            <th>Component Id</th>
                            <th>Components</th>
                            <th>action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($domesticpolicies as $domesticpolicy)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$domesticpolicy->id}}</td>
                            <td>{{$domesticpolicy->components}}</td>


                            <td>
                                <div class="d-flex gap-1">
                                    <a href="{{route('domestic_policy.show', $domesticpolicy->id)}}" class="btn btn-sm btn-primary">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{route('domestic_policy.edit',$domesticpolicy->id)}}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    @if(auth('admin')->user()->role == "super admin")
                                    <form method="post" action="{{ route('domestic_policy.destroy',$domesticpolicy->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                    </form>
                                    @endif
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
