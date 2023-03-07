@extends('layouts.app')

@section('content')

    <section class="content-header" xmlns="">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1>On Trips Customers</h1>
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
                        <div class="col-lg-9">
                            @if($trip_details->count() > 0)
                            <div id="first" class="viewRender load">
                                @foreach($trip_details as $trip_detail)
                                    {{--                                    @dd($trip_detail)--}}
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
                                                    <div class="ribbon bg-info text-capitalize"
                                                         style="font-size: 1rem">
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
                                                                    {{$trip_detail->customer->customerExtend->city ?? '-'}}
                                                                    ,
                                                                    &nbsp;{{$trip_detail->customer->customerExtend->state ?? '-'}}
                                                                    ,
                                                                @else
                                                                    -
                                                                @endif
                                                                {{$trip_detail->customer->pincode ?? '-'}}
                                                            </li>
                                                            <li class="small"><span class="fa-li"><i
                                                                        class="fas fa-lg fa-phone"></i></span>
                                                                Phone:
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
                                                                <span class="text-center text-muted">{{$trip_detail->address ?? '-'}}, {{$trip_detail->city ?? '-'}}, {{$trip_detail->state ?? '-'}}</span>
                                                            </div>
                                                        </div>
                                                        <hr class="p-0 m-2">
                                                        <div class="flex-column">
                                                            <div class="text-center">
                                                                <span
                                                                    class="info-box-number text-center text-bold mb-0">Trip End To</span>
                                                                <hr class="p-0 m-1">
                                                                <span class="text-center text-muted">{{$trip_detail->destination_address ?? '-'}}, {{$trip_detail->destination_city}}, {{$trip_detail->destination_state}}</span>
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
                                                                @if(isset($trip_detail->driver))
                                                                    Driver: {{$trip_detail->driver->first_name ?? '-'}}
                                                            </a>
                                                            @endif
                                                            {{--                                                            <a href="https://www.google.com/maps/dir/{{$trip_detail->city}},+{{$trip_detail->state}}+{{$trip_detail->city}}/{{$trip_detail->destination_city}},+{{$trip_detail->destination_city}}/@+{{$trip_detail->start_late}},{{$trip_detail->start_long}},{{$trip_detail->destination_late}}z+/data=!4m13!4m12!1m5!1m1!1s0x395ce9433aa83189:0x36a408833757b857!2m2!1d72.434581!2d24.1724338!1m5!1m1!1s0x395e848aba5bd449:0x4fcedd11614f6516!2m2!1d72.5713621!2d23.022505"--}}

                                                            {{--                                                            <a href="https://www.google.com/maps/dir/Palanpur,+Gujarat+385001/Ahmedabad,+Gujarat/@23.5922694,71.9236665,9.13z/data=!4m13!4m12!1m5!1m1!1s0x395ce9433aa83189:0x36a408833757b857!2m2!1d72.434581!2d24.1724338!1m5!1m1!1s0x395e848aba5bd449:0x4fcedd11614f6516!2m2!1d72.5713621!2d23.022505"--}}
                                                            <a href="{{getNavigatorUrl($trip_detail->start_late,$trip_detail->start_long,$trip_detail->destination_late,$trip_detail->destination_long)}}"
                                                               id="track_map" target="_blank"
                                                               class="btn btn-success">
                                                                <i class="fas fa-map-marked-alt"></i> Track
                                                            </a>
                                                            {{--                                                            <div class="card-map card-map-placeholder">--}}
                                                            {{--                                                                <div id="track_map" style="height: 350px">--}}
                                                            {{--                                                                </div>--}}
                                                            {{--                                                            </div>--}}
                                                            <a href="{{route('driver-allocation-list')}}?trip_id={{$trip_detail->id}}"
                                                               class="btn btn-warning">
                                                                <i class="fas fa-exchange-alt"></i> Change Driver
                                                            </a>
                                                        </div>

                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div>
                                </div>

                                <div id="second">

                                </div>
                            </div>
                                @if(count($trip_details) > 5)
                                    <center><a class="btn btn-warning text-center btn_1" data-ajax="true" id="loadMore"
                                        ><i class="fas fa-sync"></i> Load More</a></center>
                                @endif
                            @else
                                <center><img src="{{asset('admin/images/data_not_found.svg')}}"
                                             class="mb-2" height="200px"></center>
                                <h4 class="text-center ml-5 font-weight-bold">Data Not Found</h4>
                            @endif
                            <div id="msg">
                            </div>
                        </div>
                        <div class="col-lg-3" style="position: sticky;top: 4rem;height: calc(100vh - 4rem);">
                            <div class="card card-default card-default">
                                <div class="card-header">
                                    <h3 class="card-title">Filter</h3>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="Search">Search</label>
                                        <form action="{{route('customer-search')}}?filter=" method="get">
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="filter" class="form-control"
                                                       placeholder="Search...">
                                                <span class="input-group-append">
                                                 <button type="submit" class="btn btn-warning btn-flat">Go!</button>
                                                 </span>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="card-header pl-0">
                                        <h3 class="card-title ml-0 pl-0">Trip Category</h3>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input booking" type="radio"
                                                   id="live_booking" name="live_or_advance"
                                                   value="live_booking">
                                            <label for="live_booking" class="custom-control-label">Live Booking</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input booking" type="radio"
                                                   id="advance_booking" name="live_or_advance"
                                                   value="advance_booking">
                                            <label for="advance_booking" class="custom-control-label">Advance
                                                Booking</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input booking" type="radio" id="in_city"
                                                   name="incity_or_out_city" value="In City">
                                            <label for="in_city" class="custom-control-label">In City</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input booking" type="radio" id="out_city"
                                                   name="incity_or_out_city" value="Out City">
                                            <label for="out_city" class="custom-control-label">Out City</label>
                                        </div>

                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input booking" type="radio" id="pickup_drop"
                                                   name="pickup_drop_or_temp"
                                                   value="pickup_drop">
                                            <label for="pickup_drop" class="custom-control-label">PickUp Drop</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input booking" type="radio" id="temporary"
                                                   name="pickup_drop_or_temp"
                                                   value="temporary">
                                            <label for="temporary" class="custom-control-label">Temporary</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[live_or_advance="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function () {
        $('.booking').click(function () {
            $(".booking").addClass('checked');
            var arr = $('.booking:checked').map(function () {
                return this.value;
            }).get();
            $.ajax({
                url: "{{ route('on-trip-customer-filter') }}",
                type: "get",
                data: {
                    arr: arr
                },
                datatype: 'html',
                success: function (data) {

                    $('.viewRender').html(data.html);
                    if (data.resultCount == 0) {
                        $('#loadMore').html('<center><img src="{{asset('admin/images/data_not_found.svg')}}" class="mb-2" height="200px" disable> <h4 class="text-center ml-5 font-weight-bold">Data Not Found</h4></center>');
                    }

                }
            })

        });
    });

