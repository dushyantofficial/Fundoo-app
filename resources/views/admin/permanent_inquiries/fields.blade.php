<!-- User Id Field -->
<div class="form-group col-sm-2">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::text('user_id', null, ['class' => 'form-control '.($errors->has('user_id') ? 'is-invalid': ''),'Placeholder'=>'Enter User Id']) !!}
    @error('user_id')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<!-- Salary Start Field -->
<div class="form-group col-sm-2">
    {!! Form::label('salary_start', 'Salary Start:') !!}
    {!! Form::text('salary_start', null, ['class' => 'form-control '.($errors->has('salary_start') ? 'is-invalid': ''),'Placeholder'=>'Enter Salary Start']) !!}
    @error('salary_start')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<!-- Salary End Field -->
<div class="form-group col-sm-2">
    {!! Form::label('salary_end', 'Salary End:') !!}
    {!! Form::text('salary_end', null, ['class' => 'form-control '.($errors->has('salary_end') ? 'is-invalid': ''),'Placeholder'=>'Enter Salary End']) !!}
    @error('salary_end')
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

<!-- Accomodetion Field -->
<div class="form-group col-sm-2">
    {!! Form::label('accomodetion', 'Accomodetion:') !!}
    {!! Form::text('accomodetion', null, ['class' => 'form-control '.($errors->has('accomodetion') ? 'is-invalid': ''),'Placeholder'=>'Enter Accomodetion']) !!}
    @error('accomodetion')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<!-- Need Local Person Field -->
<div class="form-group col-sm-2">
    {!! Form::label('need_local_person', 'Need Local Person:') !!}
    {!! Form::text('need_local_person', null, ['class' => 'form-control '.($errors->has('need_local_person') ? 'is-invalid': ''),'Placeholder'=>'Enter Need Local Person']) !!}
    @error('need_local_person')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<!-- Work Time From Field -->
<div class="form-group col-sm-2">
    {!! Form::label('work_time_from', 'Work Time From:') !!}
    {!! Form::text('work_time_from', null, ['class' => 'form-control '.($errors->has('work_time_from') ? 'is-invalid': ''),'Placeholder'=>'Enter Work Time Form']) !!}
    @error('work_time_from')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<!-- Work Time To Field -->
<div class="form-group col-sm-2">
    {!! Form::label('work_time_to', 'Work Time To:') !!}
    {!! Form::text('work_time_to', null, ['class' => 'form-control '.($errors->has('work_time_to') ? 'is-invalid': ''),'Placeholder'=>'Enter Work Time To']) !!}
    @error('work_time_to')
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

<!-- No Of Drivers Field -->
<div class="form-group col-sm-2">
    {!! Form::label('c', 'No Of Drivers:') !!}
    {!! Form::text('no_of_drivers', null, ['class' => 'form-control '.($errors->has('c') ? 'is-invalid': ''),'Placeholder'=>'Enter No Of Drivers']) !!}
    @error('c')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<!-- From Date Field -->
<div class="form-group col-sm-2">
    {!! Form::label('from_date', 'From Date:') !!}
    {!! Form::text('from_date', null, ['class' => 'form-control '.($errors->has('from_date') ? 'is-invalid': ''),'Placeholder'=>'Enter From Date']) !!}
    @error('from_date')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<!-- To Date Field -->
<div class="form-group col-sm-2">
    {!! Form::label('to_date', 'To Date:') !!}
    {!! Form::text('to_date', null, ['class' => 'form-control '.($errors->has('to_date') ? 'is-invalid': ''),'Placeholder'=>'Enter To Date']) !!}
    @error('to_date')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>
