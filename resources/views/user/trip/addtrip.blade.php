@extends('user.layouts.app')
@section('title')
{{ __('Add Trip') }}
@endsection
@section('main')
<main id="main" class="main">
    @php
    $usergrade = auth()->user()->userdetail->grade;
    // $select_key = App\Models\Grade::where('levels',auth()->user()->userdetail->grade)->pluck('select_column');
    $column = explode (",", App\Models\Grade::where('levels',$usergrade)->pluck('select_column')[0]);
    $selectdata = App\Models\DomesticPolicy::select($column[0],$column[1],$column[2])->get();
    @endphp
    {{-- {{$usergrade}} --}}
    {{-- {{$select_key}} --}}
    {{-- {{$selectdata}} --}}
   
    <x-container.addtripcontainer :tripDetails="$tripDetails" :usergrade="$usergrade" :selectdata="$selectdata" />

</main><!-- End #main -->
<x-modal.requestmodel :tripDetails="$tripDetails" :usergrade="$usergrade" />
<x-modal.servicemodel />
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="{{asset('assets/js/addtripscript.js')}}"></script>


@endsection
