@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                    <h1>Trip Dashboard</h1>
                </div>
                <div class="col-sm-8">
                    <ol class="breadcrumb float-sm-right">
                        <form method="GET" class="form-inline">
                            <div class="row">
                                <div class="col-1 mt-4 ml-1">
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
                            <button href="#" class="btn btn-primary" id="filter">Filter</button>
                        </form>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <h5 class="mb-2">Trip Counter Summary</h5>
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-dark"><i class="fas fa-retweet text-warning"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Trip</span>
                            <span class="info-box-number">{{$trip}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-dark"><i class="fas fa-times-circle text-warning"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Canceled Trips</span>
                            <span class="info-box-number">{{$canceltrip}}</span>
                        </div>

                    </div>

                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-dark"><i class="fas fa-plane text-warning"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Ongoing Trips</span>
                            <span class="info-box-number">{{$ongoingtrip}}</span>
                        </div>

                    </div>

                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-dark"><i class="fas fa-check-double text-warning"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Permanent Trips</span>
                            <span class="info-box-number">{{$permanent_trips}}</span>
                        </div>

                    </div>

                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-dark"><i class="fab fa-perbyte text-warning"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Valet Trips</span>
                            <span class="info-box-number">{{$valet_trips}}</span>
                        </div>

                    </div>

                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-dark"><i class="fas fa-headset text-warning"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Live Booking Trips</span>
                            <span class="info-box-number">{{$livebookingtrip}}</span>
                        </div>

                    </div>

                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-dark"><i class="fas fa-bookmark text-warning"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Advance Booking Trips</span>
                            <span class="info-box-number">{{$advancebookingtrip}}</span>
                        </div>

                    </div>

                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-dark"><i class="fas fa-people-arrows text-warning"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">PickUp Drop Trips</span>
                            <span class="info-box-number">{{$pickupdroptrip}}</span>
                        </div>

                    </div>

                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-dark"><i class="fas fa-sort-amount-down text-warning"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">In-City Trips</span>
                            <span class="info-box-number">{{$incitytrip}}</span>
                        </div>

                    </div>

                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-dark"><i class="fas fa-sort-amount-up text-warning"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Out-City Trips</span>
                            <span class="info-box-number">{{$outcitytrip}}</span>
                        </div>

                    </div>

                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-dark"><i class="fas fa-braille text-warning"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Temporary Trips</span>
                            <span class="info-box-number">{{$temporarytrip}}</span>
                        </div>

                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">Trip Details</h3>
                            <div class="card-tools d-flex justify-content-center align-items-center">
                                <form action="{{route('dashboard')}}" method="get">
                                    <div class="input-group input-group-sm" style="width: 250px;">
                                        <input type="text" name="search"
                                               class="form-control float-right"
                                               placeholder="Search">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="clearfix"></div>

                        </div>

                        <div class="card-body table-responsive p-0">
                            @if($tripdetails->count() > 0)
                                <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Customer Name</th>
                                        <th>Trip Type</th>
                                        <th>Start From</th>
                                        <th>End To</th>
                                        <th>Start At</th>
                                        <th>End At</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tripdetails as $tripdetail)
                                        <tr>
                                            {{--                                        <td>{{ $tripdetails->firstItem() + $loop->index }}</td>--}}
                                            <td>{{ $tripdetail->id }}</td>
                                            <td>{{$tripdetail->customer->first_name}}</td>
                                            <td>{{$tripdetail->live_or_advance}} <br>
                                                {{$tripdetail->incity_or_out_city}} <br>
                                                {{$tripdetail->pickup_drop_or_temp}} <br>
                                            </td>
                                            <td>{{$tripdetail->city ?? '-'}}</td>
                                            <td>{{$tripdetail->destination_city ?? '-'}}</td>
                                            @php
                                                $startdatetime = ($tripdetail->start_or_pickup_date).' '.($tripdetail->start_or_pickup_time)
                                            @endphp
                                            <td>{{date_formate($startdatetime)}}</td>
                                            @php
                                                $enddatetime = ($tripdetail->end_or_drop_date).' '.($tripdetail->end_or_drop_time)
                                            @endphp
                                            <td>{{date_formate($enddatetime)}}</td>
                                            @if($tripdetail->status == config('constants.STATUS.Pending'))
                                                <td><span class="badge badge-warning">Pending</span></td>
                                            @elseif($tripdetail->status == config('constants.STATUS.Cancel'))
                                                <td><span class="badge badge-danger">Cancel</span></td>
                                            @elseif($tripdetail->status == config('constants.STATUS.On_Going'))
                                                <td><span class="badge badge-info">On Going</span></td>
                                            @elseif($tripdetail->status == config('constants.STATUS.Completed'))
                                                <td><span class="badge badge-success">Completed</span></td>
                                            @elseif($tripdetail->status == null)
                                                -
                                            @endif
                                            <td>
                                                <a href="{{route('driver-allocation-list')}}?trip_id={{$tripdetail->id}}"
                                                   class="btn btn-warning">
                                                    <i class="fas fa-plus-circle"></i> Assign To Driver
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Customer Name</th>
                                        <th>Trip Type</th>
                                        <th>Start From</th>
                                        <th>End To</th>
                                        <th>Start At</th>
                                        <th>End At</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                </table><br>
                                <center><img src="{{asset('admin/images/data_not_found.svg')}}" class="mb-2"
                                             height="200px"></center>
                                <h4 class="text-center ml-5 font-weight-bold">Data Not Found</h4>
                            @endif
                        </div>
                        <div class="pagination justify-content-end">
                            {!! $tripdetails->links() !!}
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

    <script>
        $("#searchINPUT").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#driver_allocation tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    </script>
@endpush
