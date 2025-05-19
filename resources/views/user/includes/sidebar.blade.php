<aside class="sidebar">
    <div>
        <a href="/landing" class="sidebar-logo">
            <img src="{{ asset('landing-page/images/logo.webp') }}" alt="site logo" class="light-logo">
            <img src="assets/images/logo-light.png" alt="site logo" class="dark-logo">
            <img src="assets/images/logo-icon.png" alt="site logo" class="logo-icon">
        </a>
    </div>
    <div class="sidebar-menu-area">
        <ul class="sidebar-menu" id="sidebar-menu">
            <li>
                <a href="{{ route('dashboarduser') }}">
                    <iconify-icon icon="solar:document-add-outline" class="menu-icon"></iconify-icon>
                    <span>Profil</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <iconify-icon icon="hugeicons:start-up-02" class="menu-icon"></iconify-icon>
                    <span>Invoice</span>
                </a>
            </li>
            <li>
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item">Logout</button>
                </form>
            </li>
        </ul>
    </div>
</aside>
