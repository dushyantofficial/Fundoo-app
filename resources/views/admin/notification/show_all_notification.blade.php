@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Notification</h1>
                </div>
            </div>
        </div>
    </section>



    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card  card-outline">
                    <div class="card-header">
                        <h3 class="card-title">All Notification</h3>
                        <div class="card-tools">
                            <div class="float-right">
                                {!! $notifications->links() !!}

                            </div>
                        </div>

                    </div>

                    <div class="card-body p-0">
                        <div class="mailbox-controls">


                        </div>
                        @if (count($notifications))
                        <div class="table-responsive mailbox-messages">
                            <table class="table table-hover table-striped">
                                <tbody>
                                @foreach ($notifications as $notification)
                                    <tr>
                                        {{--                                        <td class="mailbox-name {{(($notification->read_at)) ? "" : "warning"}}"><a--}}
                                        {{--                                                href="">{{$notification->user_name->name}}</a></td>--}}
                                        <td class="mailbox-subject"><i class="fa fa-bell-o"></i>
                                            @if($notification->title == "Cancel-Trip")
                                                <b class="text-danger"> Cancel Trip</b>-
                                            @elseif($notification->title == "Trip-Completed")
                                                <b class="text-success">Trip-Completed</b> -
                                            @elseif($notification->title == "Trip-Confirm")
                                                <b class="text-info">On-Going</b> -
                                            @elseif($notification->title == "Trip-Start")
                                                <b class="text-info">Trip-Start</b> -
                                            @elseif($notification->title == "Pending")
                                                <b class="text-warning">Pending </b> -
                                            @elseif($notification->title == "Profile Update")
                                                <b class="text-info">Profile Update</b> -
                                            @elseif($notification->title == "Driver Registered")
                                                <b class="text-success">Driver Registered</b> -
                                            @elseif($notification->title == "Customer Registered")
                                                <b class="text-success">Customer Registered</b> -
                                            @elseif($notification->title == "New Advance-Trip Booked")
                                                <b class="text-success">New Advance-Trip Booked</b> -
                                            @elseif($notification->title == "New Live-Trip Booked")
                                                <b class="text-success">New Live-Trip Booked</b> -
                                            @elseif($notification->title == "New out-city temporary trip booked")
                                                <b class="text-success">New out-city temporary trip booked</b> -
                                            @elseif($notification->title == "New in-city pickup_drop trip booked")
                                                <b class="text-success">New in-city pickup_drop trip booked</b> -
                                            @elseif($notification->title == "New out-city pickup_drop trip booked")
                                                <b class="text-success">New out-city pickup_drop trip booked</b> -
                                            @endif
                                            {{--                                            <b>{{$notification->title}}</b>---}}
                                            {!! $notification->body !!}
                                        </td>
                                        <td class="mailbox-attachment"></td>
                                        <td class="mailbox-date">{{$notification->created_at->diffForHumans()}}</td>
                                    </tr>
                                @endforeach


                                </tbody>
                            </table>

                        </div>
                        @else
                            <div class="row">
                                <div class="col-sm-12">
                                    <div style="font-size: 40px; opacity: 0.5;">
                                        <center>
                                            <i class="fa fa-bell-o fa-5x"></i>
                                            <br>
                                            You have no notifications<br>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>


                </div>

            </div>

        </div>

    </section>

@endsection

