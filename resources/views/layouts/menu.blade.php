<li class="nav-item ">
    <a href="{{route('home')}}" class="nav-link {{ Request::is('admin/home*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>Dashboard</p>
    </a>
</li>


<li class="nav-header">CUSTOMER MANAGEMENT</li>

<li class="nav-item @if(Request::is('admin/customerExtends*') || Request::is('admin/on-trip-customer*')) active menu-open @endif">
    <a href="#" class="nav-link @if(Request::is('admin/customerExtends*') || Request::is('admin/on-trip-customer*')) active @endif">
        <i class="nav-icon fas fa-user"></i>
        <p>
            Customer
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>

    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{route('admin.customerExtends.index')}}"
               class="nav-link {{ Request::is('admin/customerExtends*') ? 'active' : '' }}" id="csm">
                <i class="nav-icon far fa-circle"></i>
                <p>Total Customer</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('on-trip-customer') }}"
               class="nav-link {{ Request::is('admin/on-trip-customer*') ? 'active' : '' }}">
                <i class="nav-icon far fa-circle"></i>
                <p>On Trip Customer</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-header">DRIVER MANAGEMENT</li>
<li class="nav-item @if(Request::is('admin/driverExtendeds*') || Request::is('admin/temporary-driver*') || Request::is('admin/driver-allocation-list*') || Request::is('admin/permanent-driver*') || Request::is('admin/valet-driver*') || Request::is('admin/pickUp-drop-driver*') || Request::is('admin/driverCategories*')|| Request::is('admin/kyc-customer*') || Request::is('admin/total_drivers*')) active menu-open @endif">
    <a href="#"
       class="nav-link @if(Request::is('admin/driverExtendeds*') || Request::is('admin/temporary-driver*') || Request::is('admin/driver-allocation-list*') || Request::is('admin/permanent-driver*') || Request::is('admin/valet-driver*') || Request::is('admin/pickUp-drop-driver*') || Request::is('admin/driverCategories*') || Request::is('admin/kyc-customer*') || Request::is('admin/total_drivers*')) active @endif">
        <i class="nav-icon fas fa-user"></i>
        <p>
            Driver
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>

    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('admin.driverExtendeds.index') }}"
               class="nav-link {{ Request::is('admin/driverExtendeds*') ? 'active' : ''}}">
                <i class="nav-icon far fa-circle"></i>
                <p>Total Drivers</p>
            </a>

{{--            <a href="{{ route('admin.total_drivers.index') }}"--}}
{{--               class="nav-link {{ Request::is('admin/total_drivers*') ? 'active' : ''}}">--}}
{{--                <i class="nav-icon far fa-circle"></i>--}}
{{--                <p>Total Drivers</p>--}}
{{--            </a>--}}
        </li>


        <li class="nav-item">
            <a href="{{ route('admin.permanent-driver.index') }}"
               class="nav-link {{ Request::is('admin/permanent-driver*') ? 'active' : ''}}">
                <i class="nav-icon far fa-circle"></i>
                <p>Permanent Driver</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.temporary-driver.index') }}"
               class="nav-link {{ Request::is('admin/temporary-driver*') ? 'active' : ''}}">
                <i class="nav-icon far fa-circle"></i>
                <p>Temporary Driver</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('admin.valet-driver.index') }}"
               class="nav-link {{ Request::is('admin/valet-driver*') ? 'active' : ''}}">
                <i class="nav-icon far fa-circle"></i>
                <p>Valet Driver</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.pickUp-drop-driver.index') }}"
               class="nav-link {{ Request::is('admin/pickUp-drop-driver*') ? 'active' : ''}}">
                <i class="nav-icon far fa-circle"></i>
                <p>Pick-Up Drop Drivers</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('admin.total_drivers.index') }}"
               class="nav-link {{ Request::is('admin/total_drivers*') ? 'active' : ''}}">
                <i class="nav-icon far fa-circle"></i>
                <p>On Trip Drivers</p>
            </a>
        </li>


        <li class="nav-item">
            <a href="{{ route('admin.kyc-customer.index') }}"
               class="nav-link {{ Request::is('admin/kyc-customer*') ? 'active' : '' }}">
                <i class="nav-icon far fa-circle"></i>
                <p>KYC</p>
            </a>
        </li>
{{--        <li class="nav-item">--}}
{{--            <a href="{{ route('admin.driverCategories.index') }}"--}}
{{--               class="nav-link {{ Request::is('admin/driverCategories*') ? 'active' : '' }}">--}}
{{--                <i class="nav-icon far fa-circle"></i>--}}
{{--                <p>Driver Categories</p>--}}
{{--            </a>--}}
{{--        </li>--}}
    </ul>
