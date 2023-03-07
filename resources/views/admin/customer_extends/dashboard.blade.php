@extends('layouts.app')

@section('content')
    <link href="https://adminlte.io/themes/v3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css"
          rel="stylesheet">
    <style>
        #copy-me {
            display: none
        }

        #custom-tooltip {
            display: none;
            background-color: #000000df;
            color: #fff;
        }

        .dataTables_length {
            margin-left: 20px;
            margin-top: 20px;
        }

        .dataTables_info {
            margin-left: 20px;
        }

        .thead {
            margin-left: 20px;
        }
    </style>
    {{--    <section class="content-header">--}}
    {{--        <div class="container-fluid">--}}
    {{--            <div class="row mb-2">--}}
    {{--                <div class="col-sm-6">--}}

    {{--                </div>--}}
    {{--                <div class="col-sm-6">--}}
    {{--                    <a class="btn btn-default float-right"--}}
    {{--                       href="{{ route('admin.customerExtends.index') }}">--}}
    {{--                        Back--}}
    {{--                    </a>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Customer Profile</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                @if($users->profile_image == '')
                                    <img class="profile-user-img img-fluid img-circle" style="height: 95px;"
                                         src="{{asset('admin/images/icon-admin-sidebar.png')}}"
                                         alt="User profile picture">
                                @else
                                    <img class="profile-user-img img-fluid img-circle" style="height: 95px;"
                                         src="{{asset('storage/admin/images/'.$users->profile_image)}}"
                                         alt="User profile picture">
                                @endif
                            </div>
                            <h3 class="profile-username text-center">{{$users->first_name ?? ' - '}} {{$users->last_name ?? ' - '}}
                                @if($users->status == 'deactive')
                                    <i class="fas fa-ban"></i></h3>

                            @else
                                <i
                                    class="fas fa-check-circle text-green"></i></h3>
                            @endif
                            <p class="text-muted text-center">+91 {{$users->mobile_no ?? ' - '}}</p>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Email</b> <a class="float-right">{{$users->email ?? ' - '}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Gender</b> <a class="float-right">{{$users->gender ?? ' - '}}</a>
                                </li>

                                <li class="list-group-item">
                                    <b>Hire Drivers:-</b> <br> <a class="float-right">
                                        <a class="text-decoration-none text-dark" style="text-transform: capitalize">
                                            @foreach($assignDrivers as $assignDriver)

                                                <span
                                                    class="badge badge-warning">{{$assignDriver->drivers->first_name}} </span>
                                            @endforeach
                                        </a>
                                    </a>

                                </li>
                            </ul>
                        </div>

                    </div>

                </div>

                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="col-lg-8">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item"><a class="nav-link text-dark active" href="#activity"
                                                                data-toggle="tab"><i
                                                    class="fas fa-user mr-2 text-dark"></i>
                                                Profile</a></li>
                                        <li class="nav-item"><a class="nav-link text-dark" href="#settings"
                                                                data-toggle="tab"><i
                                                    class="fas fa-retweet mr-2 text-dark"></i> Trip</a></li>
                                        <li class="nav-item"><a class="nav-link text-dark" href="#myrefer"
                                                                data-toggle="tab"><i
                                                    class="fas fa-handshake mr-2 text-dark"></i>My Refer</a></li>
                                        <li class="nav-item"><a class="nav-link text-dark" href="#cars"
                                                                data-toggle="tab"><i class="fas fa-car text-dark"></i>
                                                Cars</a></li>
                                        <li class="nav-item"><a class="nav-link text-dark" href="#timeline"
                                                                id="show_timeline" data-toggle="tab"><i
                                                    class="fas fa-history mr-2 text-dark"></i> Timeline</a></li>

                                        <li class="nav-item">
                                            <a class="nav-link text-dark" href="#review" data-toggle="tab">
                                                <i class="fa fa-solid fa-comment mr-1 text-dark"></i>
                                                Review
                                            </a>
                                        </li>

                                        <li class="nav-item"><a class="nav-link text-dark" href="#assignDriver"
                                                                data-toggle="tab"><i
                                                    class="fas fa-users mr-2 text-dark"></i> Assign Driver</a></li>

                                    </ul>
                                </div>
                                <div class="col-lg-4 text-right d-flex justify-content-lg-end">

                                    <a class="nav-link text-dark nav-right"
                                       href="{{ route('admin.customerExtends.edit', $users->id)}}">
                                        <i class="fas fa-user-edit mr-1 text-dark"></i>
                                        Edit
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="activity">
                                    <div class="row">

                                        <div class="col-lg-6">

                                            <ul class="list-group list-group-unbordered  mb-3">

                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-lg-2"><b>DOB </b></div>
                                                        <div class="col-lg-10">
                                                            @if($users->date_of_birth != null)
                                                                <a class="text-decoration-none text-dark">
                                                                    {{birth_date_formate($users->date_of_birth ?? ' - ')}}</a>
                                                            @else
                                                                <a class="text-decoration-none text-dark">
                                                                    {{' - '}}</a>
                                                            @endif

                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-lg-3"><b>Created At</b></div>
                                                        <div class="col-lg-9">
                                                            @if($users->created_at != null)
                                                                <a class="text-decoration-none text-dark">
                                                                    {{birth_date_formate($users->created_at ?? ' - ')}}</a>
                                                            @else
                                                                <a class="text-decoration-none text-dark">
                                                                    {{' - '}}</a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-lg-3"><b>Refer By</b></div>
                                                        <div class="col-lg-9"><a class="text-decoration-none text-dark">
                                                                {{$users->reffer_by ?? ' - '}}</a></div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="col-lg-6">
                                            <ul class="list-group list-group-unbordered mb-3">

                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-lg-3"><b>Updated At</b></div>
                                                        <div class="col-lg-9">
                                                            @if($users->updated_at != null)
                                                                <a class="text-decoration-none text-dark">
                                                                    {{birth_date_formate($users->updated_at ?? ' - ')}}</a>
                                                            @else
                                                                <a class="text-decoration-none text-dark">
                                                                    {{' - '}}</a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </li>
                                                <?php

                                                $curr = 100000000;

                                                ?>

                                                {{--                                                @dd(get_currency($curr))--}}
                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-lg-3"><b>Referral Code</b></div>
                                                        <div class="col-lg-9">

                                                            <input type="text" value="{{$users->reffral_code}}"
                                                                   id="copy-me">
                                                            <a class="text-decoration-none text-dark"><kbd
                                                                    class="bg-warning">{{$users->reffral_code ?? ' - '}}</kbd></a>&nbsp;
                                                            @if($users->reffral_code != null)
                                                                <button class="btn btn-warning btn-sm sendButton"
                                                                        id="copy-btn" type="button"
                                                                ><i class="fas fa-copy"
                                                                    ></i>
                                                                </button>
                                                                <span id="custom-tooltip"><b>copied!</b></span>
                                                            @elseif($users->reffral_code == null)
                                                                <button
                                                                    class="btn btn-warning btn-sm sendButton"
                                                                    type="button"
                                                                    disabled><i class="fas fa-copy"
                                                                                disabled="disabled"></i>
                                                                </button>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>

                                        {{-- Residential address--}}
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header p-2 ">
                                                    <div class="row d-flex justify-content-between align-items-center">
                                                        <div class="col-lg-9">
                                                            <h3>Permanent Address</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                @foreach($customer_address as $customer_add)
                                                    <div class="card-body">
                                                        <div class="tab-content">
                                                            <div class="tab-pane active" id="activity">
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <ul class="list-group list-group-unbordered  mb-3">
                                                                            <li class="list-group-item">
                                                                                <div class="row">
                                                                                    <div class="col-lg-4">
                                                                                        <b>Apartment</b>
                                                                                    </div>
                                                                                    <div class="col-lg-8"><a
                                                                                            class="text-decoration-none text-dark">{{$customer_add->apartment ?? ' - '}}</a>
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                            <li class="list-group-item">
                                                                                <div class="row">
                                                                                    <div class="col-lg-4"><b>Block
                                                                                            /Flat</b>
                                                                                    </div>
                                                                                    <div class="col-lg-8"><a
                                                                                            class="text-decoration-none text-dark">
                                                                                            {{$customer_add->block_flat ?? ' - '}}</a>
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                            <li class="list-group-item">
                                                                                <div class="row">
                                                                                    <div class="col-lg-4"><b>Type</b>
                                                                                    </div>
                                                                                    <div class="col-lg-8"><a
                                                                                            class="text-decoration-none text-dark">
                                                                                            {{$customer_add->address_type ?? ' - '}}</a>
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                            {{--                                                @dd(birth_date_formate($users->date_of_birth))--}}
                                                                        </ul>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <ul class="list-group list-group-unbordered mb-3">
                                                                            <li class="list-group-item">
                                                                                <div class="row">
                                                                                    <div class="col-lg-4"><b>City</b>
                                                                                    </div>
                                                                                    <div class="col-lg-8"><a
                                                                                            class="text-decoration-none text-dark">
                                                                                            {{$customer_add->city ?? ' - '}}</a>
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                            <li class="list-group-item">
                                                                                <div class="row">
                                                                                    <div class="col-lg-4"><b>State </b>
                                                                                    </div>
                                                                                    <div class="col-lg-8"><a
                                                                                            class="text-decoration-none text-dark">
                                                                                            {{$customer_add->state ?? ' - '}}</a>
                                                                                    </div>
                                                                                </div>
                                                                            </li>

                                                                            <li class="list-group-item">
                                                                                <div class="row">
                                                                                    <div class="col-lg-4"><b>Pincode</b>
                                                                                    </div>
                                                                                    <div class="col-lg-8"><a
                                                                                            class="text-decoration-none text-dark">
                                                                                            {{$customer_add->pincode ?? ' - '}}</a>
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        {{-- end Residential address--}}

                                    </div>
                                </div>

                                <div class="tab-pane " id="cars">

                                    @if($car_details->count() > 0)
                                        <div class="row">
                                            @foreach ($car_details as $value)
                                                <div
                                                    class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                                                    <div class="card bg-light d-flex flex-fill">
                                                        <div class="card-body pt-3">
                                                            <div
                                                                class="row d-flex justify-content-center align-items-center">
                                                                <div class="col-6">
                                                                    <h2 class="lead">
                                                                        <b>{{$value->company_name ?? ' - '}}</b>
                                                                    </h2>

                                                                    <p class="text-muted text-sm mb-0"><b>Model
                                                                            : </b>{{$value->model_name ?? ' - '}}
                                                                    </p>
                                                                    <p class="text-muted text-sm mb-0"><b>Year
                                                                            : </b>{{$value->year ?? ' - '}}
                                                                    </p>
                                                                    <p class="text-muted text-sm mb-0"><b>Created At
                                                                            : </b>{{date_formate($value->created_at ?? ' - ')}}
                                                                    </p>

                                                                </div>
                                                                <div class="col-6 text-center">
                                                                    @if($value->car_photos == '')
                                                                        <img
                                                                            src="https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80"
                                                                            alt="user-avatar" class="rounded img-fluid">
                                                                    @else
                                                                        <img
                                                                            src="{{asset('storage/admin/car_photos/'.$value->car_photos)}}"
                                                                            alt="user-avatar" class="rounded img-fluid">
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <center><img src="{{asset('admin/images/data_not_found.svg')}}" class="mb-2"
                                                     height="200px"></center>
                                        <h4 class="text-center ml-5 font-weight-bold">Data Not Found</h4>
                                    @endif
                                </div>


                                <div class="tab-pane" id="timeline">
                                    @if($time_lines->count() > 0)
                                        <div class="timeline timeline-inverse">
                                            @foreach($time_lines as $key=>$time_line)
                                                <div class="time-label">
                                                    </span>
                                                    <span class="bg-success">
                                            {{$key}}

                                        </span>
                                                </div>
                                                @foreach($time_line as $tm)
                                                    <div>
                                                        <i class="fas fa-car bg-primary bg-warning"></i>
                                                        <div class="timeline-item">
                                                            <span class="time"><i class="far fa-clock"></i> {{$tm->bookingNotification->start_or_pickup_time ?? '-'}}</span>
                                                            <h3 class="timeline-header"><a href="#">Trip Book</a>
                                                                for
                                                                <b>{{$tm->bookingNotification->city ?? '-'}}</b>

                                                                to
                                                                <b>{{$tm->bookingNotification->destination_city ?? '-'}}</b>
                                                            </h3>

                                                        </div>
                                                    </div>

                                                    <div>
                                                        <i class="fas fa-user bg-warning"></i>
                                                        <div class="timeline-item">
                                                            <span class="time"><i

                                                                    class="far fa-clock"></i> {{$key}}</span>
                                                            <h3 class="timeline-header border-0"><a href="#">Driver
                                                                    Assign</a>
                                                                :- @if(isset($tm->bookingNotification->driver))
                                                                    <b>{{$tm->bookingNotification->driver->first_name}}</b>
                                                                @else
                                                                    -
                                                                @endif
                                                            </h3>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <i class="fas fa-comments bg-warning"></i>
                                                        <div class="timeline-item">
                                                        <span class="time"><i
                                                                class="far fa-clock"></i>
                                                            @if(isset($tm->bookingNotification->created_at))
                                                                {{$tm->bookingNotification->created_at->diffForHumans()}}
                                                            @else
                                                                -
                                                            @endif
                                                        </span>
                                                            <h3 class="timeline-header"><a href="#">Trip Cancel</a></h3>
                                                            <div class="timeline-body">
                                                                {{$tm->bookingNotification->cancel_reason ?? '-'}}!
                                                            </div>

                                                        </div>
                                                    </div>
                                                @endforeach


                                                <div><br>
                                                    <i class="far fa-clock bg-gray"></i>
                                                </div>
                                            @endforeach
                                            <center><a
                                                    href="{{route('all-timeline-show')}}?id={{request()->id}}&document=show_timeline"
                                                    class="btn btn-warning text-center btn_1"><i class="fas fa-eye"></i>
                                                    Show All</a></center>

                                        </div>

                                    @else
                                        <center><img src="{{asset('admin/images/data_not_found.svg')}}"
                                                     class="mb-2" height="200px"></center>
                                        <h4 class="text-center ml-5 font-weight-bold">Data Not Found</h4>
                                    @endif
                                </div>


                                <div class="tab-pane" id="review">
                                    @if($ratings->count() > 0)
                                        <div class="row">
                                            <div class="col-lg-12">
                                                @foreach($ratings as $rating)
                                                    <div class="post">
                                                        <div class="user-block mb-0">
                                                            <img class="img-circle img-bordered-sm"
                                                                 src="{{asset('admin/images/icon-admin-sidebar.png')}}"
                                                                 alt="user image">
                                                            <span class="username">
                                                                <a href="#">{{$rating->user_rating->first_name}}</a>
                                                                    <p class="text-center float-right">
                                                                        <small>
                                                                        @if($rating->star == 1)
                                                                                <i class="fa fa-solid  fa-star text-success"></i>
                                                                                (1.0)
                                                                            @elseif($rating->star == 2)
                                                                                <i class="fa fa-solid  fa-star text-success"></i>
                                                                                <i class="fa fa-solid  fa-star text-success"></i>
                                                                                (2.0)
                                                                            @elseif($rating->star == 3)
                                                                                <i class="fa fa-solid  fa-star text-success"></i>
                                                                                <i class="fa fa-solid  fa-star text-success"></i>
                                                                                <i class="fa fa-solid  fa-star text-success"></i>
                                                                                (3.0)
                                                                            @elseif($rating->star == 4)
                                                                                <i class="fa fa-solid  fa-star text-success"></i>
                                                                                <i class="fa fa-solid  fa-star text-success"></i>
                                                                                <i class="fa fa-solid  fa-star text-success"></i>
                                                                                <i class="fa fa-solid  fa-star text-success"></i>
                                                                                (4.0)
                                                                            @elseif($rating->star == 5)
                                                                                <i class="fa fa-solid  fa-star text-success"></i>
                                                                                <i class="fa fa-solid  fa-star text-success"></i>
                                                                                <i class="fa fa-solid  fa-star text-success"></i>
                                                                                <i class="fa fa-solid  fa-star text-success"></i>
                                                                                <i class="fa fa-solid  fa-star text-success"></i>
                                                                                (5.0)
                                                                            @endif
                                                                        </small>
                                                                    </p>
                                                            </span>
                                                            <span
                                                                class="description mt-0">{{date_formate($rating->created_at)}}</span>
                                                        </div>
                                                        <p class="ml-5">
                                                            {{$rating->coment}}
                                                        </p>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    @else
                                        <center><img src="{{asset('admin/images/data_not_found.svg')}}" class="mb-2"
                                                     height="200px"></center>
                                        <h4 class="text-center ml-5 font-weight-bold">Data Not Found</h4>
                                    @endif
                                </div>


                                <div class="tab-pane" id="settings">
                                    <div class="row">
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                            <div class="info-box">
                                                <span class="info-box-icon bg-dark"><i
                                                        class="fas fa-retweet text-warning"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">Trip</span>
                                                    <span class="info-box-number">{{$trip}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                            <div class="info-box">
                                                <span class="info-box-icon bg-dark"><i
                                                        class="fas fa-times-circle text-warning"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">Canceled Trips</span>
                                                    <span class="info-box-number">{{$canceled_trip}}</span>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                            <div class="info-box">
                                                <span class="info-box-icon bg-dark"><i
                                                        class="fas fa-plane text-warning"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">Ongoing Trips</span>
                                                    <span class="info-box-number">{{$ongoing_trip}}</span>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                            <div class="info-box">
                                                <span class="info-box-icon bg-dark"><i
                                                        class="fas fa-headset text-warning"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">Live Booking Trips</span>
                                                    <span class="info-box-number">{{$livebooking_trip}}</span>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                            <div class="info-box">
                                                <span class="info-box-icon bg-dark"><i
                                                        class="fas fa-bookmark text-warning"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">Advance Booking Trips</span>
                                                    <span class="info-box-number">{{$advancebook_trip}}</span>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                            <div class="info-box">
                                                <span class="info-box-icon bg-dark"><i
                                                        class="fas fa-people-arrows text-warning"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">PickUp Drop Trips</span>
                                                    <span class="info-box-number">{{$pickup_drop_trip}}</span>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                            <div class="info-box">
                                                <span class="info-box-icon bg-dark"><i
                                                        class="fas fa-sort-amount-down text-warning"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">In-City Trips</span>
                                                    <span class="info-box-number">{{$incity_trip}}</span>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                            <div class="info-box">
                                                <span class="info-box-icon bg-dark"><i
                                                        class="fas fa-sort-amount-up text-warning"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">Out-City Trips</span>
                                                    <span class="info-box-number">{{$outcity_trip}}</span>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                            <div class="info-box">
                                                <span class="info-box-icon bg-dark"><i
                                                        class="fas fa-braille text-warning"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">Temporary Trips</span>
                                                    <span class="info-box-number">{{$temporary_trip}}</span>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-header border-0">
                                                    <h3 class="card-title">Trip Details</h3>

                                                    <div class="clearfix"></div>

                                                </div>
                                                @if($trip_details->count() > 0)
                                                    <div class="card-body table-responsive p-0">

                                                        <table
                                                            class="table table-head-fixed text-nowrap trip_details w-100">
                                                            <thead class="thead">
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Driver Name</th>
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

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                @else
                                                    <center><img src="{{asset('admin/images/data_not_found.svg')}}"
                                                                 class="mb-2" height="200px"></center>
                                                    <h4 class="text-center ml-5 font-weight-bold">Data Not Found</h4>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="myrefer">
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                            <div class="info-box">
                                                <span class="info-box-icon bg-dark"><i
                                                        class="fab fa-slideshare text-warning"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">My Refer</span>
                                                    <span class="info-box-number">{{$reffers}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                            <div class="info-box">
                                                <span class="info-box-icon bg-dark"><i
                                                        class="fas fa-rupee-sign text-warning"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">Total Refer Amount</span>
                                                    @if(!empty($completed_trip_refer_amount))
                                                        <span
                                                            class="info-box-number">{{get_rupee_currency($completed_trip_refer_amount)}}</span>
                                                    @else
                                                        -
                                                    @endif
                                                </div>

                                            </div>

                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                            <div class="info-box">
                                                <span class="info-box-icon bg-dark"><i
                                                        class="fas fa-rupee-sign text-warning"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">Widthdraw Amount</span>
                                                    <span class="info-box-number">13,648</span>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-header border-0">
                                                    <h3 class="card-title">My Refers Details</h3>
                                                    <div
                                                        class="card-tools d-flex justify-content-center align-items-center">
                                                        {{--                                                        <div class="btn-group mr-3">--}}
                                                        {{--                                                            <button type="button" class="btn btn-default">Filter--}}
                                                        {{--                                                            </button>--}}
                                                        {{--                                                            <button type="button"--}}
                                                        {{--                                                                    class="btn btn-default dropdown-toggle dropdown-icon"--}}
                                                        {{--                                                                    data-toggle="dropdown" aria-expanded="false">--}}
                                                        {{--                                                                <span class="sr-only">Toggle Dropdown</span>--}}
                                                        {{--                                                            </button>--}}
                                                        {{--                                                            <div class="dropdown-menu" role="menu" style="">--}}
                                                        {{--                                                                <a href="#" class="dropdown-item">Active</a>--}}
                                                        {{--                                                                <a href="#" class="dropdown-item">Block</a>--}}
                                                        {{--                                                                <a href="#" class="dropdown-item">Completed</a>--}}
                                                        {{--                                                                <a href="#" class="dropdown-item">Canceled</a>--}}

                                                        {{--                                                            </div>--}}
                                                        {{--                                                        </div>--}}
                                                        <div class="input-group input-group-sm" style="width: 250px;">
                                                            <input type="text" name="table_search"
                                                                   class="form-control float-right"
                                                                   placeholder="Search">
                                                            <div class="input-group-append">
                                                                <button type="submit" class="btn btn-default">
                                                                    <i class="fas fa-search"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>

                                                </div>
                                                @if($refer_users->count() > 0)
                                                    <div class="card-body table-responsive p-0">

                                                        <table class="table table-head-fixed myrefer text-nowrap w-100">
                                                            <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Refer To</th>
                                                                <th>Refer Amount</th>
                                                                <th>Refer Date</th>
                                                                <th>Trip Id</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($refer_users as $book)
                                                                <tr>
                                                                    <td>{{$book->customer->id}}</td>
                                                                    <td>{{$book->customer->first_name}}</td>
                                                                    @if(isset($book))
                                                                        <td>{{$book->reffer_amount}}</td>
                                                                    @else
                                                                        <td>-</td>
                                                                    @endif
                                                                    <td>{{$book->created_at}}</td>
                                                                    @if(isset($book))
                                                                        <td>FUNDO00{{$book->id}}</td>
                                                                    @else
                                                                        <td>-</td>
                                                                    @endif

                                                                    <td>
                                                                        @if(isset($book->id))
                                                                            <a href="{{route('customer_show_trip',$book->id)}}"
                                                                               class="btn btn-sm btn-warning">Show
                                                                                Trip</a>
                                                                        @else
                                                                            -
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            @endforeach


                                                            </tbody>
                                                        </table>
                                                    </div>
                                                @else
                                                    <table class="table table-head-fixed myrefer text-nowrap w-100">
                                                        <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Refer To</th>
                                                            <th>Refer Amount</th>
                                                            <th>Refer Date</th>
                                                            <th>Trip Id</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        </thead>
                                                    </table>
                                                    <center><img src="{{asset('admin/images/data_not_found.svg')}}"
                                                                 class="mb-2" height="200px"></center>
                                                    <h4 class="text-center ml-5 font-weight-bold">Data Not Found</h4>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="assignDriver">
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                            <div class="info-box">
                                                <span class="info-box-icon bg-dark"><i
                                                        class="fab fa-slideshare text-warning"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">My Assign Driver</span>
                                                    <span class="info-box-number">{{$assignDriverCount}}</span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-header border-0">
                                                    <h3 class="card-title">Assign Driver Details</h3>
                                                    <div
                                                        class="card-tools d-flex justify-content-center align-items-center">

                                                        <div class="input-group input-group-sm" style="width: 250px;">
                                                            <input type="text" name="table_search"
                                                                   id="customerassignDriver"
                                                                   class="form-control float-right"
                                                                   placeholder="Search">
                                                            <div class="input-group-append">
                                                                <button type="submit" class="btn btn-default">
                                                                    <i class="fas fa-search"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>

                                                </div>
                                                @if($assignDrivers->count() > 0)
                                                    <div class="card-body table-responsive p-0">

                                                        <table class="table table-head-fixed myrefer text-nowrap w-100">
                                                            <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Customer Name</th>
                                                                <th>Driver Name</th>
                                                                <th>Assign Driver Date</th>
                                                                <th>Work Type</th>
                                                                <th>Status</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody id="customer_assign_Driver">
                                                            @foreach($assignDrivers as $assignDriver)
                                                                <tr>
                                                                    <td>{{$loop->iteration}}</td>
                                                                    <td>
                                                                        <a href="{{route('customer-dashboard')}}?id={{$assignDriver->user_id}}"
                                                                           target="_blank">{{$assignDriver->customers->first_name}}</a>
                                                                    </td>
                                                                    <td>
                                                                        <a href="{{route('driver-dashboard')}}?id={{$assignDriver->driver_id}}"
                                                                           target="_blank">{{$assignDriver->drivers->first_name}}</a>
                                                                    </td>
                                                                    <td>{{birth_date_formate($assignDriver->created_at)}}</td>
                                                                    <td>
                                                                        @if ($assignDriver->type == config('constants.CATEGORY.permanent'))
                                                                            Permanent
                                                                        @elseif ($assignDriver->type == config('constants.CATEGORY.temporary'))
                                                                            Temporary
                                                                        @elseif ($assignDriver->type == config('constants.CATEGORY.pickup-drop'))
                                                                            Pick-Up-Drop
                                                                        @elseif ($assignDriver->type == config('constants.CATEGORY.valet_parking'))
                                                                            Valet Parking
                                                                        @endif
                                                                    </td>
                                                                    <td>@if ($assignDriver->customers->status == 'deactive')
                                                                            <span
                                                                                class="badge badge-danger">DeActive</span>
                                                                        @else
                                                                            <span
                                                                                class="badge badge-success">Active</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            @endforeach


                                                            </tbody>
                                                        </table>
                                                    </div>

                                                @else
                                                    <table class="table table-head-fixed myrefer text-nowrap w-100">
                                                        <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Customer Name</th>
                                                            <th>Driver Name</th>
                                                            <th>Assign Driver Date</th>
                                                            <th>Work Type</th>
                                                            <th>Status</th>
                                                        </tr>
                                                        </thead>
                                                    </table>
                                                    <center><img src="{{asset('admin/images/data_not_found.svg')}}"
                                                                 class="mb-2" height="200px"></center>
                                                    <h4 class="text-center ml-5 font-weight-bold">Data Not Found</h4>
                                                @endif
                                            </div>
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
<script type="text/javascript" src="https://adminlte.io/themes/v3/plugins/moment/moment.min.js"></script>


@push('page_scripts')

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function () {
            var id = {{$users->id}};

            $('.trip_details').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 10,
                // scrollX: true,
                ajax: '{{ url('customer-trips') }}' + '/' + id,
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'customer_name', name: 'customer_name'},
                    {data: 'Trip Type', name: 'Trip Type'},
                    {data: 'start date time', name: 'start date time'},
                    {data: 'end date time', name: 'end date time'},
                    {data: 'start_at', name: 'start_at'},
                    {data: 'end_at', name: 'end_at'},
                    {data: 'status', name: 'status'},
                    {data: 'actions', name: 'actions'},
                ]
            });
        });
    </script>

    {{--    <script>--}}
    {{--        $(document).ready(function () {--}}
    {{--            var id = {{$users->id}};--}}

    {{--            $('.myrefer').DataTable({--}}
    {{--                processing: true,--}}
    {{--                serverSide: true,--}}
    {{--                pageLength: 10,--}}
    {{--                // scrollX: true,--}}
    {{--                ajax: '{{ url('customer-myrefer') }}' + '/' + id,--}}
    {{--                columns: [--}}
    {{--                    {data: 'id', name: 'id'},--}}
    {{--                    {data: 'customer_name', name: 'customer_name'},--}}
    {{--                    {data: 'reffer_amount', name: 'reffer_amount'},--}}
    {{--                    {data: 'reffer_date', name: 'reffer_date'},--}}
    {{--                    {data: 'trip_id', name: 'trip_id'},--}}
    {{--                ]--}}
    {{--            });--}}
    {{--        });--}}
    {{--    </script>--}}

    <script>

        var copyBtn = $("#copy-btn"),
            input = $("#copy-me");

        function copyToClipboardFF(text) {
            window.prompt("Copy to clipboard: Ctrl C, Enter", text);
        }

        function copyToClipboard() {
            document.getElementById("custom-tooltip").style.display = "inline";
            document.execCommand("copy");
            setTimeout(function () {
                document.getElementById("custom-tooltip").style.display = "none";
            }, 1000);
            var success = true,
                range = document.createRange(),
                selection;

            // For IE.
            if (window.clipboardData) {
                window.clipboardData.setData("Text", input.val());
            } else {
                // Create a temporary element off screen.
                var tmpElem = $('<div>');
                tmpElem.css({
                    position: "absolute",
                    left: "-1000px",
                    top: "-1000px",
                });
                // Add the input value to the temp element.
                tmpElem.text(input.val());
                $("body").append(tmpElem);
                // Select temp element.
                range.selectNodeContents(tmpElem.get(0));
                selection = window.getSelection();
                selection.removeAllRanges();
                selection.addRange(range);
                // Lets copy.
                try {
                    success = document.execCommand("copy", false, null);
                } catch (e) {
                    copyToClipboardFF(input.val());
                }
                if (success) {
                    // alert ("The text is on the clipboard, try to paste it!");
                    // remove temp element.
                    tmpElem.remove();
                }
            }
        }

        copyBtn.on('click', copyToClipboard);

    </script>
    <script type="text/javascript">
        $(function () {

            var start = moment().subtract(29, 'days');
            var end = moment();

            function cb(start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }

            $('.reportrange').daterangepicker({
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

            cb(start, end);

        });
    </script>

    <script>
        $("#customerassignDriver").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#customer_assign_Driver tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    </script>

@endpush
