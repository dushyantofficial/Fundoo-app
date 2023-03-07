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
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Driver Dashboard</h1>
                </div>
            </div>
        </div>
    </section>
    <?php

    $curr = 100000000;

    ?>
    {{--@dd(get_rupee_currency($curr))--}}

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
                                @if($users->is_doc_verified == 1)
                                    <i class="fas fa-check-circle text-green"></i></h3>
                            @else
                                <i class="fas fa-check-circle text-danger"></i></h3>
                            @endif

                            {{--                            @if($users->is_doc_verified == 1)--}}
                            {{--                                <i class="fas fa-check-circle text-green ml-1"></i>--}}
                            {{--                            @else--}}
                            {{--                                <i class="fas fa-check-circle text-danger ml-1"></i>--}}
                            {{--                            @endif--}}

                            <p class="text-muted text-center mb-0">
                                +91 {{$users->mobile_no ?? ' - '}}</p>
                            @if(user_rating($users))
                                <p class="text-center mt-0"><span class="badge badge-success" style="font-size: 1rem"><i
                                            class="fa fa-solid fa-star text-warning"></i> {{number_formats(user_rating($users))}}</span>
                                </p>
                                {{--                            @else--}}
                                {{--                                <p class="text-center mt-0"><span class="badge badge-success" style="font-size: 1rem"><i--}}
                                {{--                                            class="fa fa-solid fa-star text-warning"></i> </span>--}}
                                {{--                                </p>--}}
                            @endif
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Email</b> <a class="float-right">{{$users->email ?? ' - '}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Active Category</b> <a class="float-right">
                                        @if($driverExtended->work_type == config('constants.CATEGORY.permanent'))
                                            Permanent
                                        @elseif($driverExtended->work_type == config('constants.CATEGORY.temporary'))
                                            Temporary
                                        @elseif($driverExtended->work_type == config('constants.CATEGORY.pickup-drop'))
                                            Pick-Up-Drop
                                        @elseif($driverExtended->work_type == config('constants.CATEGORY.valet_parking'))
                                            Valet Parking
                                        @else
                                            -
                                        @endif
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <b>Work Type</b> <a class="float-right">
                                        @if(!empty($driverExtended->multi_work_type))
                                         @foreach($driverExtended->multi_work_type as $worktype)
                                        <span class="badge badge-warning">
                                         {{$worktype}}
                                        </span>
                                        @endforeach
                                        @endif
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <b>Hire Customer Name:-</b>
                                    <a class="text-decoration-none text-dark" style="text-transform: capitalize">
                                        <span class="badge badge-warning">
                                            @if(isset($hirecustomerDriver->customers))
                                                {{$hirecustomerDriver->customers->first_name }}
                                            @else
                                                -
                                            @endif
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>

                </div>

                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2 ">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="col-lg-9">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item">
                                            <a class="nav-link text-dark active" href="#activity" data-toggle="tab">
                                                <i class="fas fa-user mr-1 text-dark"></i>
                                                Profile
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-dark" id="kyc" href="#doc" data-toggle="tab">
                                                <i class="fas fa-file mr-1 text-dark"></i>
                                                Documents / KYC
                                                @if($users->is_doc_verified == 1)
                                                    <i class="fas fa-check-circle text-green ml-1"></i>
                                                @else
                                                    <i class="fas fa-check-circle text-danger ml-1"></i>
                                                @endif
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-dark" href="#leave" data-toggle="tab">
                                                <i class="fas fa-file mr-1 text-dark"></i>
                                                Leave
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-dark" href="#salary" data-toggle="tab">
                                                <i class="fas fa-rupee-sign mr-1 text-dark"></i>
                                                Salary
                                            </a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link text-dark" href="#myrefer"
                                                                data-toggle="tab"><i
                                                    class="fas fa-handshake mr-1 text-dark"></i>My Refer</a></li>
                                        <li class="nav-item">
                                            <a class="nav-link text-dark" href="#settings" data-toggle="tab">
                                                <i class="fas fa-retweet mr-1 text-dark"></i>
                                                Trip
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-dark" href="#fual" data-toggle="tab">
                                                <i class="fas fa-gas-pump mr-1 text-dark"></i>
                                                Fuel
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-dark" href="#review" data-toggle="tab">
                                                <i class="fa fa-solid fa-comment mr-1 text-dark"></i>
                                                Review
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-dark" href="#hirecustomerDriver" data-toggle="tab">
                                                <i class="fas fa-user mr-1 text-dark"></i>
                                                Hire Customer Details
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                                <div class="col-lg-3 text-right d-flex justify-content-lg-end">


                                    <a class="nav-link text-dark nav-right"
                                       href="{{ route('admin.driverExtendeds.edit', $users->id)}}">
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
                                                        <div class="col-lg-4"><b>Additional</b></div>
                                                        <div class="col-lg-8"><a
                                                                class="text-decoration-none text-dark">+91 {{$driverExtended->aditional_contact_no ?? ' - '}}</a>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-lg-4"><b>Work Out Of Station</b></div>
                                                        <div class="col-lg-8"><a
                                                                class="text-decoration-none text-dark"
                                                                style="text-transform: capitalize">{{$driverExtended->work_station ?? ' - '}}</a>
                                                        </div>
                                                    </div>

                                                </li>

                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-lg-4"><b>Language Known</b></div>
                                                        <div class="col-lg-8"><a
                                                                class="text-decoration-none text-dark"
                                                                style="text-transform: capitalize">
                                                                @if(isset($driverExtended->language_known))
                                                                    <span
                                                                        class="badge badge-warning">{{$driverExtended->language_known ?? ' - '}} </span>
                                                                @endif
                                                            </a>
                                                        </div>
                                                    </div>
                                                </li>

                                                {{--                                                @dd(birth_date_formate($users->date_of_birth))--}}
                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-lg-4"><b>DOB </b></div>
                                                        <div class="col-lg-8">
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
                                                        <div class="col-lg-4"><b>Address</b></div>
                                                        <div class="col-lg-8"><a
                                                                class="text-decoration-none text-dark">
                                                                {{$driverExtended->resi_ads_apartment ?? ' - '}}
                                                                ,
                                                                {{$driverExtended->resi_ads_block_flate ?? ' - '}}
                                                                , {{$users->pincode ?? ' - '}}
                                                                ,{{$driverExtended->post_ads_city ?? ' - '}}
                                                                , {{$driverExtended->post_ads_state ?? ' - '}}
                                                            </a></div>
                                                    </div>
                                                </li>

                                                <li class="list-group-item vehicle_type">
                                                    <div class="row">
                                                        <div class="col-lg-4"><b>Vehicle Type</b></div>
                                                        <div class="col-lg-8">
                                                            <a class="text-decoration-none text-dark"
                                                               style="text-transform: capitalize">{{$driverExtended->vehicle_type ?? ' - '}}</a>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-lg-4"><b>Monthly Salary</b></div>
                                                        <div class="col-lg-8">
                                                            <a class="text-decoration-none text-dark">{{$driverExtended->monthly_salary ?? ' - '}}</a>
                                                        </div>
                                                    </div>
                                                </li>


                                            </ul>
                                        </div>

                                        <div class="col-lg-6">
                                            <ul class="list-group list-group-unbordered mb-3">

                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-lg-4"><b>Drive Type</b></div>
                                                        <div class="col-lg-8">
                                                            <a class="text-decoration-none text-dark">{{$driverExtended->driver_type ?? ' - '}}</a>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li class="list-group-item select_vehicle_type">
                                                    <div class="row">
                                                        <div class="col-lg-4"><b>Selected Vehicle Type</b></div>
                                                        <div class="col-lg-8">
                                                            @php
                                                                $vehicle_types = $driverExtended->select_vehicle_type;
                                                            @endphp
                                                            <a class="text-decoration-none text-dark"
                                                               style="text-transform: capitalize">
                                                                @if(!empty($vehicle_types))
                                                                    @foreach($vehicle_types as $vehicle_type)
                                                                        <span
                                                                            class="badge badge-warning">{{$vehicle_type ?? ' - '}} </span>
                                                                    @endforeach
                                                                @endif
                                                            </a>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-lg-4"><b>Apartment</b></div>
                                                        <div class="col-lg-8"><a
                                                                class="text-decoration-none text-dark">
                                                                {{$driverExtended->resi_ads_apartment ?? ' - '}}</a>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-lg-4"><b>Block Flat</b></div>
                                                        <div class="col-lg-8"><a
                                                                class="text-decoration-none text-dark">
                                                                {{$driverExtended->resi_ads_block_flate ?? ' - '}}</a>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-lg-4"><b>Created At</b></div>
                                                        <div class="col-lg-8">
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
                                                        <div class="col-lg-4"><b>Refer By</b></div>
                                                        <div class="col-lg-8"><a
                                                                class="text-decoration-none text-dark">
                                                                {{$users->refer_user->first_name ?? ' - '}}</a></div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-lg-4"><b>Updated At</b></div>
                                                        {{--                                                        @dd(date_formate($users->updated_at))--}}
                                                        <div class="col-lg-8">
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
                                                {{--                                                @dd($users)--}}
                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-lg-4"><b>Referral Code</b></div>
                                                        <div class="col-lg-8">

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
                                                            <h3>Residential Address</h3>
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
                                                                                <div class="col-lg-4">
                                                                                    <b>Apartment123</b>
                                                                                </div>
                                                                                <div class="col-lg-8"><a
                                                                                        class="text-decoration-none text-dark">{{$driverExtended->resi_ads_apartment ?? ' - '}}</a>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="list-group-item">
                                                                            <div class="row">
                                                                                <div class="col-lg-4"><b>Block /Flat</b>
                                                                                </div>
                                                                                <div class="col-lg-8"><a
                                                                                        class="text-decoration-none text-dark">
                                                                                        {{$driverExtended->resi_ads_block_flate ?? ' - '}}</a>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        {{--                                                                        <li class="list-group-item">--}}
                                                                        {{--                                                                            <div class="row">--}}
                                                                        {{--                                                                                <div class="col-lg-4"><b>Type</b>--}}
                                                                        {{--                                                                                </div>--}}
                                                                        {{--                                                                                <div class="col-lg-8"><a--}}
                                                                        {{--                                                                                        class="text-decoration-none text-dark">--}}
                                                                        {{--                                                                                        {{$driverExtended->resi_ads_type ?? ' - '}}</a>--}}
                                                                        {{--                                                                                </div>--}}
                                                                        {{--                                                                            </div>--}}
                                                                        {{--                                                                        </li>--}}


                                                                        <li class="list-group-item">
                                                                            <div class="row">
                                                                                <div class="col-lg-4"><b>Pincode</b>
                                                                                </div>
                                                                                <div class="col-lg-8"><a
                                                                                        class="text-decoration-none text-dark">
                                                                                        {{$driverExtended->resi_ads_pincode ?? ' - '}}</a>
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
                                                                                <div class="col-lg-4"><b>City</b></div>
                                                                                <div class="col-lg-8"><a
                                                                                        class="text-decoration-none text-dark">
                                                                                        {{$driverExtended->resi_ads_city ?? ' - '}}</a>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="list-group-item">
                                                                            <div class="row">
                                                                                <div class="col-lg-4"><b>State </b>
                                                                                </div>
                                                                                <div class="col-lg-8"><a
                                                                                        class="text-decoration-none text-dark">
                                                                                        {{$driverExtended->resi_ads_state ?? ' - '}}</a>
                                                                                </div>
                                                                            </div>
                                                                        </li>

                                                                    </ul>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        {{-- end Residential address--}}



                                        {{-- postal address--}}
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header p-2 ">
                                                    <div class="row d-flex justify-content-between align-items-center">
                                                        <div class="col-lg-9">
                                                            <h3>Postal Address</h3>
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
                                                                                <div class="col-lg-4"><b>Apartment</b>
                                                                                </div>
                                                                                <div class="col-lg-8"><a
                                                                                        class="text-decoration-none text-dark">
                                                                                        {{$driverExtended->post_ads_appartment ?? ' - '}}</a>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="list-group-item">
                                                                            <div class="row">
                                                                                <div class="col-lg-4"><b>Block /Flat</b>
                                                                                </div>
                                                                                <div class="col-lg-8"><a
                                                                                        class="text-decoration-none text-dark">
                                                                                        {{$driverExtended->post_ads_block_flat ?? ' - '}}</a>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="list-group-item">
                                                                            <div class="row">
                                                                                <div class="col-lg-4"><b>Pincode</b>
                                                                                </div>
                                                                                <div class="col-lg-8"><a
                                                                                        class="text-decoration-none text-dark">
                                                                                        {{$driverExtended->post_ads_pincode ?? ' - '}}</a>
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
                                                                                <div class="col-lg-4"><b>City</b></div>
                                                                                <div class="col-lg-8"><a
                                                                                        class="text-decoration-none text-dark">
                                                                                        {{$driverExtended->post_ads_city ?? ' - '}}</a>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="list-group-item">
                                                                            <div class="row">
                                                                                <div class="col-lg-4"><b>State </b>
                                                                                </div>
                                                                                <div class="col-lg-8"><a
                                                                                        class="text-decoration-none text-dark">
                                                                                        {{$driverExtended->post_ads_state ?? ' - '}}</a>
                                                                                </div>
                                                                            </div>
                                                                        </li>


                                                                    </ul>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        {{-- end postal address--}}
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header p-2 ">
                                                    <div class="row d-flex justify-content-between align-items-center">
                                                        <div class="col-lg-9">
                                                            <h3>Bank Details</h3>
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
                                                                                <div class="col-lg-4"><b>Bank Name</b>
                                                                                </div>
                                                                                <div class="col-lg-8"><a
                                                                                        class="text-decoration-none text-dark">
                                                                                        {{$driverExtended->bank_name ?? ' - '}}</a>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="list-group-item">
                                                                            <div class="row">
                                                                                <div class="col-lg-4"><b>Account
                                                                                        Number</b>
                                                                                </div>
                                                                                <div class="col-lg-8"><a
                                                                                        class="text-decoration-none text-dark">
                                                                                        {{$driverExtended->account_number ?? ' - '}}</a>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="list-group-item">
                                                                            <div class="row">
                                                                                <div class="col-lg-4"><b>IFSC Code</b>
                                                                                </div>
                                                                                <div class="col-lg-8"><a
                                                                                        class="text-decoration-none text-dark">
                                                                                        {{$driverExtended->ifsc_code ?? ' - '}}</a>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <ul class="list-group list-group-unbordered mb-3">
                                                                        <li class="list-group-item">
                                                                            <div class="row">
                                                                                <div class="col-lg-4"><b>Branch
                                                                                        Name </b>
                                                                                </div>
                                                                                <div class="col-lg-8"><a
                                                                                        class="text-decoration-none text-dark">
                                                                                        {{$driverExtended->branch_name ?? ' - '}}</a>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="list-group-item">
                                                                            <div class="row">
                                                                                <div class="col-lg-4"><b>Account Holder
                                                                                        Name</b></div>
                                                                                <div class="col-lg-8"><a
                                                                                        class="text-decoration-none text-dark">
                                                                                        {{$driverExtended->account_holder_name ?? ' - '}}</a>
                                                                                </div>
                                                                            </div>
                                                                        </li>


                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                    </div>
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
                                <div class="tab-pane" id="doc">
                                    @include('admin.flash-message')
                                    <div class="row">
                                        <div
                                            class="col-12 col-sm-6 col-md-4 col-xl-3 col-lg-4 d-flex align-items-stretch flex-column">
                                            <div class="card bg-light d-flex flex-fill">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-12 text-center">
                                                            @if($driverExtended->aadhar_card == '')
                                                                <a href="{{asset('admin/dummy_image/no-image.jpg')}}"
                                                                   data-toggle="lightbox" data-title="AADHAR FRONT">
                                                                    <img
                                                                        src="{{asset('admin/dummy_image/no-image.jpg')}}"
                                                                        alt="user-avatar" class="img-fluid rounded">
                                                                </a>
                                                            @else

                                                                <a href="{{$driverExtended->aadhar_card}}"
                                                                   data-toggle="lightbox" data-title="AADHAR FRONT">
                                                                    <img
                                                                        src="{{$driverExtended->aadhar_card}}"
                                                                        alt="user-avatar" class="img-fluid rounded"></a>
                                                            @endif


                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="text-center">
                                                        <a href="#" class="text-dark text-decoration-none">
                                                            AADHAR FRONT
                                                            @if($driverExtended->aadhar_card_status == 1)
                                                                <i class="fas fa-check-circle text-green"></i>
                                                            @elseif($driverExtended->aadhar_card_status == 0)
                                                                <i class="fas fa-check-circle text-danger"></i>
                                                            @elseif($driverExtended->aadhar_card == null)
                                                                <i class="fas fa-check-circle text-danger"></i>

                                                            @endif
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            {{--                                            <span>Hello</span>--}}
                                            <div class="row m-auto">

                                                <form
                                                    action="{{route('verify',$driverExtended->id)}}?document=aadhar_card"
                                                    method="post">
                                                    @csrf

                                                    @if($driverExtended->aadhar_card == null)
                                                        <button type="submit" class="btn btn-success" disabled>
                                                            Verify
                                                        </button>
                                                    @elseif($driverExtended->aadhar_card_status == 1)
                                                        <button type="submit" class="btn btn-success" disabled>
                                                            Verify
                                                        </button>
                                                    @elseif($driverExtended->aadhar_card_status == 0)
                                                        <button type="submit" class="btn btn-success">
                                                            Verify
                                                        </button>
                                                    @endif

                                                </form>&nbsp;
                                                @if($driverExtended->aadhar_card == null)
                                                    <button type="button" class="btn btn-danger un_verify"
                                                            style="margin-bottom: 16px;" data-id="aadhar_card" disabled>
                                                        Unverify
                                                    </button>
                                                @else
                                                    <button type="button" class="btn btn-danger un_verify"
                                                            style="margin-bottom: 16px;" data-id="aadhar_card">
                                                        Unverify
                                                    </button>
                                                @endif
                                                {{--                                                <a href="#" class="btn btn-danger" id="unverify">Unverify</a>--}}
                                            </div>
                                        </div>
                                        <div
                                            class="col-12 col-sm-6 col-md-4 col-xl-3 col-lg-4 d-flex align-items-stretch flex-column">
                                            <div class="card bg-light d-flex flex-fill">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-12 text-center">
                                                            @if($driverExtended->pancard == '')
                                                                <a href="{{asset('storage/admin/dummy_image/no-image.jpg')}}"
                                                                   data-toggle="lightbox" data-title="PANCARD">
                                                                    <img
                                                                        src="{{asset('storage/admin/dummy_image/no-image.jpg')}}"
                                                                        alt="user-avatar" class="img-fluid rounded">
                                                                </a>
                                                            @else
                                                                <a href="{{$driverExtended->pancard}}"
                                                                   data-toggle="lightbox" data-title="PANCARD">
                                                                    <img
                                                                        src="{{$driverExtended->pancard}}"
                                                                        alt="user-avatar" class="img-fluid rounded"></a>
                                                            @endif

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="text-center">
                                                        <a href="#" class="text-dark text-decoration-none">
                                                            PAN CARD
                                                            @if($driverExtended->pancard_status == 1)
                                                                <i class="fas fa-check-circle text-green"></i>
                                                            @elseif($driverExtended->pancard_status == 0)
                                                                <i class="fas fa-check-circle text-danger"></i>
                                                            @elseif($driverExtended->pancard == null)
                                                                <i class="fas fa-check-circle text-danger"></i>
                                                            @endif
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row m-auto">

                                                <form
                                                    action="{{route('verify',$driverExtended->id)}}?document=pan_card"
                                                    method="post">
                                                    @csrf
                                                    @if($driverExtended->pancard == null)
                                                        <button type="submit" class="btn btn-success" disabled>
                                                            Verify
                                                        </button>
                                                    @elseif($driverExtended->pancard_status == 1)
                                                        <button type="submit" class="btn btn-success" disabled>
                                                            Verify
                                                        </button>
                                                    @elseif($driverExtended->pancard_status == 0)
                                                        <button type="submit" class="btn btn-success">
                                                            Verify
                                                        </button>
                                                    @endif
                                                </form>&nbsp;

                                                @if($driverExtended->pancard == null)
                                                    <button type="button" class="btn btn-danger un_verify"
                                                            style="margin-bottom: 16px;" data-id="pan_card" disabled>
                                                        Unverify
                                                    </button>
                                                @else
                                                    <button type="button" class="btn btn-danger un_verify"
                                                            style="margin-bottom: 16px;" data-id="pan_card">
                                                        Unverify
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                        <div
                                            class="col-12 col-sm-6 col-md-4 col-xl-3 col-lg-4 d-flex align-items-stretch flex-column">
                                            <div class="card bg-light d-flex flex-fill">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-12 text-center">
                                                            @if($driverExtended->license == '')
                                                                <a href="{{asset('storage/admin/dummy_image/no-image.jpg')}}"
                                                                   data-toggle="lightbox"
                                                                   data-title="DRIVING LICENCE">
                                                                    <img
                                                                        src="{{asset('storage/admin/dummy_image/no-image.jpg')}}"
                                                                        alt="user-avatar" class="img-fluid rounded">
                                                                </a>
                                                            @else
                                                                <a href="{{$driverExtended->license}}"
                                                                   data-toggle="lightbox"
                                                                   data-title="DRIVING LICENCE">
                                                                    <img
                                                                        src="{{$driverExtended->license}}"
                                                                        alt="user-avatar" class="img-fluid rounded">
                                                                </a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="text-center">
                                                        <a href="#" class="text-dark text-decoration-none">
                                                            DRIVING LICENCE
                                                            @if($driverExtended->license_status == 1)
                                                                <i class="fas fa-check-circle text-green"></i>
                                                            @elseif($driverExtended->license_status == 0)
                                                                <i class="fas fa-check-circle text-danger"></i>
                                                            @elseif($driverExtended->license == null)
                                                                <i class="fas fa-check-circle text-danger"></i>
                                                            @endif
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row m-auto">

                                                <form
                                                    action="{{route('verify',$driverExtended->id)}}?document=driving_licence"
                                                    method="post">
                                                    @csrf
                                                    @if($driverExtended->license == null)
                                                        <button type="submit" class="btn btn-success" disabled>
                                                            Verify
                                                        </button>
                                                    @elseif($driverExtended->license_status == 1)
                                                        <button type="submit" class="btn btn-success" disabled>
                                                            Verify
                                                        </button>
                                                    @elseif($driverExtended->license_status == 0)
                                                        <button type="submit" class="btn btn-success">
                                                            Verify
                                                        </button>
                                                    @endif
                                                </form>&nbsp;
                                                @if($driverExtended->license == null)
                                                    <button type="button" class="btn btn-danger un_verify"
                                                            style="margin-bottom: 16px;" data-id="driving_licence"
                                                            disabled>
                                                        Unverify
                                                    </button>
                                                @else
                                                    <button type="button" class="btn btn-danger un_verify"
                                                            style="margin-bottom: 16px;" data-id="driving_licence">
                                                        Unverify
                                                    </button>
                                                @endif
                                                {{--                                                <button type="button" class="btn btn-danger un_verify"--}}
                                                {{--                                                        style="margin-bottom: 16px;" data-id="driving_licence">--}}
                                                {{--                                                    Unverify--}}
                                                {{--                                                </button>--}}
                                            </div>
                                        </div>

                                        <div
                                            class="col-12 col-sm-6 col-md-4 col-xl-3 col-lg-4 d-flex align-items-stretch flex-column">
                                            <div class="card bg-light d-flex flex-fill">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-12 text-center">
                                                            @if($driverExtended->light_bill == '')
                                                                <a href="{{asset('storage/admin/dummy_image/no-image.jpg')}}"
                                                                   data-toggle="lightbox" data-title="LIGHT BILL">
                                                                    <img
                                                                        src="{{asset('storage/admin/dummy_image/no-image.jpg')}}"
                                                                        alt="user-avatar" class="img-fluid rounded">
                                                                </a>
                                                            @else
                                                                <a href="{{$driverExtended->light_bill}}"
                                                                   data-toggle="lightbox" data-title="LIGHT BILL">
                                                                    <img
                                                                        src="{{$driverExtended->light_bill}}"
                                                                        alt="user-avatar" class="img-fluid rounded">
                                                                </a>
                                                            @endif

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card-footer">
                                                    <div class="text-center">
                                                        <a href="#" class="text-dark text-decoration-none">
                                                            LIGHT BILL
                                                            @if($driverExtended->light_bill_status == 1)
                                                                <i class="fas fa-check-circle text-green"></i>
                                                            @elseif(($driverExtended->light_bill_status == 0))
                                                                <i class="fas fa-check-circle text-danger"></i>
                                                            @elseif($driverExtended->light_bill == null)
                                                                <i class="fas fa-check-circle text-danger"></i>
                                                            @endif
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row m-auto">

                                                <form
                                                    action="{{route('verify',$driverExtended->id)}}?document=light_bill"
                                                    method="post">
                                                    @csrf
                                                    @if($driverExtended->light_bill == null)
                                                        <button type="submit" class="btn btn-success" disabled>
                                                            Verify
                                                        </button>
                                                    @elseif($driverExtended->light_bill_status == 1)
                                                        <button type="submit" class="btn btn-success" disabled>
                                                            Verify
                                                        </button>
                                                    @elseif($driverExtended->light_bill_status == 0)
                                                        <button type="submit" class="btn btn-success">
                                                            Verify
                                                        </button>
                                                    @endif
                                                </form>&nbsp;
                                                @if($driverExtended->light_bill == null)
                                                    <button type="button" class="btn btn-danger un_verify"
                                                            style="margin-bottom: 16px;" data-id="light_bill" disabled>
                                                        Unverify
                                                    </button>
                                                @else
                                                    <button type="button" class="btn btn-danger un_verify"
                                                            style="margin-bottom: 16px;" data-id="light_bill">
                                                        Unverify
                                                    </button>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane" id="leave">
                                    <div class="row">
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                            <div class="info-box">
                                                <span class="info-box-icon bg-dark"><i
                                                        class="fas fa-plane text-warning"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">Half Leave ({{$halfleaves}})</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                            <div class="info-box">
                                                <span class="info-box-icon bg-dark"><i
                                                        class="fas fa-plane text-warning"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">Full Leave ({{$fullleaves}})</span>
                                                </div>

                                            </div>

                                        </div>


                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-header border-0">
                                                    <h3 class="card-title">Leave Details</h3><br>
                                                    <div class="clearfix"></div>

                                                </div>
                                                {{--                                                @dd($leaves->count() > 0)--}}
                                                @if($leaves->count() > 0)
                                                    <div class="card-body table-responsive p-0">
                                                        <table class="table table-head-fixed text-nowrap leave w-100">
                                                            <thead>
                                                            <tr>
                                                                <th>Leave Type</th>
                                                                <th>Leave Date</th>
                                                                <th>Days</th>
                                                                <th>Apply Date</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            </thead>
                                                            {{--                                                        <tbody>--}}
                                                            @foreach($leaves as $leave)
                                                                <div class="modal fade" id="leave{{$leave->id}}">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title">Leave
                                                                                    Details</h4>
                                                                                <button type="button" class="close"
                                                                                        data-dismiss="modal"
                                                                                        aria-label="Close">
                                                                                    <span
                                                                                        aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <h5>Leave Type
                                                                                    :- {{$leave->leave_type}}</h5>
                                                                                <h5>Leave Reason
                                                                                    :- {{$leave->remark}}</h5>
                                                                                <h5>Leave Date
                                                                                    :- {{birth_date_formate($leave->from_date)}}
                                                                                    - {{birth_date_formate($leave->to_date)}}</h5>
                                                                            </div>
                                                                            <div
                                                                                class="modal-footer justify-content-right">
                                                                                <button type="button"
                                                                                        class="btn btn-danger"
                                                                                        data-dismiss="modal">Close
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                        <!-- /.modal-content -->
                                                                    </div>
                                                                    <!-- /.modal-dialog -->
                                                                </div>
                                                                {{--                                                            </tr>--}}
                                                            @endforeach
                                                            {{--                                                        </tbody>--}}
                                                        </table>
                                                    </div>
                                                @else
                                                    <table class="table table-head-fixed myrefer text-nowrap w-100">
                                                        <thead>
                                                        <tr>
                                                            <th>Leave Type</th>
                                                            <th>Leave Date</th>
                                                            <th>Days</th>
                                                            <th>Apply Date</th>
                                                            <th>Status</th>
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
                                <div class="tab-pane" id="salary">
                                    <div class="row">
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                            <div class="info-box">
                                                <span class="info-box-icon bg-dark"><i
                                                        class="fas fa-rupee-sign text-warning"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">Total Net Salary Paid</span>
                                                    <span class="info-box-number">&#8377;{{$total_salaries}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        @if($current_month_salaries != null)
                                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                                <div class="info-box">
                                                    <span class="info-box-icon bg-dark"><i
                                                            class="fas fa-rupee-sign text-warning"></i></span>
                                                    <div class="info-box-content">
                                                        <span class="info-box-text">Current Month Salary</span>
                                                        <span
                                                            class="info-box-number">{{$current_month_salaries->amount}}</span>
                                                    </div>
                                                </div>
                                            </div>

                                        @endif

                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-header border-0">
                                                    <h3 class="card-title">Salary Details</h3><br>
                                                    <div class="clearfix"></div>

                                                </div>
                                                @if($salaries->count() > 0)
                                                    <div class="card-body table-responsive p-0">

                                                        <table class="table table-head-fixed text-nowrap salary w-100">
                                                            <thead class="thead">
                                                            <tr>
                                                                <th>Payslip</th>
                                                                <th>Month - Year</th>
                                                                <th>Date</th>
                                                                {{--                                                            <th>Mode</th>--}}
                                                                <th>Status</th>
                                                                <th>Net Salary</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                @else
                                                    <table class="table table-head-fixed myrefer text-nowrap w-100">
                                                        <thead>
                                                        <tr>
                                                            <th>Payslip</th>
                                                            <th>Month - Year</th>
                                                            <th>Date</th>
                                                            {{--                                                            <th>Mode</th>--}}
                                                            <th>Status</th>
                                                            <th>Net Salary</th>
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
                                                        <div class="input-group input-group-sm"
                                                             style="width: 250px;">
                                                            <input type="text" name="table_search" id="searchINPUT"
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

                                                        <table class="table table-head-fixed text-nowrap">
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
                                                            <tbody id="refer_info">
                                                            @foreach($refer_users as $book)
                                                                <tr>
                                                                    <td>{{$book->driver->id}}</td>
                                                                    <td>{{$book->driver->first_name}}</td>
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
                                                                               target="_blank"
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
                                <div class="tab-pane" id="settings">
                                    <div class="row">
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                            <div class="info-box">
                                                <span class="info-box-icon bg-dark"><i
                                                        class="fas fa-retweet text-warning"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">Trip</span>
                                                    <span class="info-box-number">{{ $trip }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                            <div class="info-box">
                                                <span class="info-box-icon bg-dark"><i
                                                        class="fas fa-times-circle text-warning"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">Canceled Trips</span>
                                                    <span class="info-box-number">{{ $canceled_trip }}</span>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                            <div class="info-box">
                                                <span class="info-box-icon bg-dark"><i
                                                        class="fas fa-plane text-warning"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">Ongoing Trips</span>
                                                    <span class="info-box-number">{{ $ongoing_trip }}</span>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                            <div class="info-box">
                                                <span class="info-box-icon bg-dark"><i
                                                        class="fas fa-headset text-warning"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">Live Booking Trips</span>
                                                    <span class="info-box-number">{{ $livebooking_trip }}</span>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                            <div class="info-box">
                                                <span class="info-box-icon bg-dark"><i
                                                        class="fas fa-bookmark text-warning"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">Advance Booking Trips</span>
                                                    <span class="info-box-number">{{ $advancebook_trip }}</span>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                            <div class="info-box">
                                                <span class="info-box-icon bg-dark"><i
                                                        class="fas fa-people-arrows text-warning"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">PickUp Drop Trips</span>
                                                    <span class="info-box-number">{{ $pickup_drop_trip }}</span>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                            <div class="info-box">
                                                <span class="info-box-icon bg-dark"><i
                                                        class="fas fa-sort-amount-down text-warning"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">In-City Trips</span>
                                                    <span class="info-box-number">{{ $incity_trip }}</span>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                            <div class="info-box">
                                                <span class="info-box-icon bg-dark"><i
                                                        class="fas fa-sort-amount-up text-warning"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">Out-City Trips</span>
                                                    <span class="info-box-number">{{ $outcity_trip }}</span>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                            <div class="info-box">
                                                <span class="info-box-icon bg-dark"><i
                                                        class="fas fa-braille text-warning"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">Temporary Trips</span>
                                                    <span class="info-box-number">{{ $temporary_trip }}</span>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-header border-0">
                                                    <h3 class="card-title">Trip Details</h3><br>
                                                    <div class="clearfix"></div>

                                                </div>
                                                @if($trip_details->count() > 0)
                                                    <div class="card-body table-responsive p-0">

                                                        <table class="table table-head-fixed text-nowrap trip w-100">
                                                            <thead class="thead">
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

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                @else
                                                    <table class="table table-head-fixed myrefer text-nowrap w-100">
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
                                                    </table>
                                                    <center><img src="{{asset('admin/images/data_not_found.svg')}}"
                                                                 class="mb-2" height="200px"></center>
                                                    <h4 class="text-center ml-5 font-weight-bold">Data Not Found</h4>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="fual">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-header border-0">
                                                    <h3 class="card-title">Fuel Details</h3><br>
                                                    <div class="clearfix"></div>

                                                </div>
                                                @if($fueldetails->count() > 0)
                                                    <div class="card-body table-responsive p-0">

                                                        <table class="table table-head-fixed text-nowrap fuel w-100">
                                                            <thead class="thead">
                                                            <tr>
                                                                <th>No</th>
                                                                {{--                                                                <th>Vehicle</th>--}}
                                                                {{--                                                                <th>Vehicle No</th>--}}
                                                                <th>Litter</th>
                                                                <th>Fuel Type</th>
                                                                <th>Rate</th>
                                                                <th>Total Amount</th>
                                                                <th>Date</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                @else
                                                    <table class="table table-head-fixed myrefer text-nowrap w-100">
                                                        <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Vehicle</th>
                                                            <th>Vehicle No</th>
                                                            <th>Litter</th>
                                                            <th>Fuel Type</th>
                                                            <th>Rate</th>
                                                            <th>Total Amount</th>
                                                            <th>Date</th>
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


                                <div class="tab-pane" id="hirecustomerDriver">
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                            <div class="info-box">
                                                <span class="info-box-icon bg-dark"><i
                                                        class="fab fa-slideshare text-warning"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">My Assign Customer</span>
                                                    <span class="info-box-number">{{$hirecustomercount}}</span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-header border-0">
                                                    <h3 class="card-title">Assign Driver To Customer Details</h3>
                                                    <div
                                                        class="card-tools d-flex justify-content-center align-items-center">
                                                        <div class="input-group input-group-sm" style="width: 250px;">
                                                            <input type="text" name="table_search" id="hire_customer"
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
                                                @if($hirecustomerDriver !=  null)
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
                                                            <tbody id="hire_customer">
                                                            <tr>
                                                                <td>1</td>
                                                                <td>
                                                                    <a href="{{route('customer-dashboard')}}?id={{$hirecustomerDriver->user_id}}"
                                                                       target="_blank">{{$hirecustomerDriver->customers->first_name}}</a>
                                                                </td>
                                                                <td>
                                                                    <a href="{{route('driver-dashboard')}}?id={{$hirecustomerDriver->driver_id}}"
                                                                       target="_blank">{{$hirecustomerDriver->drivers->first_name}}</a>
                                                                </td>
                                                                <td>{{birth_date_formate($hirecustomerDriver->created_at)}}</td>
                                                                <td>
                                                                    @if ($hirecustomerDriver->type == config('constants.CATEGORY.permanent'))
                                                                        Permanent
                                                                    @elseif ($hirecustomerDriver->type == config('constants.CATEGORY.temporary'))
                                                                        Temporary
                                                                    @elseif ($hirecustomerDriver->type == config('constants.CATEGORY.pickup-drop'))
                                                                        Pick-Up-Drop
                                                                    @elseif ($hirecustomerDriver->type == config('constants.CATEGORY.valet_parking'))
                                                                        Valet Parking
                                                                    @endif
                                                                </td>
                                                                <td>@if ($hirecustomerDriver->customers->status == 'deactive')
                                                                        <span
                                                                            class="badge badge-danger">DeActive</span>
                                                                    @else
                                                                        <span
                                                                            class="badge badge-success">Active</span>
                                                                    @endif
                                                                </td>
                                                            </tr>


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

    <div class="modal fade" id="un_verify" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    {{--                    <button type="button" class="close" data-dismiss="modal">&times;</button>--}}
                    {{--                    <h4 class="modal-title">Modal Header</h4>--}}
                </div>
                <form action="{{route('un_verify',$driverExtended->id)}}" method="post">
                    @csrf
                    <input type="hidden" id="hide" name="hide">
                    <div class="modal-body">
                        <textarea class="form-control" name="rejected_resoan"
                                  placeholder="Enter Rejected Resoan" required>{{old('rejected_resoan')}}</textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-warning shadow-sm">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <input type="hidden" id="driver_type" value="{{$driverExtended->driver_type}}">


@endsection
{{--<script type="text/javascript" src="https://adminlte.io/themes/v3/plugins/jquery/jquery.min.js"></script>--}}
<script type="text/javascript" src="https://adminlte.io/themes/v3/plugins/moment/moment.min.js"></script>



@push('page_scripts')

    <script>
        $("#searchINPUT").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#refer_info tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function () {
            var driver_type = $('#driver_type').val();
            if (driver_type == 'car_driver') {
                $('.select_vehicle_type').hide();
            } else if (driver_type == 'commercial_driver') {
                $('.vehicle_type').hide();
            }

            //
            var id = {{$users->id}};

            $('.leave').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 10,
                // scrollX: true,
                ajax: '{{ url('leave') }}' + '/' + id,
                columns: [
                    {data: 'leave_type', name: 'leave_type'},
                    {data: 'Leave Date', name: 'Leave Date'},
                    {data: 'days', name: 'days'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'status', name: 'status'},
                    {data: 'actions', name: 'actions'},
                ]
            });

            $('.salary').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 10,
                // scrollX: true,
                ajax: '{{ url('salary') }}' + '/' + id,
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'month_year', name: 'month_year'},
                    {data: 'date', name: 'date'},
                    {data: 'status', name: 'status'},
                    {data: 'amount', name: 'amount'},
                    {data: 'actions', name: 'actions'},
                ]
            });

            $('.trip').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 10,
                // scrollX: true,
                ajax: '{{ url('trips') }}' + '/' + id,
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

            $('.fuel').DataTable({
                processing: true,
                serverSide: true,
                // order: ['desc'],
                order: [[0, 'desc']],
                pageLength: 10,
                // scrollX: true,
                ajax: '{{ url('fuel') }}' + '/' + id,
                columns: [
                    {data: 'id', name: 'id'},
                    // {data: 'vehicle', name: 'vehicle'},
                    // {data: 'vehicle_no', name: 'vehicle_no'},
                    {data: 'fuel_litter', name: 'fuel_litter'},
                    {data: 'fuel_type', name: 'fuel_type'},
                    {data: 'rate', name: 'rate'},
                    {data: 'total_amount', name: 'total_amount'},
                    {data: 'date', name: 'date'},
                ]
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $(".un_verify").click(function () {
                $("#un_verify").modal('show');
                var value = $(this).attr('data-id');

                $('#hide').val(value);
                // alert(value);
            });
        });
    </script>

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

    @php
        $doc = request('document');
    @endphp
    {{--    <script type="text/javascript">--}}
    {{--        $(function () {--}}
    {{--            $("#chkDocument").click(function () {--}}
    {{--                if ($(this).is(":checked")) {--}}
    {{--                    $("#dvDocument").show();--}}
    {{--                } else {--}}
    {{--                    $("#dvDocument").hide();--}}
    {{--                }--}}
    {{--            });--}}
    {{--        });--}}
    {{--    </script>--}}
    <script>
        $(document).ready(function () {
            var kyc = '<?php echo $doc; ?>';
            if (kyc == 'kyc') {
                $('#kyc').trigger('click');
            }
            // console.log(show)
        });
    </script>

    <script>
        $("#hire_customer").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#hire_customer tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    </script>

@endpush

