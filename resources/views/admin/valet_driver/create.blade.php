@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Create Valet Driver</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        <div class="card">

            {!! Form::open(['route' => 'admin.valet-driver.store','enctype'=>'multipart/form-data']) !!}
            @csrf
            <div class="card-body">

                <div class="row">
                    @include('admin.valet_driver.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-warning shadow-sn']) !!}
                <a href="{{ route('admin.valet-driver.index') }}" class="btn btn-default shadow-sm">Cancel</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
