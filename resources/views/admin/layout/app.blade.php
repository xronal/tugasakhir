<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    @include('admin.includes.meta')
    <title>CAMPERVAN PARK - @yield('title')</title>

    @stack('before-main-style')
    @include('admin.includes.style')
    @stack('after-main-style')
</head>

<body>
    @include('admin.includes.sidebar')

    <main class="dashboard-main">
        @include('admin.includes.navbar')

        <div class="dashboard-main-body">
            @yield('content')
        </div>
        @include('admin.includes.footer')
    </main>

    @stack('before-main-script')
    @include('admin.includes.script')
    @stack('after-main-script')
</body>

</html>
