@extends('user.layouts.app')
@section('title')
{{ __('Add Trip') }}
@endsection
@section('main')
<main id="main" class="main">
    @php
    // $user_grade = auth()->user()->userdetail->grade;
    // $select_key = App\Models\Grade::where('levels',auth()->user()->userdetail->grade)->pluck('select_column');
    $column = explode (",", App\Models\Grade::where('levels',auth()->user()->userdetail->grade)->pluck('select_column')[0]);
    $select_data = App\Models\DomesticPolicy::select($column[0],$column[1],$column[2])->get();
    @endphp
    {{-- {{$user_grade}} --}}
    {{-- {{$select_key}} --}}
    {{$select_data}}
    <x-container.addtripcontainer :tripDetails="$tripDetails" />

</main><!-- End #main -->
<x-modal.requestmodel :tripDetails="$tripDetails" />
<x-modal.servicemodel />
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="{{asset('assets/js/addtripscript.js')}}"></script>
@endsection
