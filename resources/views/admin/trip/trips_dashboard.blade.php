@extends('layouts.app')

@section('content')
    <section class="content-header" xmlns="">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Trips</h1>
                </div>

            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @include('admin.flash-message')
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
                                        <div class="d-flex align-items-stretch flex-column">
                                            <div class="position-relative">
                                                <div class="ribbon-wrapper ribbon-lg">
                                                    @if($trip_detail->status == config('constants.STATUS.Pending'))
                                                        <div class="ribbon bg-warning text-capitalize"
                                                             style="font-size: 1rem">
                                                            Pending
                                                        </div>
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
                                                    @else
                                                        -
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="card bg-default d-flex flex-fill">
                                                <div
                                                    class="card-header text-muted border-bottom-0">
                                                    Trip Id : <b>{{$trip_detail->id ?? '-'}}</b>
                                                </div>
                                                <div class="card-body pt-0">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <h2 class="lead">
                                                                <b>{{$trip_detail->customer->first_name ?? '-'}}</b>
                                                            </h2>
                                                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                                                <li class="small"><span class="fa-li"><i
                                                                            class="fas fa-lg fa-building"></i></span>
                                                                    Address: {{$trip_detail->customer->customerExtend->apartment ?? '-'}}
                                                                    ,
                                                                    {{$trip_detail->customer->customerExtend->block_flat ?? '-'}}
                                                                    , &nbsp;
                                                                    @if(isset($trip_detail->customer->customerExtend->city) || isset($trip_detail->customer->customerExtend->state))
                                                                        {{$trip_detail->customer->customerExtend->city ?? '-'}}
                                                                        ,
                                                                        &nbsp;{{$trip_detail->customer->customerExtend->state ?? '-'}}
                                                                        ,
                                                                    @else
                                                                        -
                                                                    @endif
                                                                    {{$trip_detail->customer->pincode ?? '-'}}

                                                                    {{-- Address: Shop no. SF-79,80, Shilp Arcade, behind--}}
                                                                    {{-- Domino's Pizza, Palanpur, Gujarat 385001--}}
                                                                </li>
                                                                <li class="small"><span class="fa-li"><i
                                                                            class="fas fa-lg fa-phone"></i></span>
                                                                    Phone:
                                                                    +91 {{$trip_detail->customer->mobile_no ?? '-'}}
                                                                </li>
                                                                <li class="small"><span class="fa-li"><i
                                                                            class="fas fa-at"></i></span> Email
                                                                    : {{$trip_detail->customer->email ?? '-'}}</li>
                                                                <li class="small"><span class="fa-li"><i
                                                                            class="fas fa-solid fa-calendar-check"></i></span>
                                                                    Created At
                                                                    : {{date_formate($trip_detail->created_at)}}
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div
                                                                class="trip-category shadow rounded-bottom p-1">{{$trip_detail->live_or_advance ?? '-'}}
                                                                &nbsp;{{$trip_detail->incity_or_out_city ?? '-'}}
                                                                &nbsp;{{$trip_detail->pickup_drop_or_temp ?? '-'}}</div>
                                                            <div class="flex-column">
                                                                <div class="text-center">
                                                                <span
                                                                    class="info-box-number text-center text-bold mb-0">Trip Start From</span>
                                                                    <hr class="p-0 m-1">
                                                                    <span
                                                                        class="text-center text-muted">{{$trip_detail->address ?? '-'}}, {{$trip_detail->city ?? '-'}}, {{$trip_detail->state ?? '-'}}</span>
                                                                    {{--                                                                <span class="text-center text-muted">{{$trip_detail->address}}, {{$trip_detail->city}}, {{$trip_detail->state}}</span>--}}
                                                                </div>
                                                            </div>
                                                            <hr class="p-0 m-2">
                                                            <div class="flex-column">
                                                                <div class="text-center">
                                                                <span
                                                                    class="info-box-number text-center text-bold mb-0">Trip End To</span>
                                                                    <hr class="p-0 m-1">
                                                                    <span
                                                                        class="text-center text-muted">{{$trip_detail->destination_address ?? '-'}}, {{$trip_detail->destination_city}}, {{$trip_detail->destination_state}}</span>
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
                                                                    {{--  <span class="text-center text-muted">{{birth_date_formate($trip_detail->start_or_pickup_date)}} <b>{{date('h:i A',strtotime($trip_detail->start_or_pickup_time))}}</b></span>--}}
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
                                                                    {{--  <span class="text-center text-muted">{{birth_date_formate($trip_detail->end_or_drop_date)}} <b>{{date('h:i A',strtotime($trip_detail->end_or_drop_time))}}</b></span>--}}
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

                                                        <div class="col-lg-5">
                                                            <div class="text-left rupee">
                                                        <span class="text-white bg-success city_destination_city"
                                                              style="margin-left: 134px; font-size: 1.1rem"><b>&nbsp;{{$trip_detail->city ?? '-'}} <i
                                                                    class="fas fa-long-arrow-alt-right"></i>
                                                                    {{$trip_detail->destination_city ?? '-'}}</b></span>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4">
                                                            <div class="text-right">
                                                                <a href="#" class="text-dark mr-2"
                                                                   style="font-size: 1rem"><i class="fas fa-user"></i>

                                                                    @if (isset($trip_detail->driver->first_name))
                                                                        Driver:- {{$trip_detail->driver->first_name}}
                                                                </a>
                                                                @else
                                                                    Driver:- - </a>
                                                                @endif
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
                        <div class="col-lg-3" style="position: sticky; top: 4rem; height: calc(100vh - 4rem);">
                            <div class="card card-default card-default">
                                <div class="card-header">
                                    <h3 class="card-title">Trips Filter</h3>
                                </div>

                                <div class="card-body">
                                    <form method="GET">
                                        <div class="row">
                                            <div class="col-1 mt-2 ml-1">
                                                <i class="glyphicon glyphicon-calendar fa fa-calendar filter"></i>&nbsp;
                                                <span id="dates"></span> <b class="caret"></b>
                                            </div>
                                            <div class="form-group col-10">
                                                <div>
                                                    <input id="reportrange" name="date" class="pull-left form-control"
                                                           style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;">
                                                </div>
                                            </div>
                                        </div>
                                        <button href="#" class="btn btn-primary btn-block" id="filter">Filter</button>
                                    </form>
                                    <hr>
                                    <div class="card-header pl-0">
                                        <h3 class="card-title ml-0 pl-0">Status</h3>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input status_checkbox booking" type="checkbox"
                                                   id="pending"
                                                   value="pending" name="status[]">
                                            <label for="pending"
                                                   class="custom-control-label text-warning">Pending</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input status_checkbox booking" type="checkbox"
                                                   id="ongoing"
                                                   value="on_going" name="status[]">
                                            <label for="ongoing" class="custom-control-label text-info">On-Going</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input status_checkbox booking" type="checkbox"
                                                   id="cancel"
                                                   value="cancel" name="status[]">
                                            <label for="cancel" class="custom-control-label text-danger">Cancel</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input status_checkbox booking" type="checkbox"
                                                   id="completed"
                                                   value="completed" name="status[]">
                                            <label for="completed"
                                                   class="custom-control-label text-success">Completed</label>
                                        </div>
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


@push('page_scripts')

    <script type="text/javascript">

        $(function () {

            var start = moment().subtract(29, 'days');
            var end = moment();

            function cb(start, end) {
                // alert('call');
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                $('.filter').trigger('change');
            }

            $('#reportrange').daterangepicker({
                startDate: start,
                endDate: end,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            }, cb);

            // cb(start, end);

        });
    </script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[live_or_advance="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function () {
            // $('.booking').on('change', function(e) {
            //     var arr = e.target.value;
            $('.booking').click(function () {
                $(".booking").addClass('checked');
                var arr = $('.booking:checked').map(function () {
                    return this.value;
                }).get();
                // alert(arr);
                $.ajax({
                    url: "{{ url('live-booking') }}",
                    type: "get",
                    data: {
                        arr: arr
                    },
                    datatype: 'html',
                    success: function (data) {
                        console.log(data);
                        $('.viewRender').html(data.html);

                        if (data.resultCount == 0) {
                            $('#loadMore').html('<center><img src="{{asset('admin/images/data_not_found.svg')}}" class="mb-2" height="200px" disable> <h4 class="text-center ml-5 font-weight-bold">Data Not Found</h4></center>');
                            //$('#loadMore').hide();
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
            $.get("{{ url('live-booking') }}?page=" + page, "arr=" + arr, function (results) {
                // $("#count").text(result.resultCount);
                if (loadMore == 1) {
                    $(".load").append(results.html);
                } else {
                    $(".load").html(results.html);
                }

                if (results.resultCount == 0) {
                    $('#loadMore').hide();

                    // $("#msg").html('<center><a class="btn btn-warning text-center">\n' +
                    //     'No More Records</a></center>');
                    $("#msg").html("");
                } else {
                    $('#loadMore').html('<i class="fas fa-sync"></i> Load More').show();
                    $("#msg").html("");
                }

                $('#loading').hide();
            });
        }

        $(document).ready(function () {
            // getsearch();
        });

        // loadmore
        $(document).on('click', '#loadMore', function () {
            page = page + 1;
            $('#loadMore').hide();
            $('#loading').show();
            // $(this).removeClass('btn btn-primary');
            getsearch(loadMore = 1);

        });
    </script>

    {{--    <script>--}}
    {{--        $(document).ready(function () {--}}

    {{--            $("#copy").click(function () {--}}
    {{--                $("#first").clone().appendTo("#second");--}}
    {{--            });--}}
    {{--        });--}}
    {{--    </script>--}}


@endpush



