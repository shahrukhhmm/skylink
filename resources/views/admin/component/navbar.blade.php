@php
    $roleId = Auth::user()->role_id;
@endphp

<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">

                <li>
                    <a href="{{ url('/dashboard') }}" aria-expanded="false">
                        <i class="icon-speedometer menu-icon"></i>
                        <span class="nav-text">Dash Board</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/user') }}" aria-expanded="false">
                        <i class="icon-badge menu-icon"></i>
                        <span class="nav-text">User</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/airport-parkings') }}" aria-expanded="false">
                        <i class="icon-badge menu-icon"></i>
                        <span class="nav-text">
                            Airport Parking
                        </span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/parkings-pricing') }}" aria-expanded="false">
                        <i class="icon-badge menu-icon"></i>
                        <span class="nav-text">
                            Parkings pricing
                        </span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/discount') }}" aria-expanded="false">
                        <i class="icon-badge menu-icon"></i>
                        <span class="nav-text">
                            Discount Voucher
                        </span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/booking-data-admin') }}" aria-expanded="false">
                        <i class="icon-badge menu-icon"></i>
                        <span class="nav-text">
                           Booking Data
                        </span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/city') }}" aria-expanded="false">
                        <i class="icon-badge menu-icon"></i>
                        <span class="nav-text">
                           City
                        </span>
                    </a>
                </li>

        </ul>
    </div>
</div>
