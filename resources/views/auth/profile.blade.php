@extends('layouts.app')

@section('content')
    @php
        $user = \Illuminate\Support\Facades\Auth::user();
    @endphp
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right"> &nbsp;
                        {{--                        <li><a href="{{url('clear_cache')}}" class="btn btn-success btn-sm mr-2">Cache Clear</a></li>--}}
                        <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <div class="card card-warning card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                @if($user->profile_image == '')
                                    <img class="profile-user-img img-fluid img-circle"
                                         src="{{asset('storage/admin/images/user.png')}}"
                                         alt="User profile picture">
                                @else
                                    <img class="profile-user-img img-fluid img-circle"
                                         src="{{asset('storage/admin/images/'.$user->profile_image)}}"
                                         alt="User profile picture">
                                @endif
                            </div>
                            <h3 class="profile-username text-center">{{$user->first_name}} {{$user->last_name}}</h3>
                            <p class="text-muted text-center">Super Admin</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Mobile No</b> <a class="float-right"
                                                        href="tel:7046222422">+91 {{$user->mobile_no}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Email</b> <a class="float-right">{{$user->email}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>City</b> <a class="float-right">{{$user->city}}</a>
                                </li>
                            </ul>

                        </div>

                    </div>

                </div>

                <div class="col-md-9">
                    @include('admin.flash-message')
                    <div class="card card-warning card-outline">
                        <div class="card-header p-2  ">

                            <i class="fas fa-edit"></i> <b>Update
                                Profile</b>

                        </div>
                        <div class="card-body">
                            <div class="tab-content">


                                <div class="tab-pane active" id="settings">
                                    <form class="" action="{{route('update_profile')}}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="profile_image"
                                                               class="custom-file-input" id="customFile">
                                                        <label class="custom-file-label" for="customFile">Update
                                                            Profile</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <input type="text" name="first_name" class="form-control"
                                                           id="inputName"
                                                           value="{{$user->first_name}}"
                                                           placeholder="First Name">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <input type="text" name="last_name" class="form-control"
                                                           id="inputName"
                                                           value="{{$user->last_name}}"
                                                           placeholder="Last Name">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <input type="text" name="mobile_no" class="form-control" min="10"
                                                           max="10"
                                                           value="{{$user->mobile_no}}"
                                                           placeholder="Mobile Number">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <input type="email" name="email" class="form-control"
                                                           value="{{$user->email }}"
                                                           placeholder="Email">
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <input type="text" name="state" class="form-control"
                                                           value="{{$user->state }}"
                                                           placeholder="Enter State">
                                                    {{--                                                    <select class="form-control select2" name="state" id="state"--}}
                                                    {{--                                                            style="width: 100%">--}}
                                                    {{--                                                        <option>---Select State---</option>--}}
                                                    {{--                                                        @foreach($states as $state)--}}
                                                    {{--                                                            <option--}}
                                                    {{--                                                                value="{{$state->id}}" @if(isset($user)){{ $user->state == $state->id  ? 'selected' : ''}} @endif>{{$state->state_name}}</option>--}}
                                                    {{--                                                        @endforeach--}}
                                                    {{--                                                    </select>--}}

                                                </div>
                                            </div>

                                            <div class="form-group col-lg-3">
                                                <input type="text" name="city" class="form-control"
                                                       value="{{$user->city }}"
                                                       placeholder="Enter City">
                                                {{--                                                <select class="form-control select2" name="city" id="city"--}}
                                                {{--                                                        style="width: 100%">--}}
                                                {{--                                                    <option>---Select City---</option>--}}
                                                {{--                                                </select>--}}
                                                <span
                                                    style="font-size: 80%; color: #DC3545">{{$errors->first('city')}}</span>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-warning shadow-sm">
                                                        <b>Submit</b></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>

                            <div class="card-header p-2  ">

                                <i class="fa fas-solid fa-key"></i> <b>Change Password</b>

                            </div>
                            <div class="card-body pl-0">
                                <div class="tab-content">
                                    <form class="" action="{{route('change_password')}}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <input type="password" name="current_password" class="form-control"
                                                           placeholder="Old Password">
                                                    <span
                                                        style="color: red">{{$errors->first('current_password')}}</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <input type="password" name="new_password" class="form-control"
                                                           placeholder="New Password">
                                                    <span style="color: red">{{$errors->first('new_password')}}</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <input type="password" name="conform_password" class="form-control"
                                                           placeholder="Comfirm Password">
                                                    <span
                                                        style="color: red">{{$errors->first('conform_password')}}</span>
                                                </div>
                                            </div>


                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-warning shadow-sm">
                                                        <b>Submit</b></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>


            </form>
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


@push('page_scripts')

    <script type="text/javascript">
        $(document).ready(function () {
            $('#state').trigger('change');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


        });
        $('#state').on('change', function (e) {
            var cat_id = e.target.value;
            $.ajax({
                url: "{{ route('profile_state') }}",
                type: "get",
                data: {
                    cat_id: cat_id
                },
                success: function (response) {
                    console.log(response.data)

                    $('#city').empty();
                    $.each(response, function (key, value) {

                        // var isSelected = (key == city_name) ? "selected" : "";
                        $("#city").append('<option value="' + key + '">' + value + '</option>');
                    });


                }
            })
        });
    </script>
@endpush
