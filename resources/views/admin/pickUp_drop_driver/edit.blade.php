@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Edit PickUp-Drop Driver</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

{{--        @include('adminlte-templates::common.errors')--}}

        <div class="card">
{{--@dd($array)--}}
            {!! Form::model($array, ['route' => ['admin.pickUp-drop-driver.update', $array['id']], 'method' => 'patch','enctype' => 'multipart/form-data']) !!}

            <div class="card-body">
                <div class="row">
                    @include('admin.pickUp_drop_driver.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-warning shadow-sm']) !!}
                <a href="{{ route('admin.pickUp-drop-driver.index') }}" class="btn btn-default shadow-sm">Cancel</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
