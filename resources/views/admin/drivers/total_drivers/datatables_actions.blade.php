{{--{--}}
{{--  "_from": "fast-json-stable-stringify@^2.0.0",--}}
{{--  "_id": "fast-json-stable-stringify@2.1.0",--}}
{{--  "_inBundle": false,--}}
{{--  "_integrity": "sha512-lhd/wF+Lk98HZoTCtlVraHtfh5XYijIjalXck7saUtuanSDyLMxnHhSXEDJqHxD7msR8D0uCmqlkwjCV8xvwHw==",--}}
{{--  "_location": "/fast-json-stable-stringify",--}}
{{--  "_phantomChildren": {},--}}
{{--  "_requested": {--}}
{{--    "type": "range",--}}
{{--    "registry": true,--}}
{{--    "raw": "fast-json-stable-stringify@^2.0.0",--}}
{{--    "name": "fast-json-stable-stringify",--}}
{{--    "escapedName": "fast-json-stable-stringify",--}}
{{--    "rawSpec": "^2.0.0",--}}
{{--    "saveSpec": null,--}}
{{--    "fetchSpec": "^2.0.0"--}}
{{--  },--}}
{{--  "_requiredBy": [--}}
{{--    "/ajv"--}}
{{--  ],--}}
{{--  "_resolved": "https://registry.npmjs.org/fast-json-stable-stringify/-/fast-json-stable-stringify-2.1.0.tgz",--}}
{{--  "_shasum": "874bf69c6f404c2b5d99c481341399fd55892633",--}}
{{--  "_spec": "fast-json-stable-stringify@^2.0.0",--}}
{{--  "_where": "D:\\xampp\\htdocs\\kiran-laravel1\\node_modules\\ajv",--}}
{{--  "author": {--}}
{{--    "name": "James Halliday",--}}
{{--    "email": "mail@substack.net",--}}
{{--    "url": "http://substack.net"--}}
{{--  },--}}
{{--  "bugs": {--}}
{{--    "url": "https://github.com/epoberezkin/fast-json-stable-stringify/issues"--}}
{{--  },--}}
{{--  "bundleDependencies": false,--}}
{{--  "dependencies": {},--}}
{{--  "deprecated": false,--}}
{{--  "description": "deterministic `JSON.stringify()` - a faster version of substack's json-stable-strigify without jsonify",--}}
{{--  "devDependencies": {--}}
{{--    "benchmark": "^2.1.4",--}}
{{--    "coveralls": "^3.0.0",--}}
{{--    "eslint": "^6.7.0",--}}
{{--    "fast-stabl--}}

{!! Form::open(['route' => ['admin.driverExtendeds.destroy', $id], 'method' => 'delete']) !!}

<div class="btn-group">
    <button type="button" class="btn btn-warning">Action</button>
    <button type="button" class="btn btn-warning dropdown-toggle dropdown-icon" data-toggle="dropdown"
            aria-expanded="false">
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <div class="dropdown-menu" role="menu" style="">
        <a href="{{ route('driver-dashboard') }}?id={{$id}}" class='dropdown-item'>Show</a>
        <a href="{{ route('admin.driverExtendeds.edit', $id) }}" class='dropdown-item'>Edit</a>

        <div class="dropdown-divider"></div>
        {!! Form::button('Delete', [
        'type' => 'submit',
        'class' => 'dropdown-item',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
    </div>
</div>

{{--<div class='btn-group'>--}}
{{--    <a href="{{ route('admin.fuelDetails.show', $id) }}" class='btn btn-default btn-xs'>--}}
{{--        <i class="fa fa-eye"></i>--}}
{{--    </a>--}}
{{--    <a href="{{ route('admin.fuelDetails.edit', $id) }}" class='btn btn-default btn-xs'>--}}
{{--        <i class="fa fa-edit"></i>--}}
{{--    </a>--}}
{{--    {!! Form::button('<i class="fa fa-trash"></i>', [--}}
{{--        'type' => 'submit',--}}
{{--        'class' => 'btn btn-danger btn-xs',--}}
{{--        'onclick' => "return confirm('Are you sure?')"--}}
{{--    ]) !!}--}}
{{--</div>--}}
{!! Form::close() !!}
