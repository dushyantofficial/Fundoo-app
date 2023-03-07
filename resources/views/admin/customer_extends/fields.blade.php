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


<div class="form-group col-sm-2">
    {!! Form::label('first_name', 'First Name:') !!}
    {!! Form::text('first_name', null, ['class' => 'form-control '.($errors->has('first_name') ? 'is-invalid': ''),"Placeholder" => 'Enter First Name']) !!}
    @error('first_name')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<div class="form-group col-sm-2">
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

@if(isset($userss->mobile_no))
    {{--    {!! Form::text('mobile_no', null, ['class' => 'form-control '.($errors->has('mobile_no') ? 'is-invalid': ''),"Placeholder" => 'Enter Mobile','id' => 'mobile_no','min' => '10','max' => '10']) !!}--}}
    {{--    @dd($userss->mobile_no);--}}
@else
    <div class="form-group col-sm-2">
        {!! Form::label('mobile_no', 'Mobile No:') !!}
        <input type="text" name="mobile_no" class="form-control" value="{{old('mobile_no')}}"
               placeholder="Enter Mobile No">
        @error('mobile_no')
        <span class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
@endif

<div class="form-group col-sm-2">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control '.($errors->has('email') ? 'is-invalid': ''),"Placeholder" => 'Enter email']) !!}
    @error('email')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<div class="form-group col-sm-2">
    {!! Form::label('gander', 'Gender:') !!}
    {{--    {!! Form::radio('gander', null, ['class' => 'form-control '.($errors->has('gander') ? 'is-invalid': ''),"Placeholder" => 'Enter Gander']) !!}--}}
    <br>
    <div class="form-check form-check-inline">
        {{--        @if ($userss->gender=="male")--}}
        <input class="form-check-input" type="radio" name="gender"
               value="male"
               {{old('gender')=="male" ? 'checked='.'"checked"' : '' }} @if(isset($userss)) {{ ($userss->gender=="male")? "checked" : "" }} @endif checked>
        <label class="form-check-label" for="male">Male</label>
        {{--        @endif--}}
    </div>
    <div class="form-check form-check-inline">
        {{--        @if($userss->gender=="female")--}}
        <input class="form-check-input" type="radio" name="gender"
               value="female" {{old('gender')=="female" ? 'checked='.'"checked"' : '' }} @if(isset($userss)) {{ ($userss->gender=="female")? "checked" : "" }} @endif>
        <label class="form-check-label" for="female">Female</label>
        {{--        @endif--}}
    </div>
    <div class="form-check form-check-inline">
        {{--        @if($userss->gender=="other")--}}
        <input class="form-check-input" type="radio" name="gender"
               value="other" {{old('gender')=="other" ? 'checked='.'"checked"' : '' }} @if(isset($userss)) {{ ($userss->gender=="other")? "checked" : "" }} @endif>
        <label class="form-check-label" for="other">Other</label>
        {{--        @endif--}}
    </div>
    {{--    @error('gender')--}}
    <span style="color: red">{{ $errors->first('gender') }}</span>
    {{--    @enderror--}}
</div>


<div class="form-group col-sm-2">
    {!! Form::label('status', 'Status:') !!}

    {!! Form::select('status',['active' => 'Active', 'deactive' => 'Deactive'], null, ['class'=>'form-control']); !!}
    @error('status')
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


<div class="col-lg-3">
    {!! Form::label('profile_image', 'Profile Image:') !!}
    <div class="form-group">
        <div class="custom-file">
            <input type="file" name="profile_image"
                   class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">Upload Profile Image</label>
        </div>
        {{--    {!! Form::file('profile_image', null, ['class' => 'form-control '.($errors->has('profile_image') ? 'is-invalid': ''),"Placeholder" => 'Enter profile_image']) !!}--}}
        <span style="color: red">{{ $errors->first('profile_image') }}</span>
        {{--    @dd($customerExtend)--}}
        @if(isset($userss))
            @if($userss->profile_image == '')
                <img src="{{asset('admin/dummy_image/no-image.jpg')}}" alt="user" style="width: 80px; height: 70px;">
            @else
                <img src="{{asset('storage/admin/images/'.$userss->profile_image)}}" style="width: 80px; height: 70px;"
                     alt="user">
            @endif
        @endif
    </div>
</div>&nbsp;&nbsp;&nbsp;

<div class="container-fluid">
    <div class="row pb-4 pt-4">
        <div class="col-lg-12" style="background-color: #f4f6f9">
            <hr class="m-0">
            <h4>Permanent Address Information</h4>
            <hr class="m-0">
        </div>
    </div>
