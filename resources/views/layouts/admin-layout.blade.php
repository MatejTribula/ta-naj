<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.head')
</head>

<body>

    @include('admin.sidebar')
    <!-- partial -->
    @include('admin.navbar')
    <!-- partial -->
    @yield('body')

    @include('admin.scripts')
</body>

</html>
