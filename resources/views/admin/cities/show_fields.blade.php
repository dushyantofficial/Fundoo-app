<!-- Id Field -->

<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $city->id }}</p>
</div>

<!-- City Name Field -->
<div class="col-sm-12">
    {!! Form::label('city_name', 'City Name:') !!}
    <p>{{ $city->city_name }}</p>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $city->status }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{date_formate($city->created_at ?? ' - ')}}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{date_formate($city->updated_at ?? ' - ')}}</p>
</div>

<!-- State Id Field -->
<div class="col-sm-12">
    {!! Form::label('state_id', 'State Id:') !!}
    <p>{{ $city->state->state_name }}</p>
</div>

