<!-- User Id Field -->
{{--<div class="form-group col-sm-4">--}}
{{--    {!! Form::label('user_id', 'User Id:') !!}--}}
{{--    {!! Form::text('user_id', null, ['class' => 'form-control '.($errors->has('user_id') ? 'is-invalid': ''),'Placeholder'=>'Enter User Id']) !!}--}}
{{--    @error('user_id')--}}
{{--    <span class="error invalid-feedback">{{ $message }}</span>--}}
{{--    @enderror--}}
{{--</div>--}}

<!-- Category Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category_name', 'Category Name:') !!}
    {!! Form::text('category_name', null, ['class' => 'form-control '.($errors->has('category_name') ? 'is-invalid': ''),'Placeholder'=>'Enter Category Name']) !!}
    @error('category_name')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<!-- Category Key Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category_key', 'Category Key:') !!}
    {!! Form::text('category_key', null, ['class' => 'form-control '.($errors->has('category_key') ? 'is-invalid': ''),'Placeholder'=>'Enter Category Key']) !!}
    @error('category_key')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>
