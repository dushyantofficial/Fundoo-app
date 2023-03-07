@extends('layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Invoice</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div id="my_report">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Main content -->
                        <div class="invoice p-3 mb-3">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <i class="fas fa-globe"></i> Fundoo
                                        <small
                                            class="float-right">Date: {{birth_date_formate($salary_details->date)}}</small>
                                    </h4>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- info row -->
                            <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">
                                    From
                                    <address>
                                        <strong>{{$admins->first_name}} {{$admins->last_name}}</strong><br>
                                        {{--                                        795 Folsom Ave, Suite 600<br>--}}
                                        {{--                                        San Francisco, CA 94107<br>--}}
                                        Phone: {{$admins->mobile_no}}<br>
                                        Email: {{$admins->email}}
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                    To
                                    <address>
                                        <strong>{{$users->driver->first_name}} {{$users->driver->last_name}}</strong><br>


                                        {{$users->driver->driverExtend->post_ads_appartment}}

                                        {{$users->driver->driverExtend->post_ads_block_flat}} ,<br>

                                        @if(isset($users->driver->get_city->city_name) || isset($users->driver->get_state->state_name))
                                            {{$users->driver->get_city->city_name}},&nbsp;
                                            {{$users->driver->get_state->state_name}},
                                        @else
                                            -
                                        @endif

                                        {{$users->driver->pincode}}<br>
                                        Phone: {{$users->driver->mobile_no}}<br>
                                        Email: {{$users->driver->email}}
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                    <b>Invoice: #FN0000{{$salary_details->id}}</b><br>
                                    <br>
                                    <b>Order ID:</b> #FN0000{{$salary_details->id}}<br>
                                    <b>Payment Due:</b> {{birth_date_formate($salary_details->date)}}<br>
                                    <b>Account:</b> 968-34567
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- Table row -->
                            <div class="row">
                                <div class="col-12 table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Payslip</th>
                                            <th>Month - Year</th>
                                            <th>Date</th>
                                            <th>Net Salary</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>{{$salary_details->id}}</td>

                                            <td>{{month_year_formate($salary_details->date) }}</td>
                                            <td>{{birth_date_formate($salary_details->date)}}</td>
                                            <td>&#8377;{{$salary_details->amount}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <!-- accepted payments column -->
                                <div class="col-6">
                                    <p class="lead">Payment Methods:</p>
                                    <img src="{{asset('admin/dummy_image/visa.png')}}" alt="Visa">
                                    <img src="{{asset('admin/dummy_image/mastercard.png')}}" alt="Mastercard">
                                    <img src="{{asset('admin/dummy_image/american-express.png')}}"
                                         alt="American Express">
                                    <img src="{{asset('admin/dummy_image/paypal2.png')}}" alt="Paypal">

                                    <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning
                                        heekya
                                        handango imeem
                                        plugg
                                        dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                                    </p>
                                </div>
                                <!-- /.col -->
                                <div class="col-6">
                                    <p class="lead">Amount Due {{birth_date_formate($salary_details->date)}}</p>

                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th style="width:50%">Subtotal:</th>
                                                <td>&#8377;{{$salary_details->amount}}</td>
                                            </tr>
                                            <tr>
                                                <th>Tax (9.3%)</th>
                                                <td>$10.34</td>
                                            </tr>
                                            <tr>
                                                <th>Shipping:</th>
                                                <td>$5.80</td>
                                            </tr>
                                            <tr>
                                                <th>Total:</th>
                                                <td>&#8377;{{$salary_details->amount}}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.invoice -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-12">
                <a href="#" rel="noopener" onclick="pdfreport()" class="btn btn-default"><i
                        class="fas fa-print"></i> Print</a>
                <button type="button" class="btn btn-success float-right"><i
                        class="far fa-credit-card"></i> Submit
                    Payment
                </button>
                <button type="button" onclick="pdfreport()" class="btn btn-primary float-right"
                        style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                </button>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection

@push('page_scripts')
    {{--    <script type="text/javascript" src="{{asset('admin/js/pdfmake.min.js')}}"></script>--}}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.5/pdfmake.min.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script>
        function pdfreport() {

            html2canvas($('#my_report'), {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("FUNDOO_Payslip.pdf");
                }
            });

        }
    </script>
@endpush
