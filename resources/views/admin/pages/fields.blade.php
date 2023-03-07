<!-- Page Title Field -->
<div class="form-group col-sm-10">
    {!! Form::label('page_title', 'Page Title:') !!}
    {!! Form::text('page_title', null, ['class' => 'form-control '.($errors->has('page_title') ? 'is-invalid': ''),'placeholder' => 'Enter Page Title']) !!}
    @error('page_title')
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

<!-- Description Field -->
<div class="form-group col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control tinymce-editor'.($errors->has('description') ? 'is-invalid': ''), 'placeholder' => 'Enter Description']) !!}
    @error('description')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<




