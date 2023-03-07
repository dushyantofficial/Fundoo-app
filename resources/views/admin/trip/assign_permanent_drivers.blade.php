@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Assign Permanent Driver</h1>
                </div>
                <div class="col-sm-6">
                    {{--                    <a class="btn btn-warning shadow-sm float-right"--}}
                    {{--                       href="{{ route('admin.permanent-driver.create') }}">--}}
                    {{--                        Add New--}}
                    {{--                    </a>--}}
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('admin.flash-message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                @push('third_party_stylesheets')
                    @include('layouts.datatables_css')
                @endpush

                <div
                    class="table-responsive">{!! $dataTable->table(['width' => '100%', 'class' => 'table table-striped table-bordered']) !!}</div>

                @push('third_party_scripts')
                    @include('layouts.datatables_js')
                    {!! $dataTable->scripts() !!}
                @endpush

                <div class="card-footer clearfix">
                    <div class="float-right">

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

