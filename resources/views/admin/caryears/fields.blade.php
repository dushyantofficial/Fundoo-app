<!-- Id Field -->
{{--<div class="form-group col-sm-4">--}}
{{--    {!! Form::label('id', 'Id:') !!}--}}
{{--    {!! Form::text('id', null, ['class' => 'form-control '.($errors->has('id') ? 'is-invalid': ''),'Placeholder'=>'Enter Id']) !!}--}}
{{--    @error('id')--}}
{{--    <span class="error invalid-feedback">{{ $message }}</span>--}}
{{--    @enderror--}}
{{--</div>--}}

<!-- Model Id Field -->
<div class="form-group col-sm-5">
    {!! Form::label('model_id', 'Model Name:') !!}

    {!! Form::select('model_id', $model, null, ['class' => 'form-control '.($errors->has('model_id') ? 'is-invalid': ''),'Placeholder'=>'Enter Model Id']) !!}

</div>

<!-- Year Field -->
<div class="form-group col-sm-5">
    {!! Form::label('year', 'Year:') !!}
    {!! Form::text('year', null, ['class' => 'form-control '.($errors->has('year') ? 'is-invalid': ''),'placeholder'=>'Enter Year']) !!}
    @error('year')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<!-- 'bootstrap / Toggle Switch Status Field' -->
<div class="form-group col-sm-2">
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
