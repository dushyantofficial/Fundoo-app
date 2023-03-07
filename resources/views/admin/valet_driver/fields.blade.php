<div class="container-fluid p-0">
    <div class="row pb-4">
        <div class="col-lg-12" style="background-color: #f4f6f9">
            <hr class="m-0">
            <h4>Basic Information</h4>
            <hr class="m-0">
        </div>
    </div>
</div>

<div class="clearfix"></div>

<!-- Work Type Field -->

<div class="form-group col-sm-2">
{{--    {!! Form::label('work_type', 'Work Category:') !!}--}}
{{--    {!! Form::select('work_type', $work_categorys,old('work_type'), ['class'=>'form-control select2 '.($errors->has('work_type') ? 'is-invalid': ''),'placeholder'=>'Please Select Work Category','id'=>'work_type']); !!}--}}
    <label> Work Category: </label>
    {{--    <select name="work_type" class="form-control select2" id="work_type">--}}
    {{--        <option>Please Select Work Category</option>--}}
    {{--        @foreach(config('constants.CATEGORY') as $value => $values)--}}
    {{--            <option value="{{ $value }}" @if(isset($driverExtended)){{ ($driverExtended->work_type==$value)? "selected" : "" }} @endif>--}}
    {{--                {{ $values }}--}}
    {{--            </option>--}}
    {{--        @endforeach--}}
    {{--    </select>--}}
    <input type="text" name="work_type" class="form-control" value="{{config('constants.CATEGORY.valet_parking')}}"
           @if(isset($driverExtended)){{ ($driverExtended->work_type==config('constants.CATEGORY.valet_parking'))? "selected" : "" }} @endif disabled>
    <span style="font-size: 80%; color: #DC3545">{{$errors->first('work_type')}}</span>
</div>

<div class="form-group col-sm-3">
    {!! Form::label('first_name', 'First Name:') !!}
    {!! Form::text('first_name', null, ['class' => 'form-control '.($errors->has('first_name') ? 'is-invalid': ''),"Placeholder" => 'Enter First Name']) !!}
    @error('first_name')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<div class="form-group col-sm-3">
    {!! Form::label('middle_name', 'Middle Name:') !!}
    {!! Form::text('middle_name', null, ['class' => 'form-control '.($errors->has('middle_name') ? 'is-invalid': ''),"Placeholder" => 'Enter Middle Name']) !!}
    @error('middle_name')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<div class="form-group col-sm-2">
    {!! Form::label('last_name', 'Last Name:') !!}
    {!! Form::text('last_name', null, ['class' => 'form-control '.($errors->has('last_name') ? 'is-invalid': ''),"Placeholder" => 'Enter Last Name']) !!}
    @error('last_name')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

@if(isset($driverExtended))
@else
    <div class="form-group col-sm-2">
        {!! Form::label('mobile_no', 'Mobile No:') !!}
        {!! Form::number('mobile_no', null, ['class' => 'form-control '.($errors->has('mobile_no') ? 'is-invalid': ''),"Placeholder" => 'Enter Mobile No','id' => 'aditional_contact_no']) !!}
        @error('mobile_no')
        <span class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
@endif

<div class="form-group col-sm-2">
    {!! Form::label('aditional_contact_no', 'Aditional No:') !!}
    {!! Form::number('aditional_contact_no', null, ['class' => 'form-control '.($errors->has('aditional_contact_no') ? 'is-invalid': ''),"Placeholder" => 'Enter Aditional No','id' => 'aditional_contact_no']) !!}
    @error('aditional_contact_no')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<div class="form-group col-sm-2">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control '.($errors->has('email') ? 'is-invalid': ''),"Placeholder" => 'Enter email']) !!}
    @error('email')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>
<div class="form-group col-sm-2">
    {!! Form::label('date_of_birth', 'D.O.B:') !!}
    {!! Form::date('date_of_birth', null, ['class' => 'form-control '.($errors->has('date_of_birth') ? 'is-invalid': ''),"Placeholder" => 'Enter Date_Of_Birth']) !!}
    @error('date_of_birth')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>




<!-- Monthly Salary Field -->
<div class="form-group col-sm-2">
    {!! Form::label('monthly_salary', 'Monthly Salary:') !!}
    {!! Form::number('monthly_salary', null, ['class' => 'form-control '.($errors->has('monthly_salary') ? 'is-invalid': ''),'Placeholder'=>'Enter Monthly Salary']) !!}
    @error('monthly_salary')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<div class="form-group col-sm-2">
    {!! Form::label('gander', 'Gender:') !!}
    {{--    {!! Form::radio('gander', null, ['class' => 'form-control '.($errors->has('gander') ? 'is-invalid': ''),"Placeholder" => 'Enter Gander']) !!}--}}
    <br>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="gander" value="male"
               {{old('gander')=="male" ? 'checked='.'"checked"' : '' }}  @if(isset($userss)) {{ ($userss->gender=="male")? "checked" : "" }} @endif checked="checked">
        <label class="form-check-label" for="male">Male</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="gander" value="female"
            {{old('gander')=="female" ? 'checked='.'"checked"' : '' }}  @if(isset($userss)) {{ ($userss->gender=="female")? "checked" : "" }} @endif>
        <label class="form-check-label" for="female">Female</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="gander" value="other"
            {{old('gander')=="other" ? 'checked='.'"checked"' : '' }} @if(isset($userss)) {{ ($userss->gender=="other")? "checked" : "" }} @endif>
        <label class="form-check-label" for="other">Other</label>
    </div>
    @error('gander')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>


<div class="form-group col-sm-2 d-none">
    {!! Form::label('lati', 'Lati:') !!}
    {!! Form::text('lati', null, ['class' => 'form-control '.($errors->has('lati') ? 'is-invalid': ''),"Placeholder" => 'Enter Lati']) !!}
    @error('lati')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>
