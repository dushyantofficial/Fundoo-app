<aside class="main-sidebar elevation-4 sidebar-dark-warning">
    <a href="{{ url('/admin/home') }}" class="brand-link">
        <img src="{{asset('admin/images/icon-admin-sidebar.png')}}"
             alt="{{ config('app.name') }} Zroop" class="brand-image rounded elevation-3">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>
    @php
        $user = \Illuminate\Support\Facades\Auth::user();
    @endphp
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if($user->profile_image == '')
                    <img class="img-circle elevation-2"
                         src="{{asset('storage/admin/images/user.png')}}"
                         alt="User Image">
                @else
                    <img class="img-circle elevation-2"
                         src="{{asset('storage/admin/images/'.$user->profile_image)}}"
                         alt="User Image">
                @endif
                {{--                <img src="{{asset('admin/images/user-icon.png')}}" class="img-circle elevation-2" alt="User Image">--}}
            </div>
            <div class="info">
                <a href="#" class="d-block">{{$user->first_name}} {{$user->last_name}}</a>
            </div>
        </div>

        <div class="form-inline">
            <div class="input-group sidebar_search" data-widget="sidebar-search">

                    <input class="form-control form-control-sidebar text-dark" name="search" type="search"
                           placeholder="Search" aria-label="Search" id="search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
                @include('layouts.menu')
            </ul>
        </nav>
    </div>
</aside>

{{--Sidebar Menu Search--}}

@push('page_scripts')

{{--    <script>--}}
{{--        $(document).ready(function () {--}}
{{--            $("#search").onkeyup(function () {--}}


{{--                var fileter = $(this).val();--}}

{{--                $(`nav li:not(.sidebar_search)`).each(function (index, element) {--}}

{{--                    const item = $(element);--}}

{{--                    const parentListIsNested = item.closest('ul').hasClass('nav-treeview');--}}


{{--                    if (item.text().match(new RegExp(filter, 'gi'))) {--}}
{{--                        item.fadeIn();--}}
{{--                        if (parentListIsNested) {--}}

{{--                            item.closest('ul').addClass('in');--}}

{{--                        }--}}
{{--                    } else {--}}
{{--                        item.fadeOut();--}}
{{--                        if (parentListIsNested) {--}}
{{--                            console.log('item');--}}
{{--                            item.closest('ul').removeClass('in');--}}
{{--                        }--}}
{{--                    }--}}
{{--                });--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}

    <script>
        $(document).on('click', '.list-group-item', function () {

            var test = $(this).attr("href");

            var url = test.split('/');

            var newurl=url[url.length-1];

            $(".list-group-item").attr('href',newurl);

        });
    </script>

@endpush
