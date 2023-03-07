<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $leaveDetail->id }}</p>
</div>

<!-- Assign Driver Id Field -->
<div class="col-sm-12">
    {!! Form::label('assign_driver_id', 'Assign Driver Id:') !!}
    <p>{{ $leaveDetail->assign_driver_id }}</p>
</div>

<!-- From Date Field -->
<div class="col-sm-12">
    {!! Form::label('from_date', 'From Date:') !!}
    <p>{{ $leaveDetail->from_date }}</p>
</div>

<!-- To Date Field -->
<div class="col-sm-12">
    {!! Form::label('to_date', 'To Date:') !!}
    <p>{{ $leaveDetail->to_date }}</p>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $leaveDetail->status }}</p>
</div>

<!-- Remark Field -->
<div class="col-sm-12">
    {!! Form::label('remark', 'Remark:') !!}
    <p>{{ $leaveDetail->remark }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $leaveDetail->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $leaveDetail->updated_at }}</p>
</div>

