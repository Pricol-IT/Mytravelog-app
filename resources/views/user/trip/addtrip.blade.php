@extends('user.layouts.app')
@section('title')
{{ __('Add Trip') }}
@endsection
@section('main')
<main id="main" class="main">

    <x-container.addtripcontainer :tripDetails="$tripDetails" />

</main><!-- End #main -->
<x-modal.requestmodel :tripDetails="$tripDetails" />
<x-modal.servicemodel />
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="{{asset('assets/js/addtripscript.js')}}"></script>
@endsection