<div class="col-lg-3">
    {!! Form::label('profile_image', 'Profile Image:') !!}
    <div class="form-group">
        <div class="custom-file">
            <input type="file" name="profile_image"
                   class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">Upload Profile Image</label>
        </div>
{{--    {!! Form::file('profile_image', null, ['class' => 'form-control '.($errors->has('profile_image') ? 'is-invalid': ''),"Placeholder" => 'Enter profile_image']) !!}--}}

    @if(isset($userss))

        @if($userss->profile_image == '')
                <img src="{{asset('admin/dummy_image/no-image.jpg')}}" alt="user" style="width: 40px; height: 40px;">
        @else
            <img src="{{asset('storage/admin/images/'.$userss->profile_image)}}" style="width: 40px; height: 40px;"
                 alt="user">
        @endif
    @endif
        <span class="text-danger">{{ $errors->first('profile_image') }}</span>
    </div>
</div>&nbsp;&nbsp;&nbsp;

<div class="form-group col-sm-2">
    {!! Form::label('status', 'Status:') !!}

    {!! Form::select('status', ['active' => 'Active', 'deactive' => 'Deactive'], null, ['class'=>'form-control']); !!}
    @error('status')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>


<div class="container-fluid">
    <div class="row pb-4 pt-4">
        <div class="col-lg-6 border-right">
            <div style="background-color: #f4f6f9">
                <hr class="m-0">
                <h4>Residential Address Information</h4>
                <hr class="m-0">
            </div>

            <div class="row pt-4">

                <div class="form-group col-sm-2 d-none">
                    {!! Form::label('pincode', 'Pincode:') !!}
                    {!! Form::text('pincode', null, ['class' => 'form-control '.($errors->has('pincode') ? 'is-invalid': ''),"Placeholder" => 'Enter Pincode']) !!}
                    @error('pincode')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>


                <!-- Expriance Field -->
                <div class="form-group col-sm-3 d-none">
                    {!! Form::label('expriance', 'Exprience:') !!}
                    {!! Form::text('expriance', null, ['class' => 'form-control '.($errors->has('expriance') ? 'is-invalid': ''),"Placeholder" => 'Enter Experience']) !!}
                    @error('expriance')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>


                <!-- Resi Ads Apartment Field -->
                <div class="form-group col-sm-6">

                    {!! Form::label('resi_ads_apartment', 'Apartment Name:') !!}
                    {!! Form::text('resi_ads_apartment', null, ['class' => 'form-control txtValues '.($errors->has('resi_ads_apartment') ? 'is-invalid': ''),'Placeholder'=>'Enter Apartment Name','id' => 'myInput1']) !!}
                    @error('resi_ads_apartment')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                    {{--                    <span style="font-size: 80%; color: #DC3545">{{$errors->first('resi_ads_apartment') }}</span>--}}

                </div>

                <!-- Resi Ads Block Flate Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('resi_ads_block_flate', 'Block/Flat:') !!}
                    {!! Form::text('resi_ads_block_flate', null, ['class' => 'form-control txtValues '.($errors->has('resi_ads_block_flate') ? 'is-invalid': ''),'Placeholder'=>'Enter Block/Flat','id' => 'myInput2']) !!}
                    <span style="font-size: 80%; color: #DC3545">{{$errors->first('resi_ads_block_flate') }}</span>
                </div>
                <!-- Resi Ads State Field -->
                {{--                @dd($state)--}}
                <div class="form-group col-sm-4">
                    {{--                    {!! Form::label('resi_ads_state', 'State:') !!}--}}
                    {{--                    {!! Form::select('resi_ads_state', $states,old('resi_ads_state'), ['class'=>'form-control select2 '.($errors->has('resi_ads_state') ? 'is-invalid': ''),'placeholder'=>'Please Select State','id'=>'state']); !!}--}}
                    {!! Form::label('resi_ads_state', 'State:') !!}
                    {!! Form::text('resi_ads_state', null, ['class' => 'form-control '.($errors->has('resi_ads_state') ? 'is-invalid': ''),"Placeholder" => 'Enter State','id' => 'state']) !!}
                    @error('resi_ads_state')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                    {{--                    <span style="font-size: 80%; color: #DC3545">{{$errors->first('resi_ads_state') }}</span>--}}

                </div>
                <!-- Resi Ads City Field -->
                <div class="form-group col-sm-4">
                    {!! Form::label('resi_ads_city', 'City:') !!}
                    {{--                    <select class="form-control select2 city" name="resi_ads_city" id="city" style="width: 100%">--}}
                    {{--                        <option>---Select City---</option>--}}
                    {{--                    </select>--}}
                    {!! Form::text('resi_ads_city', null, ['class' => 'form-control '.($errors->has('resi_ads_city') ? 'is-invalid': ''),"Placeholder" => 'Enter City','id' => 'city']) !!}
                    @error('resi_ads_city')
                    <span style="font-size: 80%; color: #DC3545">{{$errors->first('resi_ads_city')}}</span>
                    @enderror
                </div>
                <!-- Resi Ads Pincode Field -->
                <div class="form-group col-sm-4">
                    {!! Form::label('resi_ads_pincode', 'Pincode:') !!}
                    {!! Form::text('resi_ads_pincode', null, ['class' => 'form-control '.($errors->has('resi_ads_pincode') ? 'is-invalid': ''),"Placeholder" => 'Enter Pincode','onkeyup' => 'get_details()','id' => 'myInput3','min' => '6','max' => '6']) !!}
                    @error('resi_ads_pincode')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <br/>

            {{--                <div class="form-group col-sm-3" id="type">--}}
            {{--                    <label>Address Type:</label>--}}
            {{--                    <br>--}}
            {{--                    <div class="form-check form-check-inline">--}}
            {{--                        <input class="form-check-input" type="radio" data-id="address_type" name="raddress_type"--}}
            {{--                               value="rhome"--}}
            {{--                               {{old('raddress_type')=="rhome" ? 'checked='.'"checked"' : '' }}  checked>--}}
            {{--                        <label class="form-check-label" for="Home">Home</label>--}}
            {{--                    </div>--}}
            {{--                    <div class="form-check form-check-inline">--}}
            {{--                        <input class="form-check-input" type="radio" name="raddress_type" data-id="office"--}}
            {{--                               value="roffice" {{old('raddress_type')=="roffice" ? 'checked='.'"checked"' : '' }}>--}}
            {{--                        <label class="form-check-label" for="reoffice">Office</label>--}}
            {{--                    </div>--}}
            {{--                    @error('gander')--}}
            {{--                    <span class="error invalid-feedback">{{ $message }}</span>--}}
            {{--                    @enderror--}}
            {{--                </div>--}}

                <!-- Resi Ads Proof Field -->
                <div class="col-lg-7">
                    {!! Form::label('resi_ads_proof', 'Address Proof:') !!}
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" name="resi_ads_proof"
                                   class="custom-file-input" id="image">
                            <label class="custom-file-label" for="customFile">Upload Resi Ads Proof</label>
                        </div>
{{--                    {!! Form::file('resi_ads_proof', null, ['class' => 'form-control '.($errors->has('resi_ads_proof') ? 'is-invalid': ''),'Placeholder'=>'Enter Resi Ads Proof','id' => 'image']) !!}--}}

                    @if(isset($driverExtended))
                        @if($driverExtended->resi_ads_proof == '')
                                <img src="{{asset('admin/dummy_image/no-image.jpg')}}" alt="user"
                                     style="width: 40px; height: 40px;">
                        @else
                            <img src="{{asset('storage/admin/images/'.$driverExtended->resi_ads_proof)}}"
                                 style="width: 40px; height: 40px;" alt="user">
                        @endif
                    @endif
                        <span class="text-danger">{{ $errors->first('resi_ads_proof') }}</span>
                    </div>
                </div>


                <!-- Is Kyc Verify Field -->
                <div class="form-group col-sm-3 d-none">
                    {!! Form::label('is_kyc_verify', 'Is Kyc Verify:') !!}
                    {!! Form::text('is_kyc_verify', null, ['class' => 'form-control '.($errors->has('is_kyc_verify') ? 'is-invalid': ''),'Placeholder'=>'Enter Is Kyc Verify']) !!}
                    @error('is_kyc_verify')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

            </div>
        </div>
        <div class="col-lg-6">
            <div style="background-color: #f4f6f9" class="d-flex justify-content-lg-start align-items-center border">
                <hr class="m-0">
                <button class="btn btn-warning btn-sm sendButton" id="copy" onclick="myFunction()" type="button"
                        disabled><i class="fas fa-copy" disabled="disabled">Copy Address</i></button>

                <h4
                    class="text-right ml-3">Postal Address Information</h4>
                <hr class="m-0">
            </div>
            <div class="row pt-4">
                <!-- Post Ads Appartment Field -->

                <div class="form-group col-sm-6">
                    {!! Form::label('post_ads_appartment', 'Apartment Name:') !!}
                    {!! Form::text('post_ads_appartment', null, ['class' => 'form-control '.($errors->has('post_ads_appartment') ? 'is-invalid': ''),'Placeholder'=>'Enter Apartment Name','id' => 'output1']) !!}
                    @error('post_ads_appartment')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Post Ads Block Flat Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('post_ads_block_flat', 'Block/Flat:') !!}
                    {!! Form::text('post_ads_block_flat', null, ['class' => 'form-control '.($errors->has('post_ads_block_flat') ? 'is-invalid': ''),'Placeholder'=>'Enter Block/Flat','id' => 'output2']) !!}
                    @error('post_ads_block_flat')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Post Ads State Field -->
                <div class="form-group col-sm-4">
                    {{--                    {!! Form::label('post_ads_state', 'State:') !!}--}}
                    {{--                    {!! Form::select('post_ads_state', $states,old('post_ads_state'), ['class'=>'form-control select2 '.($errors->has('post_ads_state') ? 'is-invalid': ''),'placeholder'=>'Please Select State','id'=>'states']); !!}--}}
                    {!! Form::label('post_ads_state', 'State:') !!}
                    {!! Form::text('post_ads_state', null, ['class' => 'form-control '.($errors->has('post_ads_state') ? 'is-invalid': ''),"Placeholder" => 'Enter State','id' => 'states']) !!}
                    @error('post_ads_state')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Post Ads City Field -->
                <div class="form-group col-sm-4">
                    {!! Form::label('post_ads_city', 'City:') !!}
                    {{--                    <select class="form-control custom-select select2" name="post_ads_city" id="citys"--}}
                    {{--                            style="width: 100%">--}}
                    {{--                        <option>---Select City---</option>--}}
                    {{--                    </select>--}}

                    {!! Form::text('post_ads_city', null, ['class' => 'form-control '.($errors->has('post_ads_city') ? 'is-invalid': ''),"Placeholder" => 'Enter City','id' => 'citys']) !!}
                    @error('post_ads_city')
                    <span style="font-size: 80%; color: #DC3545">{{$errors->first('post_ads_city')}}</span>
                    @enderror
                </div>
                <!-- Post Ads Pincode Field -->
                <div class="form-group col-sm-4">
                    {!! Form::label('post_ads_pincode', 'Pincode:') !!}
                    {!! Form::text('post_ads_pincode', null, ['class' => 'form-control '.($errors->has('post_ads_pincode') ? 'is-invalid': ''),'Placeholder'=>'Enter Pincode','id' => 'output3']) !!}
                    @error('post_ads_pincode')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>


                <!-- Post Ads Type Field -->
                <div class="form-group col-sm-6 d-none">
                    {!! Form::label('post_ads_type', 'Post Ads Type:') !!}
                    {!! Form::text('post_ads_type', null, ['class' => 'form-control '.($errors->has('post_ads_type') ? 'is-invalid': ''),'Placeholder'=>'Enter Post Type']) !!}
                    @error('post_ads_type')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            {{--                <div class="form-group col-sm-3" id="types">--}}

            {{--                    {!! Form::label('address_type', 'Address Type:') !!}--}}
            {{--                    --}}{{--    {!! Form::radio('gander', null, ['class' => 'form-control '.($errors->has('gander') ? 'is-invalid': ''),"Placeholder" => 'Enter Gander']) !!}--}}
            {{--                    <br>--}}
            {{--                    <div class="form-check form-check-inline">--}}
            {{--                        <input class="form-check-input" type="radio" name="address_type" value="home" id="address_type"--}}
            {{--                               {{old('address_type')=="home" ? 'checked='.'"checked"' : '' }}  checked>--}}
            {{--                        <label class="form-check-label" for="Home">Home</label>--}}
            {{--                    </div>--}}
            {{--                    <div class="form-check form-check-inline">--}}
            {{--                        <input class="form-check-input" type="radio" name="address_type" id="office"--}}
            {{--                               value="office" {{old('address_type')=="office" ? 'checked='.'"checked"' : '' }}>--}}
            {{--                        <label class="form-check-label" for="office">Office</label>--}}
            {{--                    </div>--}}
            {{--                    @error('gander')--}}
            {{--                    <span class="error invalid-feedback">{{ $message }}</span>--}}
            {{--                    @enderror--}}
            {{--                </div>--}}
                <!-- Post Ads Proof Field -->
                <div class="col-lg-7">
                    {!! Form::label('post_ads_proof', 'Address Proof:') !!}
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" name="post_ads_proof"
                                   class="custom-file-input" id="post_ads_proof">
                            <label class="custom-file-label" for="customFile">Upload Address Proof</label>
                        </div>
{{--                    {!! Form::file('post_ads_proof', null, ['class' => 'form-control '.($errors->has('post_ads_proof') ? 'is-invalid': ''),'Placeholder'=>'Enter Address Proof']) !!}--}}


                    @if(isset($driverExtended))
                        @if($driverExtended->post_ads_proof == '')
                                <img src="{{asset('admin/dummy_image/no-image.jpg')}}" alt="user"
                                     style="width: 40px; height: 40px;">
                        @else
                            <img src="{{asset('storage/admin/images/'.$driverExtended->post_ads_proof)}}"
                                 style="width: 40px; height: 40px;"
                                 alt="user">
                        @endif
                    @endif
                        <span class="text-danger">{{ $errors->first('post_ads_proof') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row pb-4 pt-4">
        <div class="col-lg-12" style="background-color: #f4f6f9">
            <hr class="m-0">
            <h4>Driving Details</h4>
            <hr class="m-0">
        </div>
    </div>
</div>
<!-- Driver Type Field -->
<div class="form-group col-sm-3">
    {!! Form::label('driver_type', 'Driver Type:') !!}

    <br>
    @if(isset($driverExtended))
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="driver_type" value="car_driver"
                   onchange="EditcarDriver();"
                   id="car_driver"
                {{old('driver_type')=="car_driver" ? 'checked='.'"checked"' : '' }} @if(isset($driverExtended)) {{ ($driverExtended->driver_type=="car_driver")? "checked" : "" }} @endif
            >
            <label class="form-check-label" for="Home">Car Driver</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="driver_type"
                   id="Commercial_driver" onchange="EditcommercialDriver();"
                   value="commercial_driver" {{old('driver_type')=="commercial_driver" ? 'checked='.'"checked"' : '' }} @if(isset($driverExtended)) {{ ($driverExtended->driver_type=="commercial_driver")? "checked" : "" }} @endif>
            <label class="form-check-label" for="coffice">Commercial Driver</label>
        </div>
        <br>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="driver_type" id="both" onchange="EditbothDriver();"
                   value="both" {{old('driver_type')=="both" ? 'checked='.'"checked"' : '' }} @if(isset($driverExtended)) {{ ($driverExtended->driver_type=="both")? "checked" : "" }} @endif>
            <label class="form-check-label" for="both">Both</label>
        </div>
        @error('driver_type')
        <span class="error invalid-feedback">{{ $message }}</span>
        @enderror
    @else
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="driver_type" value="car_driver" onchange="carDriver();"
                   id="car_driver">
            <label class="form-check-label" for="Home">Car Driver</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="driver_type" onchange="commercialDriver();"
                   id="Commercial_driver" value="commercial_driver">
            <label class="form-check-label" for="coffice">Commercial Driver</label>
        </div>
        <br>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="driver_type" onchange="bothDriver();" id="both"
                   value="both">
            <label class="form-check-label" for="both">Both</label>
        </div>
        @error('driver_type')
        <span class="error invalid-feedback">{{ $message }}</span>
        @enderror
    @endif
</div>

<!-- Driver Type Field -->
<div class="form-group col-sm-3">
    {!! Form::label('vehicle_type', 'Vehicle Type:') !!}

    <br>
    @if(isset($driverExtended))
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="vehicle_type" value="manual" id="manual"
                   {{old('vehicle_type')=="manual" ? 'checked='.'"checked"' : '' }} @if(isset($driverExtended)) {{ ($driverExtended->vehicle_type=="manual")? "checked" : "" }} @endif  checked>
            <label class="form-check-label" for="Home">Manual</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="vehicle_type" id="automatic"
                   value="automatic" {{old('vehicle_type')=="automatic" ? 'checked='.'"checked"' : '' }} @if(isset($driverExtended)) {{ ($driverExtended->vehicle_type=="automatic")? "checked" : "" }} @endif>
            <label class="form-check-label" for="automatic">Automatic</label>
        </div>
        <br>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="vehicle_type" id="both_vehicle_type"
                   value="both" {{old('vehicle_type')=="both" ? 'checked='.'"checked"' : '' }} @if(isset($driverExtended)) {{ ($driverExtended->vehicle_type=="both")? "checked" : "" }} @endif>
            <label class="form-check-label" for="both">Both</label>
        </div>
        @error('vehicle_type')
        <span class="error invalid-feedback">{{ $message }}</span>
        @enderror
    @else
        <div class="form-check form-check-inline">
            <input class="form-check-input manual" type="radio" name="vehicle_type" value="manual" id="manual">
            <label class="form-check-label" for="Home">Manual</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input automatic" type="radio" name="vehicle_type" id="automatic"
                   value="automatic">
            <label class="form-check-label" for="automatic">Automatic</label>
        </div>
        <br>
        <div class="form-check form-check-inline">
            <input class="form-check-input both" type="radio" name="vehicle_type" id="both_vehicle_type"
                   value="both">
            <label class="form-check-label" for="both">Both</label>
        </div>
        @error('vehicle_type')
        <span class="error invalid-feedback">{{ $message }}</span>
        @enderror
    @endif
</div>
<!-- License Field -->
<div class="form-group col-sm-6">

    {!! Form::label('select_vehicle_type', 'Select Vehicle Type:') !!}
    <br>
    @if(isset($driverExtended))
        <input type="hidden" value="{{$driverExtended->driver_type}}" id="driv_type">
        @if($driverExtended->driver_type == 'commercial_driver')
            <div class="form-check form-check-inline">
                <input type="checkbox" name="select_vehicle_type[]" id="tempo" class="form-check-input tempo"
                       value="tempo"
                       @if(isset($driverExtended->select_vehicle_type)) @if(in_array('tempo',$driverExtended->select_vehicle_type)) checked @endif @endif>
                <label class="form-check-label" for="tempo">Tempo</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="checkbox" name="select_vehicle_type[]" id="bus" value="bus"
                       @if(isset($driverExtended->select_vehicle_type)) @if(in_array('bus',$driverExtended->select_vehicle_type)) checked @endif @endif>
                <label class="form-check-label" for="bus">Bus</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="checkbox" name="select_vehicle_type[]" id="truck" value="truck"
                       @if(isset($driverExtended->select_vehicle_type)) @if(in_array('truck',$driverExtended->select_vehicle_type)) checked @endif @endif>
                <label class="form-check-label" for="truck">Truck</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="checkbox" name="select_vehicle_type[]" id="hydra_crane" value="hydra_crane"
                       @if(isset($driverExtended->select_vehicle_type)) @if(in_array('hydra_crane',$driverExtended->select_vehicle_type)) checked @endif @endif>
                <label class="form-check-label" for="hydra_crane">Hydra Crane</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="checkbox" name="select_vehicle_type[]" id="tractor" value="t..ractor"
                       @if(isset($driverExtended->select_vehicle_type)) @if(in_array('tractor',$driverExtended->select_vehicle_type)) checked @endif @endif>
                <label class="form-check-label" for="tractor">Tractor</label>

            </div>
            <span class="text-danger">{{ $errors->first('select_vehicle_type') }}</span>

        @elseif($driverExtended->driver_type == 'both')
            <div class="form-check form-check-inline">
                <input type="checkbox" name="select_vehicle_type[]" id="tempo" value="tempo"
                       @if(isset($driverExtended->select_vehicle_type)) @if(in_array('tempo',$driverExtended->select_vehicle_type)) checked @endif @endif>
                <label class="form-check-label" for="tempo">Tempo</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="checkbox" name="select_vehicle_type[]" id="bus" value="bus"
                       @if(isset($driverExtended->select_vehicle_type)) @if(in_array('bus',$driverExtended->select_vehicle_type)) checked @endif @endif>
                <label class="form-check-label" for="bus">Bus</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="checkbox" name="select_vehicle_type[]" id="truck" value="truck"
                       @if(isset($driverExtended->select_vehicle_type)) @if(in_array('truck',$driverExtended->select_vehicle_type)) checked @endif @endif>
                <label class="form-check-label" for="truck">Truck</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="checkbox" name="select_vehicle_type[]" id="hydra_crane" value="hydra_crane"
                       @if(isset($driverExtended->select_vehicle_type)) @if(in_array('hydra_crane',$driverExtended->select_vehicle_type)) checked @endif @endif>
                <label class="form-check-label" for="hydra_crane">Hydra Crane</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="checkbox" name="select_vehicle_type[]" id="tractor" value="tractor"
                       @if(isset($driverExtended->select_vehicle_type)) @if(in_array('tractor',$driverExtended->select_vehicle_type)) checked @endif @endif>
                <label class="form-check-label" for="tractor">Tractor</label>

            </div>
            <span class="text-danger">{{ $errors->first('select_vehicle_type') }}</span>

        @elseif($driverExtended->driver_type == 'car_driver')
            <div class="form-check form-check-inline">
                {{--                {!! Form::checkbox('select_vehicle_type[]', 'tempo') !!}--}}
                <input type="checkbox" name="select_vehicle_type[]" class="form-check-input tempo" id="tempo"
                       value="tempo"
                       @if(isset($driverExtended->select_vehicle_type)) @if(in_array('tempo',$driverExtended->select_vehicle_type)) checked
                       @endif @endif disabled>
                <label class="form-check-label tempo" for="tempo">Tempo</label>
            </div>
            <div class="form-check form-check-inline">
                {{--                {!! Form::checkbox('select_vehicle_type[]', 'bus') !!}--}}
                <input type="checkbox" name="select_vehicle_type[]" class="form-check-input bus" id="bus" value="bus"
                       @if(isset($driverExtended->select_vehicle_type)) @if(in_array('bus',$driverExtended->select_vehicle_type)) checked
                       @endif @endif disabled>
                <label class="form-check-label bus" for="bus">Bus</label>
            </div>
            <div class="form-check form-check-inline">
                {{--                {!! Form::checkbox('select_vehicle_type[]', 'truck') !!}--}}
                <input type="checkbox" name="select_vehicle_type[]" class="form-check-input truck" id="truck"
                       value="truck"
                       @if(isset($driverExtended->select_vehicle_type)) @if(in_array('truck',$driverExtended->select_vehicle_type)) checked
                       @endif @endif disabled>
                <label class="form-check-label truck" for="truck">Truck</label>
            </div>
            <div class="form-check form-check-inline">
                {{--                {!! Form::checkbox('select_vehicle_type[]', 'hydra_crane') !!}--}}
                <input type="checkbox" name="select_vehicle_type[]" class="form-check-input hydra_crane"
                       id="hydra_crane" value="hydra_crane"
                       @if(isset($driverExtended->select_vehicle_type)) @if(in_array('hydra_crane',$driverExtended->select_vehicle_type)) checked
                       @endif @endif disabled>
                <label class="form-check-label hydra_crane" for="hydra_crane">Hydra Crane</label>
            </div>
            <div class="form-check form-check-inline">
                {{--                {!! Form::checkbox('select_vehicle_type[]', 'tractor') !!}--}}
                <input type="checkbox" name="select_vehicle_type[]" class="form-check-input tractor" id="tractor"
                       value="tractor"
                       @if(isset($driverExtended->select_vehicle_type)) @if(in_array('tractor',$driverExtended->select_vehicle_type)) checked
                       @endif @endif disabled>
                <label class="form-check-label tractor" for="tractor">Tractor</label>
            </div>
        @endif

    @else
        <div class="form-check form-check-inline">
            {{--            {!! Form::checkbox('select_vehicle_type[]', 'tempo',['disable' => false]) !!}--}}
            <input class="form-check-input tempo" type="checkbox" name="select_vehicle_type[]" value="tempo" id="tempo"
                   disabled>
            <label class="form-check-label tempo" for="tempo">Tempo</label>
        </div>
        <div class="form-check form-check-inline">
            {{--            {!! Form::checkbox('select_vehicle_type[]', 'bus',false,array('disabled')) !!}--}}
            <input class="form-check-input bus" type="checkbox" name="select_vehicle_type[]" value="bus" id="bus"
                   disabled>
            <label class="form-check-label bus" for="bus">Bus</label>
        </div>
        <div class="form-check form-check-inline">
            {{--            {!! Form::checkbox('select_vehicle_type[]', 'truck',false,array('disabled')) !!}--}}
            <input class="form-check-input truck" type="checkbox" name="select_vehicle_type[]" value="truck" id="truck"
                   disabled>
            <label class="form-check-label truck" for="truck">Truck</label>
        </div>
        <div class="form-check form-check-inline">
            {{--            {!! Form::checkbox('select_vehicle_type[]', 'hydra_crane',false,array('disabled')) !!}--}}
            <input class="form-check-input hydra_crane" type="checkbox" name="select_vehicle_type[]" value="hydra_crane"
                   id="hydra_crane" disabled>
            <label class="form-check-label hydra_crane" for="hydra_crane">Hydra Crane</label>
        </div>
        <div class="form-check form-check-inline">
            {{--            {!! Form::checkbox('select_vehicle_type[]', 'tractor',false,array('disabled')) !!}--}}
            <input class="form-check-input tractor" type="checkbox" name="select_vehicle_type[]" value="tractor"
                   id="tractor" disabled>
            <label class="form-check-label tractor" for="tractor">Tractor</label>

        </div>
    @endif
</div>

{{--@dd($driverExtended->work_station)--}}
<div class="form-group col-sm-2">
    {!! Form::label('work_station', 'Work Station:') !!}
    <select name="work_station" class="form-control select2">
        @foreach(config('constants.WORK_STATION') as $value => $values)
            <option value="{{ $value }}" @if(isset($driverExtended)){{ ($driverExtended->work_station==$value)? "selected" : "" }} @endif>
                {{ $values }}
            </option>
        @endforeach
    </select>
    @error('work_station')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>


<div class="form-group col-sm-2">
    {!! Form::label('work_time', 'Work Time:') !!}
    <select name="work_time" class="form-control select2">
        @foreach(config('constants.WORK_TIME') as $value => $values)
            <option value="{{ $value }}" @if(isset($driverExtended)){{ ($driverExtended->work_time==$value)? "selected" : "" }} @endif>
                {{ $values }}
            </option>
        @endforeach
    </select>
</div>
<!-- Language Field -->
<div class="form-group col-sm-6">

    {!! Form::label('language_known', 'Select Language:') !!}


    <select class="form-control select2" multiple="multiple" data-live-search="true"
            name="language_known[]" placeholder="Select Language" style="width: 100%; ">
        @foreach(config('constants.LANGUAGE_KHOWN') as $value => $values)
            @if(!empty($driverExtended->language_known))
                <option value="{{ $value }}"
                        @if(isset($driverExtended)) @if(in_array($value,$driverExtended->language_known)) selected @endif @endif>
                    {{ $values }}
                </option>
            @else
                <option value="{{ $value }}"> {{ $values }} </option>
            @endif
        @endforeach
    </select>
</div>
<div class="container-fluid">
    <div class="row pb-4 pt-4">
        <div class="col-lg-12" style="background-color: #f4f6f9">
            <hr class="m-0">
            <h4>Documents Information</h4>
            <hr class="m-0">
        </div>
    </div>
</div>

<!-- License Field -->
<div class="col-lg-3">
    {!! Form::label('license', 'License:') !!}
    <br>
    <div class="form-group">
        <div class="custom-file">
            <input type="file" name="license"
                   class="custom-file-input" id="license">
            <label class="custom-file-label" for="customFile">Upload License</label>
        </div>
{{--    {!! Form::file('license', null, ['class' => 'form-control '.($errors->has('license') ? 'is-invalid': ''),'Placeholder'=>'Enter License']) !!}--}}

    @if(isset($driverExtended))
        @if($driverExtended->license == '')
                <img src="{{asset('admin/dummy_image/no-image.jpg')}}" alt="user" style="width: 40px; height: 40px;">
        @else
            <img src="{{asset('storage/admin/images/'.$driverExtended->license)}}" style="width: 40px; height: 40px;"
                 alt="user">
        @endif
    @endif
        <span class="text-danger">{{ $errors->first('license') }}</span>
</div>
</div>

<!-- Aadhar Card Field -->
<div class="col-lg-3">
    {!! Form::label('aadhar_card', 'Aadhar Card:') !!}
    <br>
    <div class="form-group">
        <div class="custom-file">
            <input type="file" name="aadhar_card"
                   class="custom-file-input" id="aadhar_card">
            <label class="custom-file-label" for="customFile">Upload Aadhar Card</label>
        </div>
{{--    {!! Form::file('aadhar_card', null, ['class' => 'form-control '.($errors->has('aadhar_card') ? 'is-invalid': ''),'Placeholder'=>'Enter Aadhar Card ']) !!}--}}

    @if(isset($driverExtended))
        @if($driverExtended->aadhar_card == '')
                <img src="{{asset('admin/dummy_image/no-image.jpg')}}" alt="user" style="width: 40px; height: 40px;">
        @else
            <img src="{{asset('storage/admin/images/'.$driverExtended->aadhar_card)}}"
                 style="width: 40px; height: 40px;"
                 alt="user">
        @endif
    @endif
        <span class="text-danger">{{ $errors->first('aadhar_card') }}</span>
    </div>
</div>

<!-- Pancard Field -->
<div class="col-lg-3">
    {!! Form::label('pancard', 'Pancard:') !!}
    <br>
    <div class="form-group">
        <div class="custom-file">
            <input type="file" name="pancard"
                   class="custom-file-input" id="pancard">
            <label class="custom-file-label" for="customFile">Upload Pancard</label>
        </div>
{{--    {!! Form::file('pancard', null, ['class' => 'form-control '.($errors->has('pancard') ? 'is-invalid': ''),'Placeholder'=>'Enter Pancard']) !!}--}}

    @if(isset($driverExtended))
        @if($driverExtended->pancard == '')
                <img src="{{asset('admin/dummy_image/no-image.jpg')}}" alt="user" style="width: 40px; height: 40px;">
        @else
            <img src="{{asset('storage/admin/images/'.$driverExtended->pancard)}}" style="width: 40px; height: 40px;"
                 alt="user">
        @endif
    @endif
        <span class="text-danger">{{ $errors->first('pancard') }}</span>
    </div>
</div>

<!-- Light Bill Field -->
<div class="col-lg-3">
    {!! Form::label('light_bill', 'Light Bill:') !!}
    <br>
    <div class="form-group">
        <div class="custom-file">
            <input type="file" name="light_bill"
                   class="custom-file-input" id="light_bill">
            <label class="custom-file-label" for="customFile">Upload Light Bill</label>
        </div>
{{--    {!! Form::file('light_bill', null, ['class' => 'form-control '.($errors->has('light_bill') ? 'is-invalid': ''),'Placeholder'=>'Enter Light Bill']) !!}--}}

    @if(isset($driverExtended))
        @if($driverExtended->light_bill == '')
                <img src="{{asset('admin/dummy_image/no-image.jpg')}}" alt="user" style="width: 40px; height: 40px;">
        @else
            <img src="{{asset('storage/admin/images/'.$driverExtended->light_bill)}}" style="width: 40px; height: 40px;"
                 alt="user">
        @endif
    @endif
        <span class="text-danger">{{ $errors->first('light_bill') }}</span>
    </div>
</div>
<div class="container-fluid">
    <div class="row pb-4 pt-4">
        <div class="col-lg-12" style="background-color: #f4f6f9">
            <hr class="m-0">
            <h4>Bank Details</h4>
            <hr class="m-0">
        </div>
    </div>
</div>
<!-- Account Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('account_number', 'Account Number:') !!}
    {!! Form::number('account_number', null, ['class' => 'form-control '.($errors->has('account_number') ? 'is-invalid': ''),'Placeholder'=>'Enter Account Number','id' => 'account_number']) !!}
    @error('account_number')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>
<!-- Account Holder Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('account_holder_name', 'Account Holder Name:') !!}
    {!! Form::text('account_holder_name', null, ['class' => 'form-control '.($errors->has('account_holder_name') ? 'is-invalid': ''),'Placeholder'=>'Enter Account Holder Name','id' => 'account_holder_name']) !!}
    @error('account_holder_name')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>
