<!-- User Id Field -->
<div class="form-group col-sm-1">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::text('user_id', null, ['class' => 'form-control '.($errors->has('user_id') ? 'is-invalid': ''),'Placeholder'=>'Enter User Id']) !!}
    @error('user_id')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<!-- Company Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('company_id', 'Company Id:') !!}
    {!! Form::text('company_id', null, ['class' => 'form-control '.($errors->has('company_id') ? 'is-invalid': ''),'Placeholder'=>'Enter Company Id']) !!}
    @error('company_id')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<!-- Model Id Field -->
<div class="form-group col-sm-5">
    {!! Form::label('model_id', 'Model Id:') !!}
    {!! Form::text('model_id', null, ['class' => 'form-control '.($errors->has('model_id') ? 'is-invalid': ''),'Placeholder'=>'Enter Model Id']) !!}
    @error('model_id')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<!-- Year Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('year_id', 'Year Id:') !!}
    {!! Form::text('year_id', null, ['class' => 'form-control '.($errors->has('year_id') ? 'is-invalid': ''),'Placeholder'=>'Enter Year Id']) !!}
    @error('year_id')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<!-- Manual Or Automatic Field -->
<div class="form-group col-sm-3">
    {!! Form::label('manual_or_automatic', 'Manual Or Automatic:') !!}
    {!! Form::text('manual_or_automatic', null, ['class' => 'form-control '.($errors->has('manual_or_automatic') ? 'is-invalid': ''),'Placeholder'=>'Enter Manual Or Automatic']) !!}
    @error('manual_or_automatic')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<!-- Number Plate Field -->
<div class="form-group col-sm-3">
    {!! Form::label('number_plate', 'Number Plate:') !!}
    {!! Form::text('number_plate', null, ['class' => 'form-control '.($errors->has('number_plate') ? 'is-invalid': ''),'Placeholder'=>'Enter Number Plate']) !!}
    @error('number_plate')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<!-- Car Photos Field -->
<div class="form-group col-sm-3">
    {!! Form::label('car_photos', 'Car Photos:') !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('car_photos', ['class' => 'custom-file-input']) !!}
            {!! Form::label('car_photos', 'Choose file', ['class' => 'custom-file-label','Placeholder'=>'Enter Car Photos']) !!}
        </div>
    </div>
</div>
<div class="clearfix"></div>
