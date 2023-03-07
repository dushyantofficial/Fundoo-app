<!-- State Name Field -->
<div class="form-group col-sm-10">
    {!! Form::label('state_name', 'State Name:') !!}
    {!! Form::text('state_name', null, ['class' => 'form-control '.($errors->has('state_name') ? 'is-invalid': ''), 'placeholder' => 'Enter State Name']) !!}
    @error('state_name')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>
<div class="form-group col-sm-2">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', ['active' => 'Active', 'deactive' => 'Deactive'], null, ['class'=>'form-control']); !!}
    @error('status')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>
<!-- 'bootstrap / Toggle Switch Status Field' -->
{{--<div class="form-group col-sm-12">--}}
{{--    {!! Form::label('status', 'Status:') !!}--}}
{{--    {!! Form::hidden('status', 0) !!}--}}
{{--    {!! Form::checkbox('status', 1, null,  ['data-bootstrap-switch']) !!}--}}
{{--</div>--}}
