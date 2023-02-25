@extends('layouts.app')

@section('title', 'Cчета и платежи')

@section('content')
    <div class="col-lg-4 col-12 mb-4">
        <div class="card">
            <h5 class="card-header">User by Devices</h5>
            <div class="card-body">
                <canvas id="doughnutChart" class="chartjs mb-4"></canvas>
                <ul class="doughnut-legend d-flex justify-content-around ps-0 mb-2 pt-1">
                    <li class="ct-series-0 d-flex flex-column">
                        <h5 class="mb-0 fw-bold">Desktop</h5>
                        <span class="badge badge-dot my-2 cursor-pointer rounded-pill" style="background-color: rgb(102, 110, 232);width:35px; height:6px;"></span>
                        <div class="text-muted">80 %</div>
                    </li>
                    <li class="ct-series-1 d-flex flex-column">
                        <h5 class="mb-0 fw-bold">Tablet</h5>
                        <span class="badge badge-dot my-2 cursor-pointer rounded-pill" style="background-color: rgb(40, 208, 148);width:35px; height:6px;"></span>
                        <div class="text-muted">10 %</div>
                    </li>
                    <li class="ct-series-2 d-flex flex-column">
                        <h5 class="mb-0 fw-bold">Mobile</h5>
                        <span class="badge badge-dot my-2 cursor-pointer rounded-pill" style="background-color: rgb(253, 172, 52);width:35px; height:6px;"></span>
                        <div class="text-muted">10 %</div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('') }}"></script>
@endsection
