@extends('layouts.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li>@include('admin.flash-message')</li>
                        <li><a href="{{url('clear_cache')}}" class="btn btn-success btn-sm mr-2">Cache Clear</a></li>
                        <li class="breadcrumb-item"><a href="{{url('admin/home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <h5 class="mb-2">Counter Summary</h5>
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
                    <a href="{{route('admin.customerExtends.index')}}" class="text-dark">
                        <div class="info-box">
                            <span class="info-box-icon bg-dark"><i class="far fa-user text-warning"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Customers</span>
                                <span class="info-box-number">{{$total_customers}}</span>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
                    <a href="{{ route('admin.driverExtendeds.index') }}" class="text-dark">
                        <div class="info-box">
                            <span class="info-box-icon bg-dark"><i class="fas fa-car-alt text-warning"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Drivers</span>
                                <span class="info-box-number">{{$total_drivers}}</span>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
                    <a href="{{ route('trips-dashboard') }}" class="text-dark">
                        <div class="info-box">
                            <span class="info-box-icon bg-dark"><i class="fas fa-retweet text-warning"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Trip</span>
                                <span class="info-box-number">{{$trip}}</span>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
                    <a href="{{ route('on-trip-customer') }}" class="text-dark">
                        <div class="info-box">
                            <span class="info-box-icon bg-dark"><i class="fas fa-plane text-warning"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Ongoing Trips</span>
                                <span class="info-box-number">{{$ongoing_trip}}</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
                    <a href="{{ route('trips-dashboard') }}" class="text-dark">
                        <div class="info-box">
                            <span class="info-box-icon bg-dark"><i class="fas fa-check-circle text-warning"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Completed Trips</span>
                                <span class="info-box-number">{{$completed_trip}}</span>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
                    <a href="{{ route('trips-dashboard') }}" class="text-dark">
                        <div class="info-box">
                            <span class="info-box-icon bg-dark"><i class="fas fa-times-circle text-warning"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Canceled Trips</span>
                                <span class="info-box-number">{{$canceled_trip}}</span>
                            </div>
                        </div>
                    </a>
                </div>

            </div>


            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Revenue Graph</h3>
                            <div class="card-tools d-flex">
{{--                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"--}}
{{--                                   aria-expanded="false">--}}
{{--                                    Filter <span class="caret"></span>--}}
{{--                                </a>--}}
{{--                                <div class="dropdown-menu" style="">--}}
{{--                                    <a class="dropdown-item" tabindex="-1" href="#">Action</a>--}}
{{--                                    <a class="dropdown-item" tabindex="-1" href="#">Another action</a>--}}
{{--                                    <a class="dropdown-item" tabindex="-1" href="#">Something else here</a>--}}
{{--                                    <div class="dropdown-divider"></div>--}}
{{--                                    <a class="dropdown-item" tabindex="-1" href="#">Separated link</a>--}}
{{--                                </div>--}}

                                <div class="input-group">
                                    <button type="button" class="btn btn-default float-right" id="daterange-btn">
                                        <i class="far fa-calendar-alt"></i>
                                        <span></span> <i class="fas fa-caret-down"></i>
                                    </button>
                                </div>

{{--                                <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">--}}
{{--                                    <i class="fa fa-calendar"></i>&nbsp;--}}
{{--                                    <span></span> <i class="fa fa-caret-down"></i>--}}
{{--                                </div>--}}

                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="myChart"
                                        style="min-height: 400px; height: 400px; max-height: 400px; max-width: 100%;"></canvas>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <div class="row">

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">Permanent Booking</h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 250px;">
                                    <input type="text" name="permanent_search" id="permanent_search"
                                           class="form-control float-right"
                                           placeholder="Search">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="row mt-3">
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <a href="#" class="text-dark">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-dark"><i
                                                class="far fa-star text-warning"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Total Request Permanent Booking</span>
                                            <span
                                                class="info-box-number">{{$permanent_booking_requests_count ?? '-'}}</span>
                                        </div>

                                    </div>
                                    </a>

                                </div>
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <a href="#" class="text-dark">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-dark"><i
                                                class="far fa-star text-warning"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Total Permanent Booking</span>
                                            <span class="info-box-number">{{$permanent_bookings ?? '-'}}</span>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body table-responsive p-0" style="height:300px">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                <tr>
                                    <th>Customer</th>
                                    <th>Mobile</th>
                                    <th>Booking Date</th>
                                    <th>Assign Driver</th>
                                </tr>
                                </thead>
                                <tbody id="permanent_booking">
                                @foreach($permanent_booking_requests as $permanent_booking_request)
                                <tr>
                                    <td>{{$permanent_booking_request->permanent_customer->first_name ?? ' - '}}</td>
                                    <td>{{$permanent_booking_request->permanent_customer->mobile_no ?? ' - '}}</td>
                                    <td>{{birth_date_formate($permanent_booking_request->created_at)}}</td>
                                    <td>
                                        <a href="{{ route('driver-allocation-list') }}?id={{$permanent_booking_request->id}}"
                                           class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top"
                                           title="Assign To Driver">Assign Driver</a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">Valet Booking</h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 250px;">
                                    <input type="text" name="valet_search" id="valet_search"
                                           class="form-control float-right"
                                           placeholder="Search">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="row mt-3">
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <a href="#" class="text-dark">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-dark"><i
                                                class="far fa-star text-warning"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Total Request Valet Booking</span>
                                            <span
                                                class="info-box-number">{{$valet_booking_requests_count ?? '-'}}</span>
                                        </div>
                                    </div>
                                    </a>

                                </div>
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <a href="#" class="text-dark">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-dark"><i
                                                class="far fa-star text-warning"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Total Valet Booking</span>
                                            <span class="info-box-number">{{$valet_bookings}}</span>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body table-responsive p-0" style="height: 300px">

                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                <tr>
                                    <th>Customer</th>
                                    <th>Mobile</th>
                                    <th>Booking Date</th>
                                    <th>No Of Driver</th>
                                    <th>Assign Driver</th>
                                </tr>
                                </thead>
                                <tbody id="valet_booking">
                                @foreach($valet_booking_requests as $valet_booking_request)
                                    <tr>
                                        <td>{{$valet_booking_request->valet_customer->first_name ?? ' - '}}</td>
                                        <td>{{$valet_booking_request->valet_customer->mobile_no ?? ' - '}}</td>
                                        <td>{{birth_date_formate($valet_booking_request->created_at)}}</td>
                                        <td>{{$valet_booking_request->no_of_drivers}} &nbsp; <span
                                                class="badge badge-warning">Remaining</span></td>
                                        <td>
                                            <a href="{{ route('driver-allocation-list') }}?id={{$valet_booking_request->id}}"
                                               class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top"
                                               title="Assign To Driver">Assign Driver</a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('page_scripts')

    <script>
        $("#permanent_search").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#permanent_booking tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    </script>

    <script>
        $("#valet_search").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#valet_booking tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    </script>
@endpush
