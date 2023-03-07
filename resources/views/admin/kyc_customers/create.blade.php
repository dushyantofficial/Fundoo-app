@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Create KYC</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        {{--        @include('adminlte-templates::common.errors')--}}

        <div class="card">

            {!! Form::open(['route' => 'admin.offercodes.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('admin.kyc_customers.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-warning shadow-sm']) !!}
                <a href="{{ route('admin.offercodes.index') }}" class="btn btn-default shadow-sm">Cancel</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
