<!-- User Id Field -->
<div class="form-group col-sm-1">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::text('user_id', null, ['class' => 'form-control '.($errors->has('user_id') ? 'is-invalid': ''),'Placeholder'=>'Enter User Id']) !!}
    @error('user_id')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<!-- Driver Id Field -->
<div class="form-group col-sm-2">
    {!! Form::label('driver_id', 'Driver Id:') !!}
    {!! Form::text('driver_id', null, ['class' => 'form-control '.($errors->has('driver_id') ? 'is-invalid': ''),'Placeholder'=>'Enter Driver Id']) !!}
    @error('driver_id')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<!-- Type Field -->
<div class="form-group col-sm-2">
    {!! Form::label('type', 'Type:') !!}
    {!! Form::text('type', null, ['class' => 'form-control '.($errors->has('type') ? 'is-invalid': ''),'Placeholder'=>'Enter Type']) !!}
    @error('type')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<!-- Weekly Off Field -->
<div class="form-group col-sm-2">
    {!! Form::label('weekly_off', 'Weekly Off:') !!}
    {!! Form::text('weekly_off', null, ['class' => 'form-control '.($errors->has('weekly_off') ? 'is-invalid': ''),'Placeholder'=>'Enter Weekly Off']) !!}
    @error('weekly_off')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<!-- Accomodation Field -->
<div class="form-group col-sm-2">
    {!! Form::label('accomodation', 'Accomodation:') !!}
    {!! Form::text('accomodation', null, ['class' => 'form-control '.($errors->has('accomodation') ? 'is-invalid': ''),'Placeholder'=>'Enter Accomodation']) !!}
    @error('accomodation')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<!-- Work Time From Field -->
<div class="form-group col-sm-3">
    {!! Form::label('work_time_from', 'Work Time From:') !!}
    {!! Form::text('work_time_from', null, ['class' => 'form-control '.($errors->has('work_time_from') ? 'is-invalid': ''),'Placeholder'=>'Enter Work Time From']) !!}
    @error('work_time_from')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<!-- Work Tome To Field -->
<div class="form-group col-sm-3">
    {!! Form::label('work_time_to', 'Work Time To:') !!}
    {!! Form::text('work_time_to', null, ['class' => 'form-control '.($errors->has('work_time_to') ? 'is-invalid': ''),'Placeholder'=>'Enter Work Tome To']) !!}
    @error('work_time_to')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<!-- From Date Field -->
<div class="form-group col-sm-3">
    {!! Form::label('from_date', 'From Date:') !!}
    {!! Form::date('from_date', null, ['class' => 'form-control '.($errors->has('from_date') ? 'is-invalid': ''),'Placeholder'=>'Enter From Date']) !!}
    @error('from_date')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<!-- To Date Field -->
<div class="form-group col-sm-3">
    {!! Form::label('to_date', 'To Date:') !!}
    {!! Form::date('to_date', null, ['class' => 'form-control '.($errors->has('to_date') ? 'is-invalid': ''),'Placeholder'=>'Enter To Date']) !!}
    @error('to_date')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<!-- Salary Field -->
<div class="form-group col-sm-3">
    {!! Form::label('salary', 'Salary:') !!}
    {!! Form::text('salary', null, ['class' => 'form-control '.($errors->has('salary') ? 'is-invalid': ''),'Placeholder'=>'Enter Salary']) !!}
    @error('salary')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>
