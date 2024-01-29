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
                    <h4 class="card-title p-0">International Policy table</h4>
                    <div class="button">
                        <a href="{{ route('international_policy.create') }}" class="btn btn-primary"><i class='bx bx-plus'></i>Create New Grade</a>

                    </div>
                </div>
            </div>



            <div class="card-body table-responsive p-0">
                <table class=" table datatable">
                    <thead>
                        <tr>
                            <th>S.no</th>
                            <th>components</th>
                            <th>action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($internationalpolicies as $internationalpolicy)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$internationalpolicy->components}}</td>


                            <td>
                                <div class="d-flex gap-1">
                                    <a href="{{route('international_policy.show', $internationalpolicy->components)}}" class="btn btn-sm btn-primary">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{route('international_policy.edit',$internationalpolicy->components)}}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form method="post" action="{{ route('international_policy.destroy',$internationalpolicy->components) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">record not found</td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>

    </div>







</main><!-- End #main -->
@endsection