</li>
{{--<li class="nav-item">--}}
{{--    <a href="{{ route('driver-dashboard') }}"--}}
{{--       class="nav-link {{ Request::is('driver-dashboard*')}}">--}}
{{--        <i class="nav-icon far fa-circle"></i>--}}
{{--        <p>Driver Dashboard</p>--}}
{{--    </a>--}}
{{--</li>--}}

{{--<li class="nav-item">--}}
{{--    <a href="{{ route('customer-dashboard') }}"--}}
{{--       class="nav-link {{ Request::is('customer-dashboard*')}}">--}}
{{--        <i class="nav-icon far fa-circle"></i>--}}
{{--        <p>Customer Dashboard</p>--}}
{{--    </a>--}}
{{--</li>--}}
<li class="nav-header">TRIP MANAGEMENT</li>
<li class="nav-item @if(Request::is('admin/trip/dashboard*') ||  Request::is('admin/trips-dashboard*') ||  Request::is('admin/assign-permanent-driver*') ||  Request::is('admin/assign-valet-parking-driver*')) active menu-open @endif">
    <a href="#"
       class="nav-link @if(Request::is('admin/trip/dashboard*') ||  Request::is('admin/trips-dashboard*')||  Request::is('admin/assign-permanent-driver*') ||  Request::is('admin/assign-valet-parking-driver*')) active @endif">
        <i class="nav-icon fas fa-user"></i>
        <p>
            TRIP
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('dashboard') }}"
               class="nav-link {{ Request::is('admin/trip/dashboard*')? 'active' : '' }}">
                <i class="nav-icon far fa-circle"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('trips-dashboard') }}"
               class="nav-link {{ Request::is('admin/trips-dashboard*') ? 'active' : '' }}">
                <i class="nav-icon far fa-circle"></i>
                <p>Trips</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('assign-permanent-driver') }}"
               class="nav-link {{ Request::is('admin/assign-permanent-driver*') ? 'active' : '' }}">
                <i class="nav-icon far fa-circle"></i>
                <p>Permanent Driver</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('assign-valet-parking-driver') }}"
               class="nav-link {{ Request::is('admin/assign-valet-parking-driver*') ? 'active' : '' }}">
                <i class="nav-icon far fa-circle"></i>
                <p>Valet Parking Driver</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-header">INQUIRY MANAGEMENT</li>
<li class="nav-item @if(Request::is('admin/permanent-inquiry*') || Request::is('admin/valet-inquiry*')) active menu-open @endif">
    <a href="#"
       class="nav-link @if(Request::is('admin/permanent-inquiry*') || Request::is('admin/valet-inquiry*')) active @endif">
        <i class="nav-icon fas fa-user"></i>
        <p>
            Inquiry
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>

    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('permanent-inquiry') }}"
               class="nav-link {{ Request::is('admin/permanent-inquiry*') ? 'active' : ''}}">
                <i class="nav-icon far fa-circle"></i>
                <p>Permanent Inquiry</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('valet-inquiry') }}"
               class="nav-link {{ Request::is('admin/valet-inquiry*') ? 'active' : ''}}">
                <i class="nav-icon far fa-circle"></i>
                <p>Valet Inquiry</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-header">OFFERS</li>
<li class="nav-item">
    <a href="{{ route('admin.offercodes.index') }}"
       class="nav-link {{ Request::is('admin/offercodes*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-code"></i>
        <p>Offer Codes</p>
    </a>
</li>
{{--<li class="nav-header">CARS</li>--}}
{{--<li class="nav-item @if(Request::is('admin/carcompanies*') ||  Request::is('admin/carmodels*') ||  Request::is('admin/caryears*')) active menu-open @endif">--}}
{{--    <a href="#" class="nav-link @if(Request::is('admin/carcompanies*') ||  Request::is('admin/carmodels*') ||  Request::is('admin/caryears*')) active @endif">--}}
{{--        <i class="nav-icon fas fa-car"></i></i>--}}
{{--        <p>--}}
{{--            Cars--}}
{{--            <i class="fas fa-angle-left right"></i>--}}
{{--        </p>--}}
{{--    </a>--}}
{{--    <ul class="nav nav-treeview">--}}
{{--        <li class="nav-item">--}}
{{--            <a href="{{ route('admin.carcompanies.index') }}"--}}
{{--               class="nav-link {{ Request::is('admin/carcompanies*') ? 'active' : '' }}">--}}
{{--                <i class="nav-icon far fa-circle"></i>--}}
{{--                <p>Car Companies</p>--}}
{{--            </a>--}}
{{--        </li>--}}

