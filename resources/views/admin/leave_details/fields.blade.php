<!-- Assign Driver Id Field -->
<div class="form-group col-sm-3">

    {!! Form::label('assign_driver_id', 'Assign Driver Id:') !!}
    {!! Form::text('assign_driver_id', null, ['class' => 'form-control '.($errors->has('assign_driver_id') ? 'is-invalid': ''),'Placeholder'=>'Enter Assign Driver Id']) !!}
    @error('assign_driver_id')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<!-- From Date Field -->
<div class="form-group col-sm-3">

    {!! Form::label('from_date', 'From Date:') !!}
    {!! Form::text('from_date', null, ['class' => 'form-control '.($errors->has('from_date') ? 'is-invalid': ''),'Placeholder'=>'Enter From Date']) !!}
    @error('from_date')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<!-- To Date Field -->
<div class="form-group col-sm-3">

    {!! Form::label('to_date', 'To Date:') !!}
    {!! Form::text('to_date', null, ['class' => 'form-control '.($errors->has('to_date') ? 'is-invalid': ''),'Placeholder'=>'Enter To Date']) !!}
    @error('to_date')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<!-- Leave Type Field -->
<div class="form-group col-sm-3">

    {!! Form::label('leave_type', 'Leave Type:') !!}
    {!! Form::text('leave_type', null, ['class' => 'form-control '.($errors->has('leave_type') ? 'is-invalid': ''),'Placeholder'=>'Enter Leave Type']) !!}
    @error('leave_type')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<!-- Remark Field -->
<div class="form-group col-sm-3">

    {!! Form::label('remark', 'Remark:') !!}
    {!! Form::text('remark', null, ['class' => 'form-control '.($errors->has('remark') ? 'is-invalid': ''),'Placeholder'=>'Enter Remark']) !!}
    @error('remark')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>
