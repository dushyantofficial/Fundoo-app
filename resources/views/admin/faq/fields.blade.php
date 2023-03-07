<!-- Page Title Field -->
<div class="form-group col-sm-12">
    {!! Form::label('question', 'Question:') !!}
    {!! Form::text('question', null, ['class' => 'form-control '.($errors->has('question') ? 'is-invalid': ''),'placeholder' => 'Enter Question']) !!}
    @error('question')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<!-- Question Field -->
<div class="form-group col-sm-12">
    {!! Form::label('answer', 'Answer:') !!}
    {!! Form::textarea('answer', null, ['class' => 'form-control tinymce-editor'.($errors->has('answer') ? 'is-invalid': ''), 'placeholder' => 'Enter Answer']) !!}
    @error('answer')
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








