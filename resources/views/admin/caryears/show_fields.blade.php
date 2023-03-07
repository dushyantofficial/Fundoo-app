<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $caryear->id }}</p>
</div>

<!-- Model Id Field -->
<div class="col-sm-12">
    {!! Form::label('model_id', 'Model Id:') !!}
    <p>{{ $caryear->modelName->model_name }}</p>
</div>

<!-- Year Field -->
<div class="col-sm-12">
    {!! Form::label('year', 'Year:') !!}
    <p>{{ $caryear->year }}</p>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $caryear->status }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{date_formate($caryear->created_at ?? ' - ')}}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{date_formate($caryear->updated_at ?? ' - ')}}</p>
</div>

