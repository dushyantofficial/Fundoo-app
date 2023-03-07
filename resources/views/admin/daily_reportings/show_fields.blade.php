<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $dailyReporting->id }}</p>
</div>

<!-- Assign Driver Id Field -->
<div class="col-sm-12">
    {!! Form::label('assign_driver_id', 'Assign Driver Id:') !!}
    <p>{{ $dailyReporting->assign_driver_id }}</p>
</div>

<!-- Check In Field -->
<div class="col-sm-12">
    {!! Form::label('check_in', 'Check In:') !!}
    <p>{{ $dailyReporting->check_in }}</p>
</div>

<!-- Check Out Field -->
<div class="col-sm-12">
    {!! Form::label('check_out', 'Check Out:') !!}
    <p>{{ $dailyReporting->check_out }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $dailyReporting->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $dailyReporting->updated_at }}</p>
</div>