{{--        <li class="nav-item">--}}
{{--            <a href="{{ route('admin.carmodels.index') }}"--}}
{{--               class="nav-link {{ Request::is('admin/carmodels*') ? 'active' : '' }}">--}}
{{--                <i class="nav-icon far fa-circle"></i>--}}
{{--                <p>Car Models</p>--}}
{{--            </a>--}}
{{--        </li>--}}

{{--        <li class="nav-item">--}}
{{--            <a href="{{ route('admin.caryears.index') }}"--}}
{{--               class="nav-link {{ Request::is('admin/caryears*') ? 'active' : '' }}">--}}
{{--                <i class="nav-icon far fa-circle"></i>--}}
{{--                <p>Car Years</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--    </ul>--}}
{{--</li>--}}


{{--<li class="nav-header">LOCALIZATION</li>--}}

{{--<li class="nav-item @if(Request::is('admin/states*') ||  Request::is('admin/cities*')) active menu-open @endif" >--}}
{{--    <a href="#" class="nav-link @if(Request::is('admin/states*') ||  Request::is('admin/cities*')) active @endif">--}}
{{--        <i class="nav-icon fas fa-book"></i>--}}
{{--        <p>--}}
{{--            Localization--}}
{{--            <i class="fas fa-angle-left right"></i>--}}
{{--        </p>--}}
{{--    </a>--}}
{{--    <ul class="nav nav-treeview">--}}
{{--        <li class="nav-item">--}}
{{--            <a href="{{ route('admin.states.index') }}"--}}
{{--               class="nav-link {{ Request::is('admin/states*') ? 'active' : '' }}">--}}
{{--                <i class="nav-icon far fa-circle"></i>--}}
{{--                <p>States</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a href="{{ route('admin.cities.index') }}"--}}
{{--               class="nav-link {{ Request::is('admin/cities*') ? 'active' : '' }}">--}}
{{--                <i class="nav-icon far fa-circle"></i>--}}
{{--                <p>Cities</p>--}}
{{--            </a>--}}
{{--        </li>--}}


{{--    </ul>--}}
{{--</li>--}}

<li class="nav-header">PAGES</li>

<li class="nav-item @if(Request::is('admin/pages*') || Request::is('admin/faq*')) active menu-open @endif">
    <a href="#" class="nav-link  @if(Request::is('admin/pages*') || Request::is('admin/faq*')) active @endif">
        <i class="nav-icon fas fa-book"></i>
        <p>
            Pages
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('admin.pages.index') }}"
               class="nav-link {{ Request::is('admin/pages*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Pages</p>
            </a>
        </li>
    </ul>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('admin.faq.index') }}"
               class="nav-link {{ Request::is('admin/faq*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Faq</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-header">GENERAL SETTINGS</li>
<li class="nav-item">
    <a href="{{ route('admin.settings.edit',1) }}"
       class="nav-link {{ Request::is('admin/settings*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-cog"></i>
        <p>Settings</p>
    </a>
</li>

<li class="nav-header d-none">KYC MANAGEMENT</li>

<li class="nav-item d-none">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-user"></i>
        <p>
            KYC
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('admin.states.index') }}"
               class="nav-link {{ Request::is('admin/states*')}}">
                <i class="nav-icon far fa-circle"></i>
                <p>Applied KYC</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.states.index') }}"
               class="nav-link {{ Request::is('admin/states*')}}">
                <i class="nav-icon far fa-circle"></i>
                <p>Verified KYC</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.states.index') }}"
               class="nav-link {{ Request::is('admin/states*')}}">
                <i class="nav-icon far fa-circle"></i>
                <p>Pending KYC</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.states.index') }}"
               class="nav-link {{ Request::is('admin/states*')}}">
                <i class="nav-icon far fa-circle"></i>
                <p>KYC Log</p>
            </a>
        </li>
    </ul>
</li>












<li class="nav-item">
    <a href="{{ route('admin.staticdatas.index') }}"
       class="nav-link {{ Request::is('admin/staticdatas*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-table"></i>
        <p>Static Data</p>

    </a>
</li>


<li class="nav-item d-none">
    <a href="{{ route('admin.driverExtendeds.index') }}"
       class="nav-link {{ Request::is('admin/driverExtendeds*') ? 'active' : '' }}">
        <p>Driver Extended</p>
    </a>
