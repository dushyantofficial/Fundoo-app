<!-- Company Id Field -->
<div class="form-group col-sm-5">
    {!! Form::label('company_id', 'Company Name :') !!}
      {!! Form::select('company_id',$company, null, ['class' => 'form-control '.($errors->has('company_id') ? 'is-invalid': ''),'Placeholder'=>'Enter Company Name']) !!}

</div>

<!-- Model Name Field -->
<div class="form-group col-sm-5">
    {!! Form::label('model_name', 'Model Name:') !!}
    {!! Form::text('model_name', null, ['class' => 'form-control '.($errors->has('model_name') ? 'is-invalid': ''),'Placeholder'=>'Enter Model Name']) !!}
    @error('model_name')
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
{{--<div class="form-group col-sm-6">--}}
{{--    {!! Form::label('status', 'Status:') !!}--}}
{{--    {!! Form::hidden('status', 0) !!}--}}
{{--    {!! Form::checkbox('status', 1, null,  ['data-bootstrap-switch']) !!}--}}
{{--</div>--}}
