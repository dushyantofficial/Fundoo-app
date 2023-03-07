<html>
<head>
    <style>
        /*#ascrail2002 {*/
        /*    z-index: 0 !important;*/
        /*}*/

        /*.nicescroll-rails-vr {*/
        /*    z-index: 0;*/
        /*}*/

        @media print {
            .player-chart nice {
                width: 100%;
            }

            div table {
                width: 100%;
                margin: 0;

            }

            .print-table {
                max-width: 100%;
                border: 1px solid #000;
                border-collapse: collapse;
            }

            .print-table #leader {
                max-width: 100%;
                border: 1px solid #000;
                border-collapse: collapse;
            }
        }

    </style>
</head>
<body>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Customer Reports</h1>
            </div>
        </div>
    </div>
</section>

<div class="content px-3">

    @include('admin.flash-message')

    <div class="clearfix"></div>

    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                {{--                    <div id="my_report">--}}
                {{--                        <table class="table" id="sliders-table">--}}
                <div id="leaderBoardSwissTable" class="print-table">
                    <table id="leader" class="table table-responsive" border="1" width="100%"
                           style="border-collapse: collapse">
                        <thead>
                        <tr class="text-center">
                            <th style="padding: 10px;">No</th>
                            <th style="padding: 10px;">Full Name</th>
                            <th style="padding: 10px;">Mobile No</th>
                            <th style="padding: 10px;">Email</th>
                            <th style="padding: 10px;">City</th>
                            <th style="padding: 10px;">Status</th>
                            <th style="padding: 10px;">Created At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customers as $customer)
                            <tr style="text-align: center;">
                                <td style="padding: 10px;">{{ $loop->iteration }}</td>
                                @if($customer->user_id)
                                    <td style="padding: 10px;">{{ $customer->users->first_name }} {{ $customer->users->middle_name }} {{ $customer->users->last_name }}</td>
                                @else
                                    <td>-</td>
                                @endif
                                <td style="padding: 10px;">{{ $customer->users->mobile_no }}</td>
                                <td style="padding: 10px;">{{ $customer->users->email }}</td>
                                <td style="padding: 10px;">{{ $customer->city }}</td>
                                <td style="padding: 10px;">
                                    @if ($customer->status == 'deactive')
                                        <span class="badge badge-danger">DeActive</span>
                                    @else
                                        <span class="badge badge-success">Active</span>
                                    @endif
                                </td>
                                <td style="padding: 10px;">{{ $customer->created_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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
</body>
</html>

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
                }}?>customer_report.' + (type || 'xlsx')));
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
        //             pdfMake.createPdf(docDefinition).download("customer_report.pdf");
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

