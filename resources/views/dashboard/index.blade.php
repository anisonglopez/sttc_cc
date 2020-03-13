@extends('layout.template')
{{-- For  Content . Blade --}}
@section('content')
<script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>
<div class="card card-header  mb-2">
<h3>Dashboard / Wallboard</h3>
</div>
<div class="row">

    <div class="col-md-6">
        @include('dashboard.outstock')
        @include('dashboard.jobreport_dailry')
        @include('dashboard.jobchart_line')
    </div>
    <div class="col-md-6">
            @include('dashboard.jobreport')
            @include('dashboard.jobchart')
    </div>
</div>
@endsection
{{-- For Script Javascript --}}
@section('js')
@include('dashboard.js.js_outstock')

<script src="{{asset('build/js/demo/chart-pie-demo.js')}}"></script>
@endsection

{{-- For  Modal --}}
@section('modal')

@endsection