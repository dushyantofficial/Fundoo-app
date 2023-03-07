<!-- Assign Driver Id Field -->
<div class="form-group col-sm-2">
    {!! Form::label('assign_driver_id', 'Assign Driver Id:') !!}
    {!! Form::text('assign_driver_id', null, ['class' => 'form-control '.($errors->has('assign_driver_id') ? 'is-invalid': ''),'Placeholder'=>'Enter Assign Driver  Id']) !!}
    @error('assign_driver_id')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<!-- Check In Field -->
<div class="form-group col-sm-5">
    {!! Form::label('check_in', 'Check In:') !!}
    {!! Form::text('check_in', null, ['class' => 'form-control '.($errors->has('check_in') ? 'is-invalid': ''),'Placeholder'=>'Enter Check In']) !!}
    @error('check_in')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<!-- Check Out Field -->
<div class="form-group col-sm-5">
    {!! Form::label('check_out', 'Check Out:') !!}
    {!! Form::text('check_out', null, ['class' => 'form-control '.($errors->has('check_out') ? 'is-invalid': ''),'Placeholder'=>'Enter Check Out']) !!}
    @error('check_out')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>
