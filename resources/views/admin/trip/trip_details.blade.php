@foreach($trip_details as $trip_detail)
    <div class="d-flex align-items-stretch flex-column">
        <div class="position-relative">
            <div class="ribbon-wrapper ribbon-lg">
                @if($trip_detail->status == config('constants.STATUS.Pending'))
                    <div class="ribbon bg-warning text-capitalize"
                         style="font-size: 1rem">
                        Pending
                        @elseif($trip_detail->status == config('constants.STATUS.Cancel'))
                            <div class="ribbon bg-danger text-capitalize"
                                 style="font-size: 1rem">
                                Cancel
                            </div>
                        @elseif($trip_detail->status == config('constants.STATUS.On_Going'))
                            <div class="ribbon bg-info text-capitalize" style="font-size: 1rem">
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
                    Trip Id : <b>{{$trip_detail->id}}</b>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-lg-4">
                            <h2 class="lead"><b>{{$trip_detail->driver->first_name}}</b>
                            </h2>
                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                <li class="small"><span class="fa-li"><i
                                            class="fas fa-lg fa-building"></i></span>
                                    Address: {{$trip_detail->driver->driverExtend->post_ads_appartment}}
                                    ,
                                    {{$trip_detail->driver->driverExtend->post_ads_block_flat}}
                                    , &nbsp;
                                    {{$trip_detail->driver->get_city->city_name}},&nbsp;
                                    {{$trip_detail->driver->get_state->state_name}},
                                    {{$trip_detail->driver->pincode}}

                                    {{--                                                                Address: Shop no. SF-79,80, Shilp Arcade, behind--}}
                                    {{--                                                                Domino's Pizza, Palanpur, Gujarat 385001--}}
                                </li>
                                <li class="small"><span class="fa-li"><i
                                            class="fas fa-lg fa-phone"></i></span> Phone:
                                    +91 {{$trip_detail->driver->mobile_no}}</li>
                                <li class="small"><span class="fa-li"><i
                                            class="fas fa-at"></i></span> Email
                                    : {{$trip_detail->driver->email}}</li>
                                <li class="small"><span class="fa-li"><i
                                            class="fas fa-solid fa-calendar-check"></i></span>
                                    Created At
                                    : {{date_formate($trip_detail->created_at)}}
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-4">
                            <div
                                class="trip-category shadow rounded-bottom p-1">{{$trip_detail->live_or_advance}}
                                &nbsp;{{$trip_detail->incity_or_out_city}}
                                &nbsp;{{$trip_detail->pickup_drop_or_temp}}</div>
                            <div class="flex-column">
                                <div class="text-center">
                                                                <span
                                                                    class="info-box-number text-center text-bold mb-0">Trip Start From</span>
                                    <hr class="p-0 m-1">
                                    <span class="text-center text-muted">Shop no. SF-79,80, Shilp Arcade</span>
                                </div>
                            </div>
                            <hr class="p-0 m-2">
                            <div class="flex-column">
                                <div class="text-center">
                                                                <span
                                                                    class="info-box-number text-center text-bold mb-0">Trip End To</span>
                                    <hr class="p-0 m-1">
                                    <span class="text-center text-muted">Shop no. SF-79,80, Shilp Arcade</span>
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
                                    {{--                                                                <span class="text-center text-muted">{{birth_date_formate($trip_detail->start_or_pickup_date)}} <b>{{date('h:i A',strtotime($trip_detail->start_or_pickup_time))}}</b></span>--}}
                                    <span class="text-center text-muted">{{date_formate($startdatetime)}}</span>
                                </div>
                            </div>
                            <hr class="p-0 m-2">
                            @php
                                $enddatetime = ($trip_detail->end_or_drop_date).' '.($trip_detail->end_or_drop_time)
                            @endphp
                            <div class="flex-column">
                                <div class="text-center">
                                                                <span
                                                                    class="info-box-number text-center text-bold mb-0">End At</span>
                                    <hr class="p-0 m-1">
                                    {{--                                                                <span class="text-center text-muted">{{birth_date_formate($trip_detail->end_or_drop_date)}} <b>{{date('h:i A',strtotime($trip_detail->end_or_drop_time))}}</b></span>--}}
                                    <span class="text-center text-muted">{{date_formate($enddatetime)}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="text-left rupee">
                                <span class="font-italic text-white bg-success" style="font-size: 1.5rem">
                                    <b><i class="fas fa-rupee-sign fa-1x bg-warning rounded-circle"></i> {{$trip_detail->total_payment}}</b>
                                </span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="text-right">
                                <a href="{{route('driver-allocation-list')}}?trip_id={{$trip_detail->id}}"
                                   class="btn btn-warning">
                                    <i class="fas fa-plus-circle"></i> Assign To Driver
                                </a>

                                {{-- <form action="{{route('driver-allocation')}}" method="POST"> --}}
                                {{-- @csrf --}}
                                {{-- <input type="hidden" name="book_id" value="{{$trip_detail->id}}"> --}}
                                {{-- <button type="submit" class="btn btn-warning"><i class="fas fa-plus-circle"></i> Assign To Driver</button> --}}
                                {{-- </form> --}}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
