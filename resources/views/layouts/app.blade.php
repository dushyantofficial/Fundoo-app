<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="icon" href="{{asset('admin/images/icon-admin-sidebar.png')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
          integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap4-toggle/3.6.1/bootstrap4-toggle.min.css"
          integrity="sha512-EzrsULyNzUc4xnMaqTrB4EpGvudqpetxG/WNjCpG6ZyyAGxeB6OBF9o246+mwx3l/9Cn838iLIcrxpPHTiygAA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <!-- AdminLTE -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css"
          integrity="sha512-mxrUXSjrxl8vm5GwafxcqTrEwO1/oBNU25l20GODsysHReZo4uhVISzAKzaABH6/tTfAxZrY2FprmeAP5UZY8A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <!-- iCheck -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css"
          integrity="sha512-8vq2g5nHE062j3xor4XxPeZiPjmRDh6wlufQlfC6pdQ/9urJkU07NM0tEREeymP++NczacJ/Q59ul+/K2eYvcg=="
          crossorigin="anonymous"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
          integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
          crossorigin="anonymous"/>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css"
          integrity="sha512-aEe/ZxePawj0+G2R+AaIxgrQuKT68I28qh+wgLrcAJOz3rxCP+TwrK5SPN+E5I+1IQjNtcfvb96HDagwrKRdBw=="
          crossorigin="anonymous"/>
    <link rel="stylesheet" type="text/css"
          href="https://adminlte.io/themes/v3/plugins/daterangepicker/daterangepicker.css"/>
    <link rel="stylesheet" type="text/css" href="https://adminlte.io/themes/v3/plugins/select2/css/select2.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://adminlte.io/themes/v3/plugins/dropzone/min/dropzone.min.css"/>
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/ekko-lightbox/ekko-lightbox.css"
          type="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
    <link rel="stylesheet" href="{{asset('admin/css/app.css')}}"/>

    <style>

        .buttons-pdf {
            display: none !important;
        }

        /*.card-body {*/
        /*    margin: 20px !important;*/
        /*}*/

    </style>
    @stack('third_party_stylesheets')

    @stack('page_css')
</head>

