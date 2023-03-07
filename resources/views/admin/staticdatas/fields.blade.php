<!-- Key Lable Field -->
<div class="form-group col-sm-5">
    {!! Form::label('key_lable', 'Key Lable:') !!}
    {!! Form::text('key_lable', null, ['class' => 'form-control '.($errors->has('key_lable') ? 'is-invalid': ''),'Placeholder'=>'Enter Key Lable']) !!}
    @error('key_lable')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<!-- Value Lable Field -->
<div class="form-group col-sm-5">
    {!! Form::label('value_lable', 'Value Lable:') !!}
    {!! Form::text('value_lable', null, ['class' => 'form-control '.($errors->has('value_lable') ? 'is-invalid': ''),'Placeholder'=>'Enter Value Lable']) !!}
    @error('value_lable')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<!-- 'bootstrap / Toggle Switch Status Field' -->
{{--<div class="form-group col-sm-6">--}}
{{--    {!! Form::label('status', 'Status:') !!}--}}
{{--    {!! Form::hidden('status', 0) !!}--}}
{{--    {!! Form::checkbox('status', 1, null,  ['data-bootstrap-switch']) !!}--}}
{{--</div>--}}
<div class="form-group col-sm-2">
    {!! Form::label('status', 'Status:') !!}

    {!! Form::select('status', ['active' => 'Active', 'deactive' => 'Deactive'], null, ['class'=>'form-control']); !!}
    @error('status')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>
