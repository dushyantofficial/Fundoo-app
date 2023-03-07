{{--<div class="col-lg-6">--}}
{{--    <div class="form-group">--}}
{{--        {!! Form::label('app_logo', 'App Logo:') !!}--}}
{{--        <div class="input-group">--}}
{{--            <div class="custom-file">--}}
{{--                {!! Form::file('app_logo', ['class' => 'custom-file-input']) !!}--}}
{{--                {!! Form::label('app_logo', 'Choose file', ['class' => 'custom-file-label']) !!}--}}

{{--            </div>--}}
{{--        </div>--}}
{{--        @if(isset($setting))--}}
{{--            <img src="{{asset('storage/admin/setting/'.$setting->app_logo)}}" style="width: 60px; height: 60px;"--}}
{{--                 alt="user">--}}

{{--        @endif--}}
{{--    </div>--}}

{{--    <!-- Intro Screen One Img Field -->--}}
{{--    <div class="form-group">--}}


{{--        {!! Form::label('intro_screen_one_img', 'Intro Screen One Img:') !!}--}}
{{--        <div class="input-group">--}}
{{--            <div class="custom-file">--}}
{{--                {!! Form::file('intro_screen_one_img', ['class' => 'custom-file-input']) !!}--}}
{{--                {!! Form::label('intro_screen_one_img', 'Choose file', ['class' => 'custom-file-label']) !!}--}}

{{--            </div>--}}

{{--        </div>--}}
{{--        @if(isset($setting))--}}
{{--            <img src="{{asset('storage/admin/setting/'.$setting->intro_screen_one_img)}}"--}}
{{--                 style="width: 60px; height: 60px;"--}}
{{--                 alt="user">--}}

{{--        @endif--}}
{{--    </div>--}}

{{--    <!-- Intro Screen One Title Field -->--}}
{{--    <div class="form-group">--}}
{{--        {!! Form::label('intro_screen_one_title', 'Intro Screen One Title:') !!}--}}
{{--        {!! Form::text('intro_screen_one_title', null, ['class' => 'form-control '.($errors->has('intro_screen_one_title') ? 'is-invalid': ''),'Placeholder'=>'Enter Intro Screen One Title']) !!}--}}
{{--        @error('intro_screen_one_title')--}}
{{--        <span class="error invalid-feedback">{{ $message }}</span>--}}
{{--        @enderror--}}
{{--    </div>--}}
{{--</div>--}}
{{--<div class="col-lg-6">--}}
{{--    <!-- Intro Screen One Desc Field -->--}}
{{--    <div class="form-group">--}}
{{--        {!! Form::label('intro_screen_one_desc', 'Intro Screen One Desc:') !!}--}}
{{--        {!! Form::textarea('intro_screen_one_desc', null, ['class' => 'form-control tinymce-editor'.($errors->has('intro_screen_one_desc') ? 'is-invalid': ''),'rows' => 8,'Placeholder'=>'Enter Intro Screen One Desc']) !!}--}}
{{--        @error('intro_screen_one_desc')--}}
{{--        <span class="error invalid-feedback">{{ $message }}</span>--}}
{{--        @enderror--}}
{{--    </div>--}}
{{--</div>--}}
{{--<div class="clearfix col-lg-12">--}}
{{--    <hr>--}}
{{--</div>--}}

{{--<div class="col-lg-6"><!-- Intro Screen Two Img Field -->--}}
{{--    <div class="form-group">--}}
{{--        {!! Form::label('intro_screen_two_img', 'Intro Screen Two Img:') !!}--}}
{{--        <div class="input-group">--}}
{{--            <div class="custom-file">--}}
{{--                {!! Form::file('intro_screen_two_img', ['class' => 'custom-file-input']) !!}--}}
{{--                {!! Form::label('intro_screen_two_img', 'Choose file', ['class' => 'custom-file-label']) !!}--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        @if(isset($setting))--}}
{{--            <img src="{{asset('storage/admin/setting/'.$setting->intro_screen_two_img)}}"--}}
{{--                 style="width: 60px; height: 60px;"--}}
{{--                 alt="user">--}}

{{--        @endif--}}
{{--    </div>--}}
{{--    <div class="clearfix"></div>--}}


