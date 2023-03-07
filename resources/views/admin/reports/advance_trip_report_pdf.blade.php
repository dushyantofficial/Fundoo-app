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
                <h1>Advance Trip Reports</h1>
            </div>
        </div>
    </div>
</section>

<div class="content px-3">
    <div class="clearfix"></div>
    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                {{--                <div id="my_report">--}}
                {{--                    <table class="table table-responsive" id="sliders-table">--}}
                <div id="leaderBoardSwissTable" class="print-table">
                    <table id="leader" class="table table-responsive" border="1" width="100%"
                           style="border-collapse: collapse">
                        <thead>
                        <tr class="text-center">
                            <th style="padding: 7px;">No</th>
                            <th style="padding: 7px;">Customer Name</th>
                            <th style="padding: 7px;">Customer Mobile No</th>
                            <th style="padding: 7px;">Driver Name</th>
                            <th style="padding: 7px;">Driver Mobile No</th>
                            <th style="padding: 7px;">In-City/Out-City</th>
                            <th style="padding: 7px;">Pick-up/Temporary</th>
                            <th style="padding: 7px;">Trip To to From</th>
                            <th style="padding: 7px;">Trip Start At</th>
                            <th style="padding: 7px;">Trip End At</th>
                            <th style="padding: 7px;">Status</th>
                            <th style="padding: 7px;">Amount</th>
                            <th style="padding: 7px;">Created At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($advance_trips as $advance_trip)
                            <tr style="text-align: center;">
                                <td style="padding: 7px;">{{ $loop->iteration }}</td>
                                @if($advance_trip->customer_id ?? '-')
                                    <td class="ml-1 mr-1"
                                        style="padding: 7px;">{{ $advance_trip->customer->first_name ?? '-' }} {{ $advance_trip->customer->middle_name ?? '-' }} {{ $advance_trip->customer->last_name ?? '-' }}</td>
                                @else
                                    <td>-</td>
                                @endif
                                <td style="padding: 7px;">{{ $advance_trip->customer->mobile_no ?? '-'}}</td>
                                @if($advance_trip->driver_id)
                                    <td style="padding: 7px;">{{ $advance_trip->driver->first_name ?? '-' }} {{ $advance_trip->driver->middle_name ?? '-' }} {{ $advance_trip->driver->last_name ?? '-' }}</td>
                                @else
                                    <td>-</td>
                                @endif
                                <td style="padding: 7px;">{{ $advance_trip->driver->mobile_no ?? '-' }}</td>
                                <td style="padding: 7px;">{{ $advance_trip->incity_or_out_city ?? '-' }}</td>
                                <td style="padding: 7px;">{{ $advance_trip->pickup_drop_or_temp ?? '-' }}</td>
                                <td style="padding: 7px;">{{ $advance_trip->city }}
                                    to {{ $advance_trip->destination_city ?? '-' }}</td>
                                @php
                                    $startdatetime = ($advance_trip->start_or_pickup_date).' '.($advance_trip->start_or_pickup_time)
                                @endphp
                                <td style="padding: 7px;">{{date_formate($startdatetime) ?? '-'}}</td>
                                @php
                                    $enddatetime = ($advance_trip->end_or_drop_date).' '.($advance_trip->end_or_drop_time);
                                @endphp
                                <td style="padding: 7px;">{{date_formate($enddatetime) ?? '-'}}</td>
                                <td style="padding: 7px;">
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
                                <td style="padding: 7px;">{{ get_rupee_currency($advance_trip->total_payment) ?? '-' }}</td>
                                <td style="padding: 7px;">{{ $advance_trip->created_at ?? '-' }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{--                <div class="card-footer clearfix">--}}
            {{--                    <div class="float-right">--}}
            {{--                        {!! $advance_trips->links() !!}--}}
            {{--                    </div>--}}
            {{--                </div>--}}
        </div>

    </div>
</div>
</body>
</html>
