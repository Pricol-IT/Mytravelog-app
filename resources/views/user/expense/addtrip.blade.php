@extends('user.layouts.app')
@section('title')
{{ __('Add Trip') }}
@endsection
@section('main')
<main id="main" class="main">

    @php
    $usergrade = auth()->user()->userdetail->grade;
    $column = explode (",", App\Models\Grade::where('levels',$usergrade)->pluck('select_column')[0]);
    $selectdata = App\Models\DomesticPolicy::select('id',$column[0],$column[1],$column[2])->get();
    $tier1=0;
    $tier2=0;
    $tier3=0;
    // for international
    $level=App\Models\Grade::select('category')->where('levels',$usergrade)->first();
    $internationalstaydata=App\Models\InternationalPolicy::where('level',$level->category)->where('components','Hotel and Stay arrangements')->first();
    $internationalallowancedata=App\Models\InternationalPolicy::where('level',$level->category)->where('components','Per Diem & Incidental Allowance')->first();
    $allowance=[$internationalstaydata,$internationalallowancedata];
    @endphp
    {{-- {{$level}}
    {{$internationalstaydata}}
    {{$internationalallowancedata}} --}}
    @php
    for ($x = 4; $x<= 9; $x++)
    {
        $dataArray=json_decode($selectdata[$x], true);
        $valuesArray=array_values($dataArray);
        $tier1+=$valuesArray[1];
        $tier2+=$valuesArray[2];
        $tier3+=$valuesArray[3];
        }
        @endphp
    <x-container.addtripcontainer :tripDetails="$tripDetails" :usergrade="$usergrade" :tier="[$tier3,$tier2,$tier1]" />
</main><!-- End #main -->
<x-modal.requestmodel :tripDetails="$tripDetails" :usergrade="$usergrade" />
<x-modal.servicemodel :tier="[$tier3,$tier2,$tier1]" :allowance="$allowance"/>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="{{asset('assets/js/addtripscript.js')}}"></script>


@endsection
