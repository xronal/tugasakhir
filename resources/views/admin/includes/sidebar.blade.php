<aside class="sidebar">
    <button type="button" class="sidebar-close-btn">
        <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
    </button>
    <div>
        <a href="{{ route('dashboard') }}" class="sidebar-logo">
            <img src="{{ asset('landing-page/images/logo.webp') }}" alt="site logo" class="light-logo">
            <img src="assets/images/logo-light.png" alt="site logo" class="dark-logo">
            <img src="assets/images/logo-icon.png" alt="site logo" class="logo-icon">
        </a>
    </div>
    <div class="sidebar-menu-area">
        <ul class="sidebar-menu" id="sidebar-menu">
            <li>
                <a href="{{ route('dashboard') }}">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>Dashboard</span>
                </a>
            </li>

            <li>
                <a href="{{ route('package.index') }}">
                    <iconify-icon icon="hugeicons:start-up-02" class="menu-icon"></iconify-icon>
                    <span>Package</span>
                </a>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="hugeicons:invoice-03" class="menu-icon"></iconify-icon>
                    <span>Invoice</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('invoicelist') }}"><i
                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            List</a>
                    </li>
                    <li>
                        <a href="{{ route('invoicepreview') }}"><i
                                class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Preview</a>
                </ul>
            </li>

            <li>
                <a href="{{ route('campsite.index') }}">
                    <iconify-icon icon="hugeicons:start-up-02" class="menu-icon"></iconify-icon>
                    <span>Campsite</span>
                </a>
            </li>

            <li>
                <a href="{{ route('grounds.index') }}">
                    <iconify-icon icon="hugeicons:start-up-02" class="menu-icon"></iconify-icon>
                    <span>Ground</span>
                </a>
            </li>

            <li>
                <a href="{{ route('item.index') }}">
                    <iconify-icon icon="hugeicons:start-up-02" class="menu-icon"></iconify-icon>
                    <span>Item</span>
                </a>
            </li>

            <li>
                <a href="{{ route('customer.index') }}">
                    <iconify-icon icon="hugeicons:start-up-02" class="menu-icon"></iconify-icon>
                    <span>Customer</span>
                </a>
            </li>

            <li>
                <a href="{{ route('transaction.index') }}">
                    <iconify-icon icon="hugeicons:start-up-02" class="menu-icon"></iconify-icon>
                    <span>Transaction</span>
                </a>
            </li>


            <li>
                <a href="{{ route('person.index') }}">
                    <iconify-icon icon="hugeicons:start-up-02" class="menu-icon"></iconify-icon>
                    <span>Person Entry</span>
                </a>
            </li>


            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="dropdown-item"><strong>Logout</strong></button>
            </form>
        </ul>
    </div>
</aside>
