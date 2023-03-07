@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Edit Customer</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

{{--        @include('adminlte-templates::common.errors')--}}
        @include('admin.flash-message')

        <div class="card">

            {!! Form::model($array, ['route' => ['admin.customerExtends.update', $array['id']], 'method' => 'patch','enctype'=>'multipart/form-data']) !!}

            <div class="card-body">
                <div class="row">
                    @include('admin.customer_extends.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-warning shadow-sm']) !!}
                <a href="{{ route('admin.customerExtends.index') }}" class="btn btn-default shadow-sm">Cancel</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
