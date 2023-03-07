@extends('layouts.app')
@push('page_css')
    <style>
        .export {
            margin-left: 540px;
        }
    </style>
@endpush
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Driver Reports</h1>
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
                        <div class="form-group col-4 mt-1">
                            <div>
                                <input id="reportrange" name="date" class="pull-left form-control"
                                       style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;">
                            </div>
                        </div>
                    </div>
                    <div class="ml-3">
                        <select class="form-control" name="work_type">
                            <option disabled selected hidden> Please Select Type</option>
                            <option value="{{config('constants.CATEGORY.permanent')}}">Permanent</option>
                            <option value="{{config('constants.CATEGORY.temporary')}}">Temporary</option>
                            <option value="{{config('constants.CATEGORY.pickup-drop')}}">Pickup-Drop</option>
                            <option value="{{config('constants.CATEGORY.valet_parking')}}">Valet Parking</option>
                        </select>
                    </div>
                    <button href="#" class="btn btn-primary ml-3" id="filter">Filter</button>
                    <a href="{{url('admin/driver-reports')}}" class="btn btn-dark ml-3">Reset</a>
                    <div class="ml-3">
                        <a class="btn btn-success export" href="#" onclick="ExportToExcel()"> Excel </a>

                        <a class="btn btn-dark ml-2 export"
                           href="{{route('driver-reports-pdf')}}?date={{request()->date}}&work_type={{request()->work_type}}">
                            PDF </a>
                    </div>
                </form>
                <div class="table-responsive">
                    <div id="my_report">
                        @if($drivers->count() > 0)
                            <table class="table" id="sliders-table">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Full Name</th>
                                    <th>Mobile No</th>
                                    <th>Aditional No</th>
                                    <th>Email</th>
                                    <th>Work Type</th>
                                    <th>City</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($drivers as $driver)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        @if($driver->user_id)
                                            <td>{{ $driver->user->first_name }} {{ $driver->user->middle_name }} {{ $driver->user->last_name }}</td>
                                        @else
                                            <td>-</td>
                                        @endif
                                        <td>{{ $driver->user->mobile_no }}</td>
                                        <td>{{ $driver->aditional_contact_no }}</td>
                                        <td>{{ $driver->user->email }}</td>
                                        <td>{{ $driver->work_type }}</td>
                                        <td>{{ $driver->user->city }}</td>
                                        <td>
                                            @if ($driver->status == 'deactive')
                                                <span class="badge badge-danger">DeActive</span>
                                            @else
                                                <span class="badge badge-success">Active</span>
                                            @endif
                                        </td>
                                        <td>{{ $driver->created_at }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <table class="table" id="sliders-table">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Full Name</th>
                                    <th>Mobile No</th>
                                    <th>Aditional No</th>
                                    <th>Email</th>
                                    <th>Work Type</th>
                                    <th>City</th>
                                    <th>Status</th>
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
                        {!! $drivers->links() !!}
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
                }}?>driver_report.' + (type || 'xlsx')));
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
        //             pdfMake.createPdf(docDefinition).download("driver_report.pdf");
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
                // "showDropdowns": true,
                // "showWeekNumbers": true,
                // "alwaysShowCalendars": true,
                // timePicker: false,
                // autoUpdateInput: false,
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

