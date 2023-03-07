<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $carmodel->id }}</p>
</div>

<!-- Company Id Field -->
<div class="col-sm-12">
    {!! Form::label('company_id', 'Company Id:') !!}
    <p>{{ $carmodel->carcompanies->company_name }}</p>
</div>

<!-- Model Name Field -->
<div class="col-sm-12">
    {!! Form::label('model_name', 'Model Name:') !!}
    <p>{{ $carmodel->model_name }}</p>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $carmodel->status }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{date_formate($carmodel->created_at ?? ' - ')}}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{date_formate($carmodel->updated_at ?? ' - ')}}</p>
</div>

