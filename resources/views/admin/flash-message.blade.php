{{--@if ($message = Session::get('success'))--}}
{{--    <div class="alert alert-success alert-dismissible ">--}}
{{--        <div class="alert-body">--}}
{{--            <button class="close" data-dismiss="alert">--}}
{{--                <span>×</span>--}}
{{--            </button>--}}
{{--            <strong>{{ $message }}</strong>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endif--}}
{{--@if ($message = Session::get('danger'))--}}
{{--    <div class="alert alert-danger alert-dismissible">--}}
{{--        <div class="alert-body">--}}
{{--            <button class="close" data-dismiss="alert">--}}
{{--                <span>×</span>--}}
{{--            </button>--}}
{{--            <strong>{{ $message }}</strong>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endif--}}

{{--@if ($message = Session::get('info'))--}}
{{--<div class="alert alert-info alert-dismissible ">--}}
{{--    <div class="alert-body">--}}
{{--        <button class="close" data-dismiss="alert">--}}
{{--            <span>×</span>--}}
{{--        </button>--}}
{{--        <strong>{{ $message }}</strong>--}}
{{--    </div>--}}
{{--</div>--}}

{{--@endif--}}


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link rel="stylesheet" type="text/css"
      href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
    @if(Session::has('success'))
        toastr.options =
        {
            "closeButton": true,
            "progressBar": true
        }
    toastr.success("{{ session('success') }}");
    @endif

        @if(Session::has('danger'))
        toastr.options =
        {
            "closeButton": true,
            "progressBar": true
        }
    toastr.error("{{ session('danger') }}");
    @endif

        @if(Session::has('info'))
        toastr.options =
        {
            "closeButton": true,
            "progressBar": true
        }
    toastr.info("{{ session('info') }}");
    @endif

        @if(Session::has('warning'))
        toastr.options =
        {
            "closeButton": true,
            "progressBar": true
        }
    toastr.warning("{{ session('warning') }}");
    @endif
</script>