</script>

<script>
    let page = 0;

    function getsearch(loadMore = 0) {
        if (loadMore == 0) {
            page = 0;
        }
        arr = $('.booking:checked').map(function () {
            return this.value;
        }).get();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.get("{{ route('on-trip-customer-filter') }}?page=" + page, "arr=" + arr, function (results) {


            if (loadMore == 1) {
                $(".load").append(results.html);
            } else {
                $(".load").html(results.html);
            }

            if (results.resultCount == 0) {
                $('#loadMore').hide();

                $("#msg").html("");
            } else {
            }

            $('#loading').hide();
        });
    }

    $(document).ready(function () {

    });

    // loadmore
    $(document).on('click', '#loadMore', function () {
        page = page + 1;
        $('#loadMore').hide();
        $('#loading').show();
        getsearch(loadMore = 1);

    });
</script>

{{--<script>--}}
{{--    var pageNo = 1;--}}
{{--    $(window).on('load', function () {--}}
{{--        /*Load map*/--}}
{{--        const lat = parseFloat('{{$trip_detail->lat}}');--}}
{{--        const longi = parseFloat('{{$trip_detail->longi}}');--}}
{{--        loadMap("track_map", null, lat, longi, false, 15, false);--}}
{{--    });--}}
{{--</script>--}}





