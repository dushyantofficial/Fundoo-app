<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $customerExtend->id }}</p>
</div>

<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $customerExtend->user_id }}</p>
</div>

<!-- Apartment Field -->
<div class="col-sm-12">
    {!! Form::label('apartment', 'Apartment:') !!}
    <p>{{ $customerExtend->apartment }}</p>
</div>

<!-- Block Flat Field -->
<div class="col-sm-12">
    {!! Form::label('block_flat', 'Block Flat:') !!}
    <p>{{ $customerExtend->block_flat }}</p>
</div>

<!-- Pincode Field -->
<div class="col-sm-12">
    {!! Form::label('pincode', 'Pincode:') !!}
    <p>{{ $customerExtend->pincode }}</p>
</div>

<!-- City Field -->
<div class="col-sm-12">
    {!! Form::label('city', 'City:') !!}
    <p>{{ $customerExtend->customerExtend->city_name }}</p>
</div>

<!-- State Field -->
<div class="col-sm-12">
    {!! Form::label('state', 'State:') !!}
    <p>{{ $customerExtend->customerStatus->state_name }}</p>
</div>

<!-- Type Field -->
<div class="col-sm-12">
    {!! Form::label('type', 'Type:') !!}
    <p>{{ $customerExtend->type }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $customerExtend->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $customerExtend->updated_at }}</p>
</div>

