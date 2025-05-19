<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    @include('user.includes.meta')
    <title>CAMPERVAN PARK - @yield('title')</title>

    @stack('before-main-style')
    @include('user.includes.style')
    @stack('after-main-style')
</head>

<body>
    @include('user.includes.sidebar')

    <main class="dashboard-main">
        @include('user.includes.navbar')

        <div class="dashboard-main-body">
            @yield('content')
        </div>
        @include('user.includes.footer')
    </main>

    @stack('before-main-script')
    @include('user.includes.script')
    @stack('after-main-script')
</body>

</html>
