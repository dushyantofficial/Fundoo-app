@extends('layouts.app')
@push('page_css')
    <style>
        .export {
            margin-left: 190px;
        }
    </style>
@endpush
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Advance Trip Reports</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('admin.flash-message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                <form method="GET" class="form-inline">
                    <div class="row">
                        <div class="col-1 mt-4 ml-2">
                            <i class="glyphicon glyphicon-calendar fa fa-calendar filter"></i>&nbsp;
                            <span id="dates"></span> <b class="caret"></b>
                        </div>
                        <div class="form-group col-4">
                            <div>
                                <input id="reportrange" name="date" class="pull-left form-control"
                                       style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;">
                            </div>
                        </div>
                    </div>
                    <div class="ml-2">
                        <select class="form-control" name="in_city_or_out_city">
                            <option disabled selected hidden>In-City Or Out-City</option>
                            <option value="{{config('constants.BOOKING_CITY.In City')}}">In City</option>
                            <option value="{{config('constants.BOOKING_CITY.Out City')}}">Out City</option>
                        </select>
                    </div>
                    <div class="ml-3">
                        <select class="form-control" name="pickup_or_temporary">
                            <option disabled selected hidden>Pickup Or Temperary</option>
                            <option value="{{config('constants.CATEGORY.pickup-drop')}}">Pickup-Drop</option>
                            <option value="{{config('constants.CATEGORY.temporary')}}">Temporary</option>
                        </select>
                    </div>

                    <div class="ml-3">
                        <select class="form-control" name="status">
                            <option disabled selected hidden>Status</option>
                            <option value="{{config('constants.STATUS.Pending')}}">Pending</option>
                            <option value="{{config('constants.STATUS.On_Going')}}">On Going</option>
                            <option value="{{config('constants.STATUS.Completed')}}">Completed</option>
                            <option value="{{config('constants.STATUS.Cancel')}}">Cancel</option>
                        </select>
                    </div>
                    <button href="#" class="btn btn-primary ml-3" id="filter">Filter</button>
                    <a href="{{url('admin/advance-trip-reports')}}" class="btn btn-dark ml-3">Reset</a>
                    <div class="ml-3">
                        <a class="btn btn-success export" href="#" onclick="ExportToExcel()"> Excel </a>

                        <a class="btn btn-dark ml-2 export"
                           href="{{route('advance-trip-reports-pdf')}}?date={{request()->date}}&in_city_or_out_city={{request()->in_city_or_out_city}}&pickup_or_temporary={{request()->pickup_or_temporary}}&status={{request()->status}}">
                            PDF </a>
                    </div>
                </form>
                <div class="table-responsive">
                    <div id="my_report">
                        @if($advance_trips->count() > 0)
                            <table class="table table-responsive" id="sliders-table">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Customer Name</th>
                                    <th>Customer Mobile No</th>
                                    <th>Driver Name</th>
                                    <th>Driver Mobile No</th>
                                    <th>In-City/Out-City</th>
                                    <th>Pick-up/Temporary</th>
                                    <th>Trip To to From</th>
                                    <th>Trip Start At</th>
                                    <th>Trip End At</th>
                                    <th>Status</th>
                                    <th>Amount</th>
                                    <th>Created At</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($advance_trips as $advance_trip)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        @if($advance_trip->customer_id ?? '-')
                                            <td>{{ $advance_trip->customer->first_name ?? '-' }} {{ $advance_trip->customer->middle_name ?? '-' }} {{ $advance_trip->customer->last_name ?? '-' }}</td>
                                        @else
                                            <td>-</td>
                                        @endif
                                        <td>{{ $advance_trip->customer->mobile_no ?? '-'}}</td>
                                        @if($advance_trip->driver_id)
                                            <td>{{ $advance_trip->driver->first_name ?? '-' }} {{ $advance_trip->driver->middle_name ?? '-' }} {{ $advance_trip->driver->last_name ?? '-' }}</td>
                                        @else
                                            <td>-</td>
                                        @endif
                                        <td>{{ $advance_trip->driver->mobile_no ?? '-' }}</td>
                                        <td>{{ $advance_trip->incity_or_out_city ?? '-' }}</td>
                                        <td>{{ $advance_trip->pickup_drop_or_temp ?? '-' }}</td>
                                        <td>{{ $advance_trip->city }}
                                            to {{ $advance_trip->destination_city ?? '-' }}</td>
                                        @php
                                            $startdatetime = ($advance_trip->start_or_pickup_date).' '.($advance_trip->start_or_pickup_time)
                                        @endphp
                                        <td>{{date_formate($startdatetime) ?? '-'}}</td>
                                        @php
                                            $enddatetime = ($advance_trip->end_or_drop_date).' '.($advance_trip->end_or_drop_time);
                                        @endphp
                                        <td>{{date_formate($enddatetime) ?? '-'}}</td>
                                        <td>
                                            @if ($advance_trip->status == config('constants.STATUS.Pending'))
                                                <span class="badge badge-warning">Pending</span>
                                            @elseif($advance_trip->status == config('constants.STATUS.On_Going'))
                                                <span class="badge badge-info">On Going</span>
                                            @elseif($advance_trip->status == config('constants.STATUS.Completed'))
                                                <span class="badge badge-success">Completed</span>
                                            @elseif($advance_trip->status == config('constants.STATUS.Cancel'))
                                                <span class="badge badge-danger">Cancel</span>
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>{{ get_rupee_currency($advance_trip->total_payment) ?? '-' }}</td>
                                        <td>{{ $advance_trip->created_at ?? '-' }}</td>
                                    </tr>
                                @endforeach

                                </tbody>

                            </table>
                        @else
                            <table class="table" id="sliders-table">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Customer Name</th>
                                    <th>Driver Name</th>
                                    <th>C-Mobile No</th>
                                    <th>D-Mobile No</th>
                                    <th>In-City/Out-City</th>
                                    <th>Pick-up/Temporary</th>
                                    <th>Trip To/From</th>
                                    <th>Trip Start At</th>
                                    <th>Trip End At</th>
                                    <th>Status</th>
                                    <th>Amount</th>
                                    <th>Created At</th>
                                </tr>
                                </thead>
                            </table>
                            <center><img src="{{asset('admin/images/data_not_found.svg')}}"
                                         class="mb-2" height="200px"></center>
                            <h4 class="text-center ml-5 font-weight-bold">Data Not Found</h4>
                        @endif
                    </div>
                </div>

                <div class="card-footer clearfix">
                    <div class="float-right">
                        {!! $advance_trips->links() !!}
                    </div>
                </div>
            </div>

        </div>
    </div>
    @php
        $date = request()->date;
        if(isset($date)){
        $name = explode(' ', $date);
        //$start = date('Y-m-d', strtotime($name[0]));
        $start = date('d-m-Y', strtotime($name[0]));
        //$end = date('Y-m-d', strtotime($name[2]));
        $end = date('d-m-Y', strtotime($name[2]));
}
    @endphp
@endsection

@push('page_scripts')

    <script type="text/javascript" src="{{asset('admin/js/xlsx.full.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/js/pdfmake.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/js/html2canvas.min.js')}}"></script>
    {{--    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.5/pdfmake.min.js"></script>--}}
    {{--    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>--}}
    <script>

        function ExportToExcel(type, fn, dl) {
            var elt = document.getElementById('my_report')
            var wb = XLSX.utils.table_to_book(elt, {sheet: "sheet1"});
            return dl ?
                XLSX.write(wb, {bookType: type, bookSST: true, type: 'base64'}) :
                XLSX.writeFile(wb, fn || ('<?php if($date){ if (isset($date)) {
                    echo $start;
                } ?>_to_<?php if (isset($date)) {
                    echo $end . '_';
                }}?>advance_trip_report.' + (type || 'xlsx')));
        }

        // function pdfreport() {
        //
        //     html2canvas($('#my_report'), {
        //         onrendered: function (canvas) {
        //             var data = canvas.toDataURL();
        //             var docDefinition = {
        //                 content: [{
        //                     image: data,
        //                     width: 500
        //                 }]
        //             };
        //             pdfMake.createPdf(docDefinition).download("advance_trip_report.pdf");
        //         }
        //     });
        //
        // }
    </script>
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
@endpush

