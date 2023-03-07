@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Drivers Allocation List</h1>
                </div>

            </div>
        </div>
    </section>
    {{--    @if(!empty($success))--}}
    {{--        <div class="card-header">--}}
    {{--            <div class="alert alert-success alert-dismissible fade show" role="alert">--}}
    {{--                {{$success}}--}}
    {{--                <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
    {{--                    <span aria-hidden="true">&times;</span>--}}
    {{--                </button>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    @endif--}}

    @include('admin.flash-message')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">Driver Allocation Details</h3>
                            <div class="card-tools d-flex justify-content-center align-items-center">
                                <div class="btn-group mr-3 col-md-6">
                                    <form class="form-inline">
                                        <a href="{{route('driver-allocation-list')}}" class="btn btn-warning btn-sm">Reset</a>
                                        @if(request()->trip_id)
                                            <select class="form-control ml-2" id="filter" name="filter"
                                                    onchange="filter()">
                                                <option value="" disabled selected hidden>Filter</option>
                                                <option value="temporary">Temporary</option>
                                                <option value="pickup-drop">Pick-Up Drop</option>
                                            </select>
                                        @else
                                            <select class="form-control ml-2" id="filter" name="filter"
                                                    onchange="filter()">
                                                <option value="" disabled selected hidden>Filter</option>
                                                <option value="permanent">Permanent</option>
                                                <option value="valet_parking">Valet</option>
                                            </select>
                                        @endif
                                    </form>
                                </div>
                                <input type="text" id="searchINPUT" name="search" class="form-control float-right"
                                       placeholder="Search">
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        @if($drivers->count() > 0)
                            <div class="card-body table-responsive p-0">

                                <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Driver Name</th>
                                        <th>Mobile Number</th>
                                        <th>Driver Type</th>
                                        <th>Rating</th>
                                        <th>Assign</th>
                                    </tr>
                                    </thead>
                                    <tbody class="viewRender" id="driver_allocation">
                                    @foreach($drivers as $driver)
                                        <tr>
                                            <td>{{$drivers->firstItem() + $loop->index}}</td>
                                            <td><a href="{{route('driver-dashboard')}}?id={{$driver->user_id}}"
                                                   target="_blank">{{$driver->user->first_name}}</a></td>
                                            <td>{{$driver->aditional_contact_no}}</td>
                                            <td>
                                                @if($driver->work_type == config('constants.CATEGORY.permanent'))
                                                    Permanent
                                                @elseif($driver->work_type == config('constants.CATEGORY.temporary'))
                                                    Temporary
                                                @elseif($driver->work_type == config('constants.CATEGORY.pickup-drop'))
                                                    Pick-Up-Drop
                                                @elseif($driver->work_type == config('constants.CATEGORY.valet_parking'))
                                                    Valet Parking
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td><span class="badge badge-success"><i class="fas fa-star"></i> {{number_formats(multi_user_rating($driver))}}</span>
                                            </td>
                                            <td>
                                                @if(request('id'))
                                                    <a href="{{route('driver-allocation-list')}}?id={{request('id')}}&&d_id={{$driver->user_id}}"
                                                       class="btn btn-warning btn-sm"><i class="fas fa-plus-circle"></i>
                                                        Assign</a>
                                                @else
                                                    <a href="{{route('driver-allocation-list')}}?booking_id={{request('trip_id')}}&&driver_id={{$driver->id}}"
                                                       class="btn btn-warning btn-sm"><i class="fas fa-plus-circle"></i>
                                                        Assign</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Driver Name</th>
                                    <th>Mobile Number</th>
                                    <th>Driver Type</th>
                                    <th>Rating</th>
                                    <th>Assign</th>
                                </tr>
                                </thead>
                            </table>
                            <center><img src="{{asset('admin/images/data_not_found.svg')}}" class="mb-2"
                                         height="200px"></center>
                            <h4 class="text-center ml-5 font-weight-bold">Data Not Found</h4>
                        @endif
                        <div class="pagination justify-content-end">
                            {!! $drivers->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <input type="hidden" id="request_id" value="{{request()->id}}">
    <input type="hidden" id="trip_id" value="{{request()->trip_id}}">
@endsection

@push('page_scripts')
    <script>
        $("#filter").change(function () {
            var filter = $(this).val();
            var request_id = $('#request_id').val();
            var trip_id = $('#trip_id').val();

            $.ajax({
                type: "get",
                url: "{{route('driver-allocation-filter')}}",
                data: {filter: filter, request_id: request_id, trip_id: trip_id},
                datatype: 'html',
                success: function (data) {
                    console.log(data);
                    $('.viewRender').html(data.html);

                }

            }).done(function (response) {
                console.log(response)
            });
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
