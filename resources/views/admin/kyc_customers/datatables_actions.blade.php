{{--{!! Form::open(['route' => ['admin.offercodes.destroy', $id], 'method' => 'delete']) !!}--}}

<div class="btn-group">
    <button type="button" class="btn btn-warning">Action</button>
    <button type="button" class="btn btn-warning dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <div class="dropdown-menu" role="menu" style="">
        <a href="{{ route('driver-dashboard') }}?id={{$user_id}}&document=kyc" class='dropdown-item'>Show</a>
{{--        <a href="{{ route('admin.kyc-customer.edit', $id) }}" class='dropdown-item'>Edit</a>--}}

{{--        <div class="dropdown-divider"></div>--}}
{{--        {!! Form::button('Delete', [--}}
{{--        'type' => 'submit',--}}
{{--        'class' => 'dropdown-item',--}}
{{--        'onclick' => "return confirm('Are you sure?')"--}}
{{--    ]) !!}--}}
{{--    </div>--}}
</div>

{{--<div class='btn-group'>--}}
{{--    <a href="{{ route('admin.offercodes.show', $id) }}" class='btn btn-default btn-xs'>--}}
{{--        <i class="fa fa-eye"></i>--}}
{{--    </a>--}}
{{--    <a href="{{ route('admin.offercodes.edit', $id) }}" class='btn btn-default btn-xs'>--}}
{{--        <i class="fa fa-edit"></i>--}}
{{--    </a>--}}
{{--    {!! Form::button('<i class="fa fa-trash"></i>', [--}}
{{--        'type' => 'submit',--}}
{{--        'class' => 'btn btn-danger btn-xs',--}}
{{--        'onclick' => "return confirm('Are you sure?')"--}}
{{--    ]) !!}--}}
{{--</div>--}}
{!! Form::close() !!}
