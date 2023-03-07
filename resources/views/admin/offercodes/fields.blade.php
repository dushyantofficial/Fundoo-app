<!-- Offer Code Field -->
<div class="form-group col-sm-3">
    {!! Form::label('offer_code', 'Offer Code:') !!}
    {!! Form::text('offer_code', null, ['class' => 'form-control '.($errors->has('offer_code') ? 'is-invalid': ''),'placeholder'=>'Enter Offer Code']) !!}
    @error('offer_code')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<!-- Valid To Field -->
<div class="form-group col-sm-3">
    {!! Form::label('valid_to', 'Valid To:') !!}
    {!! Form::text('valid_to', null, ['class' => 'form-control '.($errors->has('valid_to') ? 'is-invalid': '') ,'Placeholder'=>'Enter Valid']) !!}
    @error('valid_to')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<!-- Per User Limit Field -->
<div class="form-group col-sm-3">
    {!! Form::label('per_user_limit', 'Per User Limit:') !!}
    {!! Form::text('per_user_limit', null, ['class' => 'form-control '.($errors->has('per_user_limit') ? 'is-invalid': '') ,'Placeholder'=>'Enter par User Limit']) !!}
    @error('per_user_limit')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<!-- Status Field -->
<div class="form-group col-sm-3">
    {!! Form::label('status', 'Status:') !!}

    {!! Form::select('status', ['active' => 'Active', 'deactive' => 'Deactive'], null, ['class'=>'form-control']); !!}
    @error('status')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>
{{--<div class="form-group col-sm-3">--}}
{{--    {!! Form::label('status', 'Status:') !!}--}}
{{--    {!! Form::text('status', null, ['class' => 'form-control '.($errors->has('status') ? 'is-invalid': ''),'Placeholder'=>'Enter Status']) !!}--}}
{{--    @error('status')--}}
{{--    <span class="error invalid-feedback">{{ $message }}</span>--}}
{{--    @enderror--}}
{{--</div>--}}
