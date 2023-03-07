@foreach($drivers as $driver)
    <tr>
        <td>{{$drivers->firstItem() + $loop->index}}</td>
        <td><a href="{{route('driver-dashboard')}}?id={{$driver->user_id}}"
               target="_blank">{{$driver->user->first_name}}</a></td>
        <td>{{$driver->aditional_contact_no}}</td>
        <td>
            @if($driver->work_type == config('constants.CATEGORY.permanent'))
                Permanent
            @elseif($driver->work_type == config('constants.CATEGORY.temporary'))
                Temporary
            @elseif($driver->work_type == config('constants.CATEGORY.pickup-drop'))
                Pick-Up-Drop
            @elseif($driver->work_type == config('constants.CATEGORY.valet_parking'))
                Valet Parking
            @else
                -
            @endif
        </td>
        <td><span class="badge badge-success"><i class="fas fa-star"></i> {{number_formats(multi_user_rating($driver))}}</span>
        </td>
        <td>
            @if(isset($request_id))
                <a href="{{route('driver-allocation-list')}}?id={{$request_id}}&&d_id={{$driver->user_id}}"
                   class="btn btn-warning btn-sm"><i class="fas fa-plus-circle"></i> Assign</a>
            @else
                <a href="{{route('driver-allocation-list')}}?booking_id={{$trip_id}}&&driver_id={{$driver->id}}"
                   class="btn btn-warning btn-sm"><i class="fas fa-plus-circle"></i> Assign</a>
            @endif
        </td>
    </tr>
@endforeach
