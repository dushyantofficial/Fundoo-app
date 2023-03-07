<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $offercode->id }}</p>
</div>

<!-- Offer Code Field -->
<div class="col-sm-12">
    {!! Form::label('offer_code', 'Offer Code:') !!}
    <p>{{ $offercode->offer_code }}</p>
</div>

<!-- Valid To Field -->
<div class="col-sm-12">
    {!! Form::label('valid_to', 'Valid To:') !!}
    <p>{{date_formate($offercode->valid_to ?? ' - ')}}</p>
</div>

<!-- Per User Limit Field -->
<div class="col-sm-12">
    {!! Form::label('per_user_limit', 'Per User Limit:') !!}
    <p>{{ $offercode->per_user_limit }}</p>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $offercode->status }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{date_formate($offercode->created_at ?? ' - ')}}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{date_formate($offercode->updated_at ?? ' - ')}}</p>
</div>

