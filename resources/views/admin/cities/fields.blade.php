<!-- State Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('state_id', 'State Name:') !!}
    {!! Form::select('state_id', $states,old('state_id'), ['class'=>'form-control select2 '.($errors->has('resi_ads_state') ? 'is-invalid': ''),'placeholder'=>'Please Select State','id'=>'state']); !!}
    <span style="font-size: 80%; color: #DC3545">{{$errors->first('state_id')}}</span>

</div>

<!-- City Name Field -->
<div class="form-group col-sm-3">
    {!! Form::label('city_name', 'City Name:') !!}
    {!! Form::text('city_name', null, ['class' => 'form-control '.($errors->has('city_name') ? 'is-invalid': ''), 'Placeholder'=>'Enter City Name']) !!}
    @error('city_name')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<!-- Pincode Field -->
<div class="form-group col-sm-3">
    {!! Form::label('pincode', 'Pincode:') !!}
    {!! Form::text('pincode', null, ['class' => 'form-control txtValues '.($errors->has('pincode') ? 'is-invalid': ''),'Placeholder'=>'Enter Pincode','id' => 'myInput3','min' => '6','max' => '6']) !!}
    @error('pincode')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<!-- 'bootstrap / Toggle Switch Status Field' -->
<div class="form-group col-sm-3">
    {!! Form::label('status', 'Status:') !!}

    {!! Form::select('status', ['active' => 'Active', 'deactive' => 'Deactive'], null, ['class'=>'form-control']); !!}
    @error('status')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>
{{--<div class="form-group col-sm-12">--}}
{{--    {!! Form::label('status', 'Status:') !!}--}}
{{--    {!! Form::hidden('status', 0) !!}--}}
{{--    {!! Form::checkbox('status', 1, null,  ['data-bootstrap-switch']) !!}--}}
{{--</div>--}}


