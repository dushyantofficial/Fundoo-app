<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $fuelDetail->id }}</p>
</div>

<!-- Assign Driver Id Field -->
<div class="col-sm-12">
    {!! Form::label('assign_driver_id', 'Assign Driver Id:') !!}
    <p>{{ $fuelDetail->assign_driver_id }}</p>
</div>

<!-- Fuel Litter Field -->
<div class="col-sm-12">
    {!! Form::label('fuel_litter', 'Fuel Litter:') !!}
    <p>{{ $fuelDetail->fuel_litter }}</p>
</div>

<!-- Rate Field -->
<div class="col-sm-12">
    {!! Form::label('rate', 'Rate:') !!}
    <p>{{ $fuelDetail->rate }}</p>
</div>

<!-- Total Amount Field -->
<div class="col-sm-12">
    {!! Form::label('total_amount', 'Total Amount:') !!}
    <p>{{ $fuelDetail->total_amount }}</p>
</div>

<!-- Date Field -->
<div class="col-sm-12">
    {!! Form::label('date', 'Date:') !!}
    <p>{{ $fuelDetail->date }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $fuelDetail->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $fuelDetail->updated_at }}</p>
</div>

