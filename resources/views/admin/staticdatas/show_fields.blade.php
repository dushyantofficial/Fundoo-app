<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $staticdata->id }}</p>
</div>

<!-- Key Lable Field -->
<div class="col-sm-12">
    {!! Form::label('key_lable', 'Key Lable:') !!}
    <p>{{ $staticdata->key_lable }}</p>
</div>

<!-- Value Lable Field -->
<div class="col-sm-12">
    {!! Form::label('value_lable', 'Value Lable:') !!}
    <p>{{ $staticdata->value_lable }}</p>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $staticdata->status }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{date_formate($staticdata->created_at ?? ' - ')}}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{date_formate($staticdata->updated_at ?? ' - ')}}</p>
</div>