<body class="hold-transition  control-sidebar-slide-open layout-footer-fixed layout-navbar-fixed layout-fixed">
<div class="wrapper">
    <!-- Main Header -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
        @php
            $user = \Illuminate\Support\Facades\Auth::user();
        @endphp
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">{{notification_count()}}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">{{notification_count()}} Notifications</span>
                    <div class="dropdown-divider"></div>
                    @foreach(notifications() as $notification)
                        <a href="{{route('show-all-notification')}}" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i>
                            @if($notification->title == "Cancel-Trip")
                                <b class="text-danger"> Cancel-Trip</b>
                            @elseif($notification->title == "Trip-Completed")
                                <b class="text-success">Trip-Completed</b>
                            @elseif($notification->title == "Trip-Confirm")
                                <b class="text-info">On-Going-Trip</b>
                            @elseif($notification->title == "Trip-Start")
                                <b class="text-info">Trip-Start</b>
                            @elseif($notification->title == "Pending")
                                <b class="text-warning">Pending-Trip</b>
                            @elseif($notification->title == "Profile Update")
                                <b class="text-info">Profile Update</b>
                            @elseif($notification->title == "Driver Registered")
                                <b class="text-success">Driver Registered</b>
                            @elseif($notification->title == "Customer Registered")
                                <b class="text-success">Customer Registered</b>
                            @elseif($notification->title == "New Advance-Trip Booked")
                                <b class="text-success">New Advance-Trip Booked</b>
                            @elseif($notification->title == "New Live-Trip Booked")
                                <b class="text-success">New Live-Trip Booked</b>
                            @elseif($notification->title == "New out-city temporary trip booked")
                                <b class="text-success">New out-city temporary trip booked</b>
                            @elseif($notification->title == "New in-city pickup_drop trip booked")
                                <b class="text-success">New in-city pickup_drop trip booked</b>
                            @elseif($notification->title == "New out-city pickup_drop trip booked")
                                <b class="text-success">New out-city pickup_drop trip booked</b>

                            @endif
                            {{--                            <b class="text-info">{{$notification->title}}</b>--}}
                            <span
                                class="float-right text-muted text-sm">{{$notification->created_at->diffForHumans()}}</span>
                        </a>
                        <div class="dropdown-divider"></div>
                    @endforeach
                    <div class="dropdown-divider"></div>
                    <a href="{{route('show-all-notification')}}" class="dropdown-item dropdown-footer">See All
                        Notifications</a>
                </div>
            </li>
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    @if($user->profile_image == '')
                        <img class="user-image img-circle elevation-2"
                             src="{{asset('storage/admin/images/user.png')}}"
                             alt="User Image">
                    @else
                        <img class="user-image img-circle elevation-2"
                             src="{{asset('storage/admin/images/'.$user->profile_image)}}"
                             alt="User Image">
                    @endif
                    {{--                    <img src="{{asset('admin/images/user-icon.png')}}"--}}
                    {{--                         class="user-image img-circle elevation-2" alt="User Image">--}}
                    <span class="d-none d-md-inline">{{$user->first_name}} {{$user->last_name}}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <!-- User image -->
                    <li class="user-header bg-warning">
                        @if($user->profile_image == '')
                            <img class="user-image img-circle elevation-2"
                                 src="{{asset('storage/admin/images/user.png')}}"
                                 alt="User Image">
                        @else
                            <img class="user-image img-circle elevation-2"
                                 src="{{asset('storage/admin/images/'.$user->profile_image)}}"
                                 alt="User Image">
                        @endif
                        {{--                        <img src="{{asset('admin/images/user-icon.png')}}"--}}
                        {{--                             class="img-circle elevation-2 bg-white"--}}
                        {{--                             alt="User Image">--}}
                        <p>
                            {{$user->first_name}} {{$user->last_name}}
                            {{--                            <small>@lang('auth.app.member_since') {{ \Illuminate\Support\Facades\Auth::user()->created_at->format('M. Y') }}</small>--}}
                            <small>{{ \Illuminate\Support\Facades\Auth::user()->created_at->format('M. Y') }}</small>
                        </p>
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <a href="{{route('profile')}}" class="btn btn-default btn-flat">Profile</a>
                        <a href="#" class="btn btn-default btn-flat float-right"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            @lang('Sign Out')
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

    <!-- Left side column. contains the logo and sidebar -->
@include('layouts.sidebar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>

    <!-- Main Footer -->
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2021-2022 <a href="#">Fundoo App</a>.</strong> All rights
        reserved.
    </footer>
</div>

<script src="https://adminlte.io/themes/v3/plugins/jquery/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/dropzone/min/dropzone.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
<script type="text/javascript" src="https://adminlte.io/themes/v3/plugins/daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="https://adminlte.io/themes/v3/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- AdminLTE App -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/moment/moment.min.js"></script>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/1.3/bootstrapSwitch.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="https://adminlte.io/themes/v3/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

{{--<script>--}}
{{--    $('#daterange-btn').daterangepicker();--}}
{{--</script>--}}

<script type="text/javascript">
    tinymce.init({
        selector: 'textarea.tinymce-editor',
        height: 300,
        menubar: false,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount', 'image'
        ],
        toolbar: 'undo redo | formatselect | ' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help',
        content_css: '//www.tiny.cloud/css/codepen.min.css'
    });
</script>
<script>

</script>
{{--<script src="{{asset('admin/js/app.js')}}" ></script>--}}
{{--<script src="{{asset('admin/js/bootstrap.js')}}"></script>--}}