</div>
<!-- State Field -->
<div class="form-group col-sm-3">
    {{--    {!! Form::label('state', 'State:') !!}--}}
    {{--    {!! Form::select('state', $states,old('state'), ['class'=>'form-control select2','placeholder'=>'Please Select State','id'=>'state_id']); !!}--}}
    {!! Form::label('state', 'State:') !!}
    {{--    {!! Form::text('state', null, ['class' => 'form-control '.($errors->has('state') ? 'is-invalid': ''),"Placeholder" => 'Enter State']) !!}--}}
    @if(isset($customerExtend))
        <input type="text" name="state" class="form-control" value="{{$customerExtend->state}}"
               placeholder="Enter State">
    @else
        <input type="text" name="state" class="form-control" value="{{old('state')}}"
               placeholder="Enter State">
    @endif
    @error('state')
    <span style="font-size: 80%; color: #DC3545">{{ $errors->first('state') }}</span>
    @enderror
</div>
<!-- City Field -->
<div class="form-group col-sm-3">


    {!! Form::label('city', 'City:') !!}
    {{--    <select class="form-control select2" name="city" id="city_id" style="width: 100%">--}}
    {{--        <option>---Select City---</option>--}}
    {{--    </select>--}}
    {{--    {!! Form::text('city', null, ['class' => 'form-control '.($errors->has('city') ? 'is-invalid': ''),"Placeholder" => 'Enter City']) !!}--}}
    @if(isset($customerExtend))
        <input type="text" name="city" class="form-control" value="{{$customerExtend->city}}"
               placeholder="Enter City">
    @else
        <input type="text" name="city" class="form-control" value=""
               placeholder="Enter City">
    @endif
    @error('city')
    <span style="font-size: 80%; color: #DC3545">{{ $errors->first('city') }}</span>
    @enderror
</div>
<!-- Pincode Field -->
<div class="form-group col-sm-3">
    {!! Form::label('pincode', 'Pincode:') !!}
    {{--    {!! Form::text('pincode', null, ['class' => 'form-control '.($errors->has('pincode') ? 'is-invalid': ''),'Placeholder'=>'Enter Pincode','id'=> 'pincode','min' => '6','max' => '6']) !!}--}}
    @if(isset($customerExtend))
        <input type="text" name="pincode" class="form-control" value="{{$customerExtend->pincode}}"
               placeholder="Enter Pincode">
    @else
        <input type="text" name="pincode" class="form-control" value=""
               placeholder="Enter Pincode">
    @endif
    @error('pincode')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>
{{--@dd($status)--}}
<!-- Apartment Field -->
<div class="form-group col-sm-3">
    {!! Form::label('apartment', 'Apartment:') !!}
    {!! Form::text('apartment', null, ['class' => 'form-control '.($errors->has('apartment') ? 'is-invalid': ''),'Placeholder'=>'Enter Apartment']) !!}
    @error('apartment')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>
<!-- Block Flat Field -->
<div class="form-group col-sm-3">
    {!! Form::label('block_flat', 'Block Flat:') !!}
    {!! Form::text('block_flat', null, ['class' => 'form-control '.($errors->has('block_flat') ? 'is-invalid': ''),'Placeholder'=>'Enter Block Flat']) !!}
    @error('block_flat')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>


<div class="form-group col-sm-3">
    {!! Form::label('address_type', 'Address Type:') !!}
    {{--    {!! Form::radio('gander', null, ['class' => 'form-control '.($errors->has('gander') ? 'is-invalid': ''),"Placeholder" => 'Enter Gander']) !!}--}}
    <br>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="address_type" value="home"
               {{old('address_type')=="home" ? 'checked='.'"checked"' : '' }} @if(isset($customerExtend)){{ $customerExtend->address_type == 'home' ? 'checked' : '' }} @endif checked="checked">
        <label class="form-check-label" for="Home">Home</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="address_type"
               value="office" {{old('address_type')=="office" ? 'checked='.'"checked"' : '' }} @if(isset($customerExtend)){{ $customerExtend->address_type == 'office' ? 'checked' : '' }} @endif>
        <label class="form-check-label" for="office">Office</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="address_type"
               value="other" {{old('address_type')=="other" ? 'checked='.'"checked"' : '' }} @if(isset($customerExtend)){{ $customerExtend->address_type == 'other' ? 'checked' : '' }} @endif>
        <label class="form-check-label" for="office">Other</label>
    </div>
    @error('address_type')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

{{--<!-- Type Field -->--}}
{{--<div class="form-group col-sm-3 d-none">--}}
{{--    {!! Form::label('type', 'Type:') !!}--}}
{{--    {!! Form::text('type', null, ['class' => 'form-control '.($errors->has('type') ? 'is-invalid': ''),'Placeholder'=>'Enter Type']) !!}--}}
{{--    @error('type')--}}
{{--    <span class="error invalid-feedback">{{ $message }}</span>--}}
{{--    @enderror--}}
{{--</div>--}}

