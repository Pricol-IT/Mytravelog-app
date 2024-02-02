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
                    <h4 class="card-title p-0">Grade System table</h4>
                    @if(auth('admin')->user()->role == "super admin")
                    <div class="button">
                        <a href="{{ route('grade.create') }}" class="btn btn-primary"><i class='bx bx-plus'></i>Create New Grade</a>

                    </div>
                    @endif
                </div>
            </div>



            <div class="card-body table-responsive p-0">
                <table class=" table datatable">
                    <thead>
                        <tr>
                            <th>S.no</th>
                            <th>Levels</th>
                            <th>Category</th>
                            <th>Designation</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($grades as $grade)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$grade->levels}}</td>
                            <td>{{$grade->category}}</td>
                            <td>{{$grade->designation}}</td>


                            <td>
                                <div class="d-flex gap-1">
                                    <a href="{{route('grade.show', $grade->id)}}" class="btn btn-sm btn-primary">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{route('grade.edit',$grade->id)}}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    @if(auth('admin')->user()->role == "super admin")
                                    <form method="post" action="{{ route('grade.destroy',$grade->id) }}">
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
