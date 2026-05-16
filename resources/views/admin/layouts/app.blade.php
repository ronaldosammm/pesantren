<!DOCTYPE html>
<html>
<head>
    <title>Admin Pesantren</title>

    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

    @include('admin.partials.navbar')

    <div class="admin-container">

        @include('admin.partials.sidebar')

        <div class="content">
            @yield('content')
        </div>

    </div>

    @include('admin.partials.footer')

</body>
</html>