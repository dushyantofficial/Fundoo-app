@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Edit Permanent Inquiry</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

{{--        @include('adminlte-templates::common.errors')--}}

        <div class="card">

            {!! Form::model($permanentInquiry, ['route' => ['admin.permanentInquiries.update', $permanentInquiry->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('admin.permanent_inquiries.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-warnign shadow-sm']) !!}
                <a href="{{ route('admin.permanentInquiries.index') }}" class="btn btn-default shadow-sm">Cancel</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