{{--    <!-- Intro Screen Two Title Field -->--}}
{{--    <div class="form-group">--}}
{{--        {!! Form::label('intro_screen_two_title', 'Intro Screen Two Title:') !!}--}}
{{--        {!! Form::text('intro_screen_two_title', null, ['class' => 'form-control '.($errors->has('intro_screen_two_title') ? 'is-invalid': ''),'Placeholder'=>'Enter Intro Screen Two Title']) !!}--}}
{{--        @error('intro_screen_two_title')--}}
{{--        <span class="error invalid-feedback">{{ $message }}</span>--}}
{{--        @enderror--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div class="col-lg-6"><!-- Intro Screen Two Desc Field -->--}}
{{--    <div class="form-group">--}}
{{--        {!! Form::label('intro_screen_two_desc', 'Intro Screen Two Desc:') !!}--}}
{{--        {!! Form::textarea('intro_screen_two_desc', null, ['class' => 'form-control tinymce-editor'.($errors->has('intro_screen_two_desc') ? 'is-invalid': ''),'rows' => 5,'Placeholder'=>'Enter Intro Screen Two Desc']) !!}--}}
{{--        @error('intro_screen_two_desc')--}}
{{--        <span class="error invalid-feedback">{{ $message }}</span>--}}
{{--        @enderror--}}
{{--    </div>--}}
{{--</div>--}}
{{--<div class="clearfix col-lg-12">--}}
{{--    <hr>--}}
{{--</div>--}}
{{--<div class="col-lg-6"><!-- Intro Screen Three Img Field -->--}}
{{--    <div class="form-group">--}}
{{--        {!! Form::label('intro_screen_three_img', 'Intro Screen Three Img:') !!}--}}
{{--        <div class="input-group">--}}
{{--            <div class="custom-file">--}}
{{--                {!! Form::file('intro_screen_three_img', ['class' => 'custom-file-input']) !!}--}}
{{--                {!! Form::label('intro_screen_three_img', 'Choose file', ['class' => 'custom-file-label ']) !!}--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        @if(isset($setting))--}}
{{--            <img src="{{asset('storage/admin/setting/'.$setting->intro_screen_three_img)}}"--}}
{{--                 style="width: 60px; height: 60px;"--}}
{{--                 alt="user">--}}

{{--        @endif--}}
{{--    </div>--}}
{{--    <div class="clearfix"></div>--}}


{{--    <!-- Intro Screen Three Title Field -->--}}
{{--    <div class="form-group">--}}
{{--        {!! Form::label('intro_screen_three_title', 'Intro Screen Three Title:') !!}--}}
{{--        {!! Form::text('intro_screen_three_title', null, ['class' => 'form-control '.($errors->has('intro_screen_three_title') ? 'is-invalid': ''),'Placeholder'=>'Enter Intro Screen Three Titlt']) !!}--}}
{{--        @error('intro_screen_three_title')--}}
{{--        <span class="error invalid-feedback">{{ $message }}</span>--}}
{{--        @enderror--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div class="col-lg-6"><!-- Intro Screen Three Desc Field -->--}}
{{--    <div class="form-group">--}}
{{--        {!! Form::label('intro_screen_three_desc', 'Intro Screen Three Desc:') !!}--}}
{{--        {!! Form::textarea('intro_screen_three_desc', null, ['class' => 'form-control tinymce-editor'.($errors->has('intro_screen_three_desc') ? 'is-invalid': ''),'rows' => 5,'Placeholder'=>'Enter Intro Screen Three Desc'],) !!}--}}
{{--        @error('intro_screen_three_desc')--}}
{{--        <span class="error invalid-feedback">{{ $message }}</span>--}}
{{--        @enderror--}}
{{--    </div>--}}
{{--</div>--}}
<div class="clearfix col-lg-12">
    <hr>
</div>
<!-- Refer Comission Amt Field -->
<div class="form-group col-sm-3">
    {!! Form::label('refer_comission_amt', 'Refer Comission Amt:') !!}
    {!! Form::text('refer_comission_amt', null, ['class' => 'form-control '.($errors->has('refer_comission_amt') ? 'is-invalid': ''),'Placeholder'=>'Enter Refer Comission Amt']) !!}
    @error('refer_comission_amt')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<!-- Pagination Limit Field -->
<div class="form-group col-sm-3">
    {!! Form::label('pagination_limit', 'Pagination Limit:') !!}
    {!! Form::number('pagination_limit', null, ['class' => 'form-control '.($errors->has('pagination_limit') ? 'is-invalid': ''),'Placeholder'=>'Enter Pagination Limit']) !!}
    @error('pagination_limit')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<!-- Helpline Number Field -->
<div class="form-group col-sm-3">
    {!! Form::label('helpline_number', 'Helpline Number:') !!}
    {!! Form::text('helpline_number', null, ['class' => 'form-control '.($errors->has('helpline_number') ? 'is-invalid': ''),'Placeholder'=>'Enter Helpline Number']) !!}
    @error('helpline_number')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<!-- Helpline Email Field -->
<div class="form-group col-sm-3">
    {!! Form::label('helpline_email', 'Helpline Email:') !!}
    {!! Form::text('helpline_email', null, ['class' => 'form-control '.($errors->has('helpline_email') ? 'is-invalid': ''),'Placeholder'=>'Enter Helpline Email ']) !!}
    @error('helpline_email')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<!-- km_rate Field -->
<div class="form-group col-sm-3">
    {!! Form::label('km_rate', 'Km Rate:') !!}
    {!! Form::text('km_rate', null, ['class' => 'form-control '.($errors->has('km_rate') ? 'is-invalid': ''),'Placeholder'=>'Enter Km Rate ']) !!}
    @error('km_rate')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<!-- per_km_panelty_rate Field -->
<div class="form-group col-sm-3">
    {!! Form::label('per_km_panelty_rate', 'Per Km Panelty Rate:') !!}
    {!! Form::text('per_km_panelty_rate', null, ['class' => 'form-control '.($errors->has('per_km_panelty_rate') ? 'is-invalid': ''),'Placeholder'=>'Enter Per Km Panelty Rate ']) !!}
    @error('per_km_panelty_rate')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

