@extends('layouts.app')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Customers Trip</h1>
                </div>

            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-12"></div>
                        </div>
                    </div>
                </div>
                <div class="card-body pb-0 p-2">
                    <div class="row">
                        <div class="col-lg-12">
                            <div id="first" class="viewRender load">
                                {{--                                @foreach($trip_details as $trip_detail)--}}
                                <div class="d-flex align-items-stretch flex-column block">
                                    <div class="position-relative">
                                        <div class="ribbon-wrapper ribbon-lg">
                                            @if($trip_detail->status == config('constants.STATUS.Pending'))
                                                <div class="ribbon bg-warning text-capitalize"
                                                     style="font-size: 1rem">
                                                    Pending
                                                </div>
                                                {{--                                                @elseif($trip_detail->status == 'up_coming')--}}
                                                {{--                                                    <div class="ribbon bg-primary text-capitalize"--}}
                                                {{--                                                         style="font-size: 1rem">--}}
                                                {{--                                                        Up Coming--}}
                                                {{--                                                    </div>--}}
                                            @elseif($trip_detail->status == config('constants.STATUS.Cancel'))
                                                <div class="ribbon bg-danger text-capitalize"
                                                     style="font-size: 1rem">
                                                    Cancel
                                                </div>
                                            @elseif($trip_detail->status == config('constants.STATUS.On_Going'))
                                                <div class="ribbon bg-info text-capitalize" style="font-size: 1rem">
                                                    On Going
                                                </div>
                                            @elseif($trip_detail->status == config('constants.STATUS.Completed'))
                                                <div class="ribbon bg-success text-capitalize"
                                                     style="font-size: 1rem">
                                                    Completed
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="card bg-default d-flex flex-fill">
                                        <div class="card-header text-muted border-bottom-0">
                                            Trip Id : <b>{{$trip_detail->id}}</b>
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class="row">
                                                <div class="col-lg-4 block" id="first">
                                                    <h2 class="lead">
                                                        <b>{{$trip_detail->customer->first_name ?? '-'}}</b>
                                                    </h2>
                                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                                        <li class="small"><span class="fa-li"><i
                                                                    class="fas fa-lg fa-building"></i></span>
                                                            Address: {{$trip_detail->customer->customerExtend->apartment ?? '-'}}
                                                            ,
                                                            {{$trip_detail->customer->customerExtend->block_flat ?? '-'}}
                                                            ,
                                                            @if(isset($trip_detail->customer->customerExtend->city) || isset($trip_detail->customer->customerExtend->state))
                                                                {{$trip_detail->customer->customerExtend->city ?? '-'}},
                                                                &nbsp;{{$trip_detail->customer->customerExtend->state ?? '-'}}
                                                                ,
                                                            @else
                                                                -
                                                            @endif
                                                            {{$trip_detail->customer->pincode ?? '-'}}
                                                        </li>
                                                        <li class="small"><span class="fa-li"><i
                                                                    class="fas fa-lg fa-phone"></i></span> Phone:
                                                            +91
                                                            {{$trip_detail->customer->mobile_no ?? '-'}}
                                                        </li>
                                                        <li class="small"><span class="fa-li"><i
                                                                    class="fas fa-at"></i></span>
                                                            Email : {{$trip_detail->customer->email ?? '-'}}
                                                        </li>
                                                        <li class="small"><span class="fa-li"><i
                                                                    class="fas fa-solid fa-calendar-check"></i></span>
                                                            Created At
                                                            : {{date_formate($trip_detail->created_at) ?? '-'}}
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div
                                                        class="trip-category shadow rounded-bottom p-1">{{$trip_detail->live_or_advance ?? '-'}}
                                                        &nbsp;{{$trip_detail->incity_or_out_city ?? '-'}}
                                                        &nbsp;{{$trip_detail->pickup_drop_or_temp ?? '-'}}
                                                    </div>
                                                    <div class="flex-column">
                                                        <div class="text-center">
                                                                <span
                                                                    class="info-box-number text-center text-bold mb-0">Trip Start From</span>
                                                            <hr class="p-0 m-1">
                                                            <span class="text-center text-muted">{{$trip_detail->address ?? '-'}},{{$trip_detail->city ?? '-'}},{{$trip_detail->state ?? '-'}}</span>
                                                        </div>
                                                    </div>
                                                    <hr class="p-0 m-2">
                                                    <div class="flex-column">
                                                        <div class="text-center">
                                                                <span
                                                                    class="info-box-number text-center text-bold mb-0">Trip End To</span>
                                                            <hr class="p-0 m-1">

                                                            <span class="text-center text-muted">{{$trip_detail->destination_address ?? '-'}},{{$trip_detail->destination_city ?? '-'}},{{$trip_detail->destination_state ?? '-'}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                @php
                                                    $startdatetime = ($trip_detail->start_or_pickup_date).' '.($trip_detail->start_or_pickup_time)
                                                @endphp
                                                <div class="col-lg-4">
                                                    <div class="flex-column">
                                                        <div class="text-center">
                                                                <span
                                                                    class="info-box-number text-center text-bold mb-0">Start At</span>
                                                            <hr class="p-0 m-1">
                                                            <span
                                                                class="text-center text-muted">{{date_formate($startdatetime) ?? '-'}}</span>
                                                        </div>
                                                    </div>
                                                    <hr class="p-0 m-2">
                                                    @php
                                                        $enddatetime = ($trip_detail->end_or_drop_date).' '.($trip_detail->end_or_drop_time);
                                                    @endphp
                                                    <div class="flex-column">
                                                        <div class="text-center">
                                                                <span
                                                                    class="info-box-number text-center text-bold mb-0">End At</span>
                                                            <hr class="p-0 m-1">
                                                            <span
                                                                class="text-center text-muted">{{date_formate($enddatetime) ?? '-'}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="row align-items-center">
                                                <div class="col-lg-3">
                                                    <div class="text-left rupee">
                                                        <span class="font-italic text-white bg-success"
                                                              style="font-size: 1.5rem"><b><i
                                                                    class="fas fa-rupee-sign fa-1x bg-warning rounded-circle"></i> {{$trip_detail->total_payment ?? '-'}}</b></span>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3">
                                                    <div class="text-left rupee">
                                                        <span class="text-white bg-success"
                                                              style="font-size: 1.1rem"><b>&nbsp;{{$trip_detail->city ?? '-'}} <i
                                                                    class="fas fa-long-arrow-alt-right"></i>
                                                                    {{$trip_detail->destination_city ?? '-'}}</b></span>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="text-right">

                                                        <a href="#" class="text-dark mr-2"
                                                           style="font-size: 1rem"><i
                                                                class="fas fa-user"></i>
                                                            Driver: {{$trip_detail->driver->first_name ?? '-'}}</a>

                                                        {{--                                                        <a href="https://www.google.com/maps/dir/Palanpur,+Gujarat+385001/Ahmedabad,+Gujarat/@23.5922694,71.9236665,9.13z/data=!4m13!4m12!1m5!1m1!1s0x395ce9433aa83189:0x36a408833757b857!2m2!1d72.434581!2d24.1724338!1m5!1m1!1s0x395e848aba5bd449:0x4fcedd11614f6516!2m2!1d72.5713621!2d23.022505"--}}
                                                        <a href="{{getNavigatorUrl($trip_detail->start_late,$trip_detail->start_long,$trip_detail->destination_late,$trip_detail->destination_long)}}"
                                                           target="_blank" class="btn btn-success">
                                                            <i class="fas fa-map-marked-alt"></i> Track
                                                        </a>
                                                        @if($trip_detail->status == config('constants.STATUS.Completed'))
                                                            <a href="{{route('driver-allocation-list')}}?trip_id={{$trip_detail->id}}"
                                                               class="btn btn-warning disabled">
                                                                <i class="fas fa-plus-circle"></i> Change Driver
                                                            </a>
                                                        @else
                                                            <a href="{{route('driver-allocation-list')}}?trip_id={{$trip_detail->id}}"
                                                               class="btn btn-warning">
                                                                <i class="fas fa-plus-circle"></i> Change Driver
                                                            </a>
                                                        @endif
                                                    </div>

                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                {{--                                @endforeach--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
