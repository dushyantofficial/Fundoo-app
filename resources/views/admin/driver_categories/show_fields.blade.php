<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $driverCategory->id }}</p>
</div>

<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $driverCategory->user_id }}</p>
</div>

<!-- Category Name Field -->
<div class="col-sm-12">
    {!! Form::label('category_name', 'Category Name:') !!}
    <p>{{ $driverCategory->category_name }}</p>
</div>

<!-- Category Key Field -->
<div class="col-sm-12">
    {!! Form::label('category_key', 'Category Key:') !!}
    <p>{{ $driverCategory->category_key }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{date_formate($driverCategory->created_at ?? ' - ')}}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{date_formate($driverCategory->updated_at ?? ' - ')}}</p>
</div>