<script type="text/javascript">
    $(function () {

        var start = moment().subtract(29, 'days');
        var end = moment();

        function cb(start, end) {
            $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }

        $('#daterange-btn').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);

        cb(start, end);

    });
</script>

<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', {'placeholder': 'dd/mm/yyyy'})
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', {'placeholder': 'mm/dd/yyyy'})
        //Money Euro
        $('[data-mask]').inputmask()

        //Date picker
        $('#reservationdate').datetimepicker({
            format: 'L'
        });

        //Date and time picker
        $('#reservationdatetime').datetimepicker({icons: {time: 'far fa-clock'}});

        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY hh:mm A'
            }
        })

        // $('#daterange-btn').daterangepicker(
        //     {
        //         ranges   : {
        //             'Today'       : [moment(), moment()],
        //             'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        //             'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
        //             'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        //             'This Month'  : [moment().startOf('month'), moment().endOf('month')],
        //             'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        //         },
        //         startDate: moment().subtract(29, 'days'),
        //         endDate  : moment()
        //     },
        //     function (start, end) {
        //         $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        //     }
        // )

        //Timepicker
        $('#timepicker').datetimepicker({
            format: 'LT'
        })

        //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox()

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        $('.my-colorpicker2').on('colorpickerChange', function (event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        })

        $("input[data-bootstrap-switch]").each(function () {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })

    })
    // BS-Stepper Init
    document.addEventListener('DOMContentLoaded', function () {
        window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    })

    // DropzoneJS Demo Code Start
    Dropzone.autoDiscover = false

    // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
    var previewNode = document.querySelector("#template")
    previewNode.id = ""
    var previewTemplate = previewNode.parentNode.innerHTML
    previewNode.parentNode.removeChild(previewNode)

    var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
        url: "/target-url", // Set the url
        thumbnailWidth: 80,
        thumbnailHeight: 80,
        parallelUploads: 20,
        previewTemplate: previewTemplate,
        autoQueue: false, // Make sure the files aren't queued until manually added
        previewsContainer: "#previews", // Define the container to display the previews
        clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
    })

    myDropzone.on("addedfile", function (file) {
        // Hookup the start button
        file.previewElement.querySelector(".start").onclick = function () {
            myDropzone.enqueueFile(file)
        }
    })

    // Update the total progress bar
    myDropzone.on("totaluploadprogress", function (progress) {
        document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
    })

    myDropzone.on("sending", function (file) {
        // Show the total progress bar when upload starts
        document.querySelector("#total-progress").style.opacity = "1"
        // And disable the start button
        file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
    })

    // Hide the total progress bar when nothing's uploading anymore
    myDropzone.on("queuecomplete", function (progress) {
        document.querySelector("#total-progress").style.opacity = "0"
    })

    // Setup the buttons for all transfers
    // The "add files" button doesn't need to be setup because the config
    // `clickable` has already been specified.
    document.querySelector("#actions .start").onclick = function () {
        myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
    }
    document.querySelector("#actions .cancel").onclick = function () {
        myDropzone.removeAllFiles(true)
    }
    // DropzoneJS Demo Code End
</script>

<script>
    $(function () {
        bsCustomFileInput.init();
    });

    $("input[data-bootstrap-switch]").each(function () {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });
</script>
<script>
    // Any of the following formats may be used
    const ctx = document.getElementById('myChart');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
            datasets: [{
                label: 'Fundoo',
                data: [5000, 20000, 3300, 10500, 20000, 25003, 45000, 89000],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)'
                ],
                borderRadius: 15,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
<script>
    $(function () {
        $(document).on('click', '[data-toggle="lightbox"]', function (event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: true
            });
        });

        $('.filter-container').filterizr({gutterPixels: 3});
        $('.btn[data-filter]').on('click', function () {
            $('.btn[data-filter]').removeClass('active');
            $(this).addClass('active');
        });
    })
</script>
@stack('third_party_scripts')

@stack('page_scripts')
</body>
</html>