<!-- IFSC Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ifsc_code', 'IFSC Code:') !!}
    {!! Form::text('ifsc_code', null, ['class' => 'form-control '.($errors->has('ifsc_code') ? 'is-invalid': ''),'Placeholder'=>'Enter IFSC Code','id' => 'ifsc_code']) !!}
    @error('ifsc_code')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>
<!-- Branch Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('branch_name', 'Branch Name:') !!}
    {!! Form::text('branch_name', null, ['class' => 'form-control '.($errors->has('branch_name') ? 'is-invalid': ''),'Placeholder'=>'Enter Branch Name','id' => 'branch_name']) !!}
    @error('branch_name')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>
@push('page_scripts')

    <script>
        $(document).ready(function () {
            $('.manual').attr('disabled', 'diasbled');
            $('.automatic').attr('disabled', 'diasbled');
            $('#both_vehicle_type').attr('disabled', 'diasbled');
            $('.tempo').prop("disabled", true);
            $('.bus').prop("disabled", true);
            $('.truck').prop("disabled", true);
            $('.hydra_crane').prop("disabled", true);
            $('.tractor').prop("disabled", true);

            var driver_type = $('#driv_type').val();

            if (driver_type == 'commercial_driver') {
                $('.tempo').prop("disabled", false);
                $('.bus').prop("disabled", false);
                $('.truck').prop("disabled", false);
                $('.hydra_crane').prop("disabled", false);
                $('.tractor').prop("disabled", false);
                $('#manual').prop('disabled', true);
                $('#automatic').prop('disabled', true);
                $('#both_vehicle_type').prop('disabled', true);
            } else if (driver_type == 'car_driver') {
                $('#manual').prop("disabled", false);
                $('#automatic').prop("disabled", false);
                $('#both_vehicle_type').prop("disabled", false);
                $('.tempo').prop("disabled", true);
                $('.bus').prop("disabled", true);
                $('.truck').prop("disabled", true);
                $('.hydra_crane').prop("disabled", true);
                $('.tractor').prop("disabled", true);
            } else if (driver_type == 'both') {
                $('.tempo').prop("disabled", false);
                $('.bus').prop("disabled", false);
                $('.truck').prop("disabled", false);
                $('.hydra_crane').prop("disabled", false);
                $('.tractor').prop("disabled", false);
                $('#manual').prop('disabled', false);
                $('#automatic').prop('disabled', false);
                $('#both_vehicle_type').prop('disabled', false);
            }
        });

        function carDriver() {
            // var car_driver = $('#car_driver').val();
            $('.manual').removeAttr('disabled');
            $('.automatic').removeAttr('disabled');
            $('.both').removeAttr('disabled');
            $('.tempo').prop("disabled", true);
            $('.bus').prop("disabled", true);
            $('.truck').prop("disabled", true);
            $('.hydra_crane').prop("disabled", true);
            $('.tractor').prop("disabled", true);
        }

        function commercialDriver() {
            // var commercial_driver = $('#Commercial_driver').val();
            $('.tempo').prop("disabled", false);
            $('.bus').prop("disabled", false);
            $('.truck').prop("disabled", false);
            $('.hydra_crane').prop("disabled", false);
            $('.tractor').prop("disabled", false);
            $('.manual').attr('disabled', 'diasbled');
            $('.automatic').attr('disabled', 'diasbled');
            $('.both').attr('disabled', 'diasbled');
        }

        function bothDriver() {

            var both = $('#both').val();
            // if(commercial_driver == 'Commercial_driver') {
            $('.manual').removeAttr('disabled');
            $('.automatic').removeAttr('disabled');
            $('.both').removeAttr('disabled');
            $('.tempo').prop("disabled", false);
            $('.bus').prop("disabled", false);
            $('.truck').prop("disabled", false);
            $('.hydra_crane').prop("disabled", false);
            $('.tractor').prop("disabled", false);
            // }
        }

        function EditcarDriver() {
            // var car_driver = $('#car_driver').val();
            $('#manual').prop("disabled", false);
            $('#automatic').prop("disabled", false);
            $('#both_vehicle_type').prop("disabled", false);
            $('#tempo').prop("disabled", true);
            $('#bus').prop("disabled", true);
            $('#truck').prop("disabled", true);
            $('#hydra_crane').prop("disabled", true);
            $('#tractor').prop("disabled", true);
        }

        function EditcommercialDriver() {
            // var commercial_driver = $('#Commercial_driver').val();
            $('#tempo').prop("disabled", false);
            $('#bus').prop("disabled", false);
            $('#truck').prop("disabled", false);
            $('#hydra_crane').prop("disabled", false);
            $('#tractor').prop("disabled", false);
            $('#manual').prop('disabled', true);
            $('#automatic').prop('disabled', true);
            $('#both_vehicle_type').prop('disabled', true);
        }

        function EditbothDriver() {
            // var both = $('#both').val();
            $('#tempo').prop("disabled", false);
            $('#bus').prop("disabled", false);
            $('#truck').prop("disabled", false);
            $('#hydra_crane').prop("disabled", false);
            $('#tractor').prop("disabled", false);
            $('#manual').prop('disabled', false);
            $('#automatic').prop('disabled', false);
            $('#both_vehicle_type').prop('disabled', false);
        }
    </script>

    <script>

        $(document).ready(function () {
            var copy1 = document.getElementById("myInput1").value;
            var copy2 = document.getElementById("myInput2").value;
            var copy3 = document.getElementById("myInput3").value;

            $('.sendButton').attr('disabled', true);
            $('.txtValues').keyup(function () {

                var checkNull = false;
                $('.txtValues').each(function (index, input) {
                    if ($(this).val().length != 0) checkNull = true;
                });
                if (checkNull) {
                    $('.sendButton').attr('disabled', false);
                } else {
                    $('.sendButton').attr('disabled', true);
                }
            });
            if (copy1 || copy2 || copy3) {
                document.getElementById('copy').disabled = false;
            } else {
                document.getElementById('copy').disabled = true;
            }


        });
    </script>
    {{--    <script type="text/javascript">--}}
    {{--        $(document).ready(function () {--}}
    {{--            $('#state').trigger('change');--}}
    {{--            $.ajaxSetup({--}}
    {{--                headers: {--}}
    {{--                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
    {{--                }--}}
    {{--            });--}}


    {{--        });--}}
    {{--        $('#state').on('change', function (e) {--}}
    {{--            var cat_id = e.target.value;--}}
    {{--            $.ajax({--}}
    {{--                url: "{{ route('resi_ads_state') }}",--}}
    {{--                type: "get",--}}
    {{--                data: {--}}
    {{--                    cat_id: cat_id--}}
    {{--                },--}}
    {{--                success: function (response) {--}}
    {{--                    console.log(response.data)--}}

    {{--                    $('#city').empty();--}}
    {{--                    $.each(response, function (key, value) {--}}

    {{--                        // var isSelected = (key == city_name) ? "selected" : "";--}}
    {{--                        $("#city").append('<option value="' + key + '">' + value + '</option>');--}}
    {{--                    });--}}


    {{--                }--}}
    {{--            })--}}
    {{--        });--}}
    {{--    </script>--}}


    {{--    <script type="text/javascript">--}}
    {{--        $(document).ready(function () {--}}
    {{--            $('#states').trigger('change');--}}
    {{--            $.ajaxSetup({--}}
    {{--                headers: {--}}
    {{--                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
    {{--                }--}}
    {{--            });--}}


    {{--        });--}}
    {{--        $('#states').on('change', function (e) {--}}

    {{--            var cat_id = e.target.value;--}}
    {{--            $.ajax({--}}
    {{--                url: "{{ route('post_ads_state') }}",--}}
    {{--                type: "get",--}}
    {{--                data: {--}}
    {{--                    cat_id: cat_id--}}
    {{--                },--}}
    {{--                success: function (response) {--}}
    {{--                    console.log(response.data);--}}
    {{--                    $('#citys').empty();--}}
    {{--                    $.each(response, function (key, value) {--}}
    {{--                        $('#citys').append('<option value=' + key + {{ old('citys') == "'value'" ? 'selected' : '' }}--}}
    {{--                            '>' + value + '</option>');--}}
    {{--                        var copyText7 = document.getElementById('city').value;--}}
    {{--                        if (key == copyText7) {--}}
    {{--                            $('#citys').val(copyText7).attr('selected', 'selected');--}}
    {{--                        }--}}
    {{--                    });--}}


    {{--                }--}}
    {{--            })--}}
    {{--        });--}}
    {{--    </script>--}}

    <script>


        function myFunction() {
            /*Copy redio button*/
            var id = $("input[name='raddress_type']:checked").data('id');

            if (id == 'address_type') {
                $("#address_type").attr('checked', true);
            } else if (id == 'office') {
                $("#office").attr('checked', true);
            }
            /*End Copy redio button*/

            /*Copy Text */
            var copyText1 = document.getElementById("myInput1");
            var copyText2 = document.getElementById("myInput2");
            var copyText3 = document.getElementById("myInput3");


            var output1 = document.getElementById("output1");
            var output2 = document.getElementById("output2");
            var output3 = document.getElementById("output3");


            output1.value = copyText1.value;
            output2.value = copyText2.value;
            output3.value = copyText3.value;

            output1.select();
            output2.select();
            output3.select();
            /*End Copy Text*/


            //Dropdown Copy
            var copyText6 = document.getElementById('state').value;
            var output6 = document.getElementById("states");
            $('#states').val(copyText6).trigger('change');

            var copyText7 = document.getElementById('city').value;

            $('#citys').val(copyText7).trigger('change');
            //End Copy Dropdown


            document.execCommand("copy");


        }
    </script>

    <script>
        $("#aditional_contact_no").keydown(function (event) {
            k = event.which;
            if ((k >= 96 && k <= 105) || k == 8) {
                if ($(this).val().length == 10) {
                    if (k == 8) {
                        return true;
                    } else {
                        event.preventDefault();
                        return false;
                    }
                }
            } else {
                event.preventDefault();
                return false;
            }
        });
    </script>

@endpush



