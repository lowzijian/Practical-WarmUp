<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Districts</title>
    <!--Bootstrap-->
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </script>

</head>


<body>

    @yield('content')
    <script src="{{ asset('js/app.js') }}"></script>

</body>

</html>