</li>


<li class="nav-item d-none">
    <a href="{{ route('admin.customerExtends.index') }}"
       class="nav-link {{ Request::is('admin/customerExtends*') ? 'active' : '' }}">
        <p>Customer Extends</p>
    </a>
</li>


<li class="nav-item d-none">
    <a href="{{ route('admin.customerCarDetails.index') }}"
       class="nav-link {{ Request::is('admin/customerCarDetails*') ? 'active' : '' }}">
        <p>Customer Car Details</p>
    </a>
</li>


<li class="nav-item d-none">
    <a href="{{ route('admin.permanentInquiries.index') }}"
       class="nav-link {{ Request::is('admin/permanentInquiries*') ? 'active' : '' }}">
        <p>Permanent Inquiries</p>
    </a>
</li>


<li class="nav-item d-none">
    <a href="{{ route('admin.assignDrivers.index') }}"
       class="nav-link {{ Request::is('admin/assignDrivers*') ? 'active' : '' }}">
        <p>Assign Drivers</p>
    </a>
</li>


<li class="nav-item d-none">
    <a href="{{ route('admin.dailyReportings.index') }}"
       class="nav-link {{ Request::is('admin/dailyReportings*') ? 'active' : '' }}">
        <p>Daily Reporting</p>
    </a>
</li>


<li class="nav-item d-none">
    <a href="{{ route('admin.salaries.index') }}"
       class="nav-link {{ Request::is('admin/salaries*') ? 'active' : '' }}">
        <p>Salaries</p>
    </a>
</li>


<li class="nav-item d-none">
    <a href="{{ route('admin.leaveDetails.index') }}"
       class="nav-link {{ Request::is('admin/leaveDetails*') ? 'active' : '' }}">
        <p>Leave Details</p>
    </a>
</li>


<li class="nav-item d-none">
    <a href="{{ route('admin.fuelDetails.index') }}"
       class="nav-link {{ Request::is('admin/fuelDetails*') ? 'active' : '' }}">
        <p>Fuel Details</p>
    </a>
</li>


<li class="nav-item d-none">
    <a href="{{ route('admin.outOFStatoindetails.index') }}"
       class="nav-link {{ Request::is('admin/outOFStatoindetails*') ? 'active' : '' }}">
        <p>Out Of State</p>
    </a>
</li>

<li class="nav-header">HELPLINE</li>
<li class="nav-item">
    <a href="{{ route('admin.help-line.index') }}"
       class="nav-link {{ Request::is('admin/help-line*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-code"></i>
        <p>Help Line</p>
    </a>
</li>

<li class="nav-header">REPORTS</li>
<li class="nav-item @if(Request::is('*customer-reports*') ||  Request::is('*driver-reports*') ||  Request::is('*advance-trip-reports*')) active menu-open  @endif">
    <a href="#"
       class="nav-link @if(Request::is('*customer-reports*') || Request::is('*driver-reports*') || Request::is('*advance-trip-reports*')) active @endif">
        <i class="nav-icon fas fa-file"></i>
            Reports
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{url('admin/customer-reports')}}"
               class="nav-link {{ Request::is('*customer-reports*') ? 'active' : '' }}">
                <i class="nav-icon far fa-circle"></i>
                <p>Customer Report</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{url('admin/driver-reports')}}"
               class="nav-link {{ Request::is('*driver-reports*') ? 'active' : '' }}">
                <i class="nav-icon far fa-circle"></i>
                <p>Driver Report</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url('admin/advance-trip-reports')}}"
               class="nav-link {{ Request::is('*advance-trip-reports*') ? 'active' : '' }}">
                <i class="nav-icon far fa-circle"></i>
                <p>Advance Trip Report</p>
            </a>
        </li>

        {{--        <li class="nav-item">--}}
        {{--            <a href="#"--}}
        {{--               class="nav-link {{ Request::is('admin/states*')}}">--}}
        {{--                <i class="nav-icon far fa-circle"></i>--}}
        {{--                <p>Report</p>--}}
        {{--            </a>--}}
        {{--        </li>--}}
        {{--        <li class="nav-item">--}}
        {{--            <a href="#"--}}
        {{--               class="nav-link {{ Request::is('admin/states*')}}">--}}
        {{--                <i class="nav-icon far fa-circle"></i>--}}
        {{--                <p>Report</p>--}}
        {{--            </a>--}}
        {{--        </li>--}}

    </ul>
</li>
